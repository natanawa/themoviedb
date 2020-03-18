<html>
<head>
    <title>Discover New Movies — The Movie Database (TMDb)</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese">
    <link rel="stylesheet" href="https://www.themoviedb.org/assets/2/application-e81cc2c60a3ce0ba24c5d3ccf5e67c05594f022c4ee2aa4878d051fc9b271faa.css">
    <link rel="stylesheet" href="https://www.themoviedb.org/assets/2/v2/discover-4649a996bd4e648fbeec2f9c932b9da52ddbb7cbbec6c6e4c45125b92e8b245f.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> 
    <style type="text/css">
        .select2-selection__rendered {
            line-height: 33px !important;
        }
        .select2-container .select2-selection--single {
            height: 37px !important;
        }
        .select2-selection__arrow {
            height: 36px !important;
        }
    </style>
</head>
<body class="en v4" style="background-color: #f3f3f3">
    <div class="page_wrap discover_wrap">
        <main id="main" class="" style="padding-top:0">
            <div class="media">
                <h2>Discover New Movies</h2>
                <form id="discover">
                    <input id="page" type="hidden" name="page" value="1">

                    <span class="search_element full">
                        <label for="sort_by" id="sort_by_label">Sort By</label>
                        <select id="sort_by" name="sort_by" style="width: 250px; display: ;" onchange="submitForm()" subdata-role="dropdownlist">
                            <option value="popularity.desc" selected="selected">Popularity Descending</option>
                            <option value="popularity.asc">Popularity Ascending</option>
                            <option value="primary_release_date.desc">Release Date Descending</option>
                            <option value="primary_release_date.asc">Release Date Ascending</option>
                            <option value="vote_count.desc">Vote Count Descending</option>
                            <option value="vote_count.asc">Vote Count Ascending</option>
                        </select>
                    </span>
                    <span class="search_element">
                        <label for="with_genres" id="with_genres_label">Primary Release Date</label>
                        <div class="k-multiselect-wrap k-floatwrap" >
                            <input class="k-input k-readonly" style="width: 225px;" readonly id="daterange" name="daterange" 
                            value="{{date('m/01/Y',strtotime('today')).' - '.date('m/d/Y',strtotime('now'))}}">
                        </div>
                    </span>
                    <div style="clear: left;"></div>
                </form>
                <div class="results flex results_poster_card">

                </div>
                
                <span id="loadingText" style="display: none"><hr><center><a href="javascript:void(0);" style="color: red;font-size: 17px;" onclick="loadMore()">Load More Data.....</a></center></span>

            </div>
            <script type="text/javascript" charset="utf-8">
                function loadMore(){
                    $("#loadingText").hide();
                    var currentPage = parseInt($("#page").val());
                    $("#page").val(currentPage+1);
                    $.ajax({
                        url: "{{ url('search') }}",
                        type: 'GET',
                        data: $('#discover').serialize(),
                        dataType: 'html'
                    }).fail(function() {
                    }).done(function(response) {
                        if(response != ""){
                            $('div.results').append(response);
                            $("#loadingText").show();
                        }
                    });
                }
                function submitForm(){
                    $.ajax({
                        url: "{{ url('search') }}",
                        type: 'GET',
                        data: $('#discover').serialize(),
                        dataType: 'html'
                    }).fail(function() {
                    }).done(function(response) {
                        $('div.results').html(response);
                        $("#loadingText").show();
                    });
                };

                $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                    submitForm();
                });

                $(function() {
                    $('#sort_by').select2({
                        width: '300px',
                        closeOnSelect: true,
                    }).on('select2:unselecting', function() {
                        $(this).data('unselecting', true);
                    }).on('select2:opening', function(event) {
                        if ($(this).data('unselecting')) {
                            $(this).removeData('unselecting');
                            event.preventDefault('a');
                        }
                    });
                    $('input[name="daterange"]').daterangepicker({
                        opens: 'right'
                    }, function(start, end, label) {
                    });

                    submitForm();

                });

            </script>
        </main>
    </div>
</body>
</html>