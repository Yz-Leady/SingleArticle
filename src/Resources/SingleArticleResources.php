<?php

namespace Leady\SingleArticle\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SingleArticleResources extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title'   => $this->title,
            'key'     => $this->key,
            'content' => $this->content,
        ];
    }

}