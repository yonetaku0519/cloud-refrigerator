<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>クラウド冷蔵庫</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">ユーザー登録</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="wrapper">
                <div class="circlesWrapper">
                  <div class="circle circleHorizontal circle1"></div>
                  <div class="circle circleHorizontal circle2"></div>
                  <div class="circle circleHorizontal circle3"></div>
                  <div class="circle circleHorizontal circle4"></div>
                  <div class="circle circleHorizontal circle5"></div>
                  <div class="circle circleHorizontal circle6"></div>
                  <div class="circle circleVertical circle7"></div>
                  <div class="circle circleVertical circle8"></div>
                  <div class="circle circleVertical circle9"></div>
                  <div class="circle circleVertical circle10"></div>
                  <div class="circle circleVertical circle11"></div>
                  <div class="circle circleVertical circle12"></div>
                </div>
                <div class="cover"></div>
             </div>
              
              <div class="content">
                  <div class="title m-b-md">
                      クラウド冷蔵庫
                  </div>
  
                  <div class="links">
                      <a href="https://laravel.com/docs">コンセプト</a>
                      <a href="https://laracasts.com"></a>
                      <a href="https://laravel-news.com">News</a>
                      <a href="https://blog.laravel.com">Blog</a>
                      <a href="https://nova.laravel.com">Nova</a>
                      <a href="https://forge.laravel.com">Forge</a>
                      <a href="https://vapor.laravel.com">Vapor</a>
                      <a href="https://github.com/laravel/laravel">GitHub</a>
                      </div>
                  </div>
              </div>
              
              <div class = "catch-copy">
                  <div class = "catch-text">
                      クラウド上で自宅の冷蔵庫を管理するアプリ
                  </div>
                  
                  <div class="text-center">
                      <a class="top-page-btn mt-5" href="{{ route('register') }}">今すぐ始めてみる</a>
                  </div>
              </div>
              
              
        </div>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    </body>
</html>
