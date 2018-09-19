<!-- create.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>TaskList</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">      
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>      
  </head>
  <body>
    <div class="container">
      <h2>Create Task</h2><br/>
      <form method="post" action="{{url('tasks')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Title">Title</label>
            <input type="text" class="form-control" name="title">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="Description">Description</label>
                <textarea for="Description" rows="5" cols="50" class="form-control" name="description"></textarea>              
            </div>
        </div>   
        <div class="row">
          <div class="col-md-5"></div>
            <div class="form-group col-md-4">
                <label>Finished</label>
                <select name="finished">
                  <option value="Y">Yes</option>
                  <option value="N">No</option>                 
                </select>
            </div>
        </div>   
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-2" style="margin-top:28px">
            <a href="{{url('tasks')}}">BACK</a>
          </div>
          <div class="form-group col-md-4" style="margin-top:20px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>  
      </form>
    </div>    
  </body>
</html>