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
                          <td scope="row">{{  $food->name  }}</th>
                          <td scope="row">{{  $food->amount  }}</th>
                          <td scope="row">{{  $food->freshness_date  }}</th>
                          <td scope="row">{{  $food->note  }}</th>
                        </tbody>
                      
                  @endforeach
                  {{  $foods->links() }}
              
                </table>
          @endif
          
          
          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
          食材登録
          </button>
          <br><br>
            
          <!-- Modalの中身 -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">食材登録</h5>
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
                        <label for="storing_id" class = "col-sm-3">{!! Form::label('storing_id','保存場所') !!}</label>
                        <div class="col-sm-9">
                            {{ Form::select('storing_id',['1' => '冷蔵', '2' => '冷凍', '3' => '野菜室'],['class' =>'form-control']) }}
                        </div>
                        {!! Form::submit('冷蔵庫に追加', ['class' => 'btn btn-primary btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                    </div>
                  </div>
              </div>
            </div>
          </div>
          
          <!-- 保存場所毎のリンクボタン群 -->
          <div class = "button-group">
            <a href="{{ route('food.showDetails', ['id' => 1]) }}" class = "btn btn-outline-primary btn-lg">冷蔵ドアを開ける</a>
            <a href="{{ route('food.showDetails', ['id' => 2]) }}" class = "btn btn-outline-info btn-lg">冷凍ドアを開ける</a>
            <a href="{{ route('food.showDetails', ['id' => 3]) }}" class = "btn btn-outline-success btn-lg">野菜室を開ける</a>
          </div>
        
        <!-- 画面右のタブレイアウトの閉じdiv -->
        </div>
        
    <!-- rowの閉じdiv -->    
    </div>
    
@endsection