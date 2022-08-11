@extends('layouts.master')
@section('title', 'User Client')
@push('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Quản lý tài khoản khách hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Stt</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Thời gian tạo</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $key => $user)
                        @if($user->id != Auth::user()->id)
                            <tr id="{{$user->id}}">
                                <td>{{$key + 1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->status == 1)
                                        <span class="badge badge-success">Đang hoạt động</span>
                                    @else
                                        <span class="badge badge-danger">Đã khóa</span>
                                    @endif

                                </td>
                                @if($user->created_at)
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                @else
                                    <td>No Date</td>
                                @endif

                                <td>
                                    @if($user->status == 1)
                                        <a href="{{route('user.lock',$user->id)}}" class="btn btn-success btn-sm">Khóa Tài Khoản</a>
                                    @else
                                        <a href="{{route('user.unlock',$user->id)}}" class="btn btn-danger btn-sm">Mở Khóa Tài Khoản</a>
                                    @endif
                                    <a href="" class="btn btn-primary btn-sm">Xem</a>
                                    <div class="btn btn-danger btn-sm deleteAlert" data-id="{{$user->id}}">Xóa</div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script>
{{--        onclick deleteAlert--}}
        $(document).ready(function () {
            $('.deleteAlert').click(function () {
                //swal and ajax delete
                swal({
                    title: "Bạn có chắc chắn muốn xóa?",
                    text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var id = $(this).attr('data-id');
                            console.log(id);
                            $.ajax({
                                url: '{{route('user.delete')}}',
                                type: 'POST',
                                data: {
                                    '_token': '{{csrf_token()}}',
                                    'id': id
                                },
                                success: function (data) {
                                        swal("Xóa thành công!", {
                                            icon: "success",
                                        });
                                        $('#'+id).remove();
                                }
                            });
                        } else {
                            swal("Bạn đã huỷ thao tác xóa!");
                        }
                    });
            });
        });
    </script>
@endpush
