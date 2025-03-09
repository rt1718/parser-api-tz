<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('g_number');
            $table->dateTime('date');
            $table->dateTime('last_change_date');
            $table->string('supplier_article', 255);
            $table->string('tech_size');
            $table->bigInteger('barcode');
            $table->decimal('total_price', 10, 2);
            $table->decimal('discount_percent', 5, 2);
            $table->string('warehouse_name', 255);
            $table->string('oblast', 255);
            $table->foreignId('income_id')
                ->constrained('incomes', 'income_id');
            $table->bigInteger('odid');
            $table->foreignId('nm_id')
                ->constrained('products', 'nm_id');
            $table->string('subject', 255);
            $table->string('category', 255);
            $table->string('brand', 255);
            $table->boolean('is_cancel');
            $table->dateTime('cancel_dt')
                ->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
