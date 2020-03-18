<html lang="en" class="no-js k-webkit k-webkit80">
<head>
    <title>Avengers: Infinity War (2018) — The Movie Database (TMDb)</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese">
    <link rel="stylesheet" href="https://www.themoviedb.org/assets/2/v4/media-4afe0d38780b0d6e91c45050ae2c9e0fb1d691c2ec6796ed30c6d77a362048cf.css">
    <style>
        .k-tooltip.custom_theme {
            background-color: #ffffff;
            color: #000000;
        }
        .custom_theme .k-callout-n {
            border-bottom-color: #ffffff;
        }

        .custom_theme .k-callout-e {
            border-left-color: #ffffff;
        }

        .custom_theme .k-callout-w {
            border-right-color: #ffffff;
        }

        .custom_theme .k-callout-s {
            border-top-color: #ffffff;
        }
        div.header.large.first:before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            display: block;
            filter: opacity(0) grayscale(100%) contrast(130%);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: 50% 50%;
            background-image: url('https://image.tmdb.org/t/p/w1400_and_h450_face/{{$obj_movies->backdrop_path}}');
            will-change: opacity;
            transition: filter 1s;
        }

        div.header.large.first.lazyloaded:before {
            filter: opacity(100) grayscale(100%) contrast(130%);
        }

        div.custom_bg {
            height: 100%;
            background-image: radial-gradient(circle at 20% 50%, rgba(25, 25, 112, 0.67) 0%, rgb(40, 40, 133) 100%);
        }

        section div.header.first div.single_column {
            background: transparent;
        }

        section.inner_content section.header {
            color: #ffffff;
        }

        section.inner_content section.header a, section.inner_content section.header div.title a {
            color: #ffffff;
        }

        section.inner_content a, section.media_panel div.menu ul li.active a {
            color: #000;
        }

        section.inner_content a:hover, section.media_panel div.menu ul li.active a:hover {
            color: #191970;
        }

        section.inner_content section.header ul.actions li.tooltip a, section.inner_content section.header ul.actions li.video a {
            border-color: #ffffff;
            color: #ffffff;
        }

        section.inner_content section.header ul.actions li.tooltip a:hover {
            color: #191970;
            background-color: #ffffff;
            border-color: rgba(100.00%, 100.00%, 100.00%, 0.20);
        }

        p.new_button a, section.media_panel div.menu ul li.view_all a, div.episode div.info span.episode_number, section.review div.review_container div.inner_content div.teaser p a {
            color: #191970;
        }

        p.rounded.new_button a:hover {
            color: #ffffff;
        }

        section.media_panel div.menu ul li.active, section.inner_content ul.shortcut_bar li.selected, section.inner_content ul.shortcut_bar li:hover {
            border-color: #191970;
        }

        section.content_score div.content_score {
            background-color: rgba(9.80%, 9.80%, 43.92%, 0.60);
        }

        p.new_button.rounded, section.content_score div.content_score div, div.leaderboard div.histogram div.bar span {
            border-color: #191970;
            background-color: #191970;
            color: #ffffff;
        }
    </style>
</head>
<body class="en v4" style="margin: 0;">
    <div class="page_wrap movie_wrap">
        <main id="main" class="">
            <section class="inner_content movie_content backdrop poster">
                <div class="header large border first lazyloaded">
                    <div class="custom_bg">
                        <div class="single_column" style="    padding-top: 120px">
                            <section class="images inner">
                                <div class="poster">
                                    <div class="image_content">
                                        <img sizes="auto" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/{{$obj_movies->poster_path}}" class="" alt="Avengers: Infinity War">
                                    </div>
                                </div>
                                <div class="header_poster_wrapper">
                                    <section class="header poster">
                                        <div class="title" dir="auto">
                                            <span>
                                                <h2 class="22"> 
                                                    <a class="no_click play_trailer" href="{{$obj_movies->homepage}}" target="_blank"><span class="glyphicons glyphicons-play"></span>{{$obj_movies->title}}</a>
                                                </h2> 
                                                <span class="release_date">({{date('d-m-Y',strtotime($obj_movies->release_date))}})</span>
                                            </span> 
                                        </div>
                                        <div class="header_info">
                                            <h3 dir="auto">Overview</h3>
                                            <div class="overview" dir="auto">
                                                <p>{{$obj_movies->overview}}</p>
                                            </div>
                                            <h3 class="featured" dir="auto"></h3>
                                            <ol class="people no_image">
                                                <li class="profile">
                                                    <p><a href="# ">Popularity</a></p>
                                                    <p class="character">{{$obj_movies->popularity}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Genre</a></p>
                                                    <p class="character">{{$genre}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Release Date</a></p>
                                                    <p class="character">{{date('d-m-Y',strtotime($obj_movies->release_date))}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Production</a></p>
                                                    <p class="character">{{@$obj_movies->production_companies[0]->name}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Runtime</a></p>
                                                    <p class="character">{{$runtime}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Revenue</a></p>
                                                    <p class="character">$ {{number_format($obj_movies->revenue, 2, ',', '.')}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Vote Average</a></p>
                                                    <p class="character">{{$obj_movies->vote_average}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Vote Count</a></p>
                                                    <p class="character">{{$obj_movies->vote_count}}</p>
                                                </li>
                                                <li class="profile">
                                                    <p><a href="# ">Languages</a></p>
                                                    <p class="character">{{$languages}}</p>
                                                </li>
                                            </ol>
                                        </div>
                                        <ul class="auto actions" style="padding: 0;list-style: none;">
                                            <li class="tooltip use_tooltip list tooltip_hover" title="Back to homepage" data-role="tooltip">
                                                <a class="no_click" href="{{url('/')}}" style="background-color: #ffffff;color:black;text-decoration: none"><img src="{{asset('assets/home.png')}}" width="30"></a>
                                            </li>
                                        </ul>
                                    </section>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>