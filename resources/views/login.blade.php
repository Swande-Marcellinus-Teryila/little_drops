@extends('mylayouts.app')
@section('meta_tags')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
@endsection
@section('title')
    Registration - little drops
@endsection


@section('content')
 
    

  <div class="container mt-70">
    <div class="row justify-content-center">
      <div class="col-md-6 reg_form shadow-lg">
    
        <h3 class="text-center">User Login</h3>
        @if (session()->has('message'))
        <div class="alert alert-danger"> {{ session('message') }}</div>
    @endif
   
        <form method="post" action="">
          @csrf     
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" id="phone" name="phone">
          </div>
        
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

@endsection