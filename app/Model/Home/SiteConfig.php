<?php
declare(strict_types=1);

namespace App\Model\Home;

/**
 * 站点配置
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteConfig extends \App\Model\SiteConfig
{
    /**
     * 获取seo配置信息
     * @return mixed
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function getList(array $searchWhere): array
    {
        $items = self::query()->where("status", "=", 1)->where($searchWhere)->get(["val"]);
        if (!empty($items)) {
            return $items->toArray();
        }
        return [];
    }
}
