<?php
declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 轮播图管理
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class Banner extends Model
{
    use SoftDeletes;

    protected $table = "banner";
}
