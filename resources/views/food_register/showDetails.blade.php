@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- 冷蔵庫のイラスト --}}
            
            <img src="{{ asset('images/phone_refrigerator.jpg') }}" class="settle-img">
            
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
                  
                  @foreach($foods as $foodsLocation)      <!-- ここで保存場所毎の配列にする -->
              
                  <tbody>
                      @foreach($foodsLocation as $food)       <!-- ここから要素を取り出す-->
                        <td scope="row">{{  $food->name  }}</th>
                        <td scope="row">{{  $food->amount  }}</th>
                        <td scope="row">{{  $food->freshness_date  }}</th>
                        <td scope="row">{{  $food->note  }}</th>
                      @endforeach
                  </tbody>
                  
                </table>
                    
            
            @endforeach
            
              
          @endif
          
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            食材登録
            </button>
            <!-- Modalの中身 -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">食材登録</h5></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  
                  <div class="modal-body">
                    
                    {!! Form::open(['action' => 'FoodsController@foodRegister']) !!}
                        <div class="form-group row">
                            <label for="name" class = "col-sm-3">{!! Form::label('name','食材名') !!}</label>
                            <div class="col-sm-9">
                              {{ Form::text('name', null,['class' =>'form-control']) }}
                            </div> 
                            <label for="amount" class = "col-sm-3">{!! Form::label('amount','量') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::text('amount', null,['class' =>'form-control']) }}
                            </div>  
                            <label for="freshness_date" class = "col-sm-3">{!! Form::label('freshness_date','賞味期限') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::date('freshness_date', null,['class' =>'form-control']) }}
                            </div> 
                            <label for="note" class = "col-sm-3">{!! Form::label('note','備考') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::text('note', null,['class' =>'form-control']) }}
                            </div>
                            {!! Form::submit('冷蔵庫に追加', ['class' => 'btn btn-primary btn-lg']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal" >一覧表示に戻る</button>
                    
                  </div>
                  
                  
                  
                </div>
              </div>
            </div>
            
          
          
          
        </div>
    </div>
@endsection