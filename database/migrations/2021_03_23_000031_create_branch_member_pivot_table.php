<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchMemberPivotTable extends Migration
{
    public function up()
    {
        Schema::create('branch_member', function (Blueprint $table) {
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id', 'member_id_fk_2881454')->references('id')->on('members')->onDelete('cascade');
            $table->unsignedBigInteger('branch_id');
            $table->foreign('branch_id', 'branch_id_fk_2881454')->references('id')->on('branches')->onDelete('cascade');
        });
    }
}
