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
                            <?php echo anchor('api/index', 'API接口列表', array('class' => 'btn blue')); ?>
                            <?php echo anchor('api/create', '新建API接口', array('class' => 'btn green')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <div class="portlet">
                        <div class="portlet-body">
                            <?php if (isset($message)): ?>
                            <div class="alert alert-success">
                                <button class="close" data-dismiss="alert"></button>
                                <?php echo $message; ?>
                            </div>
                            <?php endif; ?>

                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>API名称</th>
                                    <th>API控制器</th>
                                    <th>创建日期</th>
                                    <th><?php echo lang('action'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset ($rows)): ?>
                                    <?php foreach ($rows as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['controller']; ?></td>
                                            <td><?php echo $row['date_created']; ?></td>
                                            <td>
                                                <?php echo anchor('api/edit/'.$row['id'], lang('edit'), array('class' => 'btn purple mini')); ?>
                                                <?php echo anchor('#static'.$row['id'], lang('delete'), array('class' => 'btn red mini', 'data-toggle' => 'modal')); ?>
                                                <div id="static<?php echo $row['id']; ?>" class="modal hide fade" tabindex="-1" data-backdrop="static<?php echo $row['id']; ?>" data-keyboard="false">
                                                    <div class="modal-body">
                                                        <p><?php echo lang('delete_confirm') ?> <?php echo $row['name']; ?></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <?php echo anchor('', lang('cancel'), array('class' => 'btn', 'data-dismiss' => 'modal')); ?>
                                                        <?php echo anchor('api/delete/'.$row['id'], lang('delete'), array('class' => 'btn red')); ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('common/foot'); ?>
