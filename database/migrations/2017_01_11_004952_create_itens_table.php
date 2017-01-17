<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('products_categories');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->enum('goodto', ['venda', 'processamento']);
            $table->enum('type', ['industrializados', 'naturais']);
            $table->string('weight')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('min_price', 10,2)->nullable();
            $table->decimal('max_price', 10,2)->nullable();
            $table->enum('status', ['disponivel', 'breve'])->nullable();
            $table->date('available_date');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens');
    }
}
