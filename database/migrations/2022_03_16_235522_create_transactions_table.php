<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transactions', function (Blueprint $table) {
        $table->bigIncrements('id'); 
        $table->integer('sender_id');
        $table->integer('agent_id');
        $table->string('transaction_type');
        $table->decimal('amount');
        $table->string('status');
        $table->decimal('balance_before')->nullable();
        $table->decimal('balance_after')->nullable();
        $table->string('agent_name')->nullable();
        $table->string('bank_name')->nullable();
        $table->string('account_number')->nullable();
        $table->string('payment_reference')->nullable();
        $table->string('customer_payment_reference')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}

