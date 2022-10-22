@extends("layouts.app")
@section("title", "分类列表")
@section("seo_title", "秋秋软件")
@section("seo_keywords", "秋秋软件,秋秋软件大学堂,秋秋,秋秋软件,工作室,产品,独立开发者,全栈开发,设计,工具,app,iOS,Android,UI")
@section("seo_description", "精品MAC应用分享，每天分享大量mac软件，为您提供优质的mac软件,免费软件下载服务")
@section("top")
    @parent
@endsection
@section("content")
    <link rel="stylesheet" href="/assest/css/scss/views/page/category.css">
    <header class="page__small-header page__header--small">
        <nav class="page__navbar">
            <div class="page__container navbar-container">
                <a class="page__logo" href="/"
                   title="秋秋软件 - 优秀软件的集中营"
                   alt="秋秋软件 - 优秀软件的集中营"><img
                        src="{{config('app.logo_url')}}"
                        alt="秋秋软件 - 优秀软件的集中营"></a>
                <nav class="page__nav">
                    <ul class="nav__list clearfix">
                        @foreach($menu as $value)
                            <li class="nav__item">
                                <a href="{{$value['url']}}" alt="{{$value['title']}}" target="_blank"
                                   title="{{$value['title']}}">{{$value['title']}}</a>
                            </li>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <button class="page__menu-btn" type="button"><i class="iconfont icon-menu"></i></button>
            </div>
        </nav>
    </header>
    <main class="page__container page__main">
        <div class="page__content">
            <div class="page__posts clearfix">
                @foreach($items as $value)
                    @if(!empty($value->url))
                        <div class="page__post">
                            <article itemscope itemtype="{{$value->url}}" class="page__mini-article">
                                <div class="mini-article__cover">
                                    <div class="alpha__cover"></div>
                                    <a class="link" itemprop="url" href="{{$value->url}}" target="_blank">
                                        <img class="imgl lozad" itemprop="image"
                                             data-src="{{$value->domain}}{{$value->cover}}" alt="{{$value->title}}">
                                    </a>
                                    <img class="imgl lozad" itemprop="image"
                                         data-src="{{$value->domain}}{{$value->cover}}"
                                         alt="{{$value->title}}">
                                    <div itemprop="datePublished" content="" class="mini-article__date">
                                        <span class="date__day">{{$value->day}}</span>
                                        <span class="date__month">{{$value->month}}</span>
                                    </div>
                                </div>
                                <div class="mini-article__info">
                                    <h3 itemprop="name" class="mini-article__title">
                                        <a itemprop="url" href="{{$value->url}}"
                                           title="{{$value->title}}" target="_blank">{{$value->title}}</a>
                                    </h3>
                                    <p class="mini-article__author">by
                                        <span itemprop="author" itemscope
                                              itemtype="{{$value->url}}">
                                        <a itemprop="url" href="{{$value->url}}"
                                           target="_blank">
                                            <span itemprop="name">{{$value->author}}</span>
                                        </a>
                                    </span>
                                    </p>
                                    <p itemprop="articleSection" class="min-article__desc">{{$value->description}}</p>
                                    <div class="min-article__tags"><i class="iconfont icon-tab"></i>
                                        <ul class="tags__list clearfix">
                                            <li class="tags__item">
                                                <a href="{{$value->url}}">暂无标签</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="mini-time__author">
                                        <i class="mark__icon iconfont icon-time"></i>
                                        <span
                                            class="tags__time">{{$value->publish_date}}</span>
                                    </p>
                                </div>
                            </article>
                        </div>
                    @else
                        <div class="page__post">
                            <article itemscope itemtype="{{config('app.url')}}/article/detail/{{$value->uuid}}"
                                     class="page__mini-article">
                                <div class="mini-article__cover">
                                    <div class="alpha__cover"></div>
                                    <a class="link" itemprop="url"
                                       href="{{config('app.url')}}/article/detail/{{$value->uuid}}" target="_blank">
                                        <img class="imgl lozad" itemprop="image"
                                             data-src="{{$value->domain}}{{$value->cover}}" alt="{{$value->title}}">
                                    </a>
                                    <img class="imgl lozad" itemprop="image"
                                         data-src="{{$value->domain}}{{$value->cover}}"
                                         alt="{{$value->title}}">
                                    <div itemprop="datePublished" content="" class="mini-article__date">
                                        <span class="date__day">{{$value->day}}</span>
                                        <span class="date__month">{{$value->month}}</span>
                                    </div>
                                </div>
                                <div class="mini-article__info">
                                    <h3 itemprop="name" class="mini-article__title">
                                        <a itemprop="url" href="{{config('app.url')}}/article/detail/{{$value->uuid}}"
                                           title="{{$value->title}}" target="_blank">{{$value->title}}</a>
                                    </h3>
                                    <p class="mini-article__author">by
                                        <span itemprop="author" itemscope
                                              itemtype="{{config('app.url')}}/article/detail/{{$value->uuid}}">
                                        <a itemprop="url" href="{{config('app.url')}}/article/detail/{{$value->uuid}}"
                                           target="_blank">
                                            <span itemprop="name">{{$value->author}}</span>
                                        </a>
                                    </span>
                                    </p>
                                    <p itemprop="articleSection" class="min-article__desc">{{$value->description}}</p>
                                    <div class="min-article__tags"><i class="iconfont icon-tab"></i>
                                        <ul class="tags__list clearfix">
                                            <li class="tags__item">
                                                <a href="{{config('app.url')}}/article/detail/{{$value['uuid']}}">暂无标签</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="mini-time__author">
                                        <i class="mark__icon iconfont icon-time"></i>
                                        <span
                                            class="tags__time">{{$value->publish_date}}</span>
                                    </p>
                                </div>
                            </article>
                        </div>
                    @endif
                @endforeach
            </div>
            <nav class="page__paginator">
                <ul class="paginator__list clearfix">
                    {{--                    上一页链接--}}
                    @if($items->currentPage() != 1)
                        <li class="paginator__item">
                            <a href="{{$items->previousPageUrl()}}" title="上一页">
                                <i class="iconfont icon-prev"></i>
                            </a>
                        </li>
                    @endif
                    {{--                                        获取中间页链接--}}
                    @if($items->total() / $items->perPage() > 4 )
                        {{--                    第一页页码--}}
                        <li class="paginator__item">
                            <a href="{{$items->url(1)}}">
                                <span>1</span>
                            </a>
                        </li>
                        <li class="paginator__item">
                            <a href="{{$items->url(2)}}">
                                <span>2</span>
                            </a>
                        </li>
                        <li class="paginator__item">
                            <a>
                                <span>...</span>
                            </a>
                        </li>
                        <li class="paginator__item">
                            <a href="{{$items->url($items->lastPage() -1)}}">
                                <span>{{$items->lastPage() -1}}</span>
                            </a>
                        </li>
                        {{--                        最后一页页码--}}
                        <li class="paginator__item">
                            <a href="{{$items->url($items->lastPage())}}">
                                <span>{{$items->lastPage()}}</span>
                            </a>
                        </li>
                    @elseif(ceil($items->total() / $items->perPage()) <= 4 && $items->total() > 0)
                        @for($i =1; $i < ceil($items->total() / $items->perPage()); $i++)
                            <li class="paginator__item">
                                <a href="{{$items->url($i)}}">
                                    <span>{{$i}}</span>
                                </a>
                            </li>
                        @endfor
                        {{--                        最后一页页码--}}
                        <li class="paginator__item">
                            <a href="{{$items->url($items->lastPage())}}">
                                <span>{{$items->lastPage()}}</span>
                            </a>
                        </li>
                    @endif
                    {{--                        下一页链接--}}
                    @if($items->currentPage() != $items->lastPage())
                        <li class="paginator__item">
                            <a href="{{$items->nextPageUrl()}}" title="下一页">
                                <i class="iconfont icon-next"></i>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <aside class="page__sidebar">
            <form id="page-search-from" class="page__search-from" action="/"><label
                    class="search-form__item"><input class="input" type="text" name="search" placeholder="Search..."> <i
                        class="iconfont icon-search"></i></label></form>
            {{--            <div class="sidebar__block"><h3 class="block__title">产品推荐</h3><a--}}
            {{--                    href="../../2020/07/15/2020-07-15-lazycat-savemoney/index.html" target="_blank"><img--}}
            {{--                        class="course_activity"--}}
            {{--                        src="https://maliquankai.oss-cn-shenzhen.aliyuncs.com/App/Money%20Cats/%E8%B4%A6%E5%8D%95%E6%A0%87%E7%AD%BE.png"--}}
            {{--                        alt=""></a>--}}
            {{--                <p style="font-size:14px;color:#242424;margin-top:10px;margin-left:5px">--}}
            {{--                    <strong style="color:#ff5f28;font-size:16px">懒猫存钱</strong> - 存钱记账从未如此简单</p>--}}
            {{--            </div>--}}
            <div class="sidebar__block"><h3 class="block__title">文章分类</h3>
                <ul class="block-list">
                    @foreach($articleCategory as $value)
                        <li class="block-list-item">
                            <a class="block-list-link"
                               href="{{config("app.url")}}/article/list/{{$value['uuid']}}">{{$value['title']}}</a>
                            <span class="block-list-count">{{$value['article_number']}}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{--            <div class="sidebar__block"><h3 class="block__title">文章标签</h3>--}}
            {{--                <ul class="block-list tag-list clearfix">--}}
            {{--                    <li class="tag-item"><a class="tag-link"--}}
            {{--                                            href="../../tags/3D%E4%BA%A4%E4%BA%92/index.html">3D交互</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}

            {{--            <div class="sidebar__block"><h3 class="block__title">友情互助</h3>--}}
            {{--                <div style="margin-bottom:16px"><a--}}
            {{--                        href="https://creatorsdaily.com/4ad6026e-6e73-4b5c-b2c6-776db4da9ddd?utm_source=vote"--}}
            {{--                        target="_blank"><img class="lozad"--}}
            {{--                                             data-src="https://creatorsdaily.com/api/4ad6026e-6e73-4b5c-b2c6-776db4da9ddd/vote.svg?theme=light"></a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
        </aside>
    </main>
@endsection
@section("footer")
    @parent
@endsection
