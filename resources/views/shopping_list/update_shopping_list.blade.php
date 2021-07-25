@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
            {{-- メモ帳のイラスト --}}
            <img src="{{ asset('images/list_img.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
         </aside>
        <div class="col-md-8">
            {{-- フォーム送信画面 --}}
            
            @if (count($food) > 0)         <!-- ここはfoodsは多次元配列である。  -->
            
                  
                  @foreach($food as $foodDetail)      <!-- ここで保存場所毎の配列にする -->
                      
                    {!! Form::open(['action' => 'FoodsController@shoppingListUpdateRun']) !!}
                    <div class="form-group" >
                        <div class = "form-inline">
                            <label for="name" class = "col-sm-3">{!! Form::label('name','食材名') !!}</label>
                            <div class="col-sm-9">
                              {{ Form::text('name', $foodDetail->name,['class' =>'form-control']) }}
                            </div> 
                        </div>
                        <div class = "form-inline">
                            <label for="amount" class = "col-sm-3">{!! Form::label('amount','量') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::text('amount', $foodDetail->amount,['class' =>'form-control']) }}
                            </div>
                        </div>
                        
                        @if(empty($foodDetail->freshness_date))
                        @else
                            <div class = "form-inline">
                                <label for="freshness_date" class = "col-sm-3">{!! Form::label('freshness_date','賞味期限') !!}</label>
                                <div class="col-sm-9">
                                    賞味期限は初期化されます。
                                </div>
                            </div>
                        @endif
                        
                        
                        <div class = "form-inline">
                            <label for="storing_id" class = "col-sm-3">{!! Form::label('storing_id','保存予定場所') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::select('storing_id',['1' => '冷蔵', '2' => '冷凍', '3' => '野菜室'],$storing_id,['class' =>'form-control']) }}
                            </div>
                        </div>
                        <div class = "form-inline">
                            <label for="note" class = "col-sm-3">{!! Form::label('note','備考') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::text('note', $foodDetail->note,['class' =>'form-control']) }}
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$foodDetail->id}}"/>
                        
                        
                        {!! Form::submit('買い物リストの更新', ['class' => 'btn btn-primary btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                        
                        <!--　削除ボタン　-->
                        {!! Form::open(['action' => 'FoodsController@shoppingListDestroy']) !!}
                            <input type="hidden" name="id" value="{{$foodDetail->id}}"/>
                            {!! Form::submit('削除', ['class' => 'btn btn-danger btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                    </div>
            
                  @endforeach
                  
            @endif
            <!--  戻るボタン（更新タブに戻る）  -->
            <a href="{!! route('check_shopping_list',[],) !!}" class = "btn btn-secondary btn-lg" style="display: block;margin: 10px 10px 0 auto; width:10%; color:white;">戻る</a>
        </div>
    </div>
@endsection