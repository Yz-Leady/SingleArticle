<?php

namespace Leady\SingleArticle;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * 部署时加载
     * @Author:<Leady>
     * @Date:2020-11-20T12:30:20+0800
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/config.php' => config_path('single-article.php')], 'single-article');
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
        }
        Route::group([
            'prefix'     => config('admin.route.prefix'),
            'namespace'  => 'Leady\SingleArticle\Controllers',
            'middleware' => config('admin.route.middleware'),
        ], function (Router $router) {
            $router->resource(config('single-article.route_resource'), 'SingleArticleController');
        });
    }

    /**
     * 部署时加载
     * @Author:<Leady>
     * @Date:2020-11-20T12:30:20+0800
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'single-article');
    }
}