<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Calendar')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Calendar')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Calendar')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Call')): ?>

            <a href="#" data-size="lg" data-url="<?php echo e(route('call.create',['call',0])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Call')); ?>" class="btn btn-sm btn-primary ms-2">
                <?php echo e(__('Add Call')); ?>

            </a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Meeting')): ?>

            <a href="#" data-size="lg" data-url="<?php echo e(route('meeting.create',['meeting',0])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Meeting')); ?>" class="btn btn-sm btn-info">
                <?php echo e(__('Add Meeting')); ?>

            </a>
    <?php endif; ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Task')): ?>

            <a href="#" data-size="lg" data-url="<?php echo e(route('task.create',['task',0])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Create New Task')); ?>" class="btn btn-sm btn-success ">
                <?php echo e(__('Add Task')); ?>

            </a>
    <?php endif; ?>
    <div class="float-end px-1">
        <select name="calenderdata" data-toggle='select' class="form-select px-2" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
            <option value="<?php echo e(route('calendar.index','all')); ?>" <?php echo e(((Request::segment(2) == 'all' || empty(Request::segment(2))) ? 'selected' : '')); ?>><?php echo e(__('Show All')); ?></option>
            <option value="<?php echo e(route('calendar.index','meeting')); ?>"<?php echo e(((Request::segment(2) == 'meeting') ? 'selected' : '')); ?>><?php echo e(__('Show Meeting')); ?></option>

            <option value="<?php echo e(route('calendar.index','call')); ?>" <?php echo e(((Request::segment(2) == 'call') ? 'selected' : '')); ?>><?php echo e(__('Show Call')); ?></option>
            <option value="<?php echo e(route('calendar.index','task')); ?>" <?php echo e(((Request::segment(2) == 'task') ? 'selected' : '')); ?>><?php echo e(__('Show Task')); ?></option>
        </select>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script-page'); ?>
<script src="<?php echo e(asset('assets/js/plugins/main.min.js')); ?>"></script>
<script type="text/javascript">
    <?php
    $segment=Request::segment(2);
    ?>
    $(document).ready(function()
    {
        get_data();
    });

    function get_data()
    {
        var segment="<?php echo e($segment); ?>";
        if(segment=='call'){
            var urls=$("#path_admin").val()+"/call/get_call_data";
        }
        else if(segment=='meeting'){
            var urls=$("#path_admin").val()+"/meeting/get_meeting_data";
        }
        else if(segment=='task'){
            var urls=$("#path_admin").val()+"/task/get_task_data";
        }
        else{
            var urls=$("#path_admin").val()+"/all-data";
        }

        var calender_type=$('#calender_type :selected').val();
        $('#calendar').removeClass('local_calender');
        $('#calendar').removeClass('goggle_calender');

        if(calender_type == undefined){
            calender_type = 'local_calender';
        }

        $('#calendar').addClass(calender_type);
        $.ajax({
            url: urls ,
            method:"POST",
            data: {"_token": "<?php echo e(csrf_token()); ?>",'calender_type':calender_type},
            success: function(data) {
                (function() {
                    var etitle;
                    var etype;
                    var etypeclass;
                    var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay'
                        },
                        buttonText: {
                            timeGridDay: "<?php echo e(__('Day')); ?>",
                            timeGridWeek: "<?php echo e(__('Week')); ?>",
                            dayGridMonth: "<?php echo e(__('Month')); ?>"
                        },
                        slotLabelFormat: {
                                    hour: '2-digit',
                                    minute: '2-digit',
                                    hour12: false,
                                },
                        themeSystem: 'bootstrap',
                        // slotDuration: '00:10:00',
                        navLinks: true,
                        droppable: true,
                        selectable: true,
                        selectMirror: true,
                        editable: true,
                        dayMaxEvents: true,
                        handleWindowResize: true,
                        height: 'auto',
                        timeFormat: 'H(:mm)',
                        events: data,
                        // eventContent: function(event, element, view) {
                        //             var customHtml = event.event._def.extendedProps.html;
                        //             return {
                        //                 html: customHtml
                        //             }
                        //     }

                    });

                    calendar.render();
                })();
            }
        });
    }
</script>
<?php $__env->stopPush(); ?>
<?php

$setting = App\Models\Utility::settings();

?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 style="width: 150px;"><?php echo e(__('Calendar')); ?></h5>
                    <?php if(isset($setting['is_enabled']) && $setting['is_enabled'] == 'on'): ?>
                        <select class="form-control" name="calender_type" id="calender_type" style="float: right;width: 150px;" onchange="get_data()">
                            <option value="goggle_calender"><?php echo e(__('Google Calender')); ?></option>
                            <option value="local_calender" selected="true"><?php echo e(__('Local Calender')); ?></option>
                        </select>
                        <?php endif; ?>
                        <input type="hidden" id="path_admin" value="<?php echo e(url('/')); ?>">
                </div>

                <div class="card-body">
                    <div id='calendar' class='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">Next events</h4>
                    <ul class="event-cards list-group list-group-flush mt-3 w-100">
                        <?php
                            $date = Carbon\Carbon::now()->format('m');
                            $this_month_Call = App\Models\Call::get();
                            if(\Auth::user()->type == 'owner'){
                                $this_month_Call = App\Models\Call::where('created_by', \Auth::user()->creatorId())->get();

                            }
                            else
                            {
                                $this_month_Call = App\Models\Call::where('user_id', \Auth::user()->id)->get();

                            }
                        ?>
                        <?php $__currentLoopData = $this_month_Call; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Call): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $month =date('m', strtotime($Call->start_date));
                            ?>
                            <?php if($date == $month): ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="ti ti-phone-call"></i>
                                                </div>
                                                <div class="ms-3" style="color: #3ec9d6">
                                                <h6 class="m-0"><?php echo e($Call->name); ?></h6>
                                                <small class="text-muted"><?php echo e($Call->start_date); ?> to <?php echo e($Call->end_date); ?></small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $date = Carbon\Carbon::now()->format('m');
                            $this_month_meeting = App\Models\meeting::get();

                            if(\Auth::user()->type == 'owner'){
                                $this_month_meeting = App\Models\meeting::where('created_by', \Auth::user()->creatorId())->get();
                            }
                            else
                            {
                                $this_month_meeting = App\Models\meeting::where('user_id', \Auth::user()->id)->get();
                            }
                        ?>
                        <?php $__currentLoopData = $this_month_meeting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php  $month =date('m', strtotime($meeting->start_date));?>
                            <?php if($date == $month): ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-info">
                                                    <i class="ti ti-calendar-event"></i>
                                                </div>
                                                <div class="ms-3">
                                                <h6 class="m-0"><?php echo e($meeting->name); ?></h6>
                                                <small class="text-muted"><?php echo e($meeting ->start_date); ?> to <?php echo e($meeting->end_date); ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $date = Carbon\Carbon::now()->format('m');
                            $this_month_task = App\Models\task::get();
                            if(\Auth::user()->type == 'owner'){
                                $this_month_task = App\Models\task::where('created_by', \Auth::user()->creatorId())->get();
                            }
                            else
                            {
                                $this_month_task = App\Models\task::where('user_id', \Auth::user()->id)->get();
                            }
                        ?>
                        <?php $__currentLoopData = $this_month_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $month =date('m', strtotime($task->start_date));
                            ?>
                            <?php if($date == $month): ?>
                                <li class="list-group-item card mb-3">
                                    <div class="row align-items-center justify-content-between">
                                        <div class="col-auto mb-3 mb-sm-0">
                                            <div class="d-flex align-items-center">
                                                <div class="theme-avtar bg-primary">
                                                    <i class="fa fa-tasks"></i>
                                                </div>
                                                <div class="ms-3">
                                                <h6 class="m-0"><?php echo e($task->name); ?></h6>
                                                <small class="text-muted"><?php echo e($task->start_date); ?> to <?php echo e($task->end_date); ?></small>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
<?php $__env->stopSection(); ?>


    <?php $__env->startPush('script-page'); ?>

    <script type="text/javascript">
        $(document).on('change', 'select[name=parent]', function () {

            var parent = $(this).val();

            getparent(parent);
        });

        function getparent(bid) {
            console.log(bid);
            $.ajax({
                url: '<?php echo e(route('call.getparent')); ?>',
                type: 'POST',
                data: {
                    "parent": bid, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    console.log(data);
                    $('#parent_id').empty();
                    

                    $.each(data, function (key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (data == '') {
                        $('#parent_id').empty();
                    }
                }
            });
        }

        $(document).on('change', '#parents', function () {
            console.log('h');
            var parent = $(this).val();
            getparents(parent);
        });

        function getparents(bid) {
            console.log(bid);
            $.ajax({
                url: '<?php echo e(route('task.getparent')); ?>',
                type: 'POST',
                data: {
                    "parent": bid, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    console.log(data);
                    $('#parent_id').empty();
                    

                    $.each(data, function (key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (data == '') {
                        $('#parent_id').empty();
                    }
                }
            });
        }


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\centraglobe\main-file\resources\views/calendar/index.blade.php ENDPATH**/ ?>