<header class="mb-4">
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: #5465ff;">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="{{ url('/home') }}" style="color:#ffffff;"> 
            {{ config('app.name', 'Laravel') }}
        </a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    {{-- 登録/更新へのリンク --}}
                    <li class="nav-item" > 
                        <i class="fas fa-folder-plus fa-2x faa-bounce animated" style = "color: white;"></i>
                        {!! link_to_route('food.showDetails', '登録/更新',['id' => 1], ['class' => 'nav-link', 'style' => 'color:#ffffff;']) !!}
                    </li>
                    
                    {{-- 買い物リストへのリンク --}}
                    <li class="nav-item">
                        <i class="fas fa-shopping-cart fa-2x faa-passing animated" style = "color: white;"></i>
                        {!! link_to_route('shopping_list', '買い物リスト',[], ['class' => 'nav-link', 'style' => 'color:#ffffff;']) !!}
                    </li>
                    
                    {{-- 机に広げるへのリンク --}}
                    <li class="nav-item">
                        <i class="fas fa-people-carry fa-2x faa-horizontal animated" style = "color: white;"></i>
                        {!! link_to_route('food.display', '机に広げる',[], ['class' => 'nav-link', 'style' => 'color:#ffffff;']) !!}
                    </li>
                    
                    
                    <li class="nav-item dropdown">
                        <i class="fas fa-user fa-2x faa-float animated" style = "color: white;"></i>
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"　style="color:#ffffff;" id="navbarDropdownMenuLink" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style = "background-color:  #5465ff;">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color:#ffffff; background-color:#5465ff;"> {{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                            <a class="dropdown-item" href="{{ route('contact') }}" style="color:#ffffff; background-color:#5465ff;">お問い合わせ</a>
                        </div>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                     <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}" style="color:#ffffff;">{{ __('Register') }}</a>
                      </i>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">
                     <a class="nav-link" href="{{ route('login') }}" style="color:#ffffff;">{{ __('Login') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>