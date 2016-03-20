<h1>Insert new Prescription</h1>
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

@if($errors->has('image'))

    {!!$errors->first('image')!!}
@endif

{!! Form::open(array(
  'route' => 'insert_store', 
  'class' => 'form-control',
  'accept-charset'=>'UTF-8',
  'files' => true)) !!}

  <!-- name -->
  <div class="form-group">
      {!! Form::label('Your Name') !!} 
      <p>
      {!! Form::text('name', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'')) !!}
  </div>

  <!-- phone -->
  <div class="form-group">
      {!! Form::label('Phone number') !!}
      <p>
      {!! Form::number('phone', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'')) !!}
  </div>

  <!-- address -->
  <div class="form-group">
      {!! Form::label('Address') !!}
      <p>
      {!! Form::text('addr', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your address')) !!}
  </div>

  <!-- email -->
  <div class="form-group">
      {!! Form::label('Email') !!}
      <p>
      {!! Form::text('email', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'abc@example.com')) !!}
  </div>

  <!-- image -->
  <div class="form-group">
      {!! Form::label('Image Prescription') !!}
      <p>
      {!! Form::file('image', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'')) !!}
  </div>

  <!-- status -->
  <div class="form-group">
      {!! Form::label('Status') !!}
      <p>
      {!! Form::radio('status', 'true', true) !!}
      {!! Form::label('true') !!}

      {!! Form::radio('status', 'false') !!}
       {!! Form::label('false') !!}
  </div>

  <!-- total -->
  <div class="form-group">
      {!! Form::label('Total') !!}
      <p>
      {!! Form::number('total', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'total')) !!}
  </div>

  <div class="form-group">
      {!! Form::submit('Insert prescription!', 
        array('class'=>'btn btn-primary')) !!}
  </div>

{!! Form::close() !!}