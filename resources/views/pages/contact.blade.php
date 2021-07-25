
@extends('layouts.app')
 
@section('content')
<div class="container">
    <h1>お問い合わせ</h1>
    <form action="{{route('contact_send')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="uname">お名前</label>
            <input type="text" name="uname" id="uname" class="form-control" value="{{old('uname')}}" placeholder="お名前を入力してください">
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="メールアドレスを入力してください">
        </div>
        <div class="form-group">
            <label for="body">内容</label>
            <textarea name="body" id="body" class="form-control" rows="5" placeholder="内容を入力してください">{{old('body')}}</textarea>
        </div>
        <input type="submit" value="問い合わせ" class="btn btn-primary">
        <input type="reset" value="キャンセル" class="btn btn-secondary" onclick='window.history.back(-1);'>
    </form>
</div>
@endsection