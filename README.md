zying/yii2-summernote
=====================
summernote editor

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist zying/yii2-summernote "*"
```

or add

```
"zying/yii2-summernote": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \zying\summernote\Summernote::widget(); ?>
```
Or Add ```use zying\summernote\Summernote```

```php
<?= $form->field($model, 'body')->widget(Summernote::className(),[]) ?>
```
