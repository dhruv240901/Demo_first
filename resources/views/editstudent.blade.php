
        @extends('layout.app')
        @section('content')
    <form method="post" action="/updatestudent/{{$student->id}}" id="editstudent" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="mb-3">
        <label for="exampleInputName" class="form-label" ">Name</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="emailHelp" name="name" value="{{old('name',$student->name)}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPhone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="exampleInputPhone" name="phone" value="{{old('phone',$student->phone)}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{old('email',$student->email)}}">
    </div><div class="mb-3">
        <label for="exampleInputAddress" class="form-label">Address</label>
        <textarea class="form-control" id="exampleInputAddress" name="address">{{old('address',$student->address)}}</textarea>
    </div>
    <div class="mb-3">
        <label for="exampleInputGender" class="form-label" name="email">Gender</label>
        <select class="form-select" aria-label="Default select example" name="gender">
            @foreach($gender as $k=>$v)
            <option value="{{$v->id}}" @if($student->gender_id==$v->id) selected @endif>{{$v->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputStandard" class="form-label" name="email">Standard</label>
        <select class="form-select" aria-label="Default select example" name="standard">
            @foreach($standard as $k=>$v)
            <option value="{{$v->id}}" @if($student->standard_id==$v->id) selected @endif>{{$v->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <div class="mb-3">
            <label for="formFile" class="form-label">Student Image</label>
            <input class="form-control" type="file" id="formFile" name="image" accept="image/png, image/jpeg, image/jpg">
        </div>
    </div>
    <div class="mb-3">
        <img src="/student/{{$student->image}}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @endsection
  
    @section('jscontent')
    $('#editstudent').validate({
        rules:{
            name:{
                required:true
            },
            phone:{
                required:true,
                maxlength:10,
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
{{-- </script> --}}

