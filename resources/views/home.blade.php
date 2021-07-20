@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログイン成功してます。
                </div>
            </div>
            
            
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
                  
                  @foreach($foods as $foodsLocation)      <!-- ここで保存場所毎の配列にする -->
                  
                      @foreach($foodsLocation as $food)       <!-- ここから要素を取り出す-->
                        <tbody>
                            <td scope="row">{{  $food->name  }}</th>
                            <td scope="row">{{  $food->amount  }}</th>
                            <td scope="row">{{  $food->freshness_date  }}</th>
                            <td scope="row">{{  $food->note  }}</th>
                        </tbody>
                      @endforeach
                
                    @endforeach
                </table>
              
          @endif
        </div>
    </div>
</div>
@endsection
