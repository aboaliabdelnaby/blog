@extends('master')


@section('content')

 <div class="row">

            <!-- Blog Entries Column -->
      <div class="col-md-8">

          <h1>
              Statistics
              <small>Website Statistics</small>
          </h1>
           <div>
             <table class="table table-hover" style="margin-top:30px ">
               <tr>
                 <td>All Users</td>
                 <td>{{$statistics['users']}}</td>
               </tr>
               <tr>
                 <td>All Posts</td>
                 <td>{{$statistics['posts']}}</td>
               </tr>
               <tr>
                 <td>All Comments</td>
                 <td>{{$statistics['comments']}}</td>
               </tr>
               <tr>
                 <td>Most Active User</td>
                 <td>{{$statistics['active_user']}}</td>
               </tr>
                 <tr>
                 <td>{{$statistics['active_user']}} Likes</td>
                 <td>{{$statistics['active_user_likes']}}</td>
               </tr>
                 <tr>
                 <td>{{$statistics['active_user']}} Comments</td>
                 <td>{{$statistics['active_user_comments']}}</td>
               </tr>
             </table>
           </div> 
        
       

      </div>
  </div>

@endsection