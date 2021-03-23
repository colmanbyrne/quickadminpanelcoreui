<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRallyUsersTable extends Migration
{
    public function up()
    {
        Schema::create('rally_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('entry_type');
            $table->string('entry_status');
            $table->date('entry_date');
            $table->date('entry_paid')->nullable();
            $table->decimal('fee_due', 15, 2);
            $table->decimal('fee_paid', 15, 2)->nullable();
            $table->string('fee_currency');
            $table->longText('entry_notes')->nullable();
            $table->longText('entry_comment')->nullable();
            $table->integer('num_adults')->nullable();
            $table->integer('num_child_18')->nullable();
            $table->integer('num_child_12')->nullable();
            $table->integer('opt_dinner_adult')->nullable();
            $table->integer('opt_dinner_teen')->nullable();
            $table->integer('opt_dinner_child')->nullable();
            $table->string('vessel_name');
            $table->float('vessel_length', 5, 2);
            $table->float('vessel_draft', 4, 2)->nullable();
            $table->float('vessel_air_draft', 4, 2)->nullable();
            $table->float('vcruise_normal', 5, 2)->nullable();
            $table->float('vcruise_max', 5, 2)->nullable();
            $table->string('own_vessel')->nullable();
            $table->integer('boat_number')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
