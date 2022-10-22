<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Service\ArticleCategoryService;
use App\Http\Service\ArticleService;
use App\Http\Service\SiteLinkCategoryService;
use App\Http\Service\SiteMenuService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * 文章信息
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleController extends Controller
{
    /**
     * 文章列表
     * @site https://www.yuque.com/okwvip
     * @return Application|Factory|View
     * @author kert
     */
    public function list($id)
    {
        $items = (new ArticleService())->getArticleList((string)$id, (int)request()->query("p", 1));
        return view('article.list', [
            "items"           => $items,
            "menu"            => (new SiteMenuService())->getList(),
            "articleCategory" => (new ArticleCategoryService())->getList(),
            "link"            => (new SiteLinkCategoryService())->getList(),
        ]);
    }

    /**
     * 文章详情
     * @site https://www.yuque.com/okwvip
     * @return Application|Factory|View
     * @author kert
     */
    public function detail($id)
    {
        $detail = (new ArticleService())->getDetail((string)$id);
        return view("article.detail", [
            "menu"            => (new SiteMenuService())->getList(),
            "articleCategory" => (new ArticleCategoryService())->getList(),
            "link"            => (new SiteLinkCategoryService())->getList(),
            "detail"          => $detail["detail"],
            "pre"             => $detail["pre"],
            "next"            => $detail["next"],
        ]);
    }
}
