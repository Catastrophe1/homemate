<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_informations', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedTinyInteger('gender')->default(0); //0:unknown ; 1:female, 2:male
            $table->enum('province', ['上海', '北京', '重庆', '四川', '浙江', '安徽', 
                '湖南', '湖北', '黑龙江', '辽宁', '山东', '广西', '贵州', '山西', '河南', 
                '河北', '广东', '吉林', '云南', '西藏', '内蒙古', '青海', '新疆', '福建', 
                '江苏', '江西', '陕西', '天津', '甘肃', '海南', '香港', '澳门', '台湾', 'from...'])->default('from...');
            $table->string('phone_num');
            $table->string('wechat');
            $table->string('QQ');
            $table->string('birth_month');
            $table->unsignedInteger('birth_day');
            $table->unsignedInteger('birth_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user_informations');
    }
}
