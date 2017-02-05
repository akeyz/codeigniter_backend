<?php $this->load->view('auth/head'); ?>
<?php
if ($use_username) {
    $username = array(
        'name' => 'username',
        'id' => 'username',
        'value' => set_value('username'),
        'placeholder' => lang('login'),
        'maxlength' => $this->config->item('username_max_length', 'tank_auth'),
        'size' => 30,
        'class' => 'm-wrap placeholder-no-fix',
    );
}
$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => set_value('email'),
    'placeholder' => lang('email'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'm-wrap placeholder-no-fix',
);
$password = array(
    'name' => 'password',
    'id' => 'password',
    'value' => set_value('password'),
    'placeholder' => lang('password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
    'class' => 'm-wrap placeholder-no-fix',
);
$confirm_password = array(
    'name' => 'confirm_password',
    'id' => 'confirm_password',
    'value' => set_value('confirm_password'),
    'placeholder' => lang('confirm_password'),
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
    'class' => 'm-wrap placeholder-no-fix',
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8,
    'class' => 'm-wrap placeholder-no-fix',
);
?>
<?php echo form_open($this->uri->uri_string()); ?>
<?php if ($use_username) { ?>
    <div class="control-group">
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('Username', $username['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-user"></i>
                <?php echo form_input($username); ?>
            </div>
            <label
                class="error help-small no-left-padding"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']]) ? $errors[$username['name']] : ''; ?></label>
        </div>
    </div>
<?php } ?>
    <div class="control-group">
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('Email Address', $email['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-envelope-alt"></i>
                <?php echo form_input($email); ?>
            </div>
            <label
                class="error help-small no-left-padding"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></label>
        </div>
    </div>
    <div class="control-group">
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('Password', $password['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo form_password($password); ?>
            </div>
            <label class="error help-small no-left-padding"><?php echo form_error($password['name']); ?></label>
        </div>
    </div>
    <div class="control-group">
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('Confirm Password', $confirm_password['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo form_password($confirm_password); ?>
            </div>
            <label class="error help-small no-left-padding"><?php echo form_error($confirm_password['name']); ?></label>
        </div>
    </div>
<?php if ($captcha_registration) {
    if ($use_recaptcha) { ?>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9"></label>

            <div class="controls">
                <div id="recaptcha_image"></div>
                <a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>

                <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio
                        CAPTCHA</a></div>
                <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image
                        CAPTCHA</a></div>
            </div>
        </div>
        <div class="control-group">
            <label
                class="control-label visible-ie8 visible-ie9"><?php echo form_label('Confirm Password', $confirm_password['id']); ?></label>

            <div class="controls">
                <div class="recaptcha_only_if_image">Enter the words above</div>
                <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                <div class="input-icon left">
                    <i class="icon-lock"></i>
                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field"/>
                </div>
                <?php echo $recaptcha_html; ?>
                <label
                    class="error help-small no-left-padding"><?php echo form_error('recaptcha_response_field'); ?></label>
            </div>
        </div>
    <?php } else { ?>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9"></label>

            <div class="controls">
                <p><?php echo lang('enter_the_code_exactly_as_it_appears'); ?></p>

                <p><?php echo $captcha_html; ?></p>
                <label
                    class="control-label visible-ie8 visible-ie9"><?php echo form_label('Confirmation Code', $captcha['id']); ?></label>

                <div class="input-icon left">
                    <i class="icon-lock"></i>
                    <?php echo form_input($captcha); ?>
                </div>
                <label class="error help-small no-left-padding"><?php echo form_error($captcha['name']); ?></label>
            </div>
        </div>
    <?php }
} ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo form_submit('register', lang('sign_up'), "class='btn green'"); ?>
        </div>
        <div class="span6" style="text-align:right;">
            <span
                style="margin-top:6px;display:block;">已有账号，点击<?php echo anchor('/auth/login/', lang('log_in')); ?></span>
        </div>
    </div>
<?php echo form_close(); ?>
<?php $this->load->view('auth/foot'); ?>