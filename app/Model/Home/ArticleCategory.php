<?php
declare(strict_types=1);

namespace App\Model\Home;

/**
 * 文章分类
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleCategory extends \App\Model\ArticleCategory
{
    /**
     * 文章分类列表
     * @param int $perSize 查询条数
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(int $perSize): array
    {
        $items = self::query()
            ->where([["status", "=", 1]])
            ->orderByDesc("sort")
            ->limit($perSize)
            ->get(["title", "uuid"]);

        return $items->toArray();
    }
}
