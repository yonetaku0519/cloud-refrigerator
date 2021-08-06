@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">クラウド冷蔵庫からレシピのご提案</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($name !== "なし")
                        {{-- youtube動画リスト --}}
                        @include('youtube')
                        
                    @else
                        <h5>現在提案できるレシピはありません。</h5><br>
                        <h5>クラウド冷蔵庫に食材を登録しましょう！</h5><br>
                        <h5>（おすすめレシピはAM0時にリセットされます。）</h5>
                    @endif
                    
                </div>
            </div>
            
            <div class = "freshness_date_near "　style = "text-align: center; padding-top : 30px;">
            
                @if (count($foods) > 0)         <!-- ここはfoodsは多次元配列である。  -->
                    <i class="fas fa-exclamation-triangle fa-2x faa-float animated" style = "color: #0000cd;"></i>
                    <h5>賞味期限が近い食材が存在します。</h5>
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
                            <td scope="row" style="color:red;">{{  $food->freshness_date  }}</th>
                            <td scope="row">{{  $food->note  }}</th>
                        </tbody>
                    
                      @endforeach
                    </table>
                  
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
