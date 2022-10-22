<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("uuid", 32)->unique()->comment("数据唯一编号");
            $table->string("title", 50)->comment("标题");
            $table->string("description")->nullable()->comment("摘要");
            $table->longText("content")->comment("文章内容");
            $table->string("domain", 100)->comment("图片域名");
            $table->string("cover", 255)->comment("列表图片地址");
            $table->string("detail_cover", 255)->nullable()->comment("文章详情页封面图");
            $table->tinyInteger("status", false, true)->default(2)->comment("1显示2禁用");
            $table->integer("sort", false, true)->default(0)->comment("显示序号");
            $table->integer("views", false, true)->default(0)->comment("阅读数");
            $table->date("publish_date")->comment("发布日期");
            $table->string("url", 255)->nullable()->comment("跳转地址");
            $table->string("author", 32)->nullable()->comment("作者");
            $table->tinyInteger("is_share", false, true)->comment("是否允许转载1允许2禁止");
            $table->string("share_text", 255)->nullable()->comment("是否允许转载文本描述");
            $table->string("seo_title", 100)->nullable()->comment("seo标题");
            $table->string("seo_keywords", 100)->nullable()->comment("seo关键词");
            $table->string("seo_description", 100)->nullable()->comment("seo描述");
            $table->softDeletes();
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
        Schema::dropIfExists('article');
    }
}
