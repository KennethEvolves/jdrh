Yii ウィジェット
================

複雑な bootstrap コンポーネントのほとんどは Yii ウィジェットでラップされて、より堅牢な構文を与えられ、フレームワークの諸機能と統合されています。
全てのウィジェットは `\yii\bootstrap5` 名前空間に属します。

- [[yii\bootstrap5\Accordion|Accordion]]
- [[yii\bootstrap5\ActiveField|ActiveField]]
- [[yii\bootstrap5\ActiveForm|ActiveForm]]
- [[yii\bootstrap5\Alert|Alert]]
- [[yii\bootstrap5\Breadcrumbs|Breadcrumbs]]
- [[yii\bootstrap5\Button|Button]]
- [[yii\bootstrap5\ButtonDropdown|ButtonDropdown]]
- [[yii\bootstrap5\ButtonGroup|ButtonGroup]]
- [[yii\bootstrap5\ButtonToolbar|ButtonToolbar]]
- [[yii\bootstrap5\Carousel|Carousel]]
- [[yii\bootstrap5\Dropdown|Dropdown]]
- [[yii\bootstrap5\LinkPager|LinkPager]]
- [[yii\bootstrap5\Modal|Modal]]
- [[yii\bootstrap5\Nav|Nav]]
- [[yii\bootstrap5\NavBar|NavBar]]
- [[yii\bootstrap5\Offcanvas|Offcanvas]]
- [[yii\bootstrap5\Popover|Popover]]
- [[yii\bootstrap5\Progress|Progress]]
- [[yii\bootstrap5\Tabs|Tabs]]
- [[yii\bootstrap5\Toast|Toast]]
- [[yii\bootstrap5\ToggleButtonGroup|ToggleButtonGroup]]


## ウィジェットの CSS クラスをカスタマイズする <span id="customizing-css-classes"></span>

これらのウィジェットを使うと、bootstrap CSS クラスの使用を要求する bootstrap コンポーネントのための HTML を素速く構成することが出来ます。特定のコンポーネントのデフォルトの CSS クラスはウィジェットによって自動的に追加されます。
そして、あなたがカスタマイズしたいであろうオプションの CSS クラスは、通常は、ウィジェットのプロパティによってサポートされています。

例えば、[[yii\bootstrap5\Button::options]] を使って、ボタンの外見をカスタマイズすることが出来ます。
このとき、ボタンに要求される 'btn' クラスは自動的に追加されますので、あなたが心配をする必要はありません。
特定のボタン・クラスを指定するだけで十分です。

```php
echo Button::widget([
    'label' => 'Action',
    'options' => ['class' => 'btn-primary'], // "btn btn-primary" というクラスを生成
]);
```

しかしながら、時として、デフォルトのクラスを別のクラスで置き換える必要がある場合があります。
例えば、[[yii\bootstrap5\ButtonGroup]] は、コンテナの div に 'btn-group' をデフォルトで使用しますが、
ボタンを垂直に並べるために 'btn-group-vertical' を代りに使いたいことがあるでしょう。
単純に 'class' オプションを使うと、'btn-group-vertical' が 'btn-group' に追加されるだけで、正しくない結果が生成されることになります。
ウィジェットのデフォルトのクラスをオーバーライドするためには、'class' オプションに配列形式を使用して、'widget' キーの下にカスタマイズしたクラスの定義を指定しなければなりません。

```php
echo ButtonGroup::widget([
    'options' => [
        'class' => ['widget' => 'btn-group-vertical'] // 'btn-group' を 'btn-group-vertical' で置き換え
    ],
    'buttons' => [
        ['label' => 'A'],
        ['label' => 'B'],
    ]
]);
```

## Navbar ウィジェット <span id="navbar-widget"></span>

Navbar ウィジェットには独特の癖があります。あなたは Navbar が折り畳まれるブレークポイントと
Navbar の全体的なスタイル (カラー・スキーム) を指定しなければなりません。

カラー・スキームと折り畳みのブレークポイントは CSS のクラスで変更することが出来ます。指定されない場合は、カラー・スキームは `navbar-light bg-light`、
ブレークポイントは`navbar-expand-lg` がデフォルトとして採用されます。詳細な情報は、[Bootstrap documentation](https://getbootstrap.com/docs/5.1/components/navbar/) を参照して下さい。

```php
Navbar::begin([
    'options' => [
        'class' => ['navbar-dark', 'bg-dark', 'navbar-expand-md']
    ]
]);
    [...]
Navbar::end();
``` 

モバイル向けナビゲーションでブランド (アイコン) とトグル・ボタンの位置を入れ替えたい場合は、次のようにすることが出来ます。

```php
Navbar::begin([
	'brandOptions' => [
		'class' => ['order-1']
	],
	'togglerOptions' => [
		'class' => ['order-0']
	]
]);
    [...]
Navbar::end();
```
