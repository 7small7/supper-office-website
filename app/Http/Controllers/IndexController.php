<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Service\ArticleCategoryService;
use App\Http\Service\ArticleService;
use App\Http\Service\BannerService;
use App\Http\Service\SiteLinkCategoryService;
use App\Http\Service\SiteMenuService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * 首页
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class IndexController extends Controller
{
    /**
     * 站点首页
     * @return Application|Factory|View
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function index()
    {
        return view("index", [
            "banner"          => (new BannerService())->getList(),
            "menu"            => (new SiteMenuService())->getList(),
            "articleCategory" => (new ArticleCategoryService())->getList(),
            "link"            => (new SiteLinkCategoryService())->getList(),
            "newArticle"      => (new ArticleService())->getHomeList()["data"],
        ]);
    }
}
