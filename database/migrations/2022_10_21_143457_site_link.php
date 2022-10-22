<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SiteLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_link', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("title", 20)->comment("名称");
            $table->string("remark")->nullable()->comment("备注");
            $table->string("url", 255)->nullable()->comment("链接地址");
            $table->bigInteger("category_id", false, true)->nullable()->default(0)->comment("链接分类");
            $table->tinyInteger("status", false, true)->default(2)->comment("1显示2禁用");
            $table->integer("sort", false, true)->default(0)->comment("显示序号");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_link');
    }
}
