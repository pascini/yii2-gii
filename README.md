raphaelbsr/yii2-gii
===============

Customized Yii2 Crud Generator for ajax use

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require raphaelbsr/yii2-gii "~1.0"
```

or add

```
"raphaelbsr/yii2-gii": "~1.0"
```

to the require section of your `composer.json` file.

Usage
-----

Once the extension is installed, simply modify your application configuration as follows:

```php
...
if (!YII_ENV_TEST) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class' => 'yii\gii\generators\crud\Generator',
                'templates' => [
                    'Raphaelbsr Crud' => '@vendor/raphaelbsr/yii2-gii/crud/default',
                ],
            ],
        ]
    ];
}

```