<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('income_id')
                ->index();
            $table->bigInteger('nm_id')
                ->nullable();
            $table->string('number', 50)
                ->nullable();
            $table->dateTime('date')
                ->nullable();
            $table->dateTime('last_change_date')
                ->nullable();
            $table->string('supplier_article', 255)
                ->nullable();
            $table->string('tech_size', 50)
                ->nullable();
            $table->string('barcode', 20)
                ->nullable();
            $table->integer('quantity')
                ->nullable();
            $table->decimal('total_price', 10, 2)
                ->nullable();
            $table->dateTime('date_close')
                ->nullable();
            $table->string('warehouse_name', 255)
                ->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
