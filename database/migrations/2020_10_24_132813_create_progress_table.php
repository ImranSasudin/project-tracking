<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->unsignedBigInteger('checlist_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->primary(['checlist_id', 'project_id']);
            $table->foreign('checlist_id')->references('id')->on('checklists')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progress');
    }
}
