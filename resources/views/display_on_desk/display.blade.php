@extends('layouts.app')

@section('content')
<div class = container>
  <div class = "displayFoodstuff">
      
      @if (count($foods) > 0)
          <table class="table table-hover">
    
              <thead>
                <tr>
                  <th scope="col">食品名</th>
                  <th scope="col">量</th>
                  <th scope="col">賞味期限</th>
                  <th scope="col">備考</th>
                  <th scope="col">保存場所</th>
                </tr>
              </thead>
          
              
              @foreach($foods as $food)
                <tbody>
                    <td scope="row">{{  $food->name  }}</th>
                    <td scope="row">{{  $food->amount  }}</th>
                    <td scope="row">{{  $food->freshness_date  }}</th>
                    <td scope="row">{{  $food->note  }}</th>
                    <td scope="row">{{  $food->storing_id  }}</th>
                </tbody>
              @endforeach
              
              {{  $foods->links() }}
              
          </table>
          
          
      @endif
        
  </div>
</div>
@endsection