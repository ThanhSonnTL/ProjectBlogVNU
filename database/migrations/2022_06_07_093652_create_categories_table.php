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
            $table->Boolean('category_check')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        //Insert Data
        $Category = new Category;
        $Category->category_title = "Giới thiệu";
        $Category->category_parent = "0";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Đào tạo";
        $Category->category_parent = "0";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Nghiên cứu";
        $Category->category_parent = "0";
        $Category->save();
        
        $Category = new Category;
        $Category->category_title = "Hợp tác";
        $Category->category_parent = "0";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Tin tức";
        $Category->category_parent = "0";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Người học";
        $Category->category_parent = "0";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Quá trình phát triển";
        $Category->category_parent = "1";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Tầm nhìn và sứ mệnh";
        $Category->category_parent = "1";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Ban chủ nhiệm Khoa";
        $Category->category_parent = "1";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Các bộ môn và phòng thí nghiệm";
        $Category->category_parent = "1";
        $Category->category_check = true;
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Giảng viên";
        $Category->category_parent = "1";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Liên hệ";
        $Category->category_parent = "1";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Đại học";
        $Category->category_parent = "2";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Sau đại học";
        $Category->category_parent = "2";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Các hướng nghiên cứu";
        $Category->category_parent = "3";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Đề tài dự án";
        $Category->category_parent = "3";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Các sản phẩm công nghệ";
        $Category->category_parent = "3";
        $Category->save();

        
        $Category = new Category;
        $Category->category_title = "Chuyên san CNTT";
        $Category->category_parent = "3";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Đối tác khối hàn lâm";
        $Category->category_parent = "3";
        $Category->save();
        
        $Category = new Category;
        $Category->category_title = "Trung tâm NCUD & HTDN";
        $Category->category_parent = "4";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Đối tác khối công nghệ";
        $Category->category_parent = "4";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Thành tích nổi bật";
        $Category->category_parent = "6";
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Thông tin việc làm";
        $Category->category_parent = "6";
        $Category->category_check = true;
        $Category->save();

        $Category = new Category;
        $Category->category_title = "Các câu hỏi thường gặp";
        $Category->category_parent = "6";
        $Category->save();

        


    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
