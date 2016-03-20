<h1>Insert new Prescription</h1>
<ul>
    <?php foreach($errors->all() as $error): ?>
        <li><?php echo e($error); ?></li>
    <?php endforeach; ?>
</ul>

<?php if($errors->has('image')): ?>

    <?php echo $errors->first('image'); ?>

<?php endif; ?>

<?php echo Form::open(array(
  'route' => 'insert_store', 
  'class' => 'form-control',
  'accept-charset'=>'UTF-8',
  'files' => true)); ?>


  <!-- name -->
  <div class="form-group">
      <?php echo Form::label('Your Name'); ?> 
      <p>
      <?php echo Form::text('name', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'')); ?>

  </div>

  <!-- phone -->
  <div class="form-group">
      <?php echo Form::label('Phone number'); ?>

      <p>
      <?php echo Form::number('phone', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'')); ?>

  </div>

  <!-- address -->
  <div class="form-group">
      <?php echo Form::label('Address'); ?>

      <p>
      <?php echo Form::text('addr', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your address')); ?>

  </div>

  <!-- email -->
  <div class="form-group">
      <?php echo Form::label('Email'); ?>

      <p>
      <?php echo Form::text('email', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'abc@example.com')); ?>

  </div>

  <!-- image -->
  <div class="form-group">
      <?php echo Form::label('Image Prescription'); ?>

      <p>
      <?php echo Form::file('image', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'')); ?>

  </div>

  <!-- status -->
  <div class="form-group">
      <?php echo Form::label('Status'); ?>

      <p>
      <?php echo Form::radio('status', 'true', true); ?>

      <?php echo Form::label('true'); ?>


      <?php echo Form::radio('status', 'false'); ?>

       <?php echo Form::label('false'); ?>

  </div>

  <!-- total -->
  <div class="form-group">
      <?php echo Form::label('Total'); ?>

      <p>
      <?php echo Form::number('total', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'total')); ?>

  </div>

  <div class="form-group">
      <?php echo Form::submit('Insert prescription!', 
        array('class'=>'btn btn-primary')); ?>

  </div>

<?php echo Form::close(); ?>