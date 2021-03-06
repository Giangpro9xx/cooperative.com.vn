<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="icons8-slack-64.png" style="color: yellow">
{{--    <meta name="description" content="Ogani Template">--}}
{{--    <meta name="keywords" content="Ogani, unica, creative, html">--}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Google Font -->
{{--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">--}}

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/client/css/googlefont.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/fontawesome.css')}}" type="text/css">
    <script src="{{asset('public/fontawesome_pro.js')}}"></script>
    <script src="{{asset('public/sweetalert.js')}}"></script>
{{--    gợi ý tìm kiếm--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">--}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
{{--    end--}}
</head>

<body>


<!-- Header Section Begin -->
@include('client_view.header')

<!-- Header Section End -->
@yield('content')
<!-- Footer Section Begin -->
@include('client_view.footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('public/client/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/client/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public/client/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/client/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/client/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/client/js/main.js')}}"></script>
{{--Gợi ý tìm kiếm--}}


{{--end--}}
@include('client_view.sweetalers')

</body>

</html>
<script>

    var path = "{{ url('action') }}";
    $('#user_name').typeahead({

        source: function(query, process){

            return $.get(path, {query:query}, function(data){

                return process(data);

            });

        }

    });

</script>  s
