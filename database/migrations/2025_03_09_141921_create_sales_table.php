<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_id')
                ->unique();
            $table->unsignedBigInteger('nm_id');
            $table->unsignedBigInteger('income_id');
            $table->foreign('income_id')
                ->references('income_id')
                ->on('incomes');
            $table->decimal('discount_percent', 5, 2);
            $table->decimal('price_with_disc', 10, 2);
            $table->decimal('for_pay', 10, 2);
            $table->decimal('finished_price', 10, 2);
            $table->string('warehouse_name');
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->decimal('spp', 5, 2)
                ->nullable();
            $table->decimal('promo_code_discount', 10, 2)
                ->nullable();
            $table->boolean('is_storno')
                ->nullable();
            $table->dateTime('date');
            $table->dateTime('last_change_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
