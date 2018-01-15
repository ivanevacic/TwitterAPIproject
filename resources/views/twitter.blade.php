<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TwitterAPIproject</title>
  <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="navbar-brand">TwitterAPIproject</a>
      </div>
    </div>
  </nav>

  <div class="container">
    @if(!empty($data))
      @foreach($data as $key => $tweet)
        <div class="well">
          <h3>{{$tweet['text']}}</h3>
        </div>
      @endforeach
    @else
      <p>You have no created tweets!
    @endif
  </div>
</body>
</html>