<?php $this->load->view('common/head'); ?>
<?php $this->load->view('common/top'); ?>

<?php
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30,
);
?>

    <div class="page-container">
        <?php $this->load->view('common/sidebar'); ?>
        <div class="page-content">
            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span12">
                        &nbsp;
                    </div>
                </div>

                <div id="dashboard">
                    <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
                    <div class="control-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                        <label class="control-label"><?php echo form_label('Password', $password['id']); ?></label>

                        <div class="controls">
                            <div class="input-icon left">
                                <?php echo form_password($password); ?>
                                <label
                                    class="error help-small no-left-padding help-inline"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></label>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <?php echo form_submit('reset', 'Get a new password', "class='btn'"); ?>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('common/foot'); ?>