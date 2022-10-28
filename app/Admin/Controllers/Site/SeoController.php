<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Site;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\SiteConfig;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 站点SEO收录配置
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class SeoController extends AdminBaseController
{
    protected $title = "SEO收录配置";

    public function __construct(SiteConfig $siteConfig)
    {
        parent::__construct($siteConfig);
    }

    /**
     * 站点收录列表
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function grid(): Grid
    {
        $grid = new Grid($this->model);
        $grid->column("id", "数据编号")->sortable();
        $grid->column("title", "收录平台");
        $grid->column("status", "菜单状态")->display(function ($status) {
            if ($status == 1) {
                return "<span style='color:green'>启用</span>";
            }
            return "<span style='color:red'>禁用</span>";
        });
        $grid->column("created_at", "创建时间");
        $grid->column("updated_at", "更新时间");
        $grid->actions(function ($action) {
            $action->disableView();
        });

        return $grid;
    }

    /**
     * 站点收录创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $form = new Form($this->model);
        $form->text("key", "配置类型")->default("seo")->required()->readonly();
        $form->text("title", "收录平台")->required();
        $form->textarea("val", "配置")->required();
        $form->radio("status", "是否启用")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
