<?php
/**
 * Created by PhpStorm.
 * User: burakovas
 * Date: 2019-01-27
 * Time: 19:54
 */

namespace common\assets;

use yii\web\AssetBundle;

class MyWidgetAsset extends AssetBundle
{
    public $sourcePath = '@webroot/css/';
    public $css = [
        'style.css',
    ];
    public $js = [
    ];
}