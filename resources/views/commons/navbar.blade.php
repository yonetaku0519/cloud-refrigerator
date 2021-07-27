<header class="mb-4">
    <nav class="navbar navbar-expand-md navbar-light " style="background-color: #5465ff;">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}" style="color:#ffffff;">
                {{ config('app.name', 'Laravel') }}
            </a>
            <!-- 横幅が狭いときに出るハンバーガーボタン -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}" style="color:#ffffff;">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color:#ffffff;">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                     <div class="collapse navbar-collapse" id="nav-bar">
                         <ul class="navbar-nav">
                             {{-- 登録/更新へのリンク --}}
                            <li class="nav-item" ><i class="fas fa-folder-plus fa-2x faa-bounce animated" style = "color: white;"></i>{!! link_to_route('food.showDetails', '登録/更新',['id' => 1], ['class' => 'nav-link', 'style' => 'color:#ffffff;']) !!}</li>
                            
                            {{-- 買い物リストへのリンク --}}
                            <li class="nav-item"  ><i class="fas fa-shopping-cart fa-2x faa-passing animated" style = "color: white;"></i>{!! link_to_route('shopping_list', '買い物リスト',[], ['class' => 'nav-link', 'style' => 'color:#ffffff;']) !!}</li>
                            
                            {{-- 机に広げるへのリンク --}}
                            <li class="nav-item"  ><i class="fas fa-people-carry fa-2x faa-horizontal animated" style = "color: white;"></i>{!! link_to_route('food.display', '机に広げる',[], ['class' => 'nav-link', 'style' => 'color:#ffffff;']) !!}</li>
                            
                            <li class="nav-item dropdown" >
                                <i class="fas fa-user fa-2x faa-float animated" style = "color: white;"></i>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"　style="color:#ffffff;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background-color:white">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:#ffffff; background-color:#5465ff;">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
    
                        
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
