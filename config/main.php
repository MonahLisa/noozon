<?php
return[
    'vendorPath' => dirname(__DIR__, 2) . '/vendor',
    'imports'=>array(
        'application.extensions.yiichat.*',
    ),
    'components' => [
        'cache' => [
            'class' => 'yii\Caching\FileCache',
        ],
        'image' => [
            'class' => 'yii\image\ImageDriver',
            'driver' => 'Imagick',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],

];

