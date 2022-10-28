<?php
declare(strict_types=1);

namespace App\Model\Admin;

use App\Model\AdminBaseModelInterface;

/**
 * 站点配置
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteConfig extends \App\Model\SiteConfig implements AdminBaseModelInterface
{
    /**
     * @param $query
     * @return mixed
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function scopeKey($query)
    {
        return $query->where("key", "=", "seo");
    }
}
