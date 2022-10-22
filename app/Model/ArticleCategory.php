<?php
declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 文章类目
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleCategory extends Model
{
    use SoftDeletes;

    protected $table = "article_category";

    protected $appends = [
        "article_number",
    ];

    /**
     * 查询分类下的文章总数
     * @return int
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getArticleNumberAttribute(): int
    {
        if (!empty($this->getAttribute("uuid"))) {
            return (new Article())::query()
                ->where("category_uuid", "=", $this->getAttribute("uuid"))
                ->where("status", "=", 1)
                ->count(["id"]);
        }
        return 0;
    }
}
