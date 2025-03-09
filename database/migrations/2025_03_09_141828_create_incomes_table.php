<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->unsignedBigInteger('income_id')
                ->primary();
            $table->unsignedBigInteger('nm_id');
            $table->string('number', 50)
                ->nullable();
            $table->dateTime('date');
            $table->dateTime('last_change_date');
            $table->string('supplier_article', 255);
            $table->string('tech_size', 50);
            $table->bigInteger('barcode');
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->dateTime('date_close');
            $table->string('warehouse_name', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
