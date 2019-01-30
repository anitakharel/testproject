<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
			$table->longText('content');
			$table->string('highlights')->nullable();
			$table->string('author')->nullable();
			$table->string('image_name')->nullable();
			$table->date('publish_date')->nullable();
			$table->string('category_id');
			$table->mediumText('category_name');
			$table->enum('active', ['Y', 'N']);
			$table->date('created_at');
			$table->date('updated_at')->nullable();
			$table->date('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
