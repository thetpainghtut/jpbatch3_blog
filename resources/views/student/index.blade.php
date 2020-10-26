@extends('master')
@section('title','Student List')

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('mytemplateassets/img/about-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>All Students</h1>
            <span class="subheading">This is what I do.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="{{route('student.create')}}" class="btn btn-info">Add New</a>
      </div>
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($students as $row)
          <p> 
            <form method="post" action="{{route('student.destroy',$row->id)}}" onsubmit="return confirm('Are you sure?')" class="d-inline-block">
              @csrf
              @method('DELETE')
              <input type="submit" name="btnsubmit" class="btn btn-danger" value="Delete">
            </form>
            {{$row->id}} | {{$row->name}} | {{$row->email}} | {{$row->phoneno}}</p>
        @endforeach
      </div>
    </div>
  </div>
@endsection