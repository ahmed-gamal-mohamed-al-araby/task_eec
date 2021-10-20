<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('address');
            $table->string('products');
            $table->foreignId('courier_id')
                ->constrained('couriers')
                ->onDelete('cascade');
            $table->enum('status', ['pending' , 'picked by courier' , 'out for delivery' , 'delivered']);
            $table->string('shipment_number')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
