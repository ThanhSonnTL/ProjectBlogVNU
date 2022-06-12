<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('category_ID');
            $table->string('category_title');
            $table->Integer('category_parent')->default(0);
            $table->timestamps();
        });

    }
    
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
