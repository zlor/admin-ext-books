<?php

namespace Encore\Admin\Book\Widgets;

use Encore\Admin\Book\BookModel;
use Illuminate\Contracts\Support\Renderable;

class NavbarMenu implements Renderable
{
    public function switchBooks($limit = 5)
    {
        $current_book_flag = config('admin.book_flag')?:'';

        return BookModel::query()->whereNotIn('code', [$current_book_flag])->orderBy('id', 'desc')->take($limit)->get();
    }

    public function render()
    {
        $books = $this->switchBooks();

        return view('laravel-admin-book::navbar-menu', compact('books'))->render();
    }
}
