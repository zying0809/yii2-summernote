<?php

namespace zying\summernote;

use Yii;
use yii\web\AssetBundle;
use yii\helpers\ArrayHelper;

class SummernoteAsset extends AssetBundle
{
    public $sourcePath = '@bower/summernote/dist';
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
    public function init()
    {
        $asset = $this->isBs4() ? 'summernote-bs4' : 'summernote';
        $this->css[] = $asset . (YII_DEBUG ? '.css' : '.min.css');
        $this->js[] = YII_DEBUG ? 'summernote.js' : 'summernote.min.js';
        parent::init();
    }

    protected function isBs4()
    {
        $v = ArrayHelper::getValue(Yii::$app->params, 'bsVersion', '3');
        return ($v == '4');
    }
}
