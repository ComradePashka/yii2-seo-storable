Yii2 framework SEO extension
============================
SEOkit is a set of tools that helps to construct SEO-friendly site. 

UrlHistoryBehavior handle any changes of chosen model attribute such as
URL for later use, e.g. redirection to actual URL fo model.

2do list
 - have to find way how to handle complex model Primary Key when create
 dynamic relation

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist comradepashka/yii2-seokit "dev-master"
```

or add

```
"comradepashka/yii2-seokit": "dev-master"
```

to the require section of your `composer.json` file.

Update database schema
----------------------

```
$ php yii migrate/up --migrationPath=@vendor/comradepashka/yii2-seokit/migrations
```


Configure
---------

Add behavior to a model
 
```
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            [
                'class' => UrlHistoryBehavior::className(),
                'url_attribute' => 'url' // default
            ]
        ]);
    }
```

Usage
-----

To list all previous urls:

```
    foreach ($model->UrlHistory as $item) {
        echo %item->old_url;
    };
```


In the [Front controller](https://en.wikipedia.org/wiki/Front_controller)
you can check if there was an old URL that should be redirected to actual
document:

```
    if ($url = $model->checkRedirect($someOldUrl))
        $this->redirect($url, 301);
```