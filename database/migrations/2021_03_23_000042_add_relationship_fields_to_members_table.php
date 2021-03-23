<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMembersTable extends Migration
{
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedBigInteger('member_role_id');
            $table->foreign('member_role_id', 'member_role_fk_2879030')->references('id')->on('roles');
            $table->unsignedBigInteger('membership_category_id');
            $table->foreign('membership_category_id', 'membership_category_fk_2881455')->references('id')->on('membership_categories');
            $table->unsignedBigInteger('member_username_id')->nullable();
            $table->foreign('member_username_id', 'member_username_fk_2881473')->references('id')->on('users');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2881476')->references('id')->on('users');
            $table->unsignedBigInteger('mem_status_id');
            $table->foreign('mem_status_id', 'mem_status_fk_2881726')->references('id')->on('membership_statuses');
        });
    }
}
