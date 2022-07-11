<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lorem Ipsum Dolor Sit Amet</title>
        <link href="admin/css/styles.css" rel="stylesheet" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/favicons/favicon.ico') }}" />
        <style>
            .foot-grap {
                position: absolute;
                /* bottom: 0; */
                left: 0;
                width: 100vw;
            }
            .foot-grap img {
                width: 100%
            }
            .ilustrasi-orang-foot {
                position: absolute;
                top: 20vw;
                left: 4vw;
            }
            .ilustrasi-wanita {
                position: absolute;
                top: 20vw;
                left: 70vw;
            }
        </style>
    </head>
    <body class="bg-secondary" style="background-image: url('/background.jpeg')">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                @yield('main')
            </div>
            <div id="layoutAuthentication_footer">
                @include('includes.auth-footer')
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ url('admin/js/scripts.js') }}"></script>
    </body>
</html>
