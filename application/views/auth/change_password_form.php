<?php $this->load->view('common/head'); ?>
<?php $this->load->view('common/top'); ?>

<?php
$old_password = array(
    'name' => 'old_password',
    'id' => 'old_password',
    'value' => set_value('old_password'),
    'size' => 30,
    'class' => 'span6 m-wrap',
);
$new_password = array(
    'name' => 'new_password',
    'id' => 'new_password',
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
    'size' => 30,
    'class' => 'span6 m-wrap',
);
$confirm_new_password = array(
    'name' => 'confirm_new_password',
    'id' => 'confirm_new_password',
    'maxlength' => $this->config->item('password_max_length', 'tank_auth'),
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
                                    更改密码
                                    <small>更新编辑自己账户密码</small>
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
                                <a href="#">更改密码</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="portlet box blue">
                                <div class="portlet-title">
                                    <div class="caption"><?php echo lang('change_password'); ?></div>
                                </div>
                                <div class="portlet-body form">
                                    <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal')); ?>
                                    <div class="control-group">
                                        <label
                                            class="control-label"><?php echo form_label(lang('old_password'), $old_password['id']); ?></label>

                                        <div class="controls">
                                            <?php echo form_password($old_password); ?>
                                            <span
                                                class="help-inline"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']]) ? $errors[$old_password['name']] : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label
                                            class="control-label"><?php echo form_label(lang('new_password'), $new_password['id']); ?></label>

                                        <div class="controls">
                                            <?php echo form_password($new_password); ?>
                                            <span
                                                class="help-inline"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']]) ? $errors[$new_password['name']] : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label
                                            class="control-label"><?php echo form_label(lang('confirm_new_password'), $confirm_new_password['id']); ?></label>

                                        <div class="controls">
                                            <?php echo form_password($confirm_new_password); ?>
                                            <span
                                                class="help-inline"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']]) ? $errors[$confirm_new_password['name']] : ''; ?></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <?php echo form_submit('reset', lang('change_new_password'), "class='btn blue btn-primary'"); ?>
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