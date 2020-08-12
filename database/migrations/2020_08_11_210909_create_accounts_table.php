<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->char('account_number', 20);
            $table->decimal('credit_line', 8, 2);
            $table->decimal('available_credit', 8, 2)->nullable();
            $table->decimal('interests', 8, 2)->nullable();
            $table->unsignedBigInteger('type_id');
            $table->date('expires');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('lu_accounts_types');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
