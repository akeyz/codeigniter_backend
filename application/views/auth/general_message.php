<?php if ($this->tank_auth->is_logged_in()): ?>
    <?php $this->load->view('common/head'); ?>
    <?php $this->load->view('common/top'); ?>

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
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="alert alert-success">
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('common/foot'); ?>
<?php else: ?>
    <?php $this->load->view('auth/head'); ?>
    <div class="control-group">
        <?php if ($message) {
            echo $message;
        } ?>
    </div>
    <div class="control-group">
        <?php echo anchor('/auth/login/', '登录', array('class' => 'btn green')); ?>
        <div class="clearfix"></div>
    </div>
    <?php $this->load->view('auth/foot'); ?>
<?php endif; ?>