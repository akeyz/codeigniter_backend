<?php $this->load->view('auth/head'); ?>
<?php
$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => set_value('email'),
    'placeholder' => lang('email'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'm-wrap placeholder-no-fix',
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
    <div class="control-group">
        <p>
            再次发送激活邮件
        </p>
    </div>
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label($login_label, $login['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-envelope-alt"></i>
                <?php echo form_input($email); ?>
            </div>
            <label
                class="error help-small no-left-padding help-inline"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></label>
        </div>
    </div>
<?php echo form_submit('reset', lang('send'), "class='btn'"); ?>
<?php echo form_close(); ?>
<?php $this->load->view('auth/foot'); ?>