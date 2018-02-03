<?php

namespace Encore\Admin\Book;

use Encore\Admin\Auth\Database\Administrator;
use Encore\Admin\Facades\Admin;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    /**
     * Settings constructor.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('admin.database.connection') ?: config('database.default'));

        $this->setTable(config('admin.extensions.books.table', 'admin_books'));
    }


    public static function boot()
    {
        parent::boot();
    }
}
