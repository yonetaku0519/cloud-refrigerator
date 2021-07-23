<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>クラウド冷蔵庫</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    
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
                      <a href="#application-about">コンセプト</a>
                      <a href="#set-title-text">活躍場面</a>
                      <a href="#title-header">使い方</a>
                      <a href="#customer-wish">願い</a>
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
              
              
              <div class = "application-about" >
                  <a name = "application-about">
                  
                  <div class = "about-title text-center">
                      <img src="{{ asset('images/application-logo.jpg') }}" class = "application-logo">
                      <span class="about-title-text">クラウド冷蔵庫とは？</span>
                  </div>
                  
                  <p class = "text-center about-description">
                      どこにいても冷蔵庫内を確認！クラウド上に自宅の冷蔵庫を作成し、<br>
                      食材管理や買い忘れを防止したりできるWEBサービスです!!
                  </p>
                  
              </div>
              
              
                <div class = "worries-title text-center">
                  <i class="fas fa-shopping-cart"></i>　買い物中にこんな悩みはありませんか？
                </div>
              
              
                <div class = "customer-worries row">
                  
                    <div class="col-xs-12 col-md-6 worries-img-area text-center">
                        <img src="{{ asset('images/customer-worries.png') }}" class="worries-img">
                    </div>
                    <div class="col-xs-12 col-md-6 worries-area">
                        <ul class="worries-list">
                            <li class="worries-item fadein-left active"><i class="fas fa-egg"></i>　卵残り何個だったっけ？</li>
                            <li class="worries-item fadein-left active"><i class="fas fa-hamburger"></i>　家にある食材で料理できるだろうか？</li>
                            <li class="worries-item fadein-left active"><i class="fas fa-shopping-basket"></i>　そもそも何を買うんだっけ？</li>
                        </ul>
                    </div>
                  
                </div>
              
                <div class = "settle-title text-center fadein active">
                    <a name = "set-title-text"></a>
                    <span class="set-title-text" >そんな買い物中に<br>
                    <img src="{{ asset('images/application-logo.jpg') }}" class = "application-logo">
                    <span class="about-title-text">クラウド冷蔵庫</span><span class="set-title-text">が大活躍します!!</span>
                    
                </div>
              
                <div class = "container-field">
                  
                   <div class="settle-area row text-center">
                        
                        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-3 mt-3 mx-auto">
                            <div class="settle fadein active">
                                <div class="settle-heading pt-4">冷蔵庫の持ち歩き</div>
                                <img src="{{ asset('images/phone_refrigerator.jpg') }}" class="settle-img">
                                <p class="settle-description mt-3">買い物中にスマートフォンで冷蔵庫の中身を確認できます。</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-3 mt-3 mx-auto">
                            <div class="settle fadein active">
                                <div class="settle-heading pt-4">買い物リストの作成</div>
                                <img src="{{ asset('images/list_img.jpg') }}" class="settle-img">
                                <p class="settle-description mt-3">リストを見ながら買い物をすることで、効率よく買い物ができます。</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10 col-md-offset-1 col-lg-3 mt-3 mx-auto">
                            <div class="settle fadein active">
                                <div class="settle-heading pt-4">賞味期限の通知</div>
                                <img src="{{ asset('images/phone_alert.jpg') }}" class="settle-img">
                                <p class="settle-description mt-3">食材の賞味期限を管理し、賞味期限が近い食材を通知します。さらに、賞味期限が近い食材を使ったレシピが提案されます。</p>
                            </div>
                        </div>
                      
                    </div>
                </div>
              
              
                <div class="step-area-title text-center fadein active">
                    <a name = "title-header"></a>
                    <span class="title-header mt-3" >クラウド冷蔵庫の使い方
                </div>
                <div class="step-area row no-gutters">
                    <div class="col-xs-12 col-lg-4 mt-3">
                        <div class="step text-center mt-3 fadein active">
                            <div class="step-title">Step <strong class="step-num">1</strong></div>
                            <div class="step-copy">食材の登録</div>
                            <img src="{{ asset('images/step-img1.png') }}" class="step-img">  
                            <div class="step-description">現実世界の冷蔵庫の中身を登録し、クラウド上に自分専用の冷蔵庫を作成しましょう!!</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 mt-3">
                        <div class="step text-center mt-3 fadein active">
                            <div class="step-title">Step <strong class="step-num">2</strong></div>
                            <div class="step-copy">買い物リストの作成</div>
                            <img src="{{ asset('images/step-img2.png') }}" class="step-img">  
                             <div class="step-description">買い物リストを作成してください。
                             食材名だけでなく、賞味期限や簡単なメモなどを記載することができます。</div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-4 mt-3">
                        <div class="step text-center mt-3 fadein active">
                            <div class="step-title">Step <strong class="step-num">3</strong></div>
                            <div class="step-copy">買い物に行く</div>
                            <img src="{{ asset('images/step-img3.png') }}" class="step-img">  
                             <div class="step-description">スマートフォンで買い物リストを確認しながら買い物をしよう!
                             クラウド冷蔵庫に買った食材をまとめて登録することができます。</div>
                        </div>
                    </div>
                </div>
                
              
                <div class = "customer-wish row">
                    <a name = "customer-wish"></a>
                    <div class="col-xs-12 col-md-6 wish-img-area text-center">
                        <img src="{{ asset('images/customer-wish.png') }}" class="wish-img">
                    </div>
                    
                    <div class="col-xs-12 col-md-6 wish-area">
                        <div class = "wish-text-area">
                            <div class = "catch-text">
                                  困難な世の中をちょっと便利にする<br>
                    <img src="{{ asset('images/application-logo.jpg') }}" class = "application-logo">
                    <span class="about-title-text">クラウド冷蔵庫</span>
                            </div>
                      
                            <div class="text-center">
                                <a class="top-page-btn mt-5" href="{{ route('register') }}">今すぐ始めてみる</a>
                            </div>
                        </div>
                    </div>
                  
                </div>
              
        </div>
        {{-- フッター --}}
        @include('commons.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>
