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
if ($login_by_username AND $login_by_email) {
    $login_label = lang('email_or_login');
} else if ($login_by_username) {
    $login_label = lang('login');
} else {
    $login_label = lang('email');
}
$password = array(
    'name' => 'password',
    'id' => 'password',
    'placeholder' => lang('password'),
    'size' => 30,
    'class' => 'm-wrap placeholder-no-fix',
);
$remember = array(
    'name' => 'remember',
    'id' => 'remember',
    'value' => 1,
    'checked' => set_value('remember'),
    'style' => 'margin:0;padding:0',
);
$captcha = array(
    'name' => 'captcha',
    'id' => 'captcha',
    'maxlength' => 8,
    'class' => 'm-wrap placeholder-no-fix',
);
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
    <div class="control-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label
            class="control-label visible-ie8 visible-ie9"><?php echo form_label('Password', $password['id']); ?></label>

        <div class="controls">
            <div class="input-icon left">
                <i class="icon-lock"></i>
                <?php echo form_password($password); ?>
            </div>
            <label
                class="error help-small no-left-padding"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></label>
        </div>
    </div>
<?php if ($show_captcha) {
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
            <label class="control-label visible-ie8 visible-ie9"></label>

            <div class="controls">
                <div class="recaptcha_only_if_image">Enter the words above</div>
                <div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
                <input type="text" id="recaptcha_response_field" name="recaptcha_response_field"/>

                <div class="input-icon left">
                    <?php echo $recaptcha_html; ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="control-group">
            <label class="control-label visible-ie8 visible-ie9"></label>

            <div class="controls">
                <p>Enter the code exactly as it appears:</p>
                <?php echo $captcha_html; ?>
                <?php echo form_label('Confirmation Code', $captcha['id']); ?>
                <div class="input-icon left">
                    <i class="icon-qrcode"></i>
                    <?php echo form_input($captcha); ?>
                </div>
                <label class="error help-small no-left-padding">
                    <?php echo form_error('recaptcha_response_field'); ?><?php echo form_error($captcha['name']); ?>
                </label>
            </div>
        </div>
    <?php }
} ?>
    <div class="form-actions">
        <label class="checkbox">
            <?php echo form_checkbox($remember); ?> 记住我
        </label>

        <?php echo form_submit('submit', lang('log_in'), "class='btn green pull-right'"); ?>
    </div>
    <div class="create-account">
        <div class="row-fluid">
            <div class="span6">
                <p>
                    <?php if ($this->config->item('allow_registration', 'tank_auth')) echo '新用户，' . anchor('/auth/register/', '免费注册'); ?></p>
            </div>
            <div class="span6" style="text-align:right;">
                <p><?php echo anchor('/auth/forgot_password/', '忘记密码?'); ?></p>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>
    <script>
        jQuery(document).ready(function () {
            App.init();
        });
    </script>
<?php $this->load->view('auth/foot'); ?>