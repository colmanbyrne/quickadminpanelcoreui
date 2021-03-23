<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('member_no')->unique();
            $table->string('surname');
            $table->string('firstname');
            $table->string('prefix')->nullable();
            $table->string('partner')->nullable();
            $table->string('organisation_name')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('town');
            $table->string('county')->nullable();
            $table->string('post_code');
            $table->string('country');
            $table->string('tel_no')->nullable();
            $table->string('mob_no');
            $table->string('email_2')->nullable();
            $table->string('email_status');
            $table->string('sms_status');
            $table->string('mem_year');
            $table->string('mem_fee')->nullable();
            $table->string('mem_fee_currency')->nullable();
            $table->string('pay_method')->nullable();
            $table->date('date_joined')->nullable();
            $table->date('date_renewed')->nullable();
            $table->date('date_card_issued')->nullable();
            $table->date('date_dd_issued')->nullable();
            $table->string('date_cancelled')->nullable();
            $table->longText('mem_notes')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
