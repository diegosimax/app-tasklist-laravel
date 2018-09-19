<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TaskList</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <td><a href="{{url('tasks/create')}}" class="btn btn-info">New Task</a></td>
    <br /><br />
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Finished</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($tasks as $task)     
      @php
        if($task['finished'] == "Y"){
            $finished = "Yes";
        }else{
            $finished = "No";
        }
      @endphp       
      <tr>
        <td>{{$task['id']}}</td>
        <td>{{$task['title']}}</td>
        <td>{{$finished}}</td>
        <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y H:m:s')}}</td>
        <td>{{ \Carbon\Carbon::parse($task->updated_at)->format('d/m/Y H:m:s')}}</td>
        <td><a href="{{action('TaskController@show', $task['id'])}}" class="btn btn-primary">View</a></td>
        <td><a href="{{action('TaskController@edit', $task['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('TaskController@destroy', $task['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>