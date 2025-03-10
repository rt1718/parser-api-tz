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
            $table->string('g_number')
                ->nullable();
            $table->dateTime('date')
                ->nullable();
            $table->dateTime('last_change_date')
                ->nullable();
            $table->string('supplier_article', 255)
                ->nullable();
            $table->string('tech_size')
                ->nullable();
            $table->string('barcode', 20)
                ->nullable();
            $table->decimal('total_price', 10, 2)
                ->nullable();
            $table->decimal('discount_percent', 6, 2)
                ->nullable();
            $table->string('warehouse_name', 255)
                ->nullable();
            $table->string('oblast', 255)
                ->nullable();
            $table->bigInteger('income_id')
                ->nullable();
            $table->bigInteger('nm_id')
                ->nullable();
            $table->string('subject', 255)
                ->nullable();
            $table->string('category', 255)
                ->nullable();
            $table->string('brand', 255)
                ->nullable();
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
