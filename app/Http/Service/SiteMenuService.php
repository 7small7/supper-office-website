<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\ArticleCategory;
use App\Model\Home\SiteMenu;

/**
 * 站点菜单
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteMenuService
{
    /**
     * 站点菜单列表
     * @param int $perSize 查询条数
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(int $perSize = 10): array
    {
        $bannerModel = new SiteMenu();
        return $bannerModel->getList($perSize);
    }
}
