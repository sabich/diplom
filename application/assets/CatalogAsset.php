<?php

namespace app\assets;

class CatalogAsset extends \yii\web\AssetBundle {
    public $sourcePath = '@app/views/src';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap-select.min.css',
        'css/lightslider.min.css',
        'css/lightGallery/lg-fb-comment-box.min.css',
        'css/lightGallery/lg-transitions.min.css',
        'css/lightGallery/lightgallery.css',
        'css/jquery.flipster.min.css',
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
        'js/catalog.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}