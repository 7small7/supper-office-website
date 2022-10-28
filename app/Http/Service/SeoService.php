<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\SiteConfig;

/**
 * 站点SEO
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SeoService
{
    public function getList(): array
    {
        return (new SiteConfig())->getList([["key", "=", "seo"]]);
    }
}
