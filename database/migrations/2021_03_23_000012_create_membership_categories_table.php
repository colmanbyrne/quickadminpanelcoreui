<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('membership_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->decimal('mem_fee', 15, 2)->nullable();
            $table->decimal('fee_add', 15, 2)->nullable();
            $table->string('country_code')->nullable();
            $table->string('curr_symbol')->nullable();
            $table->string('category_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
