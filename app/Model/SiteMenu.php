<?php
declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 站点菜单
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteMenu extends Model
{
    use SoftDeletes;

    protected $table = "site_menu";
}
