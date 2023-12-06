
<?php echo e(Form::open(array('url'=>'webhook','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="form-group">
    <?php echo e(Form::label('module',__('Module'),['class'=>'form-label'])); ?>

    <?php echo e(Form::select('module',$module,null,array('class'=>'form-control','required'=>'required'))); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('url',__('URL'),['class'=>'form-label'])); ?>

    <?php echo e(Form::text('url',null,array('class'=>'form-control','placeholder'=>__('Enter Url'),'required'=>'required'))); ?>

</div>
<div class="form-group">
    <?php echo e(Form::label('method',__('Method'),['class'=>'form-label'])); ?>

    <?php echo e(Form::select('method',$method,null,array('class'=>'form-control','required'=>'required'))); ?>

</div>


    <div class="modal-footer">
        <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
                <?php echo e(Form::submit(__('Save'),array('class'=>'btn  btn-primary  '))); ?><?php echo e(Form::close()); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>






<?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/webhook/create.blade.php ENDPATH**/ ?>