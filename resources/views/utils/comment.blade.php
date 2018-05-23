
<div class="container">
  <div class="comments col-md-9 mt-lg-5" style="margin-top: 250px!important;" id="comments">
    <h3 class="mb-2">Comments</h3>
    <!-- comment -->
    @if(isset($comments))
    @foreach($comments as $comment)
    <div class="comment mb-2 row">
      <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
        <a href=""><img class="mx-auto rounded-circle img-fluid" src="http://demos.themes.guide/bodeo/assets/images/users/m103.jpg" alt="avatar"></a>
      </div>
      <div class="comment-content col-md-11 col-sm-10">
        <h6 class="small comment-meta"><a href="{{ route('users.show', $comment->user_id) }}">{{ $comment->user->name }}</a> {{ $comment->created_at->diffForHumans() }}</h6>
        <div class="comment-body">
          <p>
            {{ $comment->body }}
            <br>
            <a href="" class="text-right small"><i class="ion-reply"></i> Reply</a>
          </p>
        </div>
      </div>
    </div>
    @endforeach
    @endif
    <!-- /comment -->
  </div>

  <div class="col-lg-8 pull-left mt-5">
    <form action="{{ route('comments.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="body">Comment</label>
        <textarea type="text" class="form-control" name="body" id="body" aria-describedby="body"></textarea>
      </div>
      {{--<input type="hidden" value="{{ $project->id }}" name="commentable_id" class="form-group">--}}
      {{--<input type="hidden" value="{{ \App\Models\Project::class }}" name="commentable_type" class="form-group">--}}
      {{--<div class="form-group">--}}
      {{--<label for="url">Password</label>--}}
      {{--<input type="password" class="form-control" id="url" placeholder="Password">--}}
      {{--</div>--}}
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
