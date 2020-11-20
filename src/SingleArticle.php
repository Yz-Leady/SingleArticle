<?php

namespace Leady\SingleArticle;

use Leady\SingleArticle\Models\SingleArticle as SingleArticleModel;
use Leady\SingleArticle\Resources\SingleArticleResources;

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
        $single=SingleArticleModel::where('key',$key)->first();
        return new SingleArticleResources($single);
    }

}