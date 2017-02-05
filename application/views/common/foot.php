<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        <p><?php echo lang('c_foot_copyright'); ?></p>

        <p>
            页面执行时间:<strong>{elapsed_time}</strong>秒,使用内存:<strong>{memory_usage}</strong>
        </p>
    </div>
    <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
    </div>
</div>
<!-- END FOOTER -->


<script>
    jQuery(document).ready(function () {
        App.init(); // initlayout and core plugins
        // Index.init();
        // Index.initJQVMAP(); // init index page's custom scripts
        // Index.initCalendar(); // init index page's custom scripts
        // Index.initCharts(); // init index page's custom scripts
        // Index.initChat();
        // Index.initMiniCharts();
        // Index.initDashboardDaterange();
        // Index.initIntro();
        // Tasks.initDashboardWidget();
    });
</script>
</body>
<!-- END BODY -->
</html>