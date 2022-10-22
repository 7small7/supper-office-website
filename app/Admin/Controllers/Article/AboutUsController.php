<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Article;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\Banner;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 关于我们
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class AboutUsController extends AdminBaseController
{
    protected $title = "轮播图";

    public function __construct(Banner $banner)
    {
        parent::__construct($banner);
    }

    /**
     * 关于我们列表
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function grid(): Grid
    {
        $grid = new Grid($this->model);
        $grid->column("id", "数据编号")->sortable();
        $grid->column("title", "文章标题");
        $grid->column("status", "文章状态")->display(function ($status) {
            if ($status == 1) {
                return "<span style='color:green'>启用</span>";
            }
            return "<span style='color:red'>禁用</span>";
        });
        $grid->column("is_share", "分享状态")->display(function ($status) {
            if ($status == 1) {
                return "<span style='color:green'>允许</span>";
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
     * 关于我们创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $form = new Form($this->model);
        $form->hidden("uuid", "数据编号")->default(md5(microtime() . uniqid()));
        $form->text("title", "文章标题")->required()->help("最大长度不要超过50个字符。");
        $form->number("views", "阅读数量")->default(0)->help("文章阅读量。由用户阅读生成，后台可以自行修改。");
        $form->date("publish_date", "发布日期")->required()->default(date("Y-m-d"));
        $form->radio("status", "文章状态")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->text("author", "文章作者")->help("文章作者");
        $form->radio("is_share", "允许转载")->options([1 => "允许", 2 => "禁用"])->default(2)->help("选择禁止，则允许转载。");
        $form->textarea("share_text", "转载描述")->help("转载文本描述。");
        $form->text("seo_title", "SEO标题")->help("seo标题");
        $form->text("seo_keywords", "SEO标题")->help("seo关键词");
        $form->text("seo_description", "SEO标题")->help("seo描述");
        $form->textarea("description", "文章描述");
        $form->wangEditor("content", "文章内容")->required();
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
