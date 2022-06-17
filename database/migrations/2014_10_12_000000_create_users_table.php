<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('role');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        $user = new User;
        $user->name = 'Đỗ Sơn';
        $user->password = Hash::make('123');
        $user->email = 'Sonnvc2001@gmail.com';
        $user->role = 1;
        $user->save();
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
};
