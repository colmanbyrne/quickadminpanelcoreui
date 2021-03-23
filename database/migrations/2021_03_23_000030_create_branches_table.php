<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shortname')->unique();
            $table->string('longname')->unique();
            $table->string('branch_country');
            $table->string('branch_currency');
            $table->integer('branch_no');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
