<h2>{{$noti->title}}</h2>
@if($noti->type_link=="imagen")
<img src="{{$noti->link}}">
@else
<?php $video_id = array_reverse(explode('=',$noti->link))[0]; ?>
<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video_id}}?autoplay=0&controls=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
@endif
<h4>{{$noti->content}}</h4>
<h6>Promix.mx</h6>