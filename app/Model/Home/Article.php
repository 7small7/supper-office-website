<?php
declare(strict_types=1);

namespace App\Model\Home;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * 文章
 * @author kert
 * @site https://www.yuque.com/okwvip
 */
class Article extends \App\Model\Article
{
    protected $appends = [
        "month",
        "day",
    ];

    /**
     * 默认文章详情查询字段
     * @var string[]
     */
    private $defaultField = [
        "uuid",
        "title",
        "description",
        "content",
        "domain",
        "cover",
        "detail_cover",
        "views",
        "publish_date",
        "author",
        "is_share",
        "share_text",
        "seo_title",
        "seo_keywords",
        "seo_description",
        "id",
    ];

    /**
     * 获取发布日期月份
     * @return string
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getMonthAttribute(): string
    {
        if (!empty($this->getAttribute("publish_date"))) {
            return explode("-", $this->getAttribute("publish_date"))[1] . "月";
        }
        return "";
    }

    /**
     * 获取发布日期天
     * @return string
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getDayAttribute(): string
    {
        if (!empty($this->getAttribute("publish_date"))) {
            return (string)explode("-", $this->getAttribute("publish_date"))[2];
        }
        return "";
    }

    /**
     * 文章列表
     * @param array $searchWhere 查询条件
     * @param int $pageIndex     当前页
     * @param int $perSize       查询条数
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getList(array $searchWhere = [], int $pageIndex = 1, int $perSize = 15): array
    {
        $items = self::query()
            ->where([["status", "=", 1]])
            ->where(function ($query) use ($searchWhere) {
                if (!empty($searchWhere["new"])) {// 查询最新
                    $query->orderByDesc("id");
                }
                if (!empty($searchWhere["category_uuid"])) {// 根据分类查询
                    $query->where("category_uuid", "=", $searchWhere["category_uuid"]);
                }
            })
            ->orderByDesc("sort")
            ->paginate($perSize,
                ["title", "uuid", "domain", "cover", "url", "publish_date", "description", "author"],
                "page",
                $pageIndex);

        return $items->toArray();
    }

    /**
     * 文章列表
     * @param array $searchWhere 查询条件
     * @param int $pageIndex     当前页
     * @param int $perSize       查询条数
     * @return LengthAwarePaginator
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getListByPage(array $searchWhere = [], int $pageIndex = 1, int $perSize = 15): LengthAwarePaginator
    {
        return self::query()->where($searchWhere)
            ->where("status", "=", 1)
            ->paginate($perSize,
                ["title", "uuid", "domain", "cover", "url", "publish_date", "description", "author"],
                "p",
                $pageIndex);
    }

    /**
     * 文章详情
     * @param array $searchWhere  查询条件
     * @param array $searchFields 查询字段
     * @return array
     * @site https://www.yuque.com/okwvip
     * @author kert
     */
    public function getDetail(array $searchWhere = [], array $searchFields = []): array
    {
        $searchWhere[] = ["status", "=", 1];
        if (count($searchFields) === 0) {
            $bean = self::query()->where($searchWhere)->first($this->defaultField);
        } else {
            $bean = self::query()->where($searchWhere)->first($searchFields);
        }

        if (!empty($bean)) {
            return $bean->toArray();
        }
        return [];
    }
}
