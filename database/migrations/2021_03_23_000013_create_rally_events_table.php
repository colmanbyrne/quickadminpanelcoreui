<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRallyEventsTable extends Migration
{
    public function up()
    {
        Schema::create('rally_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_name');
            $table->string('event_organiser');
            $table->string('event_type');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('event_status');
            $table->integer('max_entries')->nullable();
            $table->date('date_early_fee')->nullable();
            $table->string('fee_currency');
            $table->decimal('fee_normal', 15, 2);
            $table->decimal('fee_early', 15, 2)->nullable();
            $table->decimal('fee_open', 15, 2)->nullable();
            $table->decimal('fee_solo', 15, 2)->nullable();
            $table->decimal('fee_new_member', 15, 2)->nullable();
            $table->decimal('fee_dinner_adult', 15, 2)->nullable();
            $table->decimal('fee_adult_teen', 15, 2)->nullable();
            $table->decimal('fee_dinner_child', 15, 2)->nullable();
            $table->string('mem_only');
            $table->string('email_from_name');
            $table->string('email_from');
            $table->string('email_copy')->nullable();
            $table->longText('event_comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
