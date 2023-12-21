<?php
    $plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(array('url'=>'document','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
            data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['document'])); ?>"
            data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
        </a>
    </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
    </div>
    <?php if($type == 'account'): ?>
        <div class="col-6">
            <div class="form-group">
                <?php echo e(Form::label('account',__('Account'),['class'=>'form-label'])); ?>

                <?php echo Form::select('account', $account, $id,array('class' => 'form-control ')); ?>

            </div>
        </div>
    <?php else: ?>
        <div class="col-6">
            <div class="form-group">
                <?php echo e(Form::label('account',__('Account'),['class'=>'form-label'])); ?>

                <?php echo Form::select('account', $account, null,array('class' => 'form-control ')); ?>

            </div>
        </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('folder',__('Folder'),['class'=>'form-label'])); ?>

            <?php echo Form::select('folder', $folder, null,array('class' => 'form-control ')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('type',__('Type'),['class'=>'form-label'])); ?>

            <?php echo Form::select('type', $types, null,array('class' => 'form-control ')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('opportunities',__('Opportunities'),['class'=>'form-label'])); ?>

            <?php echo Form::select('opportunities', $opportunities, null,array('class' => 'form-control ')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('status',__('Status'),['class'=>'form-label'])); ?>

            <?php echo Form::select('status', $status, null,array('class' => 'form-control ','required'=>'required')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('publish_date',__('Publish Date'),['class'=>'form-label'])); ?>

            <?php echo Form::date('publish_date', date('Y-m-d'),array('class' => 'form-control','required'=>'required')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('expiration_date',__('Expiration Date'),['class'=>'form-label'])); ?>

            <?php echo Form::date('expiration_date', date('Y-m-d'),array('class' => 'form-control','required'=>'required')); ?>

        </div>
    </div>

    <div class="col-6 field" data-name="attachments">
        <div class="attachment-upload">
            <div class="attachment-button">
                <div class="pull-left">
                    <div class="form-group">
                    <?php echo e(Form::label('attachment',__('Attachment'),['class'=>'form-label'])); ?>

                    
                    <input type="file"name="attachment" class="form-control mb-3" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    <img id="blah" width="20%" height="20%"/>
                    </div>
                </div>
            </div>
            <div class="attachments"></div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('Assign User',__('Assign User'),['class'=>'form-label'])); ?>

            <?php echo Form::select('user', $user, null,array('class' => 'form-control ')); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Description')))); ?>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
            <?php echo e(Form::submit(__('Save'),array('class'=>'btn  btn-primary '))); ?><?php echo e(Form::close()); ?>

    </div>
</div>
</div>
<?php echo e(Form::close()); ?>


<?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/document/create.blade.php ENDPATH**/ ?>