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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->unique();
            $table->bigInteger('NIF')->unique();
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->string('name',20);
            $table->string('surname',20);
            $table->string('email',50)->unique();
            $table->string('IBAN',50)->unique();
            $table->string('phoneNumber',20);
            $table->string('address',50);
            $table->string('postalCode',20);
            $table->string('locality',40);
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('roleID')->unsigned()->default('2');
            $table->string('src',500)->default('/storage/images/Defaul_User_Image.png');
            $table->foreign('roleID')->references('id')->on('roles');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
