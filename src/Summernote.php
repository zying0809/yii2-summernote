<?php

namespace zying\summernote;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;

class Summernote extends InputWidget
{
    public $clientOptions = [];
    
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->initWidget();
    }

    protected function initWidget()
    {
        $this->registerAssets();
        $summernoteWidget = null;
        if ($this->hasModel()) {
            $summernoteWidget = Html::activeTextarea($this->model, $this->attribute, $this->options);       
        }else{
            $summernoteWidget = Html::textarea($this->name, $this->value, $this->options);
        }
        return $summernoteWidget;
    }

    protected function registerAssets()
    {
        $view = $this->getView();
        SummernoteAsset::register($view);
        if ( null !== ($lang = ArrayHelper::getValue($this->clientOptions, 'lang', null)) 
            || $lang = Yii::$app->language ) {
            SummernoteLanguageAsset::register($view)->setLanguage($lang);
        }
        $clientOptions = null;
        
        if (!empty($this->clientOptions)) {
            $clientOptions = Json::encode($this->clientOptions);
        }
        $jsText = 'jQuery("#' . $this->options['id'] . '").summernote(' . $clientOptions . ')';
        $view->registerJs($jsText);       
    }
}