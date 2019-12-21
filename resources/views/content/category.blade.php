@extends('master')


@section('content')

 <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Posts
                    <small>posts of  {{$category->name}}</small>
               </h1>

                @foreach($category->posts as $post)
                <h2>
                    <a href="{{url('posts',$post->id)}}">{{$post->title}}</a>
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
                <a class="btn btn-primary" href="{{url('posts',$post->id)}}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                @endforeach
                 <h2>Add Post</h2>
                 <form method="post" action="{{url('posts/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                     <div class="form-group">
                         <label for="title">Title</label>
                         <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required>
                          @error('title')
                              <span class="invalid-feedback" role="alert">
                                  <strong style="color: red">{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                      <div class="form-group">
                        <label for="cats">Categories</label>
                         <select id="cats" name="cat_id" class="form-control @error('cat_id') is-invalid @enderror">
                          @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                           @endforeach
                         </select>
                              @error('cat_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong style="color: red">{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group">
                         <label for="body">Body</label>
                         <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" required></textarea>
                         @error('body')
                              <span class="invalid-feedback" role="alert">
                                  <strong style="color: red">{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>
                     <div class="form-group">
                         <label for="image">Image</label>
                         <input type="file" name="image" id="image"  class="@error('image') is-invalid @enderror">
                         @error('image')
                              <span class="invalid-feedback" role="alert">
                                  <strong style="color: red">{{ $message }}</strong>
                              </span>
                        @enderror
                     </div>

                     <div class="form-group">
                         <button type="submit"  class="btn btn-primary">Add Post</button>
                     </div>

                 </form>     

                <!-- Pager -->

               <!--  <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

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
                                <p><a href="{{url('categories',$cat->id)}}">{{$cat->name}}</p>
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

@endsection