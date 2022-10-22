<?php
declare(strict_types=1);

namespace App\Model\Admin;

use App\Model\AdminBaseModelInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 文章管理
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class Article extends \App\Model\Article implements AdminBaseModelInterface
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(ArticleCategory::class, "category_uuid", "uuid");
    }
}
