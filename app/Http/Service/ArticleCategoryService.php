<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\ArticleCategory;

/**
 * 文章分类
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleCategoryService
{
    /**
     * 文章分类列表
     * @param int $perSize 查询条数
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(int $perSize = 10): array
    {
        $bannerModel = new ArticleCategory();

        return $bannerModel->getList($perSize);
    }
}
