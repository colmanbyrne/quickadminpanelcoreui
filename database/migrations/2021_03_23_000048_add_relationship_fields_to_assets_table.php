<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetsTable extends Migration
{
    public function up()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_2878640')->references('id')->on('asset_categories');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_2878644')->references('id')->on('asset_statuses');
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id', 'location_fk_2878645')->references('id')->on('asset_locations');
            $table->unsignedBigInteger('assigned_to_id')->nullable();
            $table->foreign('assigned_to_id', 'assigned_to_fk_2878647')->references('id')->on('users');
            $table->unsignedBigInteger('asset_branch_id')->nullable();
            $table->foreign('asset_branch_id', 'asset_branch_fk_2882335')->references('id')->on('branches');
            $table->unsignedBigInteger('asset_type_id')->nullable();
            $table->foreign('asset_type_id', 'asset_type_fk_2882336')->references('id')->on('asset_types');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_2883682')->references('id')->on('users');
        });
    }
}
