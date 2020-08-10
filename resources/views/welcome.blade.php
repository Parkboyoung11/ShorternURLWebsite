<!doctype html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{asset('images/icon.png')}}">
        <title>Aki Shorten Url</title>

        <!-- Fonts -->
        <link href="{{asset('font/font')}}" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">

        <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
	    <script src="{{ asset('js/jquery.bootstrap-growl.js') }}"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title m-b-md">
                    Aki Shorten Url
                </div>

                <div class="links">
                    <div class="input-group mb-3">
                      <input type="text" style="background-color: black; color: white; font-weight: bold;" class="form-control" placeholder="i love aki <3" aria-describedby="basic-addon2" id="originLink">
                      <div class="input-group-append">
                        <a href="#" class="input-group-text" id="shorten" style="background-color: orange; color: white; font-weight: bold;">SHORTEN</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="{{asset('js/shortenUrl.js')}}"></script>
</html>

