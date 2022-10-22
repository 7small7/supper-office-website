@section("top")
    <!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <title>{{config('app.name')}} - @yield("title")</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="Larry">
    <meta name="designer" content="minfive">
    <meta name="keywords" content="@yield('seo_keywords')">
    <meta name="description" content="@yield('seo_description')">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="robots" content="all">
    <link rel="canonical" href="https://www.qqdeveloper.com">
    <link rel="icon" href="/favicon.ico" sizes="32x32">
    <link rel="stylesheet" href="/assest/css/scss/base/index.css">
    <link rel="stylesheet" href="/assest/css/scss/common/common.css">
    <link rel="alternate" href="atom.xml" title="{{config('app.name')}} - 优秀软件的集中营">
</head>

<body ontouchstart>
<div id="page-loading" class="page page-loading"
     style="background-image:url(/assest/images/load.gif)">
</div>
<div id="page" class="page js-hidden">
    @show
    @yield("header")
    @yield("logo")
    @yield("content")
    @section("footer")
        <footer class="page__footer">
            <section class="footer__top">
                <div class="page__container footer__container">
                    <div class="footer-top__item footer-top__item--2">
                        <h3 class="item__title">关于</h3>
                        <div class="item__content">
                            <p class="item__text">一位混迹互联网多年的码农，擅长全栈开发，爱折腾。欢迎点击右下角订阅
                                rss。</p>
                            <ul class="footer__contact-info">
                                <li class="contact-info__item"><i class="iconfont icon-address"></i>
                                    <a href="https://surl.amap.com/6hpgXJDD9AD" target="_blank" style="color: #69747a;">
                                        <span>ChengDu,Sichuan, China</span>
                                    </a>
                                </li>
                                <li class="contact-info__item"><i class="iconfont icon-email2"></i>
                                    <span>1005349393@qq.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-top__item footer__image">
                        <img class="lozad"
                             data-src="https://qiniucloud.qqdeveloper.com/qrcode_for_gh_1e6dd21ea935_258.jpg"
                             alt="微信公众号 - 软件共享包" title="微信公众号 - 软件共享包">
                    </div>
                    @foreach($link as $value)
                        <div class="footer-top__item">
                            <h3 class="item__title">{{$value['title']}}</h3>
                            <div class="item__content">
                                <ul class="footer-top__list">
                                    @foreach($value['children'] as $v)
                                        <li class="list-item">
                                            <a href="{{$v['url']}}" title="{{$v['title']}}"
                                               target="_blank">{{$v['title']}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
            <section class="footer__bottom">
                <div class="page__container footer__container">
                    <p class="footer__copyright">©
                        <a href="{{config("app.url")}}" target="_blank">All rights
                            reserved</a> 2022
                        <a href="{{config("app.url")}}" target="_blank">kert </a>
                        <a href="https://beian.miit.gov.cn/" target="_blank">蜀ICP备16032791号-3 &nbsp;|&nbsp;</a>
                        <a target="_blank"
                           href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44030502004944"
                           style="line-height:15px;display:inline-block;text-decoration:none;background-image:url(https://qiniucloud.qqdeveloper.com/%E5%A4%87%E6%A1%88%E5%9B%BE%E6%A0%87.png);background-repeat:no-repeat;background-size:15px"><span
                                style="margin-left:20px">蜀ICP备16032791号-3</span></a>
                    </p>
                    <ul class="footer__social-network clearfix">
                        <li class="social-network__item">
                            <a href="https://www.zhihu.com/people/feng-zhong-lang-zi-8" target="_blank" title="zhihu">
                                <i class="iconfont icon-zhihu"></i>
                            </a>
                        </li>
                        <li class="social-network__item">
                            <a href="https://weibo.com/u/7649983007" target="_blank" title="weibo">
                                <i class="iconfont icon-weibo"></i>
                            </a>
                        </li>
                        <li class="social-network__item">
                            <a href="https://weibo.com/u/7649983007" target="_blank" title="twitter">
                                <i class="iconfont icon-twitter"></i>
                            </a>
                        </li>
                        <li class="social-network__item">
                            <a href="https://weibo.com/u/7649983007" target="_blank" title="telegram">
                                <i class="iconfont icon-telegram"></i>
                            </a>
                        </li>
                        <li class="social-network__item">
                            <a href="mailto:1005349393@qq.com" target="_blank" title="email">
                                <i class="iconfont icon-email"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </footer>
        <div id="back-top" class="back-top back-top--hidden js-hidden"><i class="iconfont icon-top"></i></div>
        <div class="jdc-side" style="display:block">
            <div class="mod_hang_qrcode jdc_feedback_qrcode">
                <div class="mod_hang_qrcode_btn"><i class="jdcfont">
                        <img style="width:30px;height:30px"
                             src="https://qiniucloud.qqdeveloper.com/wechat_icon.png"></i><span>扫码</span>
                </div>
                <div class="mod_hang_qrcode_show">
                    <div class="mod-qr-tips">
                        <font>扫码添加kert微信</font>
                    </div>
                    <div class="mod_hang_qrcode_show_bg">
                        <div id="canvas" style="height:123px;width:123px">
                            <img style="height:123px;width:123px"
                                 src="https://qiniucloud.qqdeveloper.com/Snipaste_2022-10-22_23-47-00.png">
                        </div>
                    </div>
                    <p>入微信群</p>
                </div>
            </div>
            <div class="mod_hang_appeal">
                <div class="mod_hang_appeal_btn"><i class="jdcfont">
                        <img style="width:30px;height:30px"
                             src="https://qiniucloud.qqdeveloper.com/shejiao_icon.png"></i><span>咨询反馈</span>
                </div>
                <div class="mod_hang_appeal_show">
                    <ul>
                        <ol><a href="https://weibo.com/u/7649983007" target="_blank">
                                <div class="icon_box">
                                    <i class="jdcfont">
                                        <img style="width:30px;height:30px"
                                             src="https://qiniucloud.qqdeveloper.com/sina_icon.png">
                                    </i>
                                </div>
                                <div class="text_box">
                                    <h5>微博（@kert2022）</h5>
                                    <p>关注我的微博，即时反馈软件问题</p>
                                </div>
                            </a>
                        </ol>
                        <ol id="entry">
                            <a href="https://www.zhihu.com/people/feng-zhong-lang-zi-8" target="_blank" class="f-cb">
                                <div class="icon_box">
                                    <i class="jdcfont">
                                        <img style="width:30px;height:30px"
                                             src="https://qiniucloud.qqdeveloper.com/zhihu_icon.png">
                                    </i>
                                </div>
                                <div class="text_box">
                                    <h5>知乎（@kert）</h5>
                                    <p>关注我的知乎，阅读更多干货</p>
                                </div>
                            </a>
                        </ol>
                        <ol>
                            <a href="#" target="_blank" class="f-cb">
                                <div class="icon_box"><i class="jdcfont">
                                        <img style="width:30px;height:30px"
                                             src="https://qiniucloud.qqdeveloper.com/twitter_icon.png"></i>
                                </div>
                                <div class="text_box">
                                    <h5>Twitter（@kert）</h5>
                                    <p>关注我的Twitter，一起交流讨论</p>
                                </div>
                            </a>
                        </ol>
                    </ul>
                </div>
            </div>
            <div class="mod_hang_qrcode jdc_hang_qrcode">
                <a class="mod_hang_qrcode_btn">
                    <i class="jdcfont">
                        <img style="width:30px;height:30px"
                             src="https://qiniucloud.qqdeveloper.com/gongzhonghao_icon.png">
                    </i>
                    <span>扫描二维码</span>
                </a>
                <div class="mod_hang_gh_show">
                    <div class="mod_hang_gh_show_bg"></div>
                    <p>软件共享包公众号</p>
                </div>
            </div>
            <div class="mod_hang_appeal">
                <div class="mod_hang_appeal_btn">
                    <a class="mod_hang_qrcode_btn" href="#"
                       target="_blank">
                        <i class="jdcfont">
                            <img style="width:30px;height:30px"
                                 src="https://qiniucloud.qqdeveloper.com/telegram_icon.png">
                        </i>
                        <span>Telegram群</span></a>
                </div>
                <div class="mod_hang_appeal_show">
                    <ul>
                        <ol>
                            <a href="#" target="_blank">
                                <div class="icon_box"><i class="jdcfont">
                                        <img style="width:30px;height:30px"
                                             src="https://qiniucloud.qqdeveloper.com/telegram.png"></i>
                                </div>
                                <div class="text_box">
                                    <h5>Telegram 群</h5>
                                    <p>加入Telegram群分享设计相关的干货，讨论技术、设计、产品、运营等内容。</p>
                                </div>
                            </a>
                        </ol>
                    </ul>
                </div>
            </div>
        </div>
</div>
<script src="/assest/js/common.js"></script>
<script src="/assest/js/page/post.js"></script>
</body>

</html>
@show
