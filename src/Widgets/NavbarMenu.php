<?php

namespace Encore\Admin\Message\Widgets;

use Encore\Admin\Message\MessageModel;
use Illuminate\Contracts\Support\Renderable;

class NavbarMenu implements Renderable
{
    public function switchBooks($limit = 5)
    {
        $current_book_flag = config('admin.book_flag')?:'';

        return BookModel::whereNotIn('code', [$current_book_flag])->query()->orderBy('id', 'desc')->take($limit)->get();
    }

    public function render()
    {
        $books = $this->switchBooks();

        return view('laravel-admin-book::navbar-menu', compact('books'))->render();
    }
}
