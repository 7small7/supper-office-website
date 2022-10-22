<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\SiteLinkCategory;

/**
 * 站外链接分类
 * @site https://www.yuque.com/okwvip
 * @author kert
 */
class SiteLinkCategoryService
{
    /**
     * 站外链接分类列表
     * @site https://www.yuque.com/okwvip
     * @return array
     * @author kert
     */
    public function getList(): array
    {
        $linkCategoryModel = new SiteLinkCategory();
        return $linkCategoryModel->getList();
    }
}
