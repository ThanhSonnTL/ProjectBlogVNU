<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  App\Models\Category;

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
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        //Insert Data
        $Category = new Category;
        $Category->category_title = "Giới thiệu";
        $Category->category_parent = "0";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Quá trình phát triển";
        $Category->category_parent = "1";
        $Category->save();
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
