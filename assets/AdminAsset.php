<?php


namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/web';
    public $css = [
        "css/theme-default.css",
        "https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,500,600,700&subset=latin,latin-ext",
        "https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,500,600,700&subset=latin,latin-ext"
    ];
    public $js =[
        "js/plugins/jquery/jquery.min.js",
        "js/plugins/jquery/jquery-ui.min.js",
        "js/plugins/bootstrap/bootstrap.min.js",
        'js/plugins/icheck/icheck.min.js',
        "js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js",
        "js/plugins/scrolltotop/scrolltopcontrol.js",
        "js/plugins/morris/raphael-min.js",
        "js/plugins/morris/morris.min.js",
        "js/plugins/rickshaw/d3.v3.js",
        "js/plugins/rickshaw/rickshaw.min.js",
        'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'js/plugins/bootstrap/bootstrap-datepicker.js',
        "js/plugins/owl/owl.carousel.min.js",
        "js/plugins/moment.min.js",
        "js/plugins/daterangepicker/daterangepicker.js",
        "js/settings.js",
        "js/plugins.js",
        "js/actions.js",
        "js/demo_dashboard.js"
    ];
    public $depends = [

    ];
}
{

}