
<?php echo e(Form::open(['route' => 'zoom-meeting.store','id'=>'store-user','method'=>'post'])); ?>

<div class="modal-body">

    <div class="row">
        <div class="form-group col-md-12">
            <?php echo e(Form::label('title', __('Topic') ,['class'=>'form-label'])); ?>

            <?php echo e(Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('Enter Meeting Title'), 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('projects', __('Project'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('project_id', $projects, null, ['class' => 'form-control select project_select', 'id' => 'project_select', 'data-toggle' => 'select'])); ?>

        </div>
        <div class="form-group col-md-6" id="user_div">
            <?php echo e(Form::label('projects', __('Users'),['class'=>'form-label'])); ?>

            <select class="form-control select employee_select" id="user_id" name="user_id[]" >
                <option value=""><?php echo e(__('Select User')); ?></option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <?php echo e(Form::label('datetime', __('Start Date / Time'),['class'=>'form-label'])); ?>

            <?php echo e(Form::datetimeLocal('start_date',null,['class' => 'form-control date', 'placeholder' => __('Select Date/Time'), 'required' => 'required'])); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('duration', __('Duration'),['class'=>'form-label'])); ?>

            <?php echo e(Form::number('duration',null,['class' => 'form-control', 'placeholder' => __('Enter Duration'), 'required' => 'required'])); ?>

        </div>

        <div class="form-group col-md-6">
            <?php echo e(Form::label('password', __('Password ( Optional )'),['class'=>'form-label'])); ?>

            <?php echo e(Form::password('password',['class' => 'form-control', 'placeholder' => __('Enter Password')])); ?>

        </div>

        <?php if(isset($settings['google_calendar_enable']) && $settings['google_calendar_enable'] == 'on'): ?>
            <div class="form-group col-md-6">
                <?php echo e(Form::label('synchronize_type',__('Synchronize in Google Calendar ?'),array('class'=>'form-label'))); ?>

                <div class="form-switch">
                    <input type="checkbox" class="form-check-input mt-2" name="synchronize_type" id="switch-shadow" value="google_calender">
                    <label class="form-check-label" for="switch-shadow"></label>
                </div>
            </div>
        <?php endif; ?>

        <div class="form-group col-md-6">
            <div class="form-switch form-switch-right">
                <input class="form-check-input" type="checkbox" name="client_id" id="client_id" checked>
                <label class="form-check-label" for="client_id"><?php echo e(__('Invite Client For Zoom Meeting')); ?></label>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>



<script type="text/javascript">
    $(document).on('change', '.project_select', function () {

        var project_id = $(this).val();

        getparent(project_id);
    });
    function getparent(bid) {

        $.ajax({
            url: `<?php echo e(url('zoom-meeting/projects/select')); ?>/${bid}`,
            type: 'GET',
            success: function (data) {
                $("#user_id").html('');
                $('#user_id').append('<select class="form-control" id="user_id" name="user_id[]"  multiple></select>');

                $.each(data, function (i, item) {

                    $('#user_id').append('<option value="' + item.id + '">' + item.name + '</option>');
                });

                var multipleCancelButton = new Choices('#user_id', {
                    removeItemButton: true,
                });

                if (data == '') {
                    $('#user_id').empty();
                }
            }
        });
    }


</script>







<?php /**PATH F:\wamp64\www\ERP_go\resources\views/zoom-meeting/create.blade.php ENDPATH**/ ?>