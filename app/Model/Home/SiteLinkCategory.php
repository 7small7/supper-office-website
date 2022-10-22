<?php
declare(strict_types=1);

namespace App\Model\Home;

/**
 * 站点外链分类
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteLinkCategory extends \App\Model\SiteLinkCategory
{
    protected $appends = [
        "children"
    ];

    /**
     * 获取分类下的信息
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getChildrenAttribute(): array
    {
        return SiteLink::query()
            ->where([["category_id", "=", $this->getAttribute("id")], ["status", "=", 1]])
            ->orderByDesc("sort")
            ->get()
            ->toArray();
    }

    /**
     * 获取站外链接分类列表
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(): array
    {
        return self::query()
            ->where([["status", "=", 1]])
            ->orderByDesc("sort")
            ->get(["id", "title", "url"])
            ->toArray();
    }
}
