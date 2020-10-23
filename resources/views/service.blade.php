@extends('master')

@section('content')
  <!-- Page Header -->
  <header class="masthead" style="background-image: url({{asset('mytemplateassets/img/contact-bg.jpg')}})">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Service Page</h1>
            <span class="subheading">Have questions? I have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        {{-- <h1>{{$name}}</h1> --}}

        {{-- Array of arrays --}}
        @foreach($a as $row)
          <p>Name: {{$row['name']}}</p>
          <p>Age: {{$row['age']}}</p>
        @endforeach

        {{-- May Be Array of objects --}}
        {{-- @foreach($students as $row)
          <p>Name: {{$row->name}}</p>
          <p>Age: {{$row->age}}</p>
        @endforeach --}}
      </div>
    </div>
  </div>
@endsection