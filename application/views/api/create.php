<?php $this->load->view('common/head'); ?>
<?php $this->load->view('common/top'); ?>
	<div class="page-container">
	<?php $this->load->view('common/sidebar'); ?>
		<div class="page-content">
			<div class="container-fluid">
				<div class="row-fluid">
                    <div class="span12">
                        <div class="row-fluid">
                            <div class="span12">
                                <h3 class="page-title">
                                    API接口管理
                                    <small>管理自己的API的接口</small>
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
                                <a href="#">API接口管理</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row-fluid">
                    <div class="span12">
                        <div class="portlet">
                            <div class="portlet-title">
                                <?php echo anchor('api/index', 'API接口列表', array('class' => 'btn green')); ?>
                                <?php echo anchor('api/create', '新建API接口', array('class' => 'btn blue')); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="portlet box blue">
                            <div class="portlet-title">
                                <div class="caption">
                                    <?php echo '新建API接口'; ?>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <?php echo form_open('', array('class' => 'form-horizontal')); ?>
                                    <div class="alert alert-error hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        信息填写有误或没有填写，请检查后，再次提交。
                                    </div>
                                    <div class="alert alert-success hide">
                                        <button class="close" data-dismiss="alert"></button>
                                        信息填写正确
                                    </div>
                                    <?php if (isset($message)): ?>
                                    <div class="alert alert-error">
                                        <button class="close" data-dismiss="alert"></button>
                                        <?php echo $message; ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="control-group">
                                        <label class="control-label">
                                            API名称
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="name" data-rule-required="true" data-msg-required="请填写API名称" class="span6 m-wrap"/>
                                            <span class="help-inline"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">
                                            API控制器
                                        </label>
                                        <div class="controls">
                                            <input type="text" name="controller" data-rule-required="true" data-msg-required="请填写API控制器" class="span6 m-wrap"/>
                                            <span class="help-inline"></span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">

                                        </label>

                                        <div class="controls">
                                            <p><?php echo validation_errors('<span style="color:red;">', '</span>'); ?></p>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <?php echo form_submit('', lang('form_submit'), "class='btn green'"); ?>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
<script src="<?php echo base_url(); ?>assets/scripts/form-validation.js"></script> 
<script type="text/javascript">
jQuery(document).ready(function() {
   FormValidation.init();
});
</script>
<?php $this->load->view('common/foot'); ?>