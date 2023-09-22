
01
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
 
    

  <div class="container mt-70 " style="margin-top:70px">
    <div class="row justify-content-center">
      <div class="col-md-6 reg_form shadow-md">
    
        <h2 class="text-center bg-primary text-white">Registration Form</h2>
        <form method="post" action="/register">
          @csrf
         
            @if (session()->has('message'))
            <div class="alert alert-danger"> {{ session('message') }}</div>
        @endif
        
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
          <div class="form-group mt-20">
            <label for="username">Username<br>(This wiill be your name on little drop)</label>
            <input type="text" class="form-control" required id="username" name="username" value="{{old('username')}}">
          </div>
          <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" required   id="phone" name="phone" value="{{old('phone')}}">
          </div>
          <div class="form-group">
            <label for="email">Email(optional):</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
          </div>
          <div class="form-group">
            <label for="state_id">State of Residence:</label>
          <select name="state_id" value="{{ old('state_id') }}"class="form-control" onchange="stateChange(this.value)">
            <option value="0"> </option>
            @foreach ($states as $state)
            <option  value="{{ $state->id }}">{{ $state->name }}</option>
            @endforeach
        </select>
          </div>
          <div class="form-group" id="lga">
            <Label>LGA</Label>
              <select name="lga" class="form-control">
                <option value="0"></option>
                
              </select>
          </div>
          <fieldset class="pl-10">
            <legend class="bg bg-dark text-white">Bank Details</legend> 
          <div class="form-group">
            <label for="bank_name">Bank Name:</label>
            <input type="text" required  class="form-control" id="bank_name" name="bank_name">
          </div>
          <div class="form-group">
            <label for="account_name">Account Name:</label>
            <input type="text" required class="form-control" id="account_name" name="account_name" value="{{old('account_name')}}">
          </div>
          <div class="form-group">
            <label for="account_no">Account No:</label>
            <input type="number"  required  class="form-control" id="account_no" name="account_no"  value ="{{old('account_no')}}">
          </div>
        </fieldset>
          <div class="form-group">
            <label for="referral_code">Referral Code:</label>
            <input type="text" class="form-control" id="referral_code" name="referral_code" value="{{old('referral_code')}}">
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" required  class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="password">Repeat Password:</label>
            <input type="password" required  autocomplete="no" class="form-control" id="password" name="password_confirmation" required>
          </div>
          <div class="form-group">
           
            <input type="checkbox" class="" required> <label>I have read the Terms & Conditions</label>
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>

@endsection