<?php echo e(Form::open(array('url' => 'chart-of-account'))); ?>

<div class="modal-body">
    <div class="row">
        <div class="form-group col-md-6">
            <?php echo e(Form::label('name', __('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name', '', array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('code', __('Code'),['class'=>'form-label'])); ?>

            <?php echo e(Form::number('code', '', array('class' => 'form-control','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('type', __('Account'),['class'=>'form-label'])); ?>

            <?php echo e(Form::select('type', $types,null, array('class' => 'form-control select','required'=>'required'))); ?>

        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('sub_type',__('Type'),['class'=>'form-label'])); ?>

            <select class="form-control select" name="sub_type" id="sub_type" required>
            </select>
        </div>
        <div class="form-group col-md-6">
            <?php echo e(Form::label('is_enabled',__('Is Enabled'),array('class'=>'form-label'))); ?>

            <div class="form-check form-switch">
                <input type="checkbox" class="form-check-input" name="is_enabled" id="is_enabled" checked>
                <label class="custom-control-label form-check-label" for="is_enabled"></label>
            </div>
        </div>

        <div class="form-group col-md-12">
            <?php echo e(Form::label('description', __('Description'),['class'=>'form-label'])); ?>

            <?php echo Form::textarea('description', null, ['class'=>'form-control','rows'=>'2']); ?>

        </div>

    </div>
</div>
<div class="modal-footer">
    <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn  btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn  btn-primary">
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH F:\wamp64\www\ERP_go\resources\views/chartOfAccount/create.blade.php ENDPATH**/ ?>