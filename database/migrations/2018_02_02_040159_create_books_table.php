<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $table = config('admin.extensions.books.table', 'admin_books');

        Schema::connection($connection)->create($table, function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 20);
            $table->date('begin')->nullable();
            $table->date('end')->nullable();
            $table->string('title');
            $table->string('url');
            $table->text('memo');
            $table->timestamp('sync_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('admin.database.connection') ?: config('database.default');

        $table = config('admin.extensions.books.table', 'admin_books');

        Schema::connection($connection)->dropIfExists($table);
    }
}
