@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">クラウド冷蔵庫からのお知らせ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($name !== "なし")
                        賞味期限の近い「{{ $name }}」でレシピが提案されました！
                        
                    @else
                        <h5>賞味期限が近い食材はありません。</h5><br>
                        <h5>クラウド冷蔵庫に食材を登録しましょう！</h5>
                    @endif
                    
                </div>
            </div>
            
            {{-- youtube動画リスト --}}
            @include('youtube')
            
            
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
                  
                  @foreach($foods as $food)      <!-- ここから要素を取り出す-->
                  
                    <tbody>
                        <td scope="row">{{  $food->name  }}</th>
                        <td scope="row">{{  $food->amount  }}</th>
                        <td scope="row">{{  $food->freshness_date  }}</th>
                        <td scope="row">{{  $food->note  }}</th>
                    </tbody>
                
                  @endforeach
                </table>
              
          @endif
        </div>
    </div>
</div>
@endsection
