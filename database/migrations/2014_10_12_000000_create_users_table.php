<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cellphone');
            $table->string('avatar');
			
            $table->integer('status')->default(1);
			//	1 ==> user is active 	
			//	2 ==> user is ban
			//	3 ==> user is removed 
			//  &...
			

		    $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
			
			// ba chi login shode ==> provider_name
            $table->string('provider_name');
			
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
}
