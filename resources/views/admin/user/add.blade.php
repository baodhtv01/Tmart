@extends('layouts.master')
@section('title', 'Add User')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thêm tài khoản</h6>
        </div>
        <div class="card-body">
            <form action="{{route('user.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Name</label>
                    <input name="name" class="form-control form-control-solid" id="exampleFormControlInput1" type="text" placeholder="Name">
                </div>
                @if ($errors->has('name'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Phone</label>
                    <input name="phone" class="form-control form-control-solid" id="exampleFormControlInput1" type="text" placeholder="Phone">
                </div>
                @if ($errors->has('phone'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </div>
                @endif
{{--                username--}}
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Username</label>
                    <input name="username" class="form-control form-control-solid" id="exampleFormControlInput1" type="text" placeholder="Username">
                </div>
                @if ($errors->has('username'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('username') }}</strong>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input name="email" class="form-control form-control-solid" id="exampleFormControlInput1" type="email" placeholder="name@example.com">
                </div>
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Password</label>
                    <input name="password" class="form-control form-control-solid" id="exampleFormControlInput1" type="password" placeholder="Password">
                </div>
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Confirm Password</label>
                    <input name="password_confirmation" class="form-control form-control-solid" id="exampleFormControlInput1" type="password" placeholder="Password">
                </div>
                @if ($errors->has('password_confirmation'))
                    <div class="alert alert-danger">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </div>
                @endif
                <div class="mb-3">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select name="role" class="form-control form-control-solid" id="exampleFormControlSelect1">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                </div>
{{--                btn--}}
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary btn-block">Thêm tài khoản</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/toast-master/js/jquery.toast.js')}}"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        @if(\Session::has('success'))
        $.toast({
            heading: 'Success!',
            position: 'top-center',
            text: '{{session()->get('success')}}',
            loaderBg: '#4e73df',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
        @endif
    </script>
@endpush
