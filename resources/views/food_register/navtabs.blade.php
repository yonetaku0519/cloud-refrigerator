<ul class="nav nav-tabs nav-justified mb-3">
    {{-- 食材一覧タブ--}}
    <li class="nav-item">
        <a href="{!! route('food.showDetails',['id' => 1]) !!}" class="nav-link {{ Request::routeIs('food.showDetails') ? 'active' : '' }}">
            一覧/登録
        </a>
    </li>
    
    </li　class = "nav-item">
        <a href="{!! route('food.update',['id' => 1],) !!}" class="nav-link {{ Request::routeIs('food.update') ? 'active' : '' }}">
            更新/削除
        </a>
    </li>
</ul>