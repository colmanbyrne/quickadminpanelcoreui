<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_number')->nullable();
            $table->string('name')->nullable();
            $table->longText('notes')->nullable();
            $table->string('asset_year')->nullable();
            $table->date('date_purchased')->nullable();
            $table->decimal('cost', 15, 2)->nullable();
            $table->decimal('value', 15, 2)->nullable();
            $table->date('date_value')->nullable();
            $table->date('rep_value_date')->nullable();
            $table->decimal('rep_value', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
