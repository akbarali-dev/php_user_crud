@extends('layouts.app')
@section('content')
    <Form method="post" enctype="multipart/form-data" action="{{route("users.store")}}"
          class="container card border border-danger mt-3 rounded p-5" style="width: 50rem;">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="exampleInputEmail1">Full name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter full name" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password" required id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary mt-2 mb-2b">Submit</button>

    </Form>
@endsection
