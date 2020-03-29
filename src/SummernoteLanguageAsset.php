<?php
namespace zying\summernote;

use Yii;
use yii\web\AssetBundle;

class SummernoteLanguageAsset extends AssetBundle
{
    public $language;
    public $sourcePath = '@bower/summernote/dist/lang';
    public function registerAssetFiles($view)
    {
        if ($this->language) {
            $this->js[] = 'summernote-' . $this->language . '.js';
        }
        parent::registerAssetFiles($view);
    }

    public function setLanguage($lang)
    {
        if ($lang) {
            $this->language = $lang;
        }
    }
}
