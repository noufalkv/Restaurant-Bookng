<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resto_id');
            $table->unsignedInteger('user_id');
            $table->float('amount', '8', 2);
            $table->boolean('isComplete')->default(0);
            $table->text('order_details');
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
            $table->index('resto_id');
            $table->index('isComplete');
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
}
