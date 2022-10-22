<?php
declare(strict_types=1);

namespace App\Model\Admin;

use App\Model\AdminBaseModelInterface;

/**
 * 文章类目
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleCategory extends \App\Model\ArticleCategory implements AdminBaseModelInterface
{
    /**
     * 获取所有的分类
     * @return array
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function getList(): array
    {
        $item      = self::query()->where([["status", "=", 1]])->get(["uuid", "title"]);
        $itemArray = [];
        foreach ($item as $value) {
            $itemArray[$value->uuid] = $value->title;
        }

        return $itemArray;
    }
}
