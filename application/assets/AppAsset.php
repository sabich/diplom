<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/views/src/';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-select.min.css',
        'css/jquery.flipster.min.css',
        'css/owlcarousel/owl.carousel.min.css',
        'css/owlcarousel/owl.theme.default.css',
        'css/fonts.css',
        'css/main.css',
        'css/media.css',
    ];
    public $js = [
        'js/bootstrap-select.min.js',
        'js/jquery.flipster.min.js',
        'js/owl.carousel.min.js',
        'js/main.js',
        'js/wheelnav/raphael.icons.min.js',
        'js/wheelnav/raphael.min.js',
        'js/wheelnav/wheelnav.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
