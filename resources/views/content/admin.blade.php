@extends('master')


@section('content')

 <div class="row">

    <h3>Control Panel</h3>
    <h5>List of Users</h5>
    <div>
      <table class="table table-hover">
        <tr>
          <th>name</th>
          <th>email</th>
          <th>user</th>
          <th>editor</th>
          <th>admin</th>
        </tr>
         @foreach($users as $user)
         <form method="post" action="addRole">
          {{csrf_field()}}
          <input type="hidden" name="id" value="{{$user->id}}">
          <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td><input type="checkbox" name="user" onchange="this.form.submit()" {{$user->hasRole('user')?'checked':''}}></td>
          <td><input type="checkbox" name="editor" onchange="this.form.submit()"  {{$user->hasRole('editor')?'checked':''}}></td>
          <td><input type="checkbox" name="admin" onchange="this.form.submit()"  {{$user->hasRole('admin')?'checked':''}}></td>
        </tr>
        </form>
         @endforeach
        
      </table>
    </div>
    <div>
      <h3>Setting</h3>
      <form method="post" action="{{url('setting')}}">
         {{csrf_field()}}
         Stop Comment : <input type="checkbox" name="stop_comment" onchange="this.form.submit()" {{ $stop_comment==1 ? 'checked' : '' }}><br>
         Stop Register : <input type="checkbox" name="stop_register" onchange="this.form.submit()" {{ $stop_register==1 ? 'checked' : '' }}>
      </form>
    </div>
      
            
</div>

@endsection