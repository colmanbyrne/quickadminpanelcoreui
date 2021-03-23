<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBranchesTable extends Migration
{
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->unsignedBigInteger('branch_secretary_id');
            $table->foreign('branch_secretary_id', 'branch_secretary_fk_2881456')->references('id')->on('users');
            $table->unsignedBigInteger('branch_treasurer_id');
            $table->foreign('branch_treasurer_id', 'branch_treasurer_fk_2881457')->references('id')->on('users');
            $table->unsignedBigInteger('branch_chair_id');
            $table->foreign('branch_chair_id', 'branch_chair_fk_2881458')->references('id')->on('users');
            $table->unsignedBigInteger('branch_rep_1_id')->nullable();
            $table->foreign('branch_rep_1_id', 'branch_rep_1_fk_2881459')->references('id')->on('users');
            $table->unsignedBigInteger('branch_rep_2_id')->nullable();
            $table->foreign('branch_rep_2_id', 'branch_rep_2_fk_2881460')->references('id')->on('users');
        });
    }
}
