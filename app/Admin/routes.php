<?php

use App\Admin\Controllers\Article\AboutUsController;
use App\Admin\Controllers\Article\ArticleController;
use App\Admin\Controllers\Article\CategoryController;
use App\Admin\Controllers\Site\BannerController;
use App\Admin\Controllers\Site\LinkCategoryController;
use App\Admin\Controllers\Site\LinkController;
use App\Admin\Controllers\Site\SiteMenuController;
use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

Route::group([
    'prefix'     => config('admin.route.prefix'),
    'namespace'  => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as'         => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', "App\Admin\Controllers\Article\ArticleController@grid")->name('home');
    $router->resource("site_menu", SiteMenuController::class);
    $router->resource("site_link_category", LinkCategoryController::class);
    $router->resource("site_link", LinkController::class);
    $router->resource("article_list", ArticleController::class);
    $router->resource("article_category", CategoryController::class);
    $router->resource("banner", BannerController::class);
    $router->resource("about_us", AboutUsController::class);
});
