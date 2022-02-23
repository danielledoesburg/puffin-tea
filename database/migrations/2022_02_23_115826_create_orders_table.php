<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ordernr');
            $table->foreignId('user_id')->constrained();
            $table->unsignedDecimal('shipping_costs');
            $table->decimal('total');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('delivery_address');
            $table->string('delivery_zipcode');
            $table->string('delivery_city');
            $table->string('invoice_address');
            $table->string('invoice_zipcode');
            $table->string('invoice_city');
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
        Schema::dropIfExists('orders');
    }
};
