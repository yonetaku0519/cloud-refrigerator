@extends('layouts.app')
@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- メモ帳のイラスト --}}
            <img src="{{ asset('images/list_img.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
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
                      <th scope="col">保存予定場所</th>
                      <th scope="col">備考</th>
                    </tr>
                  </thead>
                  
                  @foreach($foods as $food)      <!-- ここで保存場所毎の配列にする -->
                      
                        <tbody>
                          <td scope="row">{{  $food->name  }}</th>
                          <td scope="row">{{  $food->amount  }}</th>
                          <td scope="row">{{  $food->storing_id  }}</th>
                          <td scope="row">{{  $food->note  }}</th>
                        </tbody>
                      
                  @endforeach
              
                </table>
          @endif
          
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            メモ追加
          </button>
          <!-- Modalの中身 -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">買い物リストに追加</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  
                  {!! Form::open(['action' => 'FoodsController@shoppingListRegister']) !!}
                    <div class="form-group row">
                        <label for="name" class = "col-sm-3">{!! Form::label('name','食材名') !!}</label>
                        <div class="col-sm-9">
                          {{ Form::text('name', null,['class' =>'form-control']) }}
                        </div> 
                        <label for="amount" class = "col-sm-3">{!! Form::label('amount','量') !!}</label>
                        <div class="col-sm-9">
                            {{ Form::text('amount', null,['class' =>'form-control']) }}
                        </div>  
                        <label for="note" class = "col-sm-3">{!! Form::label('note','備考') !!}</label>
                        <div class="col-sm-9">
                            {{ Form::text('note', null,['class' =>'form-control']) }}
                        </div>
                        <label for="storing_id" class = "col-sm-3">{!! Form::label('storing_id','保存予定場所') !!}</label>
                        <div class="col-sm-9">
                            {{ Form::select('storing_id',['1' => '冷蔵', '2' => '冷凍', '3' => '野菜室'],['class' =>'form-control']) }}
                            
                        </div>
                        {!! Form::submit('買い物リストに追加', ['class' => 'btn btn-primary btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                    </div>
                  </div>
              </div>
            </div>
          </div>

        </div>
        
    </div>
    
@endsection
