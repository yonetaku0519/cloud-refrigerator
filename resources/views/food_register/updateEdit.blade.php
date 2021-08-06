@extends('layouts.app')

@section('content')

    <div class="row">
        <aside class="col-sm-4">
          @if($storing_id === 1)
            {{-- 冷蔵庫(冷蔵室)のイラスト --}}
            <img src="{{ asset('images/refrigerator_cool.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
          @elseif($storing_id === 2)
            {{-- 冷蔵庫(冷凍室)のイラスト --}}
            <img src="{{ asset('images/refrigerator_frozen.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
          @elseif($storing_id === 3)
            {{-- 冷蔵庫(野菜室)のイラスト --}}
            <img src="{{ asset('images/refrigerator_vegetables.jpg') }}" class="settle-img" style="display: block;margin: 10px 10px 0 auto;">
          @endif
        </aside>
        <div class="col-md-8">
            {{-- フォーム送信画面 --}}
            
            @if (count($food) > 0)         <!-- ここはfoodsは多次元配列である。  -->
            
                  
                  @foreach($food as $foodDetail)      <!-- ここで保存場所毎の配列にする -->
                      
                    {!! Form::open(['action' => 'FoodsController@updateRun']) !!}
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
                        <div class = "form-inline">
                            <label for="freshness_date" class = "col-sm-3">{!! Form::label('freshness_date','賞味期限') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::date('freshness_date', $foodDetail->freshness_date,['class' =>'form-control']) }}
                            </div>
                        </div>
                        <div class = "form-inline">
                            <label for="note" class = "col-sm-3">{!! Form::label('note','備考') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::text('note', $foodDetail->note,['class' =>'form-control']) }}
                            </div>
                        </div>
                        <div class = "form-inline">
                            <label for="storing_id" class = "col-sm-3">{!! Form::label('storing_id','保存場所') !!}</label>
                            <div class="col-sm-9">
                                {{ Form::select('storing_id',['1' => '冷蔵室', '2' => '冷凍室', '3' => '野菜室'],$storing_id,['class' =>'form-control']) }}
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$foodDetail->id}}"/>
                        
                        
                        {!! Form::submit('食材情報の更新', ['class' => 'btn btn-primary btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                        
                        <!--　削除ボタン　-->
                        {!! Form::open(['action' => 'FoodsController@destroy']) !!}
                            <input type="hidden" name="id" value="{{$foodDetail->id}}"/>
                            <input type="hidden" name="storing_id" value="{{$foodDetail->storing_id}}"/>
                            {!! Form::submit('消費', ['class' => 'btn btn-danger btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                    </div>
            
                  @endforeach
                  
            @endif
            <!--  戻るボタン（更新タブに戻る）  -->
            <a href="{!! route('food.update',['id' => $storing_id],) !!}" class = "btn btn-secondary btn-lg" style="display: block;margin: 10px 10px 0 auto; width:10%; color:white;">戻る</a>
        </div>
    </div>
@endsection