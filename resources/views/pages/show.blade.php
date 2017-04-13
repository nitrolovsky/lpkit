<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/pagesshow.css">
        <title>
            {{ $page->title }}
        </title>
        <style>
            .bg-img {
                background: url("/files/{{ $page->id }}/{{ $page->background_image }}") no-repeat;
                background-size: cover;
            }
            .bg-overlay {
                background-color: rgba(0, 0, 0, 0.5);
                color: white;
                height: 100%;
                min-height: 100%;
            }
        </style>
        @if ($page->case_enabled or $page->comments_enabled)
            <style>
                body {
                    background-color: white !important;
                }
            </style>
        @else
            <style>
                body {
                    background-color: black !important;
                }
            </style>
        @endif
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-97200678-1', 'auto');
            ga('send', 'pageview');
        </script>
        @php echo html_entity_decode($page->google); @endphp
    </head>
    <body>
        <div class="bg-img">
            <div class="bg-overlay">
                <div class="container font">
                    <div class="row pt-4">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-xl-left text-lg-left text-md-left text-sm-center text-center">
                            <span class="h1 text-uppercase font">
                                 {{ $page->company_name }}
                            </span><br>
                            <span class="descriptor">{{ $page->description }}</span>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 text-xl-right text-lg-right text-md-right text-sm-center text-center">
                            <div class="hidden-md-up">
                                <br>
                            </div>
                            <a href="tel:{{ $page->phone }}" class="text-info a">{{ $page->phone }}</a><br>
                            <a href="mailto:{{ $page->email }}" class="text-info a">{{ $page->email }}</a><br>
                            {{ $page->address }}
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 offset-xl-1">
                            <h1 class="text-center my-0 weight-700">
                                {{ $page->offer }}
                            </h1>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-12 offset-xl-1">
                            <div class="my-0 text-center">
                                <p class="font bullets">
                                    @php echo html_entity_decode($page->bullets); @endphp
                                </p>
                            </div>
                        </div>
                    </div>
                    @if ($page->case_enabled or $page->comments_enabled)
                        <div class="row py-5">
                    @else
                        <div class="row pt-5">
                    @endif
                        <div class="col-xl-8 col-lg-8">
                            <div class="embed-responsive embed-responsive-16by9 sw" id="video">
                                <iframe class="embed-responsive-item" src="{{ $page->video }}?rel=0&showinfo=0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 offset-xl-0 offset-lg-0 offset-md-3">
                            <div class="container">
                                <div class="hidden-lg-up">
                                    <br>
                                </div>
                                <h3 class="px-2 pb-3 text-center weight-700">
                                    {{ $page->lead_magnet }}
                                </h3>
                                <form action="/leads" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="page_id" value="{{ $page->id }}">
                                    @if ($page->name_form_enabled)
                                        <div class="form-group">
                                            <input type="text" class="font black sw btn-circle form-control" id="name" placeholder="Имя" name="name">
                                        </div>
                                    @endif
                                    @if ($page->email_form_enabled)
                                        <div class="form-group">
                                            <input type="text" class="font black sw btn-circle form-control" id="email" placeholder="Email" name="email">
                                        </div>
                                    @endif
                                    @if ($page->phone_form_enabled)
                                        <div class="form-group">
                                            <input type="text" class="font black sw btn-circle form-control" id="phone" placeholder="Телефон" name="phone">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="">
                                            <button type="submit" class="font sw btn-circle btn btn-primary btn-block" role="button" @php echo html_entity_decode($page->yandex_target_button); @endphp >{{ $page->call_to_action }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @if (empty($page->case_enabled) and empty($page->comments_enabled))
                        <div class="row pt-5 pb-4">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 col-12 text-xl-left text-lg-left text-md-left text-sm-center text-center">
                                 {{ $page->legal_information }}
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 col-12 text-xl-right text-lg-right text-md-right text-sm-center text-center">
                                <div class="hidden-md-up">
                                    <br>
                                </div>
                                <a href="tel:{{ $page->phone }}" class="text-info a">{{ $page->phone }}</a><br>
                                <a href="mailto:{{ $page->email }}" class="text-info a">{{ $page->email }}</a><br>
                                {{ $page->address }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if ($page->case_enabled)
            <div class="container py-5">
                @if ($page->case_title)
                    <div class="h1 pb-5 text-center font">
                        {{ $page->case_title }}
                    </div>
                @endif
                @if ($page->case_video_1 or $page->case_text_1 or $page->case_video_2 or $page->case_text_2 or $page->case_video_3 or $page->case_text_3)
                    <div class="row">
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_1)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_1">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_1 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_1)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_1); @endphp
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_2)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_2">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_2 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_2)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_2); @endphp
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_3)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_3">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_3 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_3)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_3); @endphp
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($page->case_video_4 or $page->case_text_4 or $page->case_video_5 or $page->case_text_5 or $page->case_video_6 or $page->case_text_6)
                    <div class="row pt-5">
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_4)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_4">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_4 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_4)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_4); @endphp
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_5)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_5">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_5 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_5)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_5); @endphp
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_6)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_6">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_6 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_6)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_6); @endphp
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                @if ($page->case_video_7 or $page->case_text_7 or $page->case_video_8 or $page->case_text_8 or $page->case_video_9 or $page->case_text_9)
                    <div class="row pt-5">
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_7)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_7">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_7 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_7)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_7); @endphp
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_8)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_8">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_8 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_8)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_8); @endphp
                                </div>
                            @endif
                        </div>
                        <div class="col-xl-4 col-lg-4">
                            @if ($page->case_video_9)
                                <div class="embed-responsive embed-responsive-16by9 sw" id="case_video_9">
                                    <iframe class="embed-responsive-item" src="{{ $page->case_video_9 }}?rel=0&showinfo=0" allowfullscreen></iframe>
                                </div>
                            @endif
                            @if ($page->case_text_9)
                                <div class="font py-4">
                                    @php echo html_entity_decode($page->case_text_9); @endphp
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endif
        @if ($page->comments_enabled)
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12 col-xs-12 offset-xl-1">
                        <div class="pt-3" id="mc-container"></div>
                        <br>
                        <script type="text/javascript">
                            cackle_widget = window.cackle_widget || [];
                            cackle_widget.push({widget: 'Comment', id: 49982});
                            (function() {
                                var mc = document.createElement('script');
                                mc.type = 'text/javascript';
                                mc.async = true;
                                mc.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cackle.me/widget.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(mc, s.nextSibling);
                            })();
                        </script>
                    </div>
                </div>
            </div>
        @endif
        @if ($page->case_enabled or $page->comments_enabled)
            <div class="container py-5 font">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 col-12 text-xl-left text-lg-left text-md-left text-sm-center text-center">
                         {{ $page->legal_information }}
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-6 col-12 text-xl-right text-lg-right text-md-right text-sm-center text-center">
                        <div class="hidden-md-up">
                            <br>
                        </div>
                        <a href="tel:{{ $page->phone }}" class="a">{{ $page->phone }}</a><br>
                        <a href="mailto:{{ $page->email }}" class="a">{{ $page->email }}</a><br>
                        {{ $page->address }}
                    </div>
                </div>
            </div>
        @endif
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter44126189 = new Ya.Metrika({
                            id:44126189,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true,
                            webvisor:true,
                            trackHash:true,
                            ecommerce:"dataLayer"
                        });
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/44126189" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->
        @php echo html_entity_decode($page->yandex); @endphp
    </body>
</html>
