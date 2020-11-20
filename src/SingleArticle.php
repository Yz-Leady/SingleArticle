<?php

namespace Leady\SingleArticle;

use Leady\SingleArticle\Models\SingleArticle as SingleArticleModel;
use Leady\SingleArticle\Resources\SingleArticleResources;
use Illuminate\Support\Facades\Cache;

class SingleArticle
{

    /**
     * 根据键值获取单页内容
     * @param $key
     * @return string
     */
    public function getResources($key)
    {
        if (!$key) {
            return '';
        }
        if (config('single-article.open_cache')) {
            $cache_name = config('single-article.single_article_') . $key;
            if (Cache::has($cache_name)) {
                return Cache::get($cache_name);
            }
            $single = SingleArticleModel::where('key', $key)->first();
            if (!$single) {
                return '';
            }
            $single->setCache();
        }

        $single = SingleArticleModel::where('key', $key)->first();
        if ($single) {
            return new SingleArticleResources($single);
        } else {
            return '';
        }
    }

}