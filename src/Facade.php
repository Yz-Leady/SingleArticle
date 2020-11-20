<?php

namespace Leady\SingleArticle;
use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    protected static function getFacadeAccessor()
    {
        return \Leady\SingleArticle\SingleArticle::class;
    }
}