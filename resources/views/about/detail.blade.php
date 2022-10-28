@extends("layouts.app")
@section("title", $detail['title'] ?? "")
@section("seo_title", $detail['seo_title'] ?? "")
@section("seo_keywords", $detail['seo_keywords'] ?? "")
@section("seo_description", $detail['seo_description'] ?? "")
@section("top")
    @parent
@endsection
@section("header")
    <link rel="stylesheet" href="/assest/css/scss/views/page/post.css">
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
@endsection
@section("content")
    <main class="page__container page__main">
        <div class="page__content">
            @if(!empty($detail))
                <article class="page__post">
                    <header class="post__info" style="margin-top: 0;">
                        <h1 class="post__title">{{$detail['title']}}</h1>
                        <div class="post__mark">
                            <div class="mark__block"><i class="mark__icon iconfont icon-write"></i>
                                <ul class="mark__list clearfix">
                                    <li class="mark__item"><a
                                            href="{{config("app.url")}}">{{$detail['author']}}</a></li>
                                </ul>
                            </div>
                            <div class="mark__block"><i class="mark__icon iconfont icon-time"></i>
                                <ul class="mark__list clearfix">
                                    <li class="mark__item"><span>{{$detail['publish_date']}}</span></li>
                                </ul>
                            </div>
                            <div class="mark__block"><i class="mark__icon iconfont icon-tab"></i>
                                <ul class="mark__list clearfix">
                                    <li class="mark__item">
                                        <a href="#">暂无标签</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                    <div class="post__content">
                        {!! $detail['content'] !!}
                        <div class="post-announce">{{$detail["share_text"]}}
                            @if($detail["is_share"] != 1)
                                - 版权所有。未经允许不得转载。
                            @endif
                        </div>
                        <div class="post__prevs">
                            @if(!empty($pre))
                                <div class="post__prev">
                                    <a href="{{config("app.url")}}/article/detail/{{$pre['uuid']}}"
                                       title="{{$pre['title']}}"><i class="iconfont icon-prev"></i>{{$pre['title']}}
                                    </a>
                                </div>
                            @endif
                            @if(!empty($next))
                                <div class="post__prev post__prev--right">
                                    <a href="{{config("app.url")}}/article/detail/{{$next['uuid']}}"
                                       title="{{$next['title']}}">
                                        {{$next['title']}}<i class="iconfont icon-next"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </article>
            @else
                <article class="page__post" style="margin-bottom: 80%;">
                    <div class="post__content" style="text-align: center;">
                        小朋友，您想找的内容不存在哦!
                    </div>
                </article>
            @endif
            @if(!empty($detail))
                <div id="comment-container" style="width:100%"></div>
                <script src="/assest/js/layout/valine.min.js"></script>
                <script
                    type="text/javascript">var valine = new Valine({
                        el: "#comment-container",
                        appId: "Qj1qVWmHdwBWsQrgcLIqw2uN-gzGzoHsz",
                        appKey: "6NlVevldNw3cPSCdTO8BiWt0",
                        notify: !1,
                        placeholder: "留言的人最好看~",
                        avatar: "hide",
                        guest_info: ["nick"],
                        visitor: "true",
                        pageSize: 10
                    })
                </script>
            @endif
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
            {{--                        <a href="/" target="_blank">--}}
            {{--                            <img class="course_activity"--}}
            {{--                                 src="https://maliquankai.oss-cn-shenzhen.aliyuncs.com/App/Money%20Cats/%E8%B4%A6%E5%8D%95%E6%A0%87%E7%AD%BE.png"--}}
            {{--                                 alt=""></a>--}}
            {{--                        <p style="font-size:14px;color:#242424;margin-top:10px;margin-left:5px"><strong--}}
            {{--                                style="color:#ff5f28;font-size:16px">懒猫存钱</strong> - 存钱记账从未如此简单</p>--}}
            {{--                    </li>--}}
            {{--                    <li>--}}
            {{--                        <a href="/" target="_blank">--}}
            {{--                            <img class="course_activity"--}}
            {{--                                 src="https://maliquankai.oss-cn-shenzhen.aliyuncs.com/App/Money%20Cats/%E8%B4%A6%E5%8D%95%E6%A0%87%E7%AD%BE.png"--}}
            {{--                                 alt=""></a>--}}
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
            {{--                    <li class="tag-item">--}}
            {{--                        <a class="tag-link" href="/">3D交互</a>--}}
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
