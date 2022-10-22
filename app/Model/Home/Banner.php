<?php
declare(strict_types=1);

namespace App\Model\Home;

/**
 * 轮播图
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class Banner extends \App\Model\Banner
{
    /**
     * 轮播图列表
     * @param int $perSize 查询条数
     * @param string $code 显示位置code
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(int $perSize = 10, string $code = ""): array
    {
        $items = self::query()
            ->where([["status", "=", 1]])
            ->where(function ($query) use ($code) {
                if (!empty($code)) {
                    $query->where("code", "=", $code);
                }
            })->orderByDesc("sort")
            ->limit($perSize)
            ->get(["title", "domain", "url", "cover"]);

        return $items->toArray();
    }
}
