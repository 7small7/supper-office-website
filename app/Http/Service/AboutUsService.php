<?php
declare(strict_types=1);

namespace App\Http\Service;

use App\Model\Home\AboutUs;

/**
 * 关于我们
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class AboutUsService
{
    /**
     * 关于我们
     * @return array
     * @link   https://www.yuque.com/okwvip
     * @author kert
     */
    public function getDetail(): array
    {
        return (new AboutUs())->getDetail();
    }
}
