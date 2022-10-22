<?php
declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 关于我们
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class AboutUs extends Model
{
    use SoftDeletes;

    protected $table = "about_us";
}
