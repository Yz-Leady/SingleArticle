<?php

namespace Leady\SingleArticle\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Leady\SingleArticle\Models\SingleArticle;

class SingleArticleController extends AdminController
{

    protected $title = '单页内容管理';

    protected function grid()
    {
        $grid = new Grid(new SingleArticle);
        $grid->column('id', '#ID#');
        $grid->column('title', '标题')->editable();
        $grid->column('key', '关键字');
        $grid->column('created_at', '创建时间');
        $grid->column('updated_at', '更新时间');
    }

    protected function form()
    {
        $form = new Form(new SingleArticle);
        $form->text('title', '标题')->required();
        if ($form->isCreating()) {
            $form->text('key', '关键字')->rules(['required', 'unique:single_articles,key']);
        } else {
            $form->display('key', '关键字');
        }
        $form->ueditor('content', '详情内容')->required();
    }

}