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
                      
                       {!! Form::open(['action' => 'FoodsController@shoppingBasketRegister']) !!}
                        <div class="form-group">
                            <div class = "form-inline">
                                <label for="name" class = "col-sm-3">{!! Form::label('name','食材名') !!}</label>
                                <div class="col-sm-9">
                                  {{ Form::text('name', $foodDetail->name,['readonly']) }}
                                </div> 
                            </div>
                            <div class = "form-inline">
                                <label for="freshness_date" class = "col-sm-3">{!! Form::label('freshness_date','賞味期限') !!}</label>
                                <div class="col-sm-9">
                                    {{ Form::date('freshness_date', null,['class' =>'form-control']) }}
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$foodDetail->id}}"/>
                            
                            {!! Form::submit('賞味期限登録', ['class' => 'btn btn-primary btn-lg','style' => 'display: block;margin: 10px 10px 0 auto;']) !!}
                            {!! Form::close() !!}
                        
                        </div>
            
                  @endforeach
                  
            @endif
            <!--  戻るボタン（更新タブに戻る）  -->
            <a href="{!! route('check_shopping_list',[],) !!}" class = "btn btn-secondary btn-lg" style="display: block;margin: 10px 10px 0 auto; width:10%; color:white;">戻る</a>
        </div>
    </div>
@endsection