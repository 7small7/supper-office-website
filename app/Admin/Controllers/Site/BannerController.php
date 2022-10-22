<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Site;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\Banner;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 轮播图管理
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class BannerController extends AdminBaseController
{
    protected $title = "轮播图管理";

    public function __construct(Banner $banner)
    {
        parent::__construct($banner);
    }

    /**
     * 轮播图列表
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function grid(): Grid
    {
        $grid = new Grid($this->model);
        $grid->column("id", "数据编号")->sortable();
        $grid->column("code", "配置code");
        $grid->column("title", "轮播图名称");
        $grid->column("remark", "轮播图描述");
        $grid->column("sort", "权重");
        $grid->column("status", "轮播图状态")->display(function ($status) {
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
     * 轮播图创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $fileConfig = config("filesystems");
        $default    = $fileConfig["disks"][$fileConfig["default"]]["url"];
        $form       = new Form($this->model);
        $form->text("code", "配置code")->required()->help("可以是字符串、数字格式。code控制图片显示位置。相同的code显示在相同位置。");
        $form->image('cover', "列表封面")->uniqueName()->required()->help("图片不会进行裁剪，请根据需要上传。");
        $form->hidden("domain", "文件域名")->default($default);
        $form->text("title", "轮播图名称")->required();
        $form->textarea("remark", "轮播图描述");
        $form->url("url", "跳转地址")->help("最大字符数不能超过255。");
        $form->radio("status", "轮播图状态")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->number("sort", "显示顺序")->default(0)->help("值越大，显示权重越高。");
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
