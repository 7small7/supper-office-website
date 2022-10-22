<?php
declare(strict_types=1);

namespace App\Admin\Controllers;

use App\Model\AdminBaseModelInterface;
use Encore\Admin\Controllers\AdminController;

/**
 * 基类控制器
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class AdminBaseController extends AdminController
{
    protected $title = "功能菜单";

    protected $model;

    public function __construct(AdminBaseModelInterface $baseModelService)
    {
        $this->model = $baseModelService;
    }
}
