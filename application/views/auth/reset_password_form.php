<?php $this->load->view('auth/head'); ?>
<?php
$new_password = array(
    'name' => 'new_password',
    'id' => 'new_password',
    'placeholder' => lang('new_password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'class' => 'm-wrap placeholder-no-fix',
    'size' => 30,
);
$confirm_new_password = array(
    'name' => 'confirm_new_password',
    'id' => 'confirm_new_password',
    'placeholder' => lang('confirm_new_password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'class' => 'm-wrap placeholder-no-fix',
    'size' => 30,
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('New Password', $new_password['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo form_password($new_password); ?>
                <label
                    class="error help-small no-left-padding"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']]) ? $errors[$new_password['name']] : ''; ?></label>
            </div>
        </div>
    </div>
    <div class="control-group">
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('Confirm New Password', $confirm_new_password['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo form_password($confirm_new_password); ?>
                <label
                    class="error help-small no-left-padding"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']]) ? $errors[$confirm_new_password['name']] : ''; ?></label>
            </div>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <?php echo form_submit('reset', lang('change_password'), "class='btn green'"); ?>
        </div>
    </div>
<?php echo form_close(); ?>
<?php $this->load->view('auth/foot'); ?>