<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">-->
    <!-- <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Apotik "D"</title>-->

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet"> -->

        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
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
    <body>  -->
@extends('layout.conquer')
@section('content')
<h3 class="page-title">
			Welcome | <small>Selamat Datang di Apotik "D"</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Welcome</a>
						<i class="fa fa-angle-right"></i>
					</li>
                    <li >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#" onclick="showInfo()">
                        <i class="icon-bulb"></a></i>
                    </li>

				</ul>
				<div class="page-toolbar">
					<!-- tempat action button -->
                    <button class='btn btn-warning' data-toggle='modal' href='#disclaimer'>Disclaimer</button>
                    <button class='btn btn-info'>Help</button>
				</div>
			</div>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div id='div_showinfo'></div>

                <div class="title m-b-md">
                    Apotik "D"
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>



        <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">DISCLAIMER</h4>
                    </div>
                    <div class="modal-body">
                    Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement. 
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @section('javascript')
<script>
function showInfo()
{
  $.ajax({
    type:'POST',
    url:'{{route("medicines.showInfo")}}',
    data:'_token=<?php echo csrf_token() ?>',
    success: function(data){
       $('#div_showinfo').html(data.msg)
    }
  });
}
</script>
@endsection

        @endsection
    <!-- </body>
</html> -->
