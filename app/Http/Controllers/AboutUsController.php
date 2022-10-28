<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Service\AboutUsService;
use App\Http\Service\ArticleCategoryService;
use App\Http\Service\SeoService;
use App\Http\Service\SiteLinkCategoryService;
use App\Http\Service\SiteMenuService;

/**
 * 关于我们
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class AboutUsController extends Controller
{
    public function detail()
    {
        return view("about.detail", [
            "menu"            => (new SiteMenuService())->getList(),
            "articleCategory" => (new ArticleCategoryService())->getList(),
            "link"            => (new SiteLinkCategoryService())->getList(),
            "detail"          => (new AboutUsService())->getDetail(),
            "seo"             => (new SeoService())->getList(),
        ]);
    }
}
