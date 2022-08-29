@extends('layouts.login')
@section('main')
<div class=" d-flex w-100 justify-content-center m-auto">
        <div class="card w-25 p-4 border-0" style="box-shadow: 1px 1px 8px #E4DFDA ">
            <h3 class="mb-3">ورود</h3>
            <form action="{{ route('login') }}" method="post">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="Email" class="form-label">
                        نام کاربری
                    </label>
                    <input type="text" class="form-control" placeholder="نام کاربری خود را وارد کنید" name="Email" id="Email">
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">
                        گذرواژه
                    </label>
                    <input type="password" class="form-control" placeholder="گذرواژه خود را وارد کنید" name="password" id="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="ورود" />
                </div>
            </form>
    </div>
</div>
@endsection
