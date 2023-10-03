
    @extends('layout.app')
    @section('content')


    <body class="antialiased">
    <form method="post" action="/storestudent" id="addstudent" class="col-md-4" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
        <label for="exampleInputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name">
    </div>
    <div class="mb-3">
        <label for="exampleInputPhone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="exampleInputPhone" name="phone">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="email">
    </div><div class="mb-3">
        <label for="exampleInputAddress" class="form-label" name="email">Address</label>
        <textarea class="form-control" id="exampleInputAddress" name="address"></textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputGender" class="form-label" name="email">Gender</label>
        <select class="form-select" aria-label="Default select example" name="gender">
            @foreach($gender as $k=>$v)
            <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputStandard" class="form-label" name="email">Standard</label>
        <select class="form-select" aria-label="Default select example" name="standard">
            @foreach($standard as $k=>$v)
            <option value="{{$v->id}}">{{$v->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <div class="mb-3">
            <label for="formFile" class="form-label">Student Image</label>
            <input class="form-control" type="file" id="formFile" name="image" accept="image/png, image/jpeg, image/jpg">
          </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection

@section('jscontent')
$('#addstudent').validate({
    rules:{
        name:{
            required:true
        },
        phone:{
            required:true,
            maxlength:10,
            minlength:10,
            number:true
        },
        email:{
            required:true,
            email:true
        },
        address:{
            required:true,
            maxlength:50
        }
    },
    messages:{
        name:"Please enter your name",
        phone:{
            required:"Please enter your phone number",
            maxlength:"Please enter valid phone number",
            minlength:"Please enter valid phone number",
            number:"Please enter valid phone number"
        },
        email:{
            required:"Please enter your email",
            email:"Please enter valid email"
        },
        address:{
            required:"Please enter your address",
            maxlength:"Please enter address less than 50 characters"
        }
    },
    submitHandler: function(form) {
        form.submit();
    }
})
@endsection

