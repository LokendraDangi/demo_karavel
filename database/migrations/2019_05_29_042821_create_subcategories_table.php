<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->integer('rank');
            $table->string('slug');
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger( 'updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('created_by')
                ->references('id')->on('users')
                ->onUpdate('cascade');
            $table->foreign('updated_by')
                ->references('id')->on('users')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategories');
    }
}
