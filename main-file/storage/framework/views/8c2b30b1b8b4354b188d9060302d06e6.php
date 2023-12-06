
    <?php echo e(Form::open(array('route' => array('product.import'),'method'=>'post', 'enctype' => "multipart/form-data"))); ?>

    <div class="row">
        <div class="col-md-12 mb-6">
            <?php echo e(Form::label('file',__('Download sample product CSV file'),['class'=>'form-label'])); ?>

            <a href="<?php echo e(asset(Storage::url('uploads/sample')).'/sample-product.xlsx'); ?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle" data-toggle="tooltip" data-original-title="<?php echo e(__('Download')); ?>">
                <i class="ti ti-download"></i> 
            </a>
        </div>
        <div class="col-md-12">
            <?php echo e(Form::label('file',__('Select CSV File'),['class'=>'form-label'])); ?>

            <div class="choose-file form-group">
                <label for="file" class="form-control-label">
                    <div class='form-label'><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="file" id="file" data-filename="upload_file" required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light"
                data-bs-dismiss="modal">Close</button>
                <?php echo e(Form::submit(__('Upload'),array('class'=>'btn btn-primary '))); ?>

        </div>
       
    </div>
    <?php echo e(Form::close()); ?>

<?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/product/import.blade.php ENDPATH**/ ?>