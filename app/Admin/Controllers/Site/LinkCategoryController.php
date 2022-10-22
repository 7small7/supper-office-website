<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Site;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\SiteLinkCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 链接类目
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class LinkCategoryController extends AdminBaseController
{
    protected $title = "链接类目";

    public function __construct(SiteLinkCategory $linkCategory)
    {
        parent::__construct($linkCategory);
    }

    /**
     * 站点友链列表
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function grid(): Grid
    {
        $grid = new Grid($this->model);
        $grid->column("id", "数据编号")->sortable();
        $grid->column("title", "类目名称");
        $grid->column("remark", "类目描述");
        $grid->column("sort", "权重");
        $grid->column("url", "类目地址");
        $grid->column("status", "类目状态")->display(function ($status) {
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
     * 站点友链创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $form = new Form($this->model);
        $form->text("title", "类目名称")->required();
        $form->textarea("remark", "类目描述");
        $form->radio("status", "类目状态")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->number("sort", "显示顺序")->default(0)->help("值越大，显示权重越高。");
        $form->text("url", "类目地址")->help("如果填写本站路由地址，则默认类目本站地址。");
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
