app.controller('notification', function($scope, $location, $http, API_URL, toastr, $route) {
    $http.get(API_URL + "notif")
    .success(function(response) {
        $scope.notif = response;
        $scope.nitifNewPre = response.new;
        toastr.info('Có ' + $scope.nitifNewPre + ' toa thuốc mới.', 'Thông báo!');
        $scope.notifi();
    });

    $scope.notifi = function notif()
    {
        setTimeout(function() {
            $http.get(API_URL + "notif")
            .success(function(response) {
                $scope.notif = response;
                if($scope.nitifNewPre < response.new){
                    $scope.now = response.new - $scope.nitifNewPre;
                    toastr.info('Có ' + $scope.now + ' toa thuốc mới.', 'Thông báo!');
                    // cap nhat view newpre
                    var pathnow = $location.path();
                    if(pathnow == '/newpre')
                    {
                        $route.reload();
                    }
                }
                $scope.nitifNewPre = response.new;
            });
            $scope.notifi();
        },3000);
    }

    $scope.getClass = function (path) {
      return ($location.path().substr(0, path.length) === path) ? 'current-page' : '';
  }

  $scope.getClassRoot = function(path, path2){
    if ($location.path().substr(0, path.length) === path || $location.path().substr(0, path.length) === path2) {
        return 'active';
    }else{
        return '';
    }
  }

});

app.controller('newpreController', function($scope, $http, API_URL, toastr) {
    $http.get(API_URL + "newpre").success(function(response){
        $scope.newpre = response;
    });

    $scope.show = function(id)
    {
        $.each($scope.newpre,function(index, value){
            if(value._id == id)
            {
                return $scope.pre = value;
            }
        });
        if($scope.pre.image){
            $('#newpreModal').modal('show');
        }else{
            $('#newpreNotImgModal').modal('show');
        }
    }

    $scope.cancel = function(id){
        $http.get(API_URL + "newpre/cancel/" +id)
        .success(function(response) {
            if(response=='1')
            {
                if (response=='1') {
                    window.location="#/newpre";
                    $http.get(API_URL + "newpre").success(function(response){
                        $scope.newpre = response;
                    });
                    toastr.success("Một yêu cầu lại đã được gửi đi.", "Thành công!");
                }else{
                    toastr.error("Vui lòng thao tác lại","Lỗi server!");
                }
            }
        }).error(function(response) {
            toastr.error("Vui lòng kiểm tra kết nối Internet","Lỗi!");
        });
    }

    $scope.can = function(id){
        $http.get(API_URL + "newpre/can/" +id)
        .success(function(response) {
            if(response=='1')
            {
                window.location="#/newpre";
                $http.get(API_URL + "newpre").success(function(response){
                    $scope.newpre = response;
                });
            }else{}
        });
    }
});

app.controller('handlingpre', function($scope, $http, API_URL, $location) {
    $http.get(API_URL + "handlingpre").success(function(response){
        $scope.handlingpre = response;
    });
    // $scope.drugimport = function(view){
    //      $location.path(view);
    // }

    $scope.cancel = function(id){
        $http.get(API_URL + "handlingpre/cancel/" +id)
        .success(function(response) {
            if (response=='1') {
                window.location="#/handlingpre";
                $http.get(API_URL + "handlingpre").success(function(response){
                    $scope.handlingpre = response;
                });
            }else{
            }
            
        });
    }

    $scope.can = function(id){
        $http.get(API_URL + "handlingpre/can/" + id)
        .success(function(response){
            if (response=='1') {
                window.location="#/handlingpre";
                $http.get(API_URL + "handlingpre").success(function(response){
                    $scope.handlingpre = response;
                });
            }else{}
        });
    }

});

app.controller('drugimport', function($scope, $http, API_URL, $routeParams, toastr) {
    $http.get(API_URL + "get-pre/"+ $routeParams.idpre)
    .success(function(response){
        $scope.pre = response[0];
        $scope.arrDrug ={ _id: $scope.pre._id };
        console.log($scope.pre);
    });
    
    $scope.addInfor = function(){
        var length = document.getElementById("tbdrug").rows.length;
        if(length<=3)
        {
            toastr.error("Vui lòng thêm thuốc", "Lỗi!");
        }else{
            $('#myModal').modal('show');
        }
    }

    $scope.exportPre = function(){
        var place = $('#place').val();
        var time = $('#time').val();
        var length = document.getElementById("tbdrug").rows.length;
        if(place==''||time=='' || length<=3)
        {
            toastr.warning('Vui lòng nhập đủ các thông tin cần thiết', 'Lỗi!');
        }else{
            var i = 2;
            var arrDrug = [];
            while (i<length-1) {
                var name = document.getElementById("tbdrug").rows[i].cells[1].innerHTML;
                var quantity = document.getElementById("tbdrug").rows[i].cells[2].innerHTML;
                if(quantity.substring(0,3)=='<in')
                {
                    quantity = document.getElementById("tbdrug").rows[i].cells[2].children[0].value;
                    if(quantity=='')
                    {
                        toastr.error('Thuốc "'+name+'" chưa nhập đủ thông tin! Vui lòng kiểm tra lại toa.', 'Lỗi!');
                        return '';
                    }
                }
                var cost = document.getElementById("tbdrug").rows[i].cells[3].innerHTML;
                var total = document.getElementById("tbdrug").rows[i].cells[4].innerHTML;
                var drug = new $scope.Drug(name, quantity, cost, total);
                arrDrug.push(drug);
                i++;
            }
            $scope.arrDrug.drugs = arrDrug;
            $scope.arrDrug.totals = $('#totals').html();
            $http({
                method: 'POST',
                url: API_URL + "drug-import",
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param($scope.arrDrug)
            }).success(function(response){
                if (response=='1') {
                    window.location="#/handlingpre";
                    toastr.success("Một toa thuốc đã được gửi đi.", "Thành công!");
                }else{
                    toastr.error("Vui lòng thao tác lại","Lỗi server!");
                }
            }).error(function(response) {
                toastr.error("Vui lòng kiểm tra kết nối Internet","Lỗi!");
            });
        }
     }

     //create json
     $scope.Drug = function (name, quantity, cost, total) {
        this.name = name;
        this.quantity = quantity;
        this.cost = cost;
        this.total = total;
    }
});

app.controller('confirm', function($scope, $http, API_URL) {
    $http.get(API_URL + "confirm").success(function(response){
        $scope.confirmpre = response;
    });

    $scope.show = function(id)
    {
        $.each($scope.confirmpre, function(index, value){
            if(value._id == id)
            {
                return $scope.pre = value;
            }
        });
        $('#newconfirmpreModal').modal('show');
    }
 
    $scope.cancel = function(id){
        $http.get(API_URL + "handlingpre/cancel/" +id)
        .success(function(response) {
            if (response=='1') {
                window.location="#/handlingpre";
                $http.get(API_URL + "handlingpre").success(function(response){
                    $scope.handlingpre = response;
                });
            }else{
            }
            
        });
    }
});

app.controller('ship', function($scope, $http, API_URL) {
    $http.get(API_URL + "ship").success(function(response){
        $scope.confirmpre = response;
    });
    
    $scope.show = function(id)
    {
        $.each($scope.confirmpre, function(index, value){
            if(value._id == id)
            {
                return $scope.pre = value;
            }
        });
        $('#newconfirmpreModal').modal('show');
    }
 
    $scope.cancel = function(id){
        $http.get(API_URL + "handlingpre/cancel/" +id)
        .success(function(response) {
            if (response=='1') {
                window.location="#/handlingpre";
                $http.get(API_URL + "handlingpre").success(function(response){
                    $scope.handlingpre = response;
                });
            }else{
            }
            
        });
    }
});

