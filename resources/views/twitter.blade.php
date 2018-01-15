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
    <form class="well" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @if(count($errors) > 0 )
        @foreach($errors->all() as $error)
          <div class="alert alert-danger">
            {{$error}}
          </div>
        @endforeach
      @endif
      <div class="form-group">
        <label>Tweet Text</label>
        <input type="text" name="tweet" class="form-control">
      </div>
      <div class="form-group">
          <label>Tweet Image</label>
          <input type="file" name="images[]" multiple class="form-control"> {{-- images[] because we upload multiple photos,thus the array --}}
      </div>
      <div class="form-group">
        <button class="btn btn-success">Post tweet</button> 
      </div>
    </form>

    @if(!empty($data))
      @foreach($data as $key => $tweet)
        <div class="well">
          <h3>{{$tweet['text']}}
            <i class="glyphicon glyphicon-heart"></i> {{$tweet['favorite_count']}}
            <i class="glyphicon glyphicon-repeat"></i> {{$tweet['retweet_count']}}
          </h3>
          @if(!empty($tweet['extended_entities']['media']))   {{-- If there IS a photo in tweet --}}
            @foreach($tweet['extended_entities']['media'] as $i)  {{-- Show tweet photo --}}
              <img src="{{$i['media_url_https']}}" style="width:100px">
            @endforeach
          @endif
        </div>
      @endforeach
    @else
      <p>You have no created tweets!
    @endif
  </div>
</body>
</html>