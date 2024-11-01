<!doctype html>
<html lang="en-US">
    <head>
    <title>@yield('title')</title>

    <meta name="title" content="@yield('meta_title')">

    <meta name="keywords" content="@yield('meta_tag')">

    <meta name="description" content="@yield('meta_description')">
    <meta name="robots" content="index">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if ($setting->first()->favicon !== null)
        <link rel="shortcut icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('uploads/setting') }}/{{ $setting->first()->favicon }}" type="image/x-icon">
    @endif
    <!-- Meta Pixel Code -->
    @if($setting->first()->fbpixel != null)
        {!! $setting->first()->fbpixel !!}
    @endif

    <!-- googletag Code -->
    @if($setting->first()->googletag != null)
        {!! $setting->first()->googletag !!}
    @endif
    <!-- End googletag Code -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
    <script type="text/javascript">
        /* <![CDATA[ */
        window._wpemojiSettings = {
            "baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/72x72\/"
            , "ext": ".png"
            , "svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/15.0.3\/svg\/"
            , "svgExt": ".svg"
            , "source": {
                "concatemoji": "https:\/\/wp.fleexstudio.com\/seoc\/wp-includes\/js\/wp-emoji-release.min.js?ver=6.6.2"
            }
        };
        /*! This file is auto-generated */
        ! function(i, n) {
            var o, s, e;

            function c(e) {
                try {
                    var t = {
                        supportTests: e
                        , timestamp: (new Date).valueOf()
                    };
                    sessionStorage.setItem(o, JSON.stringify(t))
                } catch (e) {}
            }

            function p(e, t, n) {
                e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(t, 0, 0);
                var t = new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data)
                    , r = (e.clearRect(0, 0, e.canvas.width, e.canvas.height), e.fillText(n, 0, 0), new Uint32Array(e.getImageData(0, 0, e.canvas.width, e.canvas.height).data));
                return t.every(function(e, t) {
                    return e === r[t]
                })
            }

            function u(e, t, n) {
                switch (t) {
                    case "flag":
                        return n(e, "\ud83c\udff3\ufe0f\u200d\u26a7\ufe0f", "\ud83c\udff3\ufe0f\u200b\u26a7\ufe0f") ? !1 : !n(e, "\ud83c\uddfa\ud83c\uddf3", "\ud83c\uddfa\u200b\ud83c\uddf3") && !n(e, "\ud83c\udff4\udb40\udc67\udb40\udc62\udb40\udc65\udb40\udc6e\udb40\udc67\udb40\udc7f", "\ud83c\udff4\u200b\udb40\udc67\u200b\udb40\udc62\u200b\udb40\udc65\u200b\udb40\udc6e\u200b\udb40\udc67\u200b\udb40\udc7f");
                    case "emoji":
                        return !n(e, "\ud83d\udc26\u200d\u2b1b", "\ud83d\udc26\u200b\u2b1b")
                }
                return !1
            }

            function f(e, t, n) {
                var r = "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? new OffscreenCanvas(300, 150) : i.createElement("canvas")
                    , a = r.getContext("2d", {
                        willReadFrequently: !0
                    })
                    , o = (a.textBaseline = "top", a.font = "600 32px Arial", {});
                return e.forEach(function(e) {
                    o[e] = t(a, e, n)
                }), o
            }

            function t(e) {
                var t = i.createElement("script");
                t.src = e, t.defer = !0, i.head.appendChild(t)
            }
            "undefined" != typeof Promise && (o = "wpEmojiSettingsSupports", s = ["flag", "emoji"], n.supports = {
                everything: !0
                , everythingExceptFlag: !0
            }, e = new Promise(function(e) {
                i.addEventListener("DOMContentLoaded", e, {
                    once: !0
                })
            }), new Promise(function(t) {
                var n = function() {
                    try {
                        var e = JSON.parse(sessionStorage.getItem(o));
                        if ("object" == typeof e && "number" == typeof e.timestamp && (new Date).valueOf() < e.timestamp + 604800 && "object" == typeof e.supportTests) return e.supportTests
                    } catch (e) {}
                    return null
                }();
                if (!n) {
                    if ("undefined" != typeof Worker && "undefined" != typeof OffscreenCanvas && "undefined" != typeof URL && URL.createObjectURL && "undefined" != typeof Blob) try {
                        var e = "postMessage(" + f.toString() + "(" + [JSON.stringify(s), u.toString(), p.toString()].join(",") + "));"
                            , r = new Blob([e], {
                                type: "text/javascript"
                            })
                            , a = new Worker(URL.createObjectURL(r), {
                                name: "wpTestEmojiSupports"
                            });
                        return void(a.onmessage = function(e) {
                            c(n = e.data), a.terminate(), t(n)
                        })
                    } catch (e) {}
                    c(n = f(s, u, p))
                }
                t(n)
            }).then(function(e) {
                for (var t in e) n.supports[t] = e[t], n.supports.everything = n.supports.everything && n.supports[t], "flag" !== t && (n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && n.supports[t]);
                n.supports.everythingExceptFlag = n.supports.everythingExceptFlag && !n.supports.flag, n.DOMReady = !1, n.readyCallback = function() {
                    n.DOMReady = !0
                }
            }).then(function() {
                return e
            }).then(function() {
                var e;
                n.supports.everything || (n.readyCallback(), (e = n.source || {}).concatemoji ? t(e.concatemoji) : e.wpemoji && e.twemoji && (t(e.twemoji), t(e.wpemoji)))
            }))
        }((window, document), window._wpemojiSettings);
        /* ]]> */

    </script>
    <link rel='stylesheet' id='vlowlcarouselcss-css' href='{{ asset('frontend') }}/wp-content/plugins/vl-core/assets/css/plugins/owl.carousel.min531b.css?ver=2.3.4' type='text/css' media='all' />
    <link rel='stylesheet' id='vlcorecss-css' href='{{ asset('frontend') }}/wp-content/plugins/vl-core/assets/css/vl-core5152.css?ver=1.0' type='text/css' media='all' />
    <style id='wp-emoji-styles-inline-css' type='text/css'>
        img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 0.07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }

    </style>
    <style id='classic-theme-styles-inline-css' type='text/css'>
        /*! This file is auto-generated */
        .wp-block-button__link {
            color: #fff;
            background-color: #32373c;
            border-radius: 9999px;
            box-shadow: none;
            text-decoration: none;
            padding: calc(.667em + 2px) calc(1.333em + 2px);
            font-size: 1.125em
        }

        .wp-block-file__button {
            background: #32373c;
            color: #fff;
            text-decoration: none
        }

    </style>
    <style id='global-styles-inline-css' type='text/css'>
        :root {
            --wp--preset--aspect-ratio--square: 1;
            --wp--preset--aspect-ratio--4-3: 4/3;
            --wp--preset--aspect-ratio--3-4: 3/4;
            --wp--preset--aspect-ratio--3-2: 3/2;
            --wp--preset--aspect-ratio--2-3: 2/3;
            --wp--preset--aspect-ratio--16-9: 16/9;
            --wp--preset--aspect-ratio--9-16: 9/16;
            --wp--preset--color--black: #000000;
            --wp--preset--color--cyan-bluish-gray: #abb8c3;
            --wp--preset--color--white: #ffffff;
            --wp--preset--color--pale-pink: #f78da7;
            --wp--preset--color--vivid-red: #cf2e2e;
            --wp--preset--color--luminous-vivid-orange: #ff6900;
            --wp--preset--color--luminous-vivid-amber: #fcb900;
            --wp--preset--color--light-green-cyan: #7bdcb5;
            --wp--preset--color--vivid-green-cyan: #00d084;
            --wp--preset--color--pale-cyan-blue: #8ed1fc;
            --wp--preset--color--vivid-cyan-blue: #0693e3;
            --wp--preset--color--vivid-purple: #9b51e0;
            --wp--preset--gradient--vivid-cyan-blue-to-vivid-purple: linear-gradient(135deg, rgba(6, 147, 227, 1) 0%, rgb(155, 81, 224) 100%);
            --wp--preset--gradient--light-green-cyan-to-vivid-green-cyan: linear-gradient(135deg, rgb(122, 220, 180) 0%, rgb(0, 208, 130) 100%);
            --wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange: linear-gradient(135deg, rgba(252, 185, 0, 1) 0%, rgba(255, 105, 0, 1) 100%);
            --wp--preset--gradient--luminous-vivid-orange-to-vivid-red: linear-gradient(135deg, rgba(255, 105, 0, 1) 0%, rgb(207, 46, 46) 100%);
            --wp--preset--gradient--very-light-gray-to-cyan-bluish-gray: linear-gradient(135deg, rgb(238, 238, 238) 0%, rgb(169, 184, 195) 100%);
            --wp--preset--gradient--cool-to-warm-spectrum: linear-gradient(135deg, rgb(74, 234, 220) 0%, rgb(151, 120, 209) 20%, rgb(207, 42, 186) 40%, rgb(238, 44, 130) 60%, rgb(251, 105, 98) 80%, rgb(254, 248, 76) 100%);
            --wp--preset--gradient--blush-light-purple: linear-gradient(135deg, rgb(255, 206, 236) 0%, rgb(152, 150, 240) 100%);
            --wp--preset--gradient--blush-bordeaux: linear-gradient(135deg, rgb(254, 205, 165) 0%, rgb(254, 45, 45) 50%, rgb(107, 0, 62) 100%);
            --wp--preset--gradient--luminous-dusk: linear-gradient(135deg, rgb(255, 203, 112) 0%, rgb(199, 81, 192) 50%, rgb(65, 88, 208) 100%);
            --wp--preset--gradient--pale-ocean: linear-gradient(135deg, rgb(255, 245, 203) 0%, rgb(182, 227, 212) 50%, rgb(51, 167, 181) 100%);
            --wp--preset--gradient--electric-grass: linear-gradient(135deg, rgb(202, 248, 128) 0%, rgb(113, 206, 126) 100%);
            --wp--preset--gradient--midnight: linear-gradient(135deg, rgb(2, 3, 129) 0%, rgb(40, 116, 252) 100%);
            --wp--preset--font-size--small: 13px;
            --wp--preset--font-size--medium: 20px;
            --wp--preset--font-size--large: 36px;
            --wp--preset--font-size--x-large: 42px;
            --wp--preset--spacing--20: 0.44rem;
            --wp--preset--spacing--30: 0.67rem;
            --wp--preset--spacing--40: 1rem;
            --wp--preset--spacing--50: 1.5rem;
            --wp--preset--spacing--60: 2.25rem;
            --wp--preset--spacing--70: 3.38rem;
            --wp--preset--spacing--80: 5.06rem;
            --wp--preset--shadow--natural: 6px 6px 9px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--deep: 12px 12px 50px rgba(0, 0, 0, 0.4);
            --wp--preset--shadow--sharp: 6px 6px 0px rgba(0, 0, 0, 0.2);
            --wp--preset--shadow--outlined: 6px 6px 0px -3px rgba(255, 255, 255, 1), 6px 6px rgba(0, 0, 0, 1);
            --wp--preset--shadow--crisp: 6px 6px 0px rgba(0, 0, 0, 1);
        }

        :where(.is-layout-flex) {
            gap: 0.5em;
        }

        :where(.is-layout-grid) {
            gap: 0.5em;
        }

        body .is-layout-flex {
            display: flex;
        }

        .is-layout-flex {
            flex-wrap: wrap;
            align-items: center;
        }

        .is-layout-flex> :is(*, div) {
            margin: 0;
        }

        body .is-layout-grid {
            display: grid;
        }

        .is-layout-grid> :is(*, div) {
            margin: 0;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        .has-black-color {
            color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-color {
            color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-color {
            color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-color {
            color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-color {
            color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-color {
            color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-color {
            color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-color {
            color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-color {
            color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-color {
            color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-color {
            color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-color {
            color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-background-color {
            background-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-background-color {
            background-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-background-color {
            background-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-background-color {
            background-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-background-color {
            background-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-background-color {
            background-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-background-color {
            background-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-background-color {
            background-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-background-color {
            background-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-background-color {
            background-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-background-color {
            background-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-black-border-color {
            border-color: var(--wp--preset--color--black) !important;
        }

        .has-cyan-bluish-gray-border-color {
            border-color: var(--wp--preset--color--cyan-bluish-gray) !important;
        }

        .has-white-border-color {
            border-color: var(--wp--preset--color--white) !important;
        }

        .has-pale-pink-border-color {
            border-color: var(--wp--preset--color--pale-pink) !important;
        }

        .has-vivid-red-border-color {
            border-color: var(--wp--preset--color--vivid-red) !important;
        }

        .has-luminous-vivid-orange-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-amber-border-color {
            border-color: var(--wp--preset--color--luminous-vivid-amber) !important;
        }

        .has-light-green-cyan-border-color {
            border-color: var(--wp--preset--color--light-green-cyan) !important;
        }

        .has-vivid-green-cyan-border-color {
            border-color: var(--wp--preset--color--vivid-green-cyan) !important;
        }

        .has-pale-cyan-blue-border-color {
            border-color: var(--wp--preset--color--pale-cyan-blue) !important;
        }

        .has-vivid-cyan-blue-border-color {
            border-color: var(--wp--preset--color--vivid-cyan-blue) !important;
        }

        .has-vivid-purple-border-color {
            border-color: var(--wp--preset--color--vivid-purple) !important;
        }

        .has-vivid-cyan-blue-to-vivid-purple-gradient-background {
            background: var(--wp--preset--gradient--vivid-cyan-blue-to-vivid-purple) !important;
        }

        .has-light-green-cyan-to-vivid-green-cyan-gradient-background {
            background: var(--wp--preset--gradient--light-green-cyan-to-vivid-green-cyan) !important;
        }

        .has-luminous-vivid-amber-to-luminous-vivid-orange-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-amber-to-luminous-vivid-orange) !important;
        }

        .has-luminous-vivid-orange-to-vivid-red-gradient-background {
            background: var(--wp--preset--gradient--luminous-vivid-orange-to-vivid-red) !important;
        }

        .has-very-light-gray-to-cyan-bluish-gray-gradient-background {
            background: var(--wp--preset--gradient--very-light-gray-to-cyan-bluish-gray) !important;
        }

        .has-cool-to-warm-spectrum-gradient-background {
            background: var(--wp--preset--gradient--cool-to-warm-spectrum) !important;
        }

        .has-blush-light-purple-gradient-background {
            background: var(--wp--preset--gradient--blush-light-purple) !important;
        }

        .has-blush-bordeaux-gradient-background {
            background: var(--wp--preset--gradient--blush-bordeaux) !important;
        }

        .has-luminous-dusk-gradient-background {
            background: var(--wp--preset--gradient--luminous-dusk) !important;
        }

        .has-pale-ocean-gradient-background {
            background: var(--wp--preset--gradient--pale-ocean) !important;
        }

        .has-electric-grass-gradient-background {
            background: var(--wp--preset--gradient--electric-grass) !important;
        }

        .has-midnight-gradient-background {
            background: var(--wp--preset--gradient--midnight) !important;
        }

        .has-small-font-size {
            font-size: var(--wp--preset--font-size--small) !important;
        }

        .has-medium-font-size {
            font-size: var(--wp--preset--font-size--medium) !important;
        }

        .has-large-font-size {
            font-size: var(--wp--preset--font-size--large) !important;
        }

        .has-x-large-font-size {
            font-size: var(--wp--preset--font-size--x-large) !important;
        }

        :where(.wp-block-post-template.is-layout-flex) {
            gap: 1.25em;
        }

        :where(.wp-block-post-template.is-layout-grid) {
            gap: 1.25em;
        }

        :where(.wp-block-columns.is-layout-flex) {
            gap: 2em;
        }

        :where(.wp-block-columns.is-layout-grid) {
            gap: 2em;
        }

        :root :where(.wp-block-pullquote) {
            font-size: 1.5em;
            line-height: 1.6;
        }

    </style>
    <link rel='stylesheet' id='contact-form-7-css' href='{{ asset('frontend') }}/wp-content/plugins/contact-form-7/includes/css/stylese2db.css?ver=5.9.8' type='text/css' media='all' />
    <link rel='stylesheet' id='seoc-custom-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/seoc-custom109c.html?ver=6.6.2' type='text/css' media='all' />
    <style id='seoc-custom-inline-css' type='text/css'>
        html:root {
            --vl-theme-1: #4E2FDA;
            --vl-theme-2: #090B0E;
            --vl-theme-3: #3D4C5E;
            --vl-theme-4: #E2E0F2;
            --vl-theme-5: #ffffff;
        }

    </style>
    <link rel='stylesheet' id='seoc-fonts-css' href='https://fonts.googleapis.com/css2?family=Figtree%3Aital%2Cwght%400%2C400%3B0%2C500%3B0%2C600%3B0%2C700%3B1%2C400&amp;display=swap&amp;ver=1729700158' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/bootstrap109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='meanmenu-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/meanmenu109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-bundle-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/swiper-bundle109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/magnific-popup109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='slick-slider-css-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/slick-slider109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='nice-select-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/nice-select109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-pro-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/font-awesome-pro109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-fancybox-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/spacing109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='seoc-core-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/seoc-coredce4.css?ver=1729700158' type='text/css' media='all' />
    <link rel='stylesheet' id='seoc-unit-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/seoc-unitdce4.css?ver=1729700158' type='text/css' media='all' />
    <link rel='stylesheet' id='seoc-comon-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/seoc-comondce4.css?ver=1729700158' type='text/css' media='all' />
    <link rel='stylesheet' id='seoc-theme-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/assets/css/seoc-themedce4.css?ver=1729700158' type='text/css' media='all' />
    <link rel='stylesheet' id='seoc-style-css' href='{{ asset('frontend') }}/wp-content/themes/seoc/style109c.css?ver=6.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/frontend.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='swiper-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/lib/swiper/v8/css/swiper.min94a4.css?ver=8.4.5' type='text/css' media='all' />
    <link rel='stylesheet' id='e-swiper-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/conditionals/e-swiper.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-8-css' href='{{ asset('frontend') }}/wp-content/uploads/elementor/css/post-8f86b.css?ver=1729177950' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-heading-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/widget-heading.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-image-carousel-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/widget-image-carousel.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-image-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/widget-image.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-text-editor-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/widget-text-editor.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='widget-divider-css' href='{{ asset('frontend') }}/wp-content/plugins/elementor/assets/css/widget-divider.min52dd.css?ver=3.24.7' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-31-css' href='{{ asset('frontend') }}/wp-content/uploads/elementor/css/post-31d9e6.css?ver=1729258405' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Figtree%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;display=swap&amp;ver=6.6.2' type='text/css' media='all' />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/js/jquery/jquery.minf43b.js?ver=3.7.1" id="jquery-core-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/js/jquery/jquery-migrate.min5589.js?ver=3.4.1" id="jquery-migrate-js"></script>

    <style>
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload),
        .e-con.e-parent:nth-of-type(n+4):not(.e-lazyloaded):not(.e-no-lazyload) * {
            background-image: none !important;
        }

        @media screen and (max-height: 1024px) {

            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+3):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }

        @media screen and (max-height: 640px) {

            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload),
            .e-con.e-parent:nth-of-type(n+2):not(.e-lazyloaded):not(.e-no-lazyload) * {
                background-image: none !important;
            }
        }

    </style>
    <meta name="msapplication-TileImage" content="https://wp.fleexstudio.com/seoc/{{ asset('frontend') }}/wp-content/uploads/2024/08/cropped-preloader3-270x270.png" />
    <style id="kirki-inline-styles">
        .main-menu ul li a,
        .main-menu ul li .submenu li>a,
        .main-menu ul li.has-dropdown>a::after {
            color: #;
        }

        .main-menu ul li a:hover,
        .main-menu ul li:hover>a::after,
        .main-menu ul li .submenu li:hover>a::after,
        .main-menu ul li .submenu li>a:hover,
        .main-menu ul li:hover>a,
        .main-menu ul li .submenu li:hover>a {
            color: #;
        }

        .theme-btn {
            color: #;
        }

        .theme-btn:hover {
            color: #;
        }

        .breadcrumb__title {
            color: #000000;
        }

        .breadcrumb__list>span {
            color: #000000;
        }

        .breadcrumb__overlay:after {
            background-image: url("{{ asset('frontend') }}/wp-content/uploads/2024/08/Mask-group.png");
        }

        .postbox__title a {
            color: #;
        }

        .postbox__text p {
            color: #;
        }

        .postbox__meta a,
        .postbox__meta span {
            color: #;
        }

        .postbox__meta span i {
            color: #;
        }

        .postbox__read-more a.theme-btn.theme-btn-1 {
            color: #;
        }

        .postbox__read-more a.theme-btn.theme-btn-1:hover {
            color: #;
        }

        .postbox__thumb .play-btn i {
            color: #;
        }

        .sidebar__widget-title {
            color: #;
        }

        .sidebar__widget ul li a {
            color: #;
        }

        .sidebar__widget ul li a:hover {
            color: #;
        }

        .postbox__thumb .play-btn:hover i {
            color: #;
        }

        div.basic-pagination ul li a,
        div.basic-pagination ul li span {
            color: #;
        }

        div.basic-pagination ul li a:hover,
        div.basic-pagination ul li a.current,
        div.basic-pagination ul li span:hover,
        div.basic-pagination ul li span.current {
            color: #;
        }

        .footer__widget-title {
            color: #;
        }

        .footer__widget p,
        .footer__copyright p {
            color: #;
        }

        .footer-link-style-1 .footer__widget ul li.menu-item a,
        ul#menu-copyright-menu li a {
            color: #;
        }

        .footer-link-style-1 .footer__widget ul li.menu-item a:hover,
        ul#menu-copyright-menu li a:hover {
            color: #;
        }

        .footer__area .theme_social li a {
            color: #;
        }

        .footer__area .theme_social li a:hover {
            color: #;
        }

    </style>
</head>

<body class="home page-template page-template-elementor_header_footer page page-id-31 wp-embed-responsive no-sidebar elementor-default elementor-template-full-width elementor-kit-8 elementor-page elementor-page-31">



    <progress class="progress-line" max="100" value="0"></progress>

    <style>
        progress.progress-line {
            position: fixed;
            top: 0;
            left: 0;
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 4px;
            border: none;
            background: red;
            z-index: 999;
        }

        progress.progress-line::-webkit-progress-bar {
            background-color: white;
        }

        progress.progress-line::-webkit-progress-value {
            background-color: #6A5CFF;
        }

    </style>




    <!-- pre loader area start -->
    {{-- <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/img/favicon.png" alt="logo" alt=""></div>
        </div>
    </div> --}}


    <!-- pre loader area end -->


    <!-- back to top start -->
    <div class="backtotop-wrapper" id="bttp">
        <a href="#" class="d-flex flex-column align-items-center justify-content-center">
            <div class="backtotop-text">Scroll</div>
            <div class="tp-backtotop-line">
                <div id="scroll-progress" class="tp-backtotop-line-progress"></div>
            </div>
        </a>
    </div>
    <!-- back to top end -->


    <!-- header start -->

    <!-- header area start -->
    <header>
        <div class="header__area header-1 _absolute">
            <div class="header__bottom" id="header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="logo">

                                <a class="standard-logo" href="{{url('/')}}">
                                    @if ($setting->first()->white_logo != null)
                                        <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="logo" />
                                    @endif
                                </a>
                            </div>
                        </div>
                        <div class="col-xxl-8 col-xl-8 col-lg-8 d-none d-lg-block">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    <ul id="menu-main-menu" class="">
                                        <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79 nav-item"><a title="Home" href="{{url('/')}}" class="nav-links">Home</a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-6">
                            <div class="header__bottom-right d-flex justify-content-end align-items-center">

                                <div class="header-action-btn d-none d-xl-block">
                                    <a class="theme-btn theme-btn-1" style="border-color:#" href="pricing-plan/index.html"><span class="btn-title">Get Started</span> <span class="button-icon">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 14.3333L14.3333 6M14.3333 6H6.83333M14.3333 6V13.5" stroke="#090B0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span></a>
                                </div>

                                <div class="header__hamburger ml-50 d-xl-none">
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#offcanvasmodal" class="hamurger-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end -->


    <!-- offcanvas area start -->
    <div class="offcanvas__area">
        <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="offcanvas__wrapper">
                        <div class="offcanvas__content">
                            <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                                <div class="offcanvas__logo logo">
                                    <a href="index.html">
                                        <img src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/img/logo/logo.png" alt="logo">
                                    </a>
                                </div>

                                <div class="offcanvas__close">
                                    <button class="offcanvas__close-btn" data-bs-toggle="modal" data-bs-target="#offcanvasmodal">
                                        <i class="fal fa-times"></i>
                                    </button>
                                </div>

                            </div>


                            <div class="mobile-menu fix"></div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas area end -->
    <div class="body-overlay"></div>
    <!-- offcanvas area end -->
    <!-- header end -->

    <!-- wrapper-box start -->
    <div class="search-wrapper p-relative transition-3 d-none">
        <div class="search-form transition-3">
            <form method="get" action="https://wp.fleexstudio.com/seoc/">
                <input type="search" name="s" value="" placeholder="Enter Your Keyword">
                <button type="submit" class="search-btn"><i class="far fa-search"></i></button>
            </form>
            <a href="javascript:void(0);" class="search-close"><i class="far fa-times"></i></a>
        </div>
    </div>

    @yield('content')


    <!-- footer area start -->

    <footer>


        <div class="cta-section-area pt-80 pb-80">

            <img src="{{ asset('frontend') }}/wp-content/uploads/2024/08/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2">
            <img src="{{ asset('frontend') }}/wp-content/uploads/2024/08/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 m-auto">
                        <div class="cta-header-area text-center heading2">
                            <h2 class="text-anime-style-3">Ready to Take Your SEO to The Next Level</h2>
                            <p data-aos="fade-up" data-aos-duration="1000">Effective SEO strategies not only elevate a websites visibility but also drive targeted traffic, enhance user experience</p>
                            <div class="btn-area text-center" data-aos="fade-up" data-aos-duration="1200">
                                <a href="contact-us/index.html" class="cta-btn1"><span class="btn-title">Free Consultation</span> <span class="button-icon">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 14.3333L14.3333 6M14.3333 6H6.83333M14.3333 6V13.5" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="footer__area footer-1  bg-center-center" style="background-image:url(); background-color:">

            <div class="footer__top pt-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-7">
                            <div id="vl_info_widget-2" class="footer__widget footer-col-1 mb-50 widget_vl_info_widget">
                                <a class="standard-logo" href="{{url('/')}}">
                                    @if ($setting->first()->white_logo != null)
                                        <img src="{{ asset('uploads/setting') }}/{{ $setting->first()->white_logo }}" alt="logo" />
                                    @endif
                                </a>

                                <div class="footer-info-widget">
                                    @if ($setting->first()->about != null)
                                        <p>{{ $setting->first()->about }} </p>
                                    @endif

                                    <div class="social-links">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>

                                        <a href="#"><i class="fab fa-twitter"></i></a>

                                        <a href="#"><i class="fab fa-instagram"></i></a>



                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>

                                        <p></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-5">
                            <div id="nav_menu-2" class="footer__widget footer-col-2 mb-50 widget_nav_menu">
                                <h3 class="footer__widget-title">About Llinks</h3>
                                <div class="menu-about-link-container">
                                    <ul id="menu-about-link" class="menu">
                                        <li id="menu-item-98" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-98"><a href="case-studies/index.html">Case Studies</a></li>
                                        <li id="menu-item-95" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-95"><a href="pricing-plan/index.html">Pricing Plans</a></li>
                                        <li id="menu-item-96" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-96"><a href="testimonial/index.html">Testimonials</a></li>
                                        <li id="menu-item-99" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-99"><a href="contact-us/index.html">Contact Us</a></li>
                                        <li id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97"><a href="faq/index.html">Faq</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-5">
                            <div id="vl_contact_info_widget-2" class="footer__widget footer-col-3 mb-50 widget_vl_contact_info_widget">
                                <h3 class="footer__widget-title">Get in touch</h3>
                                <ul class="footer-info">

                                    <li><span><i class="far fa-map-marker-alt"></i>{{ $setting->first()->address }}</span></li>

                                    <li><span><i class="far fa-envelope-open"></i><a href="mailto:{{ $setting->first()->email }}">{{ $setting->first()->email }}</a></span></li>

                                    <li><span><i class="far fa-phone"></i> <a href="tel:{{ $setting->first()->phone }}" class="title">{{ $setting->first()->phone }}</a></span></li>



                                </ul>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-7">
                            <div id="vl_sidebar_form_widget-2" class="footer__widget footer-col-4 mb-50 widget_vl_sidebar_form_widget">
                                <h3 class="footer__widget-title">Subsribe Now</h3>
                                <div class="sidebar_form_widget">
                                    <div class="tp_sidebar_form sidebar__contact">

                                        <div class="wpcf7 no-js" id="wpcf7-f30-o2" lang="en-US" dir="ltr">
                                            <div class="screen-reader-response">
                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                <ul></ul>
                                            </div>
                                            <form action="https://wp.fleexstudio.com/seoc/#wpcf7-f30-o2" method="post" class="wpcf7-form init" aria-label="Contact form" novalidate="novalidate" data-status="init">
                                                <div style="display: none;">
                                                    <input type="hidden" name="_wpcf7" value="30" />
                                                    <input type="hidden" name="_wpcf7_version" value="5.9.8" />
                                                    <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f30-o2" />
                                                    <input type="hidden" name="_wpcf7_container_post" value="0" />
                                                    <input type="hidden" name="_wpcf7_posted_data_hash" value="" />
                                                </div>
                                                <p class="subscribe-form">
                                                    <span class="wpcf7-form-control-wrap" data-name="your-email"><input size="40" maxlength="400" class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email" autocomplete="email" aria-required="true" aria-invalid="false" placeholder="Email Address" value="" type="email" name="your-email" /></span> </label>
                                                    <button class="subscribe-form-button"><input class="wpcf7-form-control wpcf7-submit has-spinner" type="submit" value="Subscribe" /> <i class="fa-solid fa-arrow-right"></i></button>
                                                </p>
                                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="footer__bottom-inner">
                        <div class="row align-items-center">

                            <div class="col-md-6">
                                <div class="footer__copyright copyright-with-menu ">
                                    <p>© {{ $setting->first()->footer }}</p>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="copyright-menu text-right">
                                    <ul id="menu-footer-menu" class="m-0">
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-93" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-93 nav-item"><a title="Terms &amp; Conditions" href="#" class="nav-links">Terms &#038; Conditions</a></li>
                                        <li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-94" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-94 nav-item"><a title="Privacy Policy" href="#" class="nav-links">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script type='text/javascript'>
        const lazyloadRunObserver = () => {
            const lazyloadBackgrounds = document.querySelectorAll(`.e-con.e-parent:not(.e-lazyloaded)`);
            const lazyloadBackgroundObserver = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        let lazyloadBackground = entry.target;
                        if (lazyloadBackground) {
                            lazyloadBackground.classList.add('e-lazyloaded');
                        }
                        lazyloadBackgroundObserver.unobserve(entry.target);
                    }
                });
            }, {
                rootMargin: '200px 0px 200px 0px'
            });
            lazyloadBackgrounds.forEach((lazyloadBackground) => {
                lazyloadBackgroundObserver.observe(lazyloadBackground);
            });
        };
        const events = [
            'DOMContentLoaded'
            , 'elementor/lazyload/observe'
        , ];
        events.forEach((event) => {
            document.addEventListener(event, lazyloadRunObserver);
        });

    </script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/js/dist/hooks.min2757.js?ver=2810c76e705dd1a53b18" id="wp-hooks-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/js/dist/i18n.minc33c.js?ver=5e580eb46a90c2b997e6" id="wp-i18n-js"></script>
    <script type="text/javascript" id="wp-i18n-js-after">
        /* <![CDATA[ */
        wp.i18n.setLocaleData({
            'text direction\u0004ltr': ['ltr']
        });
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/contact-form-7/includes/swv/js/indexe2db.js?ver=5.9.8" id="swv-js"></script>
    <script type="text/javascript" id="contact-form-7-js-extra">
        /* <![CDATA[ */
        var wpcf7 = {
            "api": {
                "root": "https:\/\/wp.fleexstudio.com\/seoc\/wp-json\/"
                , "namespace": "contact-form-7\/v1"
            }
            , "cached": "1"
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/contact-form-7/includes/js/indexe2db.js?ver=5.9.8" id="contact-form-7-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/bootstrap-bundle109c.js?ver=6.6.2" id="bootstrap-bundle-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/waypoints109c.js?ver=6.6.2" id="waypoints-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/meanmenu109c.js?ver=6.6.2" id="meanmenu-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/swiper-bundle109c.js?ver=6.6.2" id="swiper-bundle-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/magnific-popup109c.js?ver=6.6.2" id="magnific-popup-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/nice-select109c.js?ver=6.6.2" id="jquery-nice-select-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/slick-slider109c.js?ver=6.6.2" id="slick-slider-js-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/gsap.min109c.js?ver=6.6.2" id="gsap-js-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/scrolltrigger.min109c.js?ver=6.6.2" id="gsap-st-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/spittype.min109c.js?ver=6.6.2" id="gsap-text-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/spittype.min109c.js?ver=6.6.2" id="gsap-smothscroller-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/gsap-smothscroller109c.js?ver=6.6.2" id="gsap-motion-path-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/scriptsdce4.js?ver=1729700158" id="seoc-gsap-script-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/themes/seoc/assets/js/maindce4.js?ver=1729700158" id="seoc-main-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/vl-core/assets/js/hello-world109c.js?ver=6.6.2" id="vlcore-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/vl-core/assets/js/vl-casestudy109c.js?ver=6.6.2" id="vlcasestudy-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/vl-core/assets/js/plugins/owl.carousel.min109c.js?ver=6.6.2" id="vlowlcarousel-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/vl-core/assets/js/vl-testimonial109c.js?ver=6.6.2" id="vltestimonial-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/elementor/assets/js/webpack.runtime.min52dd.js?ver=3.24.7" id="elementor-webpack-runtime-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/elementor/assets/js/frontend-modules.min52dd.js?ver=3.24.7" id="elementor-frontend-modules-js"></script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/js/jquery/ui/core.minb37e.js?ver=1.13.3" id="jquery-ui-core-js"></script>
    <script type="text/javascript" id="elementor-frontend-js-before">
        /* <![CDATA[ */
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false
                , "wpPreview": false
                , "isScriptDebug": false
            }
            , "i18n": {
                "shareOnFacebook": "Share on Facebook"
                , "shareOnTwitter": "Share on Twitter"
                , "pinIt": "Pin it"
                , "download": "Download"
                , "downloadImage": "Download image"
                , "fullscreen": "Fullscreen"
                , "zoom": "Zoom"
                , "share": "Share"
                , "playVideo": "Play Video"
                , "previous": "Previous"
                , "next": "Next"
                , "close": "Close"
                , "a11yCarouselWrapperAriaLabel": "Carousel | Horizontal scrolling: Arrow Left & Right"
                , "a11yCarouselPrevSlideMessage": "Previous slide"
                , "a11yCarouselNextSlideMessage": "Next slide"
                , "a11yCarouselFirstSlideMessage": "This is the first slide"
                , "a11yCarouselLastSlideMessage": "This is the last slide"
                , "a11yCarouselPaginationBulletMessage": "Go to slide"
            }
            , "is_rtl": false
            , "breakpoints": {
                "xs": 0
                , "sm": 480
                , "md": 768
                , "lg": 1025
                , "xl": 1440
                , "xxl": 1600
            }
            , "responsive": {
                "breakpoints": {
                    "mobile": {
                        "label": "Mobile Portrait"
                        , "value": 767
                        , "default_value": 767
                        , "direction": "max"
                        , "is_enabled": true
                    }
                    , "mobile_extra": {
                        "label": "Mobile Landscape"
                        , "value": 880
                        , "default_value": 880
                        , "direction": "max"
                        , "is_enabled": false
                    }
                    , "tablet": {
                        "label": "Tablet Portrait"
                        , "value": 1024
                        , "default_value": 1024
                        , "direction": "max"
                        , "is_enabled": true
                    }
                    , "tablet_extra": {
                        "label": "Tablet Landscape"
                        , "value": 1200
                        , "default_value": 1200
                        , "direction": "max"
                        , "is_enabled": false
                    }
                    , "laptop": {
                        "label": "Laptop"
                        , "value": 1366
                        , "default_value": 1366
                        , "direction": "max"
                        , "is_enabled": false
                    }
                    , "widescreen": {
                        "label": "Widescreen"
                        , "value": 2400
                        , "default_value": 2400
                        , "direction": "min"
                        , "is_enabled": false
                    }
                }
                , "hasCustomBreakpoints": false
            }
            , "version": "3.24.7"
            , "is_static": false
            , "experimentalFeatures": {
                "e_font_icon_svg": true
                , "additional_custom_breakpoints": true
                , "container": true
                , "container_grid": true
                , "e_swiper_latest": true
                , "e_nested_atomic_repeaters": true
                , "e_optimized_control_loading": true
                , "e_onboarding": true
                , "home_screen": true
                , "ai-layout": true
                , "nested-elements": true
                , "editor_v2": true
                , "e_element_cache": true
                , "link-in-bio": true
                , "floating-buttons": true
            }
            , "urls": {
                "assets": "https:\/\/wp.fleexstudio.com\/seoc\/wp-content\/plugins\/elementor\/assets\/"
                , "ajaxurl": "https:\/\/wp.fleexstudio.com\/seoc\/wp-admin\/admin-ajax.php"
                , "uploadUrl": "https:\/\/wp.fleexstudio.com\/seoc\/wp-content\/uploads"
            }
            , "nonces": {
                "floatingButtonsClickTracking": "05a292e2f1"
            }
            , "swiperClass": "swiper"
            , "settings": {
                "page": []
                , "editorPreferences": []
            }
            , "kit": {
                "active_breakpoints": ["viewport_mobile", "viewport_tablet"]
                , "global_image_lightbox": "yes"
                , "lightbox_enable_counter": "yes"
                , "lightbox_enable_fullscreen": "yes"
                , "lightbox_enable_zoom": "yes"
                , "lightbox_enable_share": "yes"
                , "lightbox_title_src": "title"
                , "lightbox_description_src": "description"
            }
            , "post": {
                "id": 31
                , "title": "SEOC"
                , "excerpt": ""
                , "featuredImage": false
            }
        };
        /* ]]> */

    </script>
    <script type="text/javascript" src="{{ asset('frontend') }}/wp-content/plugins/elementor/assets/js/frontend.min52dd.js?ver=3.24.7" id="elementor-frontend-js"></script>

</body>
</html>
