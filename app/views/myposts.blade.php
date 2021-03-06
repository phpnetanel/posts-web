@extends('template.template')
@section('menu')
@include('menu')
@stop

@section('main')
<div class="col-md-12">
   @if(Session::has('message'))
         <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif
    <div class="jumbotron clearfix">
      <h1>מערכת הפוסטים של ישראל</h1>
      <hr>
      <p>הרשם כבר עכשיו וכתוב פוסטים בכל נושא שתרצה</p>
      <p>אנשים מכל העולם יוכלו לקרוא מה שכתבת ולהגיב....</p>
      <img src="<?php echo asset('images/keyboard.jpg');?>" alt="פוסטים" class="pull-left">
    </div>
</div>

<div class="col-md-12 clearfix">


    <h1>נוספו לאחרונה:</h1>
    @if(count($posts) > 0)

      @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
        <p style="text-align:left;"><i>{{$post->created_at}}</i></p>
        <p>{{$post->body}}</p>
        <p><a href="get/edit/{{$post->id}}" class="btn btn-primary btn-sm pull-left">ערוך פוסט</a></p>
        <form method="post" action="delete/{{ $post->id}}" >
          <button class="btn btn-danger btn-sm pull-left">מחק פוסט</button>
        </form>
      @endforeach
      <ul class="pagination">
      <?php echo $posts->links(); ?>
    </ul>

    @else
        <h1>אין פוסטים כרגע</h1>
    @endif

</div>

@stop