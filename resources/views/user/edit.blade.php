@extends('layouts.app')
@section('content')
    <Form method="post" enctype="multipart/form-data" action="{{route("users.update", $user->id)}}"
          class="container card border border-danger mt-3 rounded p-5" style="width: 50rem;">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Full name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter full name" required value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password" required id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter Password" value="">
        </div>
        <button type="submit" class="btn btn-primary mt-2 mb-2b">Update</button>

    </Form>
@endsection
