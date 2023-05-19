<div class="comment mt-4 text-justify">
    <img src="https://i.imgur.com/yTFUilP.jpg" alt="" class="rounded-circle" width="40" height="40">
    <h4>{{$comment->user->name}}</h4>
    <span>- {{$comment->created_at}}</span>
    <br>
    <p>{{$comment->comment}}</p>
</div>
