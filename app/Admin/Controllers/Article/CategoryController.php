<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Article;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\ArticleCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 文章类目
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class CategoryController extends AdminBaseController
{
    protected $title = "文章类目";

    public function __construct(ArticleCategory $category)
    {
        parent::__construct($category);
    }

    /**
     * 文章类目列表
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function grid(): Grid
    {
        $grid = new Grid($this->model);
        $grid->column("id", "数据编号")->sortable();
        $grid->column("title", "类目名称");
        $grid->column("remark", "类目描述");
        $grid->column("article_number", "文章数量");
        $grid->column("sort", "权重");
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
     * 文章类目创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $fileConfig = config("filesystems");
        $default    = $fileConfig["disks"][$fileConfig["default"]]["url"];
        $form       = new Form($this->model);
        $form->hidden("uuid", "数据编号")->default(md5(microtime() . uniqid()));
        $form->image('cover', "列表封面")->uniqueName()->required()->help("图片不会进行裁剪，请根据需要上传。");
        $form->hidden("domain", "文件域名")->default($default);
        $form->text("title", "类目名称")->required();
        $form->textarea("remark", "类目描述");
        $form->radio("status", "类目状态")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->number("sort", "显示顺序")->default(0)->help("值越大，显示权重越高。");
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
