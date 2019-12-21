@extends('master')


@section('content')

 <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Post 
                    <small>Post Info</small>
                </h1>

              
                <h2>
                    <a href="#">{{$post->title}}</a>
                </h2>
                  @if($post->image)
                     <p>
                        <img src="{{asset('storage/images/'.$post->image)}}">
                    </p>
                     <hr>
                  @endif
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->toDayDateTimeString() }}</p>
                <hr>
                
                <p>{{$post->body}}</p>
                <hr>
                <div class="comments">
                    <h2>Comments</h2>
                    @foreach($post->comments as $comment)
                      <p>{{$comment->body}}<br><span class="glyphicon glyphicon-time"></span><span>{{$comment->created_at->toDayDateTimeString()}}</span></p>

                      <hr>
                    @endforeach
                    
                </div>
                  @if($stop_comment==1)
                  <h3>Comments are currently closed !!</h3>
                  @else
                  @if(Auth()->check())
                  <form method="post" action="{{url('comments/store')}}">
                    {{csrf_field()}}
                     <input type="hidden" name="post_id" value="{{$post->id}}">
                     <div class="form-group">
                         <label for="comment">Add Comment</label>
                         <textarea  name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror" required></textarea>
                         @error('comment')
                              <span class="invalid-feedback" role="alert">
                                  <strong style="color: red">{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
           
                     <div class="form-group">
                         <button type="submit"  class="btn btn-primary">Add Comment</button>
                     </div>

                 </form>  
                 @endif 
                 @endif  


              
              
              
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                     <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                      @foreach($cats as $cat)
                        <div class="col-lg-6">
                                <p><a href="{{url('categories',$cat->id)}}">{{$cat->name}}</a></p>
                        </div>
                       @endforeach
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
          </div>


@endsection