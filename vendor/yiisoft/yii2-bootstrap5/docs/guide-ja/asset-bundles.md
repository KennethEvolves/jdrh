アセット・バンドル
==================

Bootstrap は、CSS、JavaScript、フォントなどを含む複雑なフロントエンド・ソリューションです。
Bootstrap コンポーネントに対する最大限の柔軟な制御を可能にするために、このエクステンションは複数のアセット・バンドルを提供しています。
すなわち、

- [[yii\bootstrap5\BootstrapAsset|BootstrapAsset]] - メインの CSS ファイルのみを含みます。
- [[yii\bootstrap5\BootstrapPluginAsset|BootstrapPluginAsset]] - [[yii\bootstrap5\BootstrapAsset]] に依存し、javascript ファイルを含みます。

個々のアプリケーションは、その要求に応じて、異なるバンドル (またはバンドルの組み合わせ) を必要とするでしょう。
CSS のスタイルだけが必要なのであれば、[[yii\bootstrap5\BootstrapAsset]] だけで十分です。
しかし、Bootstrap の JavaScript を必要とする場合は、[[yii\bootstrap5\BootstrapPluginAsset]]
をも登録しなければなりません。

> Tip: ほとんどのウィジェットは [[yii\bootstrap5\BootstrapPluginAsset]] を自動的に登録します。
