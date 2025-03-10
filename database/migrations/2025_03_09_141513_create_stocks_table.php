<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
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
            $table->boolean('is_supply')
                ->nullable();
            $table->boolean('is_realization')
                ->nullable();
            $table->integer('quantity_full')
                ->nullable();
            $table->string('warehouse_name', 255)
                ->nullable();
            $table->integer('in_way_to_client')
                ->nullable();
            $table->integer('in_way_from_client')
                ->nullable();
            $table->bigInteger('nm_id')
                ->nullable();
            $table->string('subject', 255)
                ->nullable();
            $table->string('category', 255)
                ->nullable();
            $table->string('brand', 255)
                ->nullable();
            $table->string('sc_code', 20)
                ->nullable();
            $table->decimal('price', 10, 2)
                ->nullable();
            $table->decimal('discount', 6, 2)
                ->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
