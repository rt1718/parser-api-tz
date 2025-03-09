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
            $table->dateTime('last_change_date');
            $table->string('supplier_article', 255);
            $table->string('tech_size', 50);
            $table->bigInteger('barcode');
            $table->integer('quantity');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->integer('quantity_full');
            $table->string('warehouse_name', 255);
            $table->integer('in_way_to_client');
            $table->integer('in_way_from_client');
            $table->foreignId('nm_id')
                ->constrained('products', 'nm_id');
            $table->string('subject', 255);
            $table->string('category', 255);
            $table->string('brand', 255);
            $table->bigInteger('sc_code');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 5, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
