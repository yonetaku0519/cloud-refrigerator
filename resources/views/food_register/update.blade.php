@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
          @if($id === "1")
            {{-- 冷蔵庫(冷蔵室)のイラスト --}}
            <img src="{{ asset('images/refrigerator_cool.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
          @elseif($id === "2")
            {{-- 冷蔵庫(冷凍室)のイラスト --}}
            <img src="{{ asset('images/refrigerator_frozen.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
          @elseif($id === "3")
            {{-- 冷蔵庫(野菜室)のイラスト --}}
            <img src="{{ asset('images/refrigerator_vegetables.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
          @endif
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('food_register.navtabs')
            
            {{-- 表とボタン --}}
            
            @if (count($foods) > 0)         <!-- ここはfoodsは多次元配列である。  -->
            
                <table class="table table-hover">
        
                  <thead>
                    <tr>
                      <th scope="col">食品名</th>
                      <th scope="col">量</th>
                      <th scope="col">賞味期限</th>
                      <th scope="col">備考</th>
                    </tr>
                  </thead>
                  
                  @foreach($foods as $food)      <!-- ここで保存場所毎の配列にする -->
                      
                      <tbody>
                        <td scope="row"><a href="{{ route('food.updateEdit', ['id' => $food->id]) }}">{{  $food->name  }}</th>
                        <td scope="row">{{  $food->amount  }}</th>
                        <td scope="row">{{  $food->freshness_date  }}</th>
                        <td scope="row">{{  $food->note  }}</th>
                      </tbody>
                      
                  @endforeach
                  
                  {{  $foods->links() }}
                  
                </table>
          @endif
          
          <a href="{{ route('food.update', ['id' => 1]) }}" class = "btn btn-outline-primary btn-lg">冷蔵ドアを開ける</a>
          <a href="{{ route('food.update', ['id' => 2]) }}" class = "btn btn-outline-info btn-lg">冷凍ドアを開ける</a>
          <a href="{{ route('food.update', ['id' => 3]) }}" class = "btn btn-outline-success btn-lg">野菜室を開ける</a>
        </div>
    </div>
@endsection