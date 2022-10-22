<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * 文章信息
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleService
{
    /**
     * 首页最新文章列表
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getHomeList(): array
    {
        $articleModel = new Article;
        return $articleModel->getList(["new" => 1]);
    }

    /**
     * 文章列表页
     * @param string $categoryId 分类id
     * @param int $pageIndex     当前页
     * @param int $pageSize      分页大小
     * @return LengthAwarePaginator
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getArticleList(string $categoryId, int $pageIndex = 1, int $pageSize = 15): LengthAwarePaginator
    {
        $articleModel = new Article();
        return $articleModel->getListByPage([["category_uuid", "=", $categoryId]], $pageIndex, $pageSize);
    }

    /**
     * 文章详情
     * @param string $id 文章id
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getDetail(string $id): array
    {
        $articleModel = new Article();
        $bean         = $articleModel->getDetail([["uuid", "=", $id]]);
        // 查询上一条和下一条
        $pre = $next = [];
        if (!empty($bean)) {
            $pre  = $articleModel->getDetail([["id", "<", $bean['id']]], ["uuid", "title"]);
            $next = $articleModel->getDetail([["id", ">", $bean['id']]], ["uuid", "title"]);
        }
        unset($bean["id"]);// 避免将文章id暴露于接口

        return [
            "detail" => $bean,
            "pre"    => $pre,
            "next"   => $next,
        ];
    }
}
