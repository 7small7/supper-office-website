<?php
declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 文章管理
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class Article extends Model
{
    use SoftDeletes;

    protected $table = "article";
}
