@extends("layouts.app")
@section("title", "首页")
@section("seo_title", "秋秋软件")
@section("seo_keywords", "秋秋软件,秋秋软件大学堂,秋秋,秋秋软件,工作室,产品,独立开发者,全栈开发,设计,工具,app,iOS,Android,UI")
@section("seo_description", "专做Mac软件、Mac破解软件、windows软件、windows破解软件、优秀设计资源、优秀工具等内容")
@section("top")
    @parent
@endsection
@section("content")
    <link rel="stylesheet" href="/assest/css/scss/views/page/index.css">
    <style>
        .flexslider {
            margin: 0 auto 20px;
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            zoom: 1
        }

        .flexslider .slides li {
            width: 100%;
            height: 100%
        }

        .flex-direction-nav a {
            width: 60px;
            height: 60px;
            line-height: 99em;
            overflow: hidden;
            margin: -30px 0 0;
            display: block;
            background: url(/assest/images/right_big.png) no-repeat;
            position: absolute;
            top: 50%;
            z-index: 10;
            cursor: pointer;
            opacity: 0;
            -webkit-transition: all .3s ease;
            border-radius: 30px;
            background-size: 100% 200%
        }

        .flex-direction-nav .flex-next {
            margin-right: 40px;
            background-position: 0 -60px;
            right: 0
        }

        .flex-direction-nav .flex-prev {
            margin-left: 40px;
            left: 0
        }

        .flexslider:hover .flex-next {
            opacity: 1
        }

        .flexslider:hover .flex-prev {
            opacity: .8
        }

        .flexslider:hover .flex-next:hover,
        .flexslider:hover .flex-prev:hover {
            opacity: 1
        }

        .flex-control-nav {
            width: 100%;
            position: absolute;
            bottom: 10px;
            text-align: center
        }

        .flex-control-nav li {
            margin: 0 1px;
            display: inline-block;
            zoom: 1
        }

        .flex-control-paging li a {
            background: url(/assest/images/banner_big.png) no-repeat 0 -16px;
            display: block;
            height: 16px;
            overflow: hidden;
            text-indent: -99em;
            width: 20px;
            object-fit: cover;
            cursor: pointer;
            background-size: 100% 200%
        }

        .flex-control-paging li a.flex-active,
        .flex-control-paging li.active a {
            background-position: 0 0
        }

        .flexslider .slides a img {
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            object-fit: cover;
            display: block;
            height: 100%
        }
    </style>
    @section("header")
        <header id="page-header" class="page__header">
            <div id="banner_tabs" class="flexslider">
                <ul class="slides">
                    @foreach($banner as $value)
                        <li><a target="_blank" href="/">
                                <img alt="{{$value['title']}}" class="lozad"
                                     data-src="{{$value['domain']}}{{$value['cover']}}">
                            </a>
                        </li>
                    @endforeach
                </ul>
                <ul class="flex-direction-nav">
                    <li><a class="flex-prev" href="javascript:;">Previous</a></li>
                    <li><a class="flex-next" href="javascript:;">Next</a></li>
                </ul>
                <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
                    @foreach($banner as $key => $value)
                        <li><a>{{$key}}</a></li>
                    @endforeach
                </ol>
            </div>
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
                            @endforeach
                        </ul>
                    </nav>
                    <button class="page__menu-btn" type="button"><i class="iconfont icon-menu"></i></button>
                </div>
            </nav>
            {{--            <section class="page__info">--}}
            {{--                <h1 class="info__title">秋秋软件网站</h1>--}}
            {{--                <hr class="info__hr">--}}
            {{--                <p class="info__desc">专注互联网好产品，让分享不停止</p>--}}
            {{--            </section>--}}
            <script src="/assest/js/jquery-1.10.2.min.js"></script>
            <script src="/assest/js/slider.js"></script>
            <script
                type="text/javascript">$(function () {
                    var e = new Slider($("#banner_tabs"), {
                        time: 7e3,
                        delay: 400,
                        event: "hover",
                        auto: !0,
                        mode: "fade",
                        controller: $("#bannerCtrl"),
                        activeControllerCls: "active"
                    });
                    $("#banner_tabs .flex-prev").click(function () {
                        e.prev()
                    }), $("#banner_tabs .flex-next").click(function () {
                        e.next()
                    }), e.next()
                })</script>
        </header>
    @endsection
    {{--    <div id="shade" class="bg_alpha"></div>--}}
    {{--    <div id="shadeInfo" class="wechat_bg bg_offset">--}}
    {{--        <div onclick="closeAdv()" class="closeAdv"></div>--}}
    {{--        <div class="advWechat"></div>--}}
    {{--    </div>--}}
    {{--    <script>function closeAdv() {--}}
    {{--            $("#shade").hide(), $("#shadeInfo").hide()--}}
    {{--        }--}}

    {{--        $(function () {--}}
    {{--            window.localStorage.getItem("wechatQR3") ? ($("#shade").hide(), $("#shadeInfo").hide()) : ($("#shade").show(), $("#shadeInfo").show(), window.localStorage.setItem("wechatQR3", "true"))--}}
    {{--        })</script>--}}
    <main class="page__container page__main">
        <div class="wrap">
            <div class="topBox">
                <div class="fhNav">
                    <ul class="nav clearfix">
                        <a href="/" target="_blank">
                            <li class="selectedNav">最新</li>
                        </a>
                        @foreach($articleCategory as $value)
                            <a href="{{config('app.url')}}/article/list/{{$value['uuid']}}" target="_blank">
                                <li>{{$value['title']}}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="page__content">
            <div class="page__posts clearfix">
                @foreach($newArticle as $value)
                    <div class="page__post">
                        @if(!empty($value['url']))
                            <article itemscope itemtype="{{$value['url']}}"
                                     class="page__mini-article">
                                <div class="mini-article__cover">
                                    <div class="alpha__cover"></div>
                                    <a class="link" itemprop="url"
                                       href="{{$value['url']}}" target="_blank">
                                        <img class="imgl lozad" itemprop="image"
                                             data-src="{{$value['domain']}}{{$value['cover']}}"
                                             alt="新文章 | {{$value['title']}}">
                                    </a>
                                    <img class="imgl lozad" itemprop="image"
                                         data-src="{{$value['domain']}}{{$value['cover']}}"
                                         alt="新文章 | {{$value['title']}}">
                                    <div itemprop="datePublished" content="" class="mini-article__date">
                                        <span class="date__day">{{$value['day']}}</span>
                                        <span class="date__month">{{$value['month']}}</span>
                                    </div>
                                </div>
                                <div class="mini-article__info">
                                    <h3 itemprop="name" class="mini-article__title">
                                        <a itemprop="url" href="{{$value['url']}}"
                                           title="新文章 | {{$value['title']}}"
                                           target="_blank">新文章 | {{$value['title']}}</a>
                                    </h3>
                                    <p class="mini-article__author">by
                                        <span itemprop="author" itemscope
                                              itemtype="{{$value['url']}}">
                                        <a itemprop="url"
                                           href="{{$value['url']}}"
                                           target="_blank">
                                            <span itemprop="name">{{$value['author']}}</span>
                                        </a>
                                    </span>
                                    </p>
                                    <p itemprop="articleSection" class="min-article__desc">
                                        {{$value['description']}}</p>
                                    <div class="min-article__tags">
                                        <i class="iconfont icon-tab"></i>
                                        <ul class="tags__list clearfix">
                                            <li class="tags__item">
                                                <a href="{{$value['url']}}">暂无标签</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="mini-time__author"><i class="mark__icon iconfont icon-time"></i> <span
                                            class="tags__time">{{$value['publish_date']}}</span></p>
                                </div>
                            </article>
                        @else
                            <article itemscope itemtype="{{config('app.url')}}/article/detail/{{$value['uuid']}}"
                                     class="page__mini-article">
                                <div class="mini-article__cover">
                                    <div class="alpha__cover"></div>
                                    <a class="link" itemprop="url"
                                       href="{{config('app.url')}}/article/detail/{{$value['uuid']}}" target="_blank">
                                        <img class="imgl lozad" itemprop="image"
                                             data-src="{{$value['domain']}}{{$value['cover']}}"
                                             alt="新文章 | {{$value['title']}}">
                                    </a>
                                    <img class="imgl lozad" itemprop="image"
                                         data-src="{{$value['domain']}}{{$value['cover']}}"
                                         alt="新文章 | {{$value['title']}}">
                                    <div itemprop="datePublished" content="" class="mini-article__date">
                                        <span class="date__day">{{$value['day']}}</span>
                                        <span class="date__month">{{$value['month']}}</span>
                                    </div>
                                </div>
                                <div class="mini-article__info">
                                    <h3 itemprop="name" class="mini-article__title">
                                        <a itemprop="url" href="{{config('app.url')}}/article/detail/{{$value['uuid']}}"
                                           title="新文章 | {{$value['title']}}"
                                           target="_blank">新文章 | {{$value['title']}}</a>
                                    </h3>
                                    <p class="mini-article__author">by
                                        <span itemprop="author" itemscope
                                              itemtype="{{config('app.url')}}/article/detail/{{$value['uuid']}}">
                                        <a itemprop="url"
                                           href="{{config('app.url')}}/article/detail/{{$value['uuid']}}"
                                           target="_blank">
                                            <span itemprop="name">{{$value['author']}}</span>
                                        </a>
                                    </span>
                                    </p>
                                    <p itemprop="articleSection" class="min-article__desc">
                                        {{$value['description']}}</p>
                                    <div class="min-article__tags">
                                        <i class="iconfont icon-tab"></i>
                                        <ul class="tags__list clearfix">
                                            <li class="tags__item">
                                                <a href="{{config('app.url')}}/article/detail/{{$value['uuid']}}">暂无标签</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p class="mini-time__author"><i class="mark__icon iconfont icon-time"></i> <span
                                            class="tags__time">{{$value['publish_date']}}</span></p>
                                </div>
                            </article>
                        @endif
                    </div>
                @endforeach
            </div>
            {{--            <nav class="page__paginator">--}}
            {{--                <ul class="paginator__list clearfix">--}}
            {{--                    <li class="paginator__item"><a href="/" title="上一页"><i class="iconfont icon-prev"></i></a></li>--}}
            {{--                    <li class="paginator__item"><span>1</span></li>--}}
            {{--                    <li class="paginator__item"><a href="/">2</a></li>--}}
            {{--                    <li class="paginator__item"><a href="/">3</a></li>--}}
            {{--                    <li class="paginator__item"><span>...</span></li>--}}
            {{--                    <li class="paginator__item"><a href="/">19</a></li>--}}
            {{--                    <li class="paginator__item"><a href="/" title="下一页"><i--}}
            {{--                                class="iconfont icon-next"></i></a></li>--}}
            {{--                </ul>--}}
            {{--            </nav>--}}
        </div>
        <aside class="page__sidebar">
            <form id="page-search-from" class="page__search-from" action="/"><label
                    class="search-form__item"><input class="input" type="text" name="search"
                                                     placeholder="Search..."> <i
                        class="iconfont icon-search"></i></label></form>
            {{--            <div class="sidebar__block">--}}
            {{--                <h3 class="block__title">产品推荐</h3>--}}
            {{--                <ul class="ul-list">--}}
            {{--                    <li>--}}
            {{--                        <a href="2020/07/15/2020-07-15-lazycat-savemoney/index.html"--}}
            {{--                           target="_blank"><img class="course_activity"--}}
            {{--                                                src="https://maliquankai.oss-cn-shenzhen.aliyuncs.com/App/Money%20Cats/%E8%B4%A6%E5%8D%95%E6%A0%87%E7%AD%BE.png"--}}
            {{--                                                alt=""></a>--}}
            {{--                        <p style="font-size:14px;color:#242424;margin-top:10px;margin-left:5px"><strong--}}
            {{--                                style="color:#ff5f28;font-size:16px">懒猫存钱</strong> - 存钱记账从未如此简单</p>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}
            <div class="sidebar__block">
                <h3 class="block__title">文章分类</h3>
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
            {{--            <div class="sidebar__block">--}}
            {{--                <h3 class="block__title">文章标签</h3>--}}
            {{--                <ul class="block-list tag-list clearfix">--}}
            {{--                    <li class="tag-item"><a class="tag-link" href="tags/3D%E4%BA%A4%E4%BA%92/index.html">3D交互</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </div>--}}

            {{--            <div class="sidebar__block">--}}
            {{--                <h3 class="block__title">友情互助</h3>--}}
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
