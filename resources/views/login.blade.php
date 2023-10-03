@extends('layout.app')
@section('content')
@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert" id="message">
    {{ $message }}
  </div>
@endif
    <form class="col-md-4" action="/customlogin" method="POST" id="loginform">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('jscontent')
$('#loginform').validate({
    rules:{
        email:{
            required:true,
            email:true
        },
        password:{
            required:true,
            minlength:6
        },
    },
    messages:{
        email:{
            required:"Please enter your email",
            email:"Please enter valid email"
        },
        password:{
            required:"Please enter password",
            minlength:"Please enter password greater than or equal to 6 characters"
        },
    },
    submitHandler: function(form) {
        form.submit();
    }
})
@endsection
