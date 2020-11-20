<?php

namespace Leady\SingleArticle\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Leady\SingleArticle\Resources\SingleArticleResources;

class SingleArticle extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($model) {
            if (config('single-article.open_cache')) {
                $model->setCache();
            } else {
                $model->clearCache();
            }
        });

        self::updated(function ($model) {
            if (config('single-article.open_cache')) {
                $model->setCache();
            } else {
                $model->clearCache();
            }
        });
    }

    public function clearCache()
    {
        $cache_name = config('single-article.single_article_') . $this->key;
        if (Cache::has($cache_name)) {
            Cache::forget($cache_name);
        }
    }

    public function setCache()
    {
        $cache_name = config('single-article.single_article_') . $this->key;
        $data       = new SingleArticleResources($this);
        Cache::put($cache_name, $data);
    }

}