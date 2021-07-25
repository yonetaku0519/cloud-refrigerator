@extends('layouts.app')
@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- メモ帳のイラスト --}}
            <img src="{{ asset('images/customer-worries.png') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto; width:100%;">
         </aside>
        

        <div class="col-sm-8">
            {{-- タブ --}}
            @include('shopping_list.navtabs_shopping_list')
            
            {{-- 表とボタン --}}
            
            @if (count($foods) > 0)         <!-- ここはfoodsは多次元配列である。  -->
            
                <table class="table table-hover">
        
                  <thead>
                    <tr>
                      <th scope="col">食品名</th>
                      <th scope="col">量</th>
                      <th scope="col">賞味期限</th>
                      <th scope="col">保存予定場所</th>
                      <th scope="col">備考</th>
                      <th scope="col">カゴに入れる</th>
                    </tr>
                  </thead>
                  <?php $i = 0?>
                  @foreach($foods as $food)      <!-- ここで保存場所毎の配列にする -->
                      
                        <tbody>
                          <td scope="row"><a href="{{ route('update_shopping_list', ['id' => $food->id]) }}">{{  $food->name  }}</th>
                          <td scope="row">{{  $food->amount  }}</th>
                          
                          @if(empty($food->freshness_date))
                            <td scope="row">未登録</th>
                          @else
                            <td scope="row">{{  $food->freshness_date  }}</th>
                          @endif
                          
                          <td scope="row">{{  $food->storing_id  }}</th>
                          <td scope="row">{{  $food->note  }}</th>
                          
                          @if($food->status === 2)
                            
                            <td scope="row"><a href="{{ route('freshness_date_register', ['id' => $food->id]) }}">賞味期限登録</th>
                          
                          @elseif($food->status === 3)
                            <td scope="row" style = "color:#B5B5B5;">カゴに登録済</th>
                          @endif
                        </tbody>
                              
                      <?php $i++?>
                  @endforeach
              
                </table>
          @endif
          <br>
          <br>
          <br>
        　
          <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#exampleModal">
          買い物終了
          </button>
          <br><br>
            
          <!-- Modalの中身 -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">買い物終了</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  買い物を終わりますか？ <br>
                  カゴに入れた食材は、クラウド冷蔵庫に自動で登録されます。
                  <br><br>
                  <a href="{{ route('shopping_complete', ['id' => 1]) }}" class = "btn btn-outline-primary btn-lg" style = "display: block; margin-top: 20px;">買い物終了</a>
        　
                </div>
              </div>
            </div>
          </div>        　
        　
        　
        　
        　
        　
        　
        </div>
        
    </div>
    
@endsection
