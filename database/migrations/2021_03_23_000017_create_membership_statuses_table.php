<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('membership_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('statusname');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
