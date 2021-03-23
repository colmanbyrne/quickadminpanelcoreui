<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRallyUsersTable extends Migration
{
    public function up()
    {
        Schema::table('rally_users', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id', 'event_fk_2879255')->references('id')->on('rally_events');
            $table->unsignedBigInteger('rally_entry_name_id');
            $table->foreign('rally_entry_name_id', 'rally_entry_name_fk_2879256')->references('id')->on('users');
            $table->unsignedBigInteger('member_no_id');
            $table->foreign('member_no_id', 'member_no_fk_2879437')->references('id')->on('members');
        });
    }
}
