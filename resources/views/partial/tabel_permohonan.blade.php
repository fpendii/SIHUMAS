<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <link rel="shortcut icon" href="/template/dist/assets/compiled/svg/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon"
        href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
        type="image/png">



    <link rel="stylesheet" href="/template/dist/assets/compiled/css/application-email.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app.css">
    <link rel="stylesheet" href="/template/dist/assets/compiled/css/app-dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">

</head>

<body>
    <script src="/template/dist/assets/static/js/initTheme.js"></script>
    <div id="app">

        <div class="container-fluid col-11">
            <nav class="navbar navbar-light">
                <div class="container d-block">
                    <a href="{{url('admin')}}"><i class="bi bi-chevron-left"></i></a>
                    <a class="navbar-brand ms-4" href="{{url('admin')}}">
                        <img src="/template/dist/assets/compiled/svg/logo.svg">
                    </a>
                </div>
            </nav>
            <div class="page-heading email-application overflow-hidden">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Pesan Permohonan</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pesan Permohonan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section content-area-wrapper">
                    <div class="sidebar-left" >
                        <div class="sidebar">
                            <div class="sidebar-content email-app-sidebar d-flex" style="width: 250px">
                                <!-- sidebar close icon -->
                                <span class="sidebar-close-icon">
                                    <i class="bi bi-x"></i>
                                </span>
                                <!-- sidebar close icon -->
                                <div class="email-app-menu">
                                    <div class="form-group form-group-compose">
                                        <div style="height: 80px"></div>
                                    </div>
                                    <div class="sidebar-menu-list ps">
                                        <!-- sidebar menu  -->
                                        <div class="list-group list-group-messages">
                                            <a href="{{url('admin/'.$page)}}" class="list-group-item pt-0 {{ $sidebar == 'inbox' ? 'active' : '' }}
                                            " id="inbox-menu">
                                                <div class="fonticon-wrap d-inline me-3">
                                                    <svg class="bi" width="1.5em" height="1.5em"
                                                        fill="currentColor">
                                                        <use
                                                            xlink:href="/template/dist/assets/static/images/bootstrap-icons.svg#envelope" />
                                                    </svg>
                                                </div>
                                                Inbox
                                            </a>
                                            <a href="{{url('admin/'.$page.'/proses')}}" class="list-group-item {{ $sidebar == 'proses' ? 'active' : '' }}">
                                                <div class="fonticon-wrap d-inline me-3">
                                                    <i class="bi bi-arrow-repeat icon"></i>
                                                </div>
                                                Proses
                                            </a>
                                            <a href="{{url('admin/'.$page.'/arsip')}}" class="list-group-item {{ $sidebar == 'arsip' ? 'active' : '' }}">
                                                <div class="fonticon-wrap d-inline me-3">
                                                    <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                                        <use xlink:href="/template/dist/assets/static/images/bootstrap-icons.svg#info-circle" />
                                                    </svg>
                                                </div>
                                                Arsip
                                            </a>
                                        </div>
                                        <!-- sidebar menu  end-->

                                        <!-- sidebar label start -->
                                        <!-- sidebar label end -->

                                    </div>
                                </div>
                            </div>
                            <!-- User new mail right area -->

                            <!--/ User Chat profile right area -->
                        </div>
                    </div>
                    <div class="content-right">
                        <div class="content-overlay"></div>
                        <div class="content-wrapper">
                            <div class="content-header row">
                            </div>
                            <div class="content-body">
                                <!-- email app overlay -->
                                <div class="app-content-overlay"></div>
                                <div class="email-app-area">
                                    <!-- Email list Area -->
                                    <div class="email-app-list-wrapper">
                                        <div class="email-app-list">
                                            <div class="email-action">
                                                <!-- action left start here -->
                                                <div class="action-left d-flex align-items-center">
                                                    <!-- select All checkbox -->
                                                    <div class="checkbox checkbox-shadow checkbox-sm selectAll me-3">
                                                        <input type="checkbox" id="checkboxsmall"
                                                            class='form-check-input'>
                                                        <label for="checkboxsmall"></label>
                                                    </div>
                                                    <!-- delete unread dropdown -->
                                                    <ul class="list-inline m-0 d-flex">
                                                        {{-- <li class="list-inline-item">
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn btn-icon dropdown-toggle action-icon"
                                                                    id="tag" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <span class="fonticon-wrap">

                                                                        <svg class="bi" width="1.5em"
                                                                            height="1.5em" fill="currentColor">
                                                                            <use
                                                                                xlink:href="/template/dist/assets/static/images/bootstrap-icons.svg#tag" />
                                                                        </svg>
                                                                    </span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right"
                                                                    aria-labelledby="tag">
                                                                    <a href="#"
                                                                        class="dropdown-item align-items-center">
                                                                        <span
                                                                            class="bullet bullet-success bullet-sm"></span>
                                                                        <span>Product</span>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="dropdown-item align-items-center">
                                                                        <span
                                                                            class="bullet bullet-primary bullet-sm"></span>
                                                                        <span>Work</span>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="dropdown-item align-items-center">
                                                                        <span
                                                                            class="bullet bullet-warning bullet-sm"></span>
                                                                        <span>Misc</span>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="dropdown-item align-items-center">
                                                                        <span
                                                                            class="bullet bullet-danger bullet-sm"></span>
                                                                        <span>Family</span>
                                                                    </a>
                                                                    <a href="#"
                                                                        class="dropdown-item align-items-center">
                                                                        <span
                                                                            class="bullet bullet-info bullet-sm"></span>
                                                                        <span> Design</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </li> --}}
                                                    </ul>
                                                </div>
                                                <!-- action left end here -->

                                                <!-- action right start here -->
                                                <div
                                                    class="action-right d-flex flex-grow-1 align-items-center justify-content-around">
                                                    <div class="sidebar-toggle d-block d-lg-none">
                                                        <button class="btn btn-sm btn-outline-primary">
                                                            <i class="bi bi-list fs-5"></i>
                                                        </button>
                                                    </div>
                                                    <!-- search bar  -->
                                                    <div class="email-fixed-search flex-grow-1">

                                                        <div class="form-group position-relative  mb-0 has-icon-left">
                                                            <input type="text" class="form-control"
                                                                placeholder="Cari permohonan">
                                                            <div class="form-control-icon">
                                                                <svg class="bi" width="1.5em" height="1.5em"
                                                                    fill="currentColor">
                                                                    <use
                                                                        xlink:href="/template/dist/assets/static/images/bootstrap-icons.svg#search" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            @yield('content')

                                        </div>
                                    </div>
                                    <!--/ Email list Area -->
                                </div>
                                <!--/ Detailed Email View -->
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2023 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                        by <a href="https://saugi.me">Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>

    <script src="/template/dist/assets/static/js/components/dark.js"></script>
    <script src="/template/dist/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <script src="/template/dist/assets/compiled/js/app.js"></script>



    <script>
        document.querySelector('.sidebar-toggle').addEventListener('click', () => {
            document.querySelector('.email-app-sidebar').classList.toggle('show')
        })
        document.querySelector('.sidebar-close-icon').addEventListener('click', () => {
            document.querySelector('.email-app-sidebar').classList.remove('show')
        })
        document.querySelector('.compose-btn').addEventListener('click', () => {
            document.querySelector('.compose-new-mail-sidebar').classList.add('show')
        })
        document.querySelector('.email-compose-new-close-btn').addEventListener('click', () => {
            document.querySelector('.compose-new-mail-sidebar').classList.remove('show')
        })
    </script>

    <!-- Code injected by live-server -->
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() ==
                            "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                                .valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        // ]]>
    </script>
</body>

</html>
