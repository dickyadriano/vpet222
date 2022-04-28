<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>VPet</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('argon/assets/img/brand/favicon.png')}}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('argon/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/vpet.css')}}" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{asset('argon/assets/css/argon.css?v=1.2.0')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/argonv2.css?v=1.2.1')}}" type="text/css">
    <!-- MapBox -->
    @livewireStyles
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

</head>

<body>
<style>
    #marker {
        background-size: cover;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        cursor: pointer;
    }

    .mapboxgl-popup {
        max-width: 200px;
    }
</style>
<!-- Load the `mapbox-gl-geocoder` plugin. -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
@include('layouts.navbars.sidebar')
<!-- Main content -->
<div class="main-content" id="panel">
    @yield('main-content')
    {{ isset($slot) ? $slot : null }}
</div>
<!-- Core -->
<script src="{{asset('argon/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('argon/assets/vendor/moment/min/moment.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/fullcalendar/dist/fullcalendar.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('argon/assets/js/argon.js?v=1.2.0')}}"></script>
<!-- MapBox -->
<script type="text/javascript" src='{{asset('js/vpet.js')}}'></script>

<script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>

@if(Session::has('errors'))
<script>
    $('#ModalAddMedicine').modal('show');
    $('#ModalAdd').modal('show');
</script>
@endif

@livewireScripts
@stack('scripts')
<script src="/js/app.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";
    $(document).ready(function () {
        // ajax setup form csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('9e6b25fcccb20faec974', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
            if (my_id === data.from) {
                $('#' + data.to).click();
            }
            else if (my_id === data.to){
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.from).click();
                }
                else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.from).find('.pending').html());

                    if (pending) {
                        $('#' + data.from).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.from).append('<span class="pending">1</span>');
                    }
                }
            }
        });

        $('.user_info').click(function (){
            $('.user_info').removeClass('active');
            $(this).addClass('active');

            receiver_id = $(this).attr('id');
            $.ajax({
                type: "get",
                url: 'http://127.0.0.1:8000/message/' + receiver_id,
                data: "",
                cache: false,
                success: function (data) {
                    $('#messages').html(data)
                    scrollToBottomFunc();
                },
            })
        })

        $(document).on('keyup', '.input-group input', function (e) {
            var message = $(this).val();
            // check if enter key is pressed and message is not null also receiver is selected
            if (e.keyCode === 13 && message !== '' && receiver_id !== '') {
                $(this).val(''); // while pressed enter text box will be empty

                var dataStr = "receiver_id=" + receiver_id + "&message=" + message;

                $.ajax({
                    type: "POST",
                    url: /*'/send_message'*/ "{{ route('send.message') }}", // need to create this post route
                    data: dataStr,
                    cache: false,
                    success: function (data) {
                    },
                    error: function (jqXHR, status, err) {
                    },
                    complete: function () {
                        scrollToBottomFunc();
                    }
                })
            }
        })
    });
    // make a function to scroll down auto
    function scrollToBottomFunc() {
        $('.msg_card_body').animate({
            scrollTop: $('.msg_card_body').get(0).scrollHeight
        }, 50);
    }
</script>
</body>

</html>

