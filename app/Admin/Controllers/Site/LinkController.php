<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Site;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\SiteLink;
use App\Model\Admin\SiteLinkCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 站点友链
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class LinkController extends AdminBaseController
{
    protected $title = "站外链接";

    public function __construct(SiteLink $siteLink)
    {
        parent::__construct($siteLink);
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
        $grid->column("category.title", "菜单类目");
        $grid->column("title", "菜单名称");
        $grid->column("remark", "菜单描述");
        $grid->column("sort", "权重");
        $grid->column("url", "跳转地址");
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
     * 站点友链创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $form = new Form($this->model);
        $form->select("category_id", "链接类目")->options((new SiteLinkCategory())->getList())->required();
        $form->text("title", "菜单名称")->required();
        $form->textarea("remark", "菜单描述");
        $form->radio("status", "菜单状态")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->number("sort", "显示顺序")->default(0)->help("值越大，显示权重越高。");
        $form->text("url", "跳转地址")->help("如果填写本站路由地址，则默认跳转本站地址。");
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
