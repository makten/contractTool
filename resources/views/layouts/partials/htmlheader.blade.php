<head>

    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title> CT - @yield('htmlheader_title', 'Title here') </title>

    <!-- iCheck -->
    <link href="{{ asset('/css/jquery-ui.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/bootstrap-theme.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/HADashboard.css') }}" rel="stylesheet" type="text/css"/> 


    @if(Auth::user())
    <link id="themeColor" href="{{ asset('/css/skins/'.Auth::user()->userprofile->skin.'.css') }}" rel="stylesheet" type="text/css">        
    <input id="skin-value" type="hidden" value="{{Auth::user()->userprofile->skin}}">
    @else    
    <link href="{{ asset('/css/skins/skin-red.css') }}" rel="stylesheet" type="text/css">
    @endif


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            ]); ?>
        </script>

    </head>


