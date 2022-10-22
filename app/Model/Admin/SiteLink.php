<?php
declare(strict_types=1);

namespace App\Model\Admin;

use App\Model\AdminBaseModelInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 站点菜单
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteLink extends \App\Model\SiteLink implements AdminBaseModelInterface
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(SiteLinkCategory::class, "category_id", "id");
    }
}
