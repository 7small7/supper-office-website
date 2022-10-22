<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\Banner;

/**
 * 轮播图
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class BannerService
{
    /**
     * 轮播图列表
     * @param int $perSize 查询条数
     * @param string $code 显示位置
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(int $perSize = 10, string $code = ""): array
    {
        $bannerModel = new Banner();
        return $bannerModel->getList($perSize, $code);
    }
}
