<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('images/icon.png') }}">
        <title>Aki Shorten Url</title>

        <!-- Fonts -->
        <link href="{{ asset('font/font') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <script src="{{ asset('js/jquery-3.2.1.slim.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
	    <script src="{{ asset('js/jquery.bootstrap-growl.js') }}"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #000;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                margin-top: 10%;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
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
    <script type="text/javascript">
        $("#shorten").on('click', function(){
            if($("#originLink").val() !== "" &&  $("#shorten").text() == "SHORTEN" ) {
                $("#shorten").text("Loading...");
                var originLink = $("#originLink").val();
                shortenUrl(originLink);
            }
        })

        function shortenUrl(originLink) {
            $.ajax({
                type: 'POST',
                url: 'http://akii.tk/api.php',
                data: {
                    key: '6fd394b2f8f7e2438ca7f0a87a6db994',
                    link:  originLink
                },
                success: function copy(data) {
                    if (data != null) {
                      flag = false
                        result = JSON.parse(data);
                        $("#originLink").val(result.message);
			$("#originLink").on('keydown',function(){
				$("#shorten").text("SHORTEN");
			})
                        $("#shorten").text("Copy");
                        $("#shorten").on('click', function(){
                            if($("#originLink").val() !== "" && $("#shorten").text() == "Copy") {
                                var shortenLink = $("#originLink").val();
                                $("#originLink").select();
                                document.execCommand("Copy");
                                $.bootstrapGrowl("<strong>Copied!</strong>", {
                                    ele: 'body',
                                    type: 'success',
                                    width: 'auto',
                                    delay: 2000,
                                    allow_dismiss: false
                                });
                            }
                        });
                    }else {
                        $("#originLink").val("");
                        $("#shorten").text("Shorten");
			$.bootstrapGrowl("<strong>Error: Invalid Url !</strong>", {
                                    ele: 'body',
                                    type: 'error',
                                    width: 'auto',
                                    delay: 2000,
                                    allow_dismiss: false
                        });
                    }
                }
            });
        }
    </script>
</html>

