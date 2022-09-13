<html>

<head>
    <title>WolfSoft {{$title}}</title>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet" type="text/css" >
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
    @yield('content')
</body>
<div class="show_message_bar" id='message'>{{session('message')}}</div>

</html>

<script>
    var message=document.getElementById('message');
    setTimeout(hidemessage, 1000);
    function hidemessage(){message.style.display='none';}
</script>
