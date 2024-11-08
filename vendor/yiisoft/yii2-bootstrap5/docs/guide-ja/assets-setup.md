アセットのセットアップ
======================

Bootstrap エクステンションは、アセットのインストールについて、[Bower](https://bower.io/) および/または [NPM](https://www.npmjs.org/) のパッケージに依存しています。
Bootstrap パッケージを使う前に、これらのパッケージをあなたのプロジェクトにインストールする方法を決定しなければなりません。


## asset-packagist レポジトリを使う

[asset-packagist.org](https://asset-packagist.org) を Bootstrap アセットのソース・パッケージとしてセットアップすることが出来ます。

あなたのプロジェクトの `composer.json` に下記の行を追加して下さい。

```json
"repositories": [
    {
        "type": "composer",
        "url": "https://asset-packagist.org"
    }
]
```

そして、アプリケーション構成で `@npm` と `@bower` を設定します。

```php
return [
    //...
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    //...
];
```


## composer アセット・プラグインを使う

次のコマンドを使って [composer アセット・プラグイン](https://github.com/francoispluchino/composer-asset-plugin/) をグローバルにインストールします。

```
composer global require "fxp/composer-asset-plugin:^1.4.0"
```

Yii を使ってアセットを発行したい場合は、あなたのプロジェクトの `composer.json` に下記の行を追加して、
インストールされるパッケージが置かれるディレクトリを設定します。

```json
"extra": {
    "asset-installer-paths": {
        "npm-asset-library": "vendor/npm",
        "bower-asset-library": "vendor/bower"
    }
}
```

これで、`composer install/update` コマンドを実行すると、Bootstrap のアセットを取得することが可能になります。

> Note: `fxp/composer-asset-plugin` は asset-packagist に比べると、`composer update` 
  コマンドを著しく遅くさせます。


## Bower/NPM クライアントを直接に使う

Bower または NPM のクライアントを直接に使って Bootstrap のアセットをインストールすることが出来ます。
あなたのプロジェクトの `package.json` に次の行を追加して下さい。

```json
{
    ...
    "dependencies": {
        "bootstrap": "4.2.1",
        ...
    }
    ...
}
```

あなたのプロジェクトの `package.json` に次の行を追加して、Bootstrap アセットの冗長なインストールを防止します。

```json
"replace": {
    "npm-asset/bootstrap": ">=5.1"
},
```


## CDN を使う

[公式 CDN](https://www.bootstrapcdn.com) から Bootstrap アセットを使うことが出来ます。.

あなたのプロジェクトの `package.json` に次の行を追加して、Bootstrap アセットの冗長なインストールを防止します。

```json
"replace": {
    "npm-asset/bootstrap": ">=5.1"
},
```

'assetManager' アプリケーション・コンポーネントを構成して、Bootstrap アセット・バンドルを CDN のリンクでオーバーライドします。

```php
return [
    'components' => [
        'assetManager' => [
            // CDN を使うようにバンドルをオーバーライド 
            'bundles' => [
                'yii\bootstrap5\BootstrapAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.1/dist/',
                    'css' => [
                        'css/bootstrap.min.css'
                    ],
                ],
                'yii\bootstrap5\BootstrapPluginAsset' => [
                    'sourcePath' => null,
                    'baseUrl' => 'https://cdn.jsdelivr.net/npm/bootstrap@5.1/dist/',
                    'js' => [
                        'js/bootstrap.bundle.min.js'
                    ],
                ],
            ],
        ],
        // ...
    ],
    // ...
];
```


## .sass ファイルからコンパイルする

Bootstrap CSS ソースを直接にカスタマイズしたい場合、ソースの *.sass ファイルから CSS をコンパイルしたいと思うことがあるでしょう。

そのような場合は、Bootstrap アセットを Composer や Bower/NPM からインストールしても意味がありません。
なぜなら、`vendor` ディレクトリ内のファイルは変更できないからです。
Bootstrap アセットを手作業でダウンロードし、プロジェクト・ソース・コード内のどこか、
例えば `assets/source/bootstrap` フォルダに置かなければなりません。

あなたのプロジェクトの `package.json` に次の行を追加して、Bootstrap アセットの冗長なインストールを防止します。

```json
"replace": {
    "npm-asset/bootstrap": ">=5.1"
},
```

'assetManager' アプリケーション・コンポーネントを構成して、Bootstrap アセット・バンドルをオーバーライドします。

```php
return [
    'components' => [
        'assetManager' => [
            // バンドルをオーバーライドし、ローカル・プロジェクト・ファイルを使う
            'bundles' => [
                'yii\bootstrap5\BootstrapAsset' => [
                    'sourcePath' => '@app/assets/source/bootstrap/dist',
                    'css' => [
                        YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
                    ],
                ],
                'yii\bootstrap5\BootstrapPluginAsset' => [
                    'sourcePath' => '@app/assets/source/bootstrap/dist',
                    'js' => [
                        YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                    ]
                ],
            ],
        ],
        // ...
    ],
    // ...
];
```

Bootsrap のソース・ファイルを変更した後は、例えば `npm run dist` を使って、必ず[コンパイル](https://getbootstrap.com/docs/5.1/getting-started/contribute/#using-npm-scripts)して下さい。
