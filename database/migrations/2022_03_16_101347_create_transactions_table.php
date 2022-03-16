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
            $table->timestamps();
            $table->integer('agent_id');
            $table->string('transaction_type');
            $table->integer('amount');
            $table->integer('balance_before');
            $table->integer('balance_after');
            $table->string('agent_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('account_number')->nullable();


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

