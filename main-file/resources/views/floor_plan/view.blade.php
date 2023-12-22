<div class="row">
    <div class="col-lg-12">
            <div class="">
                <dl class="row">
                    <dt class="col-md-6"><span class="h6 text-md mb-0">{{__('Name')}}</span></dt>
                    <dd class="col-md-6"><span class="text-md">{{ $meeting->name }}</span></dd>

                    <dt class="col-md-6"><span class="h6 text-md mb-0">{{__('Email')}}</span></dt>
                    <dd class="col-md-6">
                        <input type = "text" class="form-control" value = "{{ $meeting->email }}">
                    </dd>

                </dl>
            </div>

    </div>
</div>

