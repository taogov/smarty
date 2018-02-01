Laravel 5.5 + Fis3 静态资源管理系统
======


## 安装

```
composer require taogov/smarty
```

## 配置
* 在 `config/app.php` 文件中配置：
```php
    'providers' => array(
        // ...
        taogov\Smarty\SmartyServiceProvider::class,
    )
```
* 执行发布配置文件：`php artisan vendor:publish --provider="taogov\Smarty\SmartyServiceProvider" --tag=config --tag=plugins`


## 使用
* 加入providers：
* 假设有模板文件`views/blog/post.tpl`，那controller中是这样渲染的，`View::make('blog.post')`
* 关于 `{include}` 或 `{extends}` 标签的参数传递, 需要使用全路径的写法, 例如： `{extends file="blog/post.tpl"}`


## 配置项解释
* 模板放置路径：`template_path`
* 模板缓存路径：`cache_path`
* 模板编译路径：`compile_path`
* fis3 产出的namespace-map.json 放置路径：`configs_paths`