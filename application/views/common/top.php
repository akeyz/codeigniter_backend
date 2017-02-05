<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="<?php echo base_url(); ?>">
                <?php echo lang('meta_title'); ?>
            </a>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="<?php echo base_url(); ?>assets/img/menu-toggler.png" alt=""/>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" src="<?php echo base_url(); ?>assets/img/avatar.png" style="height: 28px;"/>
                        <span class="username"><?php echo $this->tank_auth->get_username(); ?></span>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url(); ?>auth/change_email"><i class="icon-envelope-alt"></i> <?php echo lang('change_email'); ?></a></li>
                        <li><a href="<?php echo site_url(); ?>auth/change_password"><i class="icon-lock"></i> <?php echo lang('change_password'); ?></a></li>
                        <li><a href="<?php echo site_url(); ?>auth/logout"><i class="icon-key"></i> <?php echo lang('log_out'); ?></a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->