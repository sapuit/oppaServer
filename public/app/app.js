var app = angular.module('admin', ['ngRoute', 'ngAnimate', 'toastr'])
.constant('API_URL', 'http://localhost/oppaServer/api/v1/');

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider.

	when('/newpre', {
		templateUrl: 'public/app/view/newpre.html',
		controller: 'newpreController'
	}).

	when('/handlingpre', {
		templateUrl: 'public/app/view/handlingpre.html',
		controller: 'handlingpre'
	}).
	when('/drugimport/:idpre', {
		templateUrl: 'public/app/view/drug-import.html',
		controller: 'drugimport'
	}).
	when('/confirm',{
		templateUrl: 'public/app/view/confirm.html',
		controller: 'confirm'
	}).
	when('/ship',{
		templateUrl: 'public/app/view/confirm.html',
		controller: 'ship'
	}).
	when('/complete',{
		templateUrl: 'public/app/view/complete.html',
		controller: 'complete'
	}).

	otherwise({
		redirectTo: '/'
	});
}]);

app.config(function(toastrConfig) {
  angular.extend(toastrConfig, {
    allowHtml: false,
    closeButton: false,
    closeHtml: '<button>&times;</button>',
    extendedTimeOut: 1000,
    iconClasses: {
      error: 'toast-error',
      info: 'toast-info',
      success: 'toast-success',
      warning: 'toast-warning'
    },  
    messageClass: 'toast-message',
    onHidden: null,
    onShown: null,
    onTap: null,
    progressBar: true,
    tapToDismiss: true,
    templates: {
      toast: 'directives/toast/toast.html',
      progressbar: 'directives/progressbar/progressbar.html'
    },
    timeOut: 5000,
    titleClass: 'toast-title',
    toastClass: 'toast'
  });
});

