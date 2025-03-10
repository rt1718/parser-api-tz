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
            $table->bigInteger('nm_id')
                ->nullable();
            $table->bigInteger('income_id')
                ->nullable();
            $table->decimal('discount_percent', 6, 2)
                ->nullable();
            $table->decimal('price_with_disc', 10, 2)
                ->nullable();
            $table->decimal('for_pay', 10, 2)
                ->nullable();
            $table->decimal('finished_price', 10, 2)
                ->nullable();
            $table->string('warehouse_name')
                ->nullable();
            $table->string('country_name')
                ->nullable();
            $table->string('oblast_okrug_name')
                ->nullable();
            $table->string('region_name')
                ->nullable();
            $table->boolean('is_supply')
                ->default(0);
            $table->boolean('is_realization')
                ->default(0);
            $table->decimal('spp', 6, 2)
                ->nullable();
            $table->decimal('promo_code_discount', 10, 2)
                ->nullable();
            $table->boolean('is_storno')
                ->nullable();
            $table->dateTime('date')
                ->nullable();
            $table->dateTime('last_change_date')
                ->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
