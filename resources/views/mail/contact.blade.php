<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>title</title>
</head>
<body>
    <p>以下の内容でお問い合わせを受け付けました。</p>
    <p>お名前：{{$data['uname']}}</p>
    <p>メールアドレス：{{$data['email']}}</p>
    <p>お問い合わせ内容：</p>
    <p>{!!nl2br(htmlspecialchars($data['body']))!!}</p>
</body>
</html>