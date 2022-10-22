<?php
declare(strict_types=1);

namespace App\Admin\Controllers\Article;

use App\Admin\Controllers\AdminBaseController;
use App\Model\Admin\Article;
use App\Model\Admin\ArticleCategory;
use Encore\Admin\Form;
use Encore\Admin\Grid;

/**
 * 文章管理
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class ArticleController extends AdminBaseController
{
    protected $title = "文章管理";

    public function __construct(Article $article)
    {
        parent::__construct($article);
    }

    /**
     * 文章列表
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function grid(): Grid
    {
        $grid = new Grid($this->model);
        $grid->column("id", "数据编号")->sortable();
        $grid->column("category.title", "文章类目");
        $grid->column("title", "文章名称");
        $grid->column("sort", "权重");
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
     * 文章创建
     * @author kert
     * @site https://www.yuque.com/okwvip
     */
    public function form(): Form
    {
        $author     = "kert";
        $fileConfig = config("filesystems");
        $default    = $fileConfig["disks"][$fileConfig["default"]]["url"];
        $form       = new Form($this->model);
        $form->hidden("domain", "文件域名")->default($default);
        $form->hidden("uuid", "数据编号")->default(md5(microtime() . uniqid()));
        $form->select("category_uuid", "链接类目")->options((new ArticleCategory())->getList())->required();
        $form->text("title", "文章标题")->required()->help("最大长度不要超过50个字符。");
        $form->number("views", "阅读数量")->default(0)->help("文章阅读量。由用户阅读生成，后台可以自行修改。");
        $form->date("publish_date", "发布日期")->required()->default(date("Y-m-d"));
        $form->radio("status", "文章状态")->options([1 => "启用", 2 => "禁用"])->default(2);
        $form->number("sort", "文章权重")->default(0)->help("值越大，显示权重越高。");
        $form->url("url", "站外跳转地址")->help("文章跳转地址，填写则有限以该字段值进行跳转。");
        $form->text("author", "文章作者")->default($author)->help("文章作者");
        $form->radio("is_share", "允许转载")->options([1 => "允许", 2 => "禁用"])->default(2)->help("选择禁止，则允许转载。");
        $form->textarea("share_text", "转载描述")->default("感谢您的阅读，本文作者" . $author . "编写。")->help("转载文本描述。");
        $form->text("seo_title", "SEO标题")->help("seo标题")->default("秋秋软件");
        $form->text("seo_keywords", "SEO标题")->help("seo关键词")->default("秋秋软件,秋秋软件大学堂,秋秋,秋秋软件,工作室,产品,独立开发者,全栈开发,设计,工具,app,iOS,Android,UI");
        $form->text("seo_description", "SEO标题")->help("seo描述")->default("专做Mac软件、Mac破解软件、windows软件、windows破解软件、优秀设计资源、优秀工具等内容");
        $form->image('cover', "列表封面")->uniqueName()->required()->help("图片不会进行裁剪，请根据需要上传。");
        $form->image('detail_cover', "详情封面")->uniqueName()->required()->help("图片不会进行裁剪，请根据需要上传。");
        $form->textarea("description", "文章描述");
        $form->wangEditor("content", "文章内容")->required();
        $form->footer(function ($footer) {
            $footer->disableViewCheck();
        });

        return $form;
    }
}
