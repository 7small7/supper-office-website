<?php
declare(strict_types=1);

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * η«ηΉθε
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SiteLink extends Model
{
    use SoftDeletes;

    protected $table = "site_link";
}
