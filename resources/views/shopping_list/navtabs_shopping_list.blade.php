<ul class="nav nav-tabs nav-justified mb-3">
    {{-- 買い物リストタブ--}}
    <li class="nav-item">
        <a href="{!! route('shopping_list',[]) !!}" class="nav-link {{ Request::routeIs('shopping_list') ? 'active' : '' }}">
            買い物リスト作成
        </a>
    </li>
    
    </li　class = "nav-item">
        <a href="{!! route('check_shopping_list',[],) !!}" class="nav-link {{ Request::routeIs('check_shopping_list') ? 'active' : '' }}">
            買い物中
        </a>
    </li>
</ul>
