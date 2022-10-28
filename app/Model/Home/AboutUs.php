<?php
declare(strict_types=1);

namespace App\Model\Home;

use App\Model\AdminBaseModelInterface;

/**
 * 关于我们
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class AboutUs extends \App\Model\AboutUs
{
    /**
     * 关于我们
     * @return array
     * @link   https://www.yuque.com/okwvip
     * @author kert
     */
    public function getDetail(): array
    {
        $bean = self::query()
            ->where([["status", "=", 1]])
            ->orderByDesc("id")
            ->first(["title", "author", "content", "publish_date", "is_share", "share_text", "seo_title", "seo_keywords", "seo_description"]);
        if (!empty($bean)) {
            return $bean->toArray();
        }
        return [];
    }
}
