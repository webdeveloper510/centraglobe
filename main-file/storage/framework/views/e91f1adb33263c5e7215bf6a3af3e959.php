
<?php $__env->startSection('page-title'); ?>
    <?php echo e($notification_template->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="dashboard"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Notification Template')); ?></li>
<?php $__env->stopSection(); ?>
<?php
    $plansettings = App\Models\Utility::plansettings();
    $lang = isset($users->lang) ? $users->lang : 'en';
    $LangName = $curr_noti_tempLang->language ?? (App\Models\Languages::where('code', $lang)->first() ?? new Utility(['fullName' => 'English']));

?>
<?php $__env->startPush('pre-purpose-css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        if ($(".pc-tinymce-2").length) {
            tinymce.init({
                selector: '.pc-tinymce-2',
                height: "400",
                content_style: 'body { font-family: "Inter", sans-serif; }'
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('action-btn'); ?>
    <div class="row">

        <div class="text-end mb-3">
            <div class="text-end">
                <div class="d-flex justify-content-end drp-languages">
                    <ul class="list-unstyled mb-0 m-2">
                        <li class="dropdown dash-h-item drp-language">
                            <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false"
                                id="dropdownLanguage">
                                <span
                                    class="drp-text hide-mob text-primary"><?php echo e(ucFirst(isset($LangName->fullName) ? $LangName->fullName : 'en')); ?></span>
                                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                            </a>
                            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('notification_templates.index', [$notification_template->id, $code])); ?>"
                                        class="dropdown-item <?php echo e($curr_noti_tempLang->lang == $lang ? 'text-primary' : ''); ?>"><?php echo e(ucfirst($lang)); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled mb-0 m-2">
                        <li class="dropdown dash-h-item drp-language">
                            <a class="dash-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="false" aria-expanded="false"
                                id="dropdownLanguage">
                                <span
                                    class="drp-text hide-mob text-primary"><?php echo e(__('Template: ')); ?><?php echo e($notification_template->name); ?></span>
                                <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                            </a>
                            <!-- <?php if(isset($settings['enable_chatgpt']) && $settings['enable_chatgpt'] == 'on'): ?>
                                <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true"
                                    data-size="md" data-title="<?php echo e(__('Generate content with AI')); ?>"
                                    data-url="<?php echo e(route('generate', ['notification template'])); ?>" data-toggle="tooltip"
                                    title="<?php echo e(__('Generate')); ?>">
                                    <i class="fas fa-robot"></span><span
                                            class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                                </a>
                            <?php endif; ?> -->
                            <div class="dropdown-menu dash-h-dropdown dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                <?php $__currentLoopData = $notification_templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification_template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="<?php echo e(route('notification_templates.index', [$notification_template->id, Request::segment(3) ? Request::segment(3) : \Auth::user()->lang])); ?>"
                                        class="dropdown-item <?php echo e($notification_template->name == $notification_template->name ? 'text-primary' : ''); ?>"><?php echo e($notification_template->name); ?>

                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body ">
                    <h5 class="font-weight-bold pb-3"><?php echo e(__('Placeholders')); ?></h5>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header card-body">
                                <div class="row text-xs">
                                    <h6 class="font-weight-bold mb-4"><?php echo e(__('Variables')); ?></h6>
                                    <?php
                                        $variables = json_decode($curr_noti_tempLang->variables);
                                    ?>
                                    <?php if(!empty($variables) > 0): ?>
                                        <?php $__currentLoopData = $variables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $var): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-6 pb-1">
                                                <p class="mb-1"><?php echo e(__($key)); ?> : <span
                                                        class="pull-right text-primary"><?php echo e('{' . $var . '}'); ?></span></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::model($curr_noti_tempLang, ['route' => ['notification-templates.update', $curr_noti_tempLang->parent_id], 'method' => 'PUT'])); ?>

                    <div class="row">
                        <div class="form-group col-12">
                            <?php echo e(Form::label('content', __('Notification Message'), ['class' => 'form-label text-dark'])); ?>

                            <?php echo e(Form::textarea('content', $curr_noti_tempLang->content, ['class' => 'form-control', 'required' => 'required', 'rows' => '04', 'placeholder' => 'EX. Hello, {company_name}'])); ?>

                            <small><?php echo e(__('A variable is to be used in such a way.')); ?> <span
                                    class="text-primary"><?php echo e(__('Ex. Hello, {company_name}')); ?></span></small>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 text-end">
                        <?php echo e(Form::hidden('lang', null)); ?>

                        <input type="submit" value="<?php echo e(__('Save Changes')); ?>"
                            class="btn btn-print-invoice  btn-primary m-r-10">
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centra\centraglobe\main-file\resources\views/notification_templates/index.blade.php ENDPATH**/ ?>