<?php
declare(strict_types=1);

namespace App\Model\Home;

/**
 * 站点菜单
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteMenu extends \App\Model\SiteMenu
{
    /**
     * 轮播图列表
     * @param int $perSize 查询条数
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(int $perSize): array
    {
        $items = self::query()->where([["status", "=", 1]])
            ->orderByDesc("sort")
            ->limit($perSize)
            ->get(["title", "url"]);

        return $items->toArray();
    }
}
