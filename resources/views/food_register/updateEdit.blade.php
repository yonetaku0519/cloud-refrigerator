@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-md-4">
            {{-- 冷蔵庫のイラスト --}}
            
            <img src="{{ asset('images/phone_refrigerator.jpg') }}" class="settle-img" style="position: center;">
            
        </aside>
        <div class="col-md-8">
            {{-- フォーム送信画面 --}}
            
            @if (count($food) > 0)         <!-- ここはfoodsは多次元配列である。  -->
            
                  
                  @foreach($food as $foodDetail)      <!-- ここで保存場所毎の配列にする -->
                      
                    {!! Form::open(['action' => 'FoodsController@foodRegister']) !!}
                    <div class="form-group" >
                        <div class = "form-inline">
                            <label for="name" class = "col-sm-3">{!! Form::label('name','食材名') !!}</label>
                            <div class="col-sm-9">
                              {{ Form::text('name', $foodDetail->name,['class' =>'form-control']) }}
                            </div> 
                        </div>
                        <div class = "form-inline">
                            <label for="amount" class = "col-sm-3">{!! Form::label('amount','量') !!}</label>
                            <div class="col-sm-9"　style="width:80%">
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
                        {!! Form::submit('食材情報の更新', ['class' => 'btn btn-primary btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                        {!! Form::close() !!}
                        
                    </div>
            
                  @endforeach
                  
            @endif
            <a href="{!! route('food.update',[],) !!}" class = "btn btn-secondary btn-lg" style="display: block;margin: 10px 10px 0 auto; width:10%; color:white;">戻る</a>
        </div>
    </div>
@endsection