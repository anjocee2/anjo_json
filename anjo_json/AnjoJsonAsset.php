<?php

namespace common\widgets\anjo_json;

use yii\web\AssetBundle;

class AnjoJsonAsset extends AssetBundle
{
    
    /* 全局CSS文件 */
    public $css = [
        'jsoneditor.css',
    ];
    /* 全局JS文件 */
    public $js = [
        'jsoneditor-minimalist.min.js',
    ];
    /* 依赖关系 */
    public $depends = [
        'yii\web\JqueryAsset',
    ];
    
    public function init(){
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'jsoneditor/dist';
    }
}
