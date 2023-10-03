@extends('layout.app')
@section('content')
@if ($message = Session::get('error'))
<div class="alert alert-danger" role="alert" id="message">
    {{ $message }}
</div>
@endif
    <form action="/customsignup" method="POST" id="signupform" class="col-md-4">
        @csrf
        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" placeholder="Enter name" name="name">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" name="password">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword2">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder=" Confirm Password" name="confirmpassword">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
@section('jscontent')
$('#signupform').validate({
    rules:{
        name:{
            required:true
        },
        email:{
            required:true,
            email:true
        },
        password:{
            required:true,
            minlength:6
        },
        confirmpassword:{
            required:true,
            equalTo:'#exampleInputPassword1'
        }
    },
    messages:{
        name:"Please enter your name",
        email:{
            required:"Please enter your email",
            email:"Please enter valid email"
        },
        password:{
            required:"Please enter password",
            minlength:"Please enter password greater than or equal to 6 characters"
        },
        confirmpassword:{
            required:"Please confirm password",
            equalTo:"Password is not matching"
        }
    },
    submitHandler: function(form) {
        form.submit();
    }
})
@endsection
