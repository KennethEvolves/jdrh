Использование .sass файлов Bootstrap напрямую
=============================================

Если вы хотите включить [Bootstrap CSS непосредственно в ваши sass-файлы](https://getbootstrap.com/getting-started/#customizing), вам может понадобиться исключить исходные css-файлы Bootstrap из загрузки. Вы можете сделать это, установив пустым свойство `css` пакета [[yii\bootstrap5\BootstrapAsset|BootstrapAsset]]. Для этого вам необходимо настроить [компонент приложения](https://github.com/yiisoft/yii2/blob/master/docs/guide/structure-application-components.md) `assetManager` следующим образом:

```php
    'assetManager' => [
        'bundles' => [
            'yii\bootstrap5\BootstrapAsset' => [
                'css' => [], // исключение исходных css-файлов из загрузки
            ]
        ]
    ]
```
