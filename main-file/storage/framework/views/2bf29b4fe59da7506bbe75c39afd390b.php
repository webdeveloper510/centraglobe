<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Opportunities')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Opportunities')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Opportunities')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('opportunities.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>
    </a>
  
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Opportunities')): ?>
            <a href="#" data-size="lg" data-url="<?php echo e(route('opportunities.create',['opportunities',0])); ?>" data-ajax-popup="true" data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Opportunities')); ?>" title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
                <i class="ti ti-plus"></i>
            </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/plugins/dragula.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/dragula.min.js')); ?>"></script>

    <script>
        !function (a) {
            "use strict";
            var t = function () {
                this.$body = a("body")
            };
            t.prototype.init = function () {
                a('[data-plugin="dragula"]').each(function () {
                    var t = a(this).data("containers"), n = [];
                    if (t) for (var i = 0; i < t.length; i++) n.push(a("#" + t[i])[0]); else n = [a(this)[0]];
                    var r = a(this).data("handleclass");
                    r ? dragula(n, {
                        moves: function (a, t, n) {
                            return n.classList.contains(r)
                        }
                    }) : dragula(n).on('drop', function (el, target, source, sibling) {

                        var order = [];
                        $("#" + target.id + " > div").each(function () {
                            order[$(this).index()] = $(this).attr('data-id');
                        });

                        var id = $(el).attr('data-id');

                        var old_status = $("#" + source.id).data('status');
                        var new_status = $("#" + target.id).data('status');
                        var stage_id = $(target).attr('data-id');
                        var pipeline_id = '1';

                        $("#" + source.id).parent().find('.count').text($("#" + source.id + " > div").length);
                        $("#" + target.id).parent().find('.count').text($("#" + target.id + " > div").length);

                        $.ajax({
                            url: '<?php echo e(route('opportunities.change.order')); ?>',
                            type: 'POST',
                            data: {opo_id: id, stage_id: stage_id, order: order, "_token": $('meta[name="csrf-token"]').attr('content')},
                            success: function (data) {
                                show_toastr('Success', 'Opportunities successfully updated', 'success');
                            },
                            error: function (data) {
                                data = data.responseJSON;
                                show_toastr('<?php echo e(__("Error")); ?>', data.error, 'error')
                            }
                        });
                    });
                })
            }, a.Dragula = new t, a.Dragula.Constructor = t
        }(window.jQuery), function (a) {
            "use strict";

            a.Dragula.init()

        }(window.jQuery);
    </script>


<?php $__env->stopPush(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
  
    <div class="row">
        <div class="col-sm-12">
           
                <?php
                    $json = [];
                    foreach ($stages as $stage){
                        $json[] = 'kanban-blacklist-'.$stage->id;
                    }
                ?>
    
            <div class="row kanban-wrapper horizontal-scroll-cards kanban-board" data-containers='<?php echo json_encode($json); ?>' data-plugin="dragula">
                <?php $__currentLoopData = $stages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $opportunities =$stage->opportunity($stage->id)
                    ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <div class="float-end">
                                        <button class="btn btn-sm btn-primary btn-icon task-header">
                                            <span class="count text-white"><?php echo e(count($opportunities)); ?></span>
                                        </button>
                                    </div>
                                    <h4 class="mb-0"><?php echo e($stage->name); ?></h4>
                                </div>
                                <div class="card-body kanban-box" id="kanban-blacklist-<?php echo e($stage->id); ?>" data-id="<?php echo e($stage->id); ?>">
                                    <?php $__currentLoopData = $opportunities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opportunity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       
                                        <div class="card" data-id="<?php echo e($opportunity->id); ?>">
                                            <div class="pt-3 ps-3">
                                                
                                                    <div class="card-header border-0 pb-0 position-relative">
                                                        <h5>
                                                            <a href="<?php echo e(route('opportunities.edit',$opportunity->id)); ?>"
                                                            data-bs-whatever="<?php echo e(__('Opportunity Edit')); ?>"
                                                            data-bs-toggle="tooltip"  title data-bs-original-title="<?php echo e(__('Opportunity Edit')); ?>" ><?php echo e(ucfirst($opportunity->name)); ?></a></h5>
                                                            <div class="card-header-right">
                                                                <div class="btn-group card-option">
                                                                    <?php if(Gate::check('Show Opportunities') || Gate::check('Edit Opportunities') || Gate::check('Delete Opportunities')): ?>
                                                                        <button type="button" class="btn dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">
                                                                            <i class="ti ti-dots-vertical"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Opportunities')): ?>
                                                                                    <a href="<?php echo e(route('opportunities.edit',$opportunity->id)); ?>" class="dropdown-item" data-title="<?php echo e(__('Edit Opportunities')); ?>">
                                                                                        <i  class="ti ti-edit"></i>
                                                                                        <span><?php echo e(__('Edit')); ?></span>
                                                                                    </a>
                                                                                <?php endif; ?>
            
                                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Opportunities')): ?>
                                                                                <a href="#!" class="dropdown-item" data-size="lg"  data-url="<?php echo e(route('opportunities.show', $opportunity->id)); ?>" 
                                                                                    data-ajax-popup="true" data-title="<?php echo e(__('opportunities')); ?>">
                                                                                    <i class="ti ti-eye"></i>
                                                                                    <span><?php echo e(__('View Opportunities')); ?></span>
                                                                                </a>
                                                                                <?php endif; ?>
            
                                                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Opportunities')): ?>
                                                                                    
                                                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['opportunities.destroy', $opportunity->id],'id'=>'task-delete-form-'.$opportunity->id]); ?>

                                                                                        <a href="#!" class="dropdown-item show_confirm" class="dropdown-item">
                                                                                            <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                                                                        </a>
                                                                                        <?php echo Form::close(); ?>

                                                                                 
                                                                                <?php endif; ?>
                                                                            
                                                                        </div>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                    </div>
                                                <div class="card-body">
                                                   
                                                    
                                                    <h6 data-bs-toggle="tooltip" title="<?php echo e(__('Account name')); ?>"> <?php echo e(ucfirst(!empty($opportunity->accounts)?$opportunity->accounts->name:'-')); ?>

                                                    </h6>
                                                    <p class="text-muted text-sm" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Description')); ?>"><?php echo e($opportunity->description); ?></p>                                                

                                                    
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item d-inline-flex align-items-center"><i
                                                                    class="f-16 text-primary ti ti-message-2"></i><?php echo e(\Auth::user()->priceFormat($opportunity->amount)); ?></li>
                                                        </ul>
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item d-inline-flex align-items-center"><i
                                                                    class="f-16 text-primary ti ti-message-2"></i><?php echo e(\Auth::user()->dateFormat($opportunity->close_date)); ?></li>
                                                        </ul>

                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
           
            <!-- [ sample-page ] end -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/opportunities/grid.blade.php ENDPATH**/ ?>