<?php

namespace Encore\Admin\Message;

use Carbon\Carbon;
use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;

class BookController
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {
            $content->header('Books');
            $content->description('Book list..');

            $content->body($this->grid());
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {
            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    public function grid()
    {
        return Admin::grid(BookModel::class, function (Grid $grid) {
            $grid->column('id');
            $grid->column('code');
            $grid->column('title');
            $grid->column('url');
        });
    }

    public function form()
    {
        return Admin::form(BookModel::class, function (Form $form) {

            $form->text('code')->rules('required')->default(request('code'));
            $form->text('title')->rules('required')->default(request('title'));
            $form->textarea('memo')->rules('required');

            $form->display('created_at');
        });
    }
}
