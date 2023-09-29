
    @extends('layout.app')
    @section('content')
    <table class="table table-striped description">
        <thead>
            <tr>
                <th scope="col" colspan="2" style="text-align: center">Student Details</th>
            </tr>
          <tr>
            <th scope="col">Name</th>
            <td>{{$student->name}}</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Phone</th>
            <td>{{$student->phone}}</td>

          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>{{$student->email}}</td>

          </tr>
          <tr>
            <th scope="row">Address</th>
            <td>{{$student->address}}</td>
          </tr>
          <tr>
            <th scope="row">Gender</th>
            <td>{{$student->gender->name}}</td>
          </tr>
          <tr>
            <th scope="row">Standard</th>
            <td>{{$student->standard->name}}<sup>th</sup></td>
          </tr>
          <tr>
            <th scope="row">Image</th>
            <td><img src="{{ asset('student/'.$student->image )}}"></td>
          </tr>
        </tbody>
      </table>
      @endsection
