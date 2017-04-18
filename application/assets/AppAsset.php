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
    public $sourcePath = '@app/views/src/app-asset';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-select.min.css',
        'css/jquery.flipster.min.css',
        'css/owlcarousel/owl.carousel.min.css',
        'css/owlcarousel/owl.theme.default.css',
        'css/lightslider.min.css',
	    'css/lightGallery/lg-fb-comment-box.min.css',
	    'css/lightGallery/lg-transitions.min.css',
	    'css/lightGallery/lightgallery.css',
        'css/fonts.css',
        'css/main.css',
        'css/project.css',
        'css/projects.css',
        'css/media.css',
    ];
    public $js = [
        'js/bootstrap-select.min.js',
        'js/lightslider.min.js',
	    'js/lightgallery/lightgallery.js',
	    'js/lightgallery/lg-autoplay.js',
	    'js/lightgallery/lg-fullscreen.js',
	    'js/lightgallery/lg-hash.js',
	    'js/lightgallery/lg-pager.js',
	    'js/lightgallery/lg-thumbnail.js',
	    'js/lightgallery/lg-video.js',
	    'js/lightgallery/lg-zoom.js',
        'js/jquery.flipster.min.js',
        'js/owl.carousel.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
