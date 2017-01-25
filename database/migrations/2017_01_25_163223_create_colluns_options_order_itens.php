<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollunsOptionsOrderItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_itens', function (Blueprint $table) {
            $table->integer('fornecedor_id')->unsigned()->nullable()->after('itens_id');
            $table->enum('program', ['unique', 'weekly', 'biweekly', 'monthly'])->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_itens', function (Blueprint $table) {
            $table->dropColumn('fornecedor_id');
            $table->dropColumn('program');
        });
    }
}
