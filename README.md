# SingleArticle
>基于Laravel-Admin后端，单文章管理。
## 1.安装
```shell script
$ composer require yz-leady/single-article
```
## 2.初始化
```shell script
php artisan vendor:publish --provider="Leady\SingleArticle\ServiceProvider"

php artisan migrate
```
## 3.前端获取内容
```php
use LeadySingleArticle;
LeadySingleArticle::getResources($key='单页内容键值');
```
###### 返回内容
```php
\Leady\SingleArticle\Resources\SingleArticleResources;
```
```json
{
    "title":"单页标题",
    "key":"单页键值",
    "content":"单页内容"
}
```