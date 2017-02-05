<?php $this->load->view('common/head'); ?>
<?php $this->load->view('common/top'); ?>
<?php
$password = array(
    'name' => 'password',
    'id' => 'password',
    'size' => 30,
    'class' => 'span6 m-wrap',
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'value' => set_value('email'),
    'maxlength' => 80,
    'size' => 30,
    'class' => 'span6 m-wrap',
);
?>

<div class="page-container">
    <?php $this->load->view('common/sidebar'); ?>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="span12">
                            <h3 class="page-title">
                                更改邮箱
                                <small>更新编辑自己账户邮箱</small>
                            </h3>
                        </div>
                    </div>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <?php echo anchor('', '控制面板'); ?>
                            <span class="icon-angle-right"></span>
                        </li>
                        <li>
                            <a href="#">更改邮箱</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div id="dashboard">
                <div class="row-fluid">
                    <div class="span12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption"><?php echo lang('change_email'); ?></div>
                            </div>
                            <div class="portlet-body form">
                                <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
                                <div class="control-group">
                                    <label
                                        class="control-label"><?php echo form_label(lang('password'), $password['id']); ?></label>

                                    <div class="controls">
                                        <?php echo form_password($password); ?>
                                        <span
                                            class="help-inline"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']]) ? $errors[$password['name']] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label
                                        class="control-label"><?php echo form_label(lang('new_email'), $email['id']); ?></label>

                                    <div class="controls">
                                        <?php echo form_input($email); ?>
                                        <span
                                            class="help-inline"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']]) ? $errors[$email['name']] : ''; ?></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <?php echo form_submit('reset', lang('change_new_email'), "class='btn blue btn-primary'"); ?>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('common/foot'); ?>
