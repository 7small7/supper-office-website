<?php
/**
 * 路由配置
 * @author kert
 * @site https://www.yuque.com/okwvip
 */

use Illuminate\Support\Facades\Route;

Route::get("/", "IndexController@index");

Route::group(["prefix" => "article"], function () {
    Route::get("detail/{id}", "ArticleController@detail");
    Route::get("list/{id?}", "ArticleController@list");
});

Route::get("us", "AboutUsController@detail");
