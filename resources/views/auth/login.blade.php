@extends("layouts.app")
@section("title", "Logwwin")

@section("content")
    das
    <form action="">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            @if($errors->has('email'))
                <span class="text-danger">
                    {{$errors->first('email')}}
                </span>
            @endif
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            @if($errors->has('password'))
                <span class="text-danger">
                    {{$errors->first('password')}}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Log in</button>
    </form>

@endsection
