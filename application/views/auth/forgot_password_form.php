<?php $this->load->view('auth/head'); ?>
<?php
$login = array(
    'name' => 'login',
    'id' => 'login',
    'value' => set_value('login'),
    'placeholder' => lang('email_or_login'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'm-wrap placeholder-no-fix',
);
if ($this->config->item('use_username', 'tank_auth')) {
    $login_label = 'Email or login';
} else {
    $login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label($login_label, $login['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                <?php echo form_input($login); ?>
            </div>
            <label
                class="error help-small no-left-padding"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']]) ? $errors[$login['name']] : ''; ?></label>
        </div>
    </div>
<?php echo form_submit('reset', lang('get_new_password'), "class='btn green'"); ?>
<?php echo form_close(); ?>
<?php $this->load->view('auth/foot'); ?>