<html>

<head>
    <title>WolfSoft {{$title}}</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
</head>

<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
@yield('content')

            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</body>
<div class="show_message_bar" id='message'>{{session('message')}}</div>

</html>

<script>
    var message=document.getElementById('message');
    setTimeout(hidemessage, 1000);
    function hidemessage(){message.style.display='none';}
</script>
