@extends('layouts.master')
@section('title', 'Info User')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" xmlns="">
{{--    jQuery--}}
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <link href="{{asset('plugins/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
@endpush
@section('content')

    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <h4 class="nav-link active ms-0"><b>Profile</b></h4>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                       @if(Auth::user()->avatar != null)
                            <img id="avt-preview" class="img-fluid rounded-circle" src="{{asset(Auth::user()->avatar)}}" alt="Profile picture">
                        @else
                            <img id="avt-preview" class="img-fluid rounded-circle" src="{{asset('img/undraw_profile.svg')}}" alt="Profile picture">
                        @endif
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <form method="post" action="{{route('user.changeAvt',['id'=>Auth::user()->id])}}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="avatar" id="avatar" class="form-control-file">
                            <button type="submit" class="btn btn-primary mt-2">Cập Nhập</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Thông tin chi tiết</div>
                    <div class="card-body">
                        <form method="post" action="{{route('user.change',['id'=>Auth::user()->id])}}">
                            @csrf
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" value="{{$user->username}}" disabled>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                <input class="form-control" id="inputEmailAddress" type="email" name="email" value="{{$user->email}}" required>
                                @if($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('email')}}
                                    </div>
                                @endif
                            </div>
                            <!-- Form Group (full name)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputFullName">Name</label>
                                <input name="full_name" class="form-control" id="inputFullName" type="text" value="{{$user->name}}" required>
                                @if($errors->has('full_name'))
                                    <div class="alert alert-danger">
                                        {{$errors->first('full_name')}}
                                    </div>
                                @endif
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone</label>
                                    <input class="form-control" id="inputPhone" type="tel" value="{{$user->phone}}" name="phone" required>
                                </div>
                                <!-- Form Group (Create)-->
                                <div class="col-md-6">
                                    <label class="small mb-1">Tài khoản được tạo lúc</label>
                                    <input class="form-control" type="text" value="{{$user->created_at}}" disabled>
                                </div>
                            </div>
                            <!-- submit form-->
                            <button class="btn btn-primary" type="submit">Cập Nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('plugins/toast-master/js/jquery.toast.js')}}"></script>
    <script>
        $('#avatar').on('change', function() {
            //check file image
            var file = this.files[0];
            var match = ["image/jpeg", "image/png"];
            if (!((file.type == match[0]) || (file.type == match[1]))) {
                swal({
                    title: "Lỗi",
                    text: "Chỉ được chọn file ảnh",
                    icon: "error",
                    button: "OK",
                });
                $('#avatar').val('');
                return false;
            }else{
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avt-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });
        @if(session('success'))
            $.toast({
                heading: '{{session('success')}}',
                text: '',
                position: 'top-center',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
        @endif
    </script>
@endpush
