<?php
declare(strict_types=1);

namespace App\Model\Admin;

use App\Model\AdminBaseModelInterface;

/**
 * 站点菜单
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteLinkCategory extends \App\Model\SiteLinkCategory implements AdminBaseModelInterface
{
    /**
     * 获取所有的分类
     * @return array
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function getList(): array
    {
        $item      = self::query()->where([["status", "=", 1]])->get(["id", "title"]);
        $itemArray = [];
        foreach ($item as $value) {
            $itemArray[$value->id] = $value->title;
        }

        return $itemArray;
    }
}
