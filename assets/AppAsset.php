<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600',
        'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300',
        'https://fonts.googleapis.com/css?family=Raleway:400,100',
        "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css",
        "https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css",
        "main/css/owl.carousel.css",
        "main/style.css",
        "main/css/responsive.css",
    ];
    public $js =[
    "https://code.jquery.com/jquery.min.js",
    "https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js",
    "main/js/owl.carousel.min.js",
    "main/js/jquery.sticky.js",
    "main/js/jquery.easing.1.3.min.js",
    "main/js/main.js",
    ];
    public $depends = [

    ];
}
