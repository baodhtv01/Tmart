@extends('layouts.master')
@section('title', 'User Admin')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush
@section('content')

    <!-- DataTales Example -->
    <div class="card mb-4">
        <div class="card-header">Change Password</div>
        <div class="card-body">
            <form method="post" action="{{route('user.changePassStore',['id'=>Auth()->user()->id])}}">
               @foreach($errors->all() as $err)
                   <div class="alert alert-danger">
                       {{$err}}
                   </div>
                @endforeach
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                @endif
                @csrf
                <!-- Form Group (current password)-->
                <div class="mb-3">
                    <label class="small mb-1" for="currentPassword">Password Hiện Tại</label>
                    <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password" name="oldPass">
                </div>
                <!-- Form Group (new password)-->
                <div class="mb-3">
                    <label class="small mb-1" for="newPassword">Password mới</label>
                    <input class="form-control" id="newPassword" type="password" placeholder="Enter new password" name="password">
                </div>
                <!-- Form Group (confirm password)-->
                <div class="mb-3">
                    <label class="small mb-1" for="confirmPassword">Nhập lại Password</label>
                    <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password" name="password_confirmation">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
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
