@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 style="text-align: center">{{ __('Đăng Ký') }}</h3></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tên') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>
                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Nhập lại Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
{{--                        street--}}
                        <div class="row mb-3">
                            <label for="street" class="col-md-4 col-form-label text-md-end">{{ __('Đường') }}</label>
                            <div class="col-md-6">
                                <input id="street" type="street" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">
                                @error('street')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{--                        select provice--}}
                        <div class="row mb-3">
                            <label for="province" class="col-md-4 col-form-label text-md-end">{{ __('Tỉnh và Thành Phố') }}</label>
                            <div class="col-md-6">
                                <select id="province" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" required autocomplete="province">
                                    <option value="">---Tỉnh và Thành Phố---</option>
                                </select>
                                @error('province')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{--                        select district--}}
                        <div class="row mb-3">
                            <label for="district" class="col-md-4 col-form-label text-md-end">{{ __('Quận và Huyện') }}</label>
                            <div class="col-md-6">
                                <select id="district" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" required autocomplete="district">
                                    <option value="">---Quận và Huyện---</option>
                                </select>
                                @error('district')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
{{--                        select wards--}}
<div class="row mb-3">
                            <label for="wards" class="col-md-4 col-form-label text-md-end">{{ __('Phường và Xã ') }}</label>
                            <div class="col-md-6">
                                <select id="wards" class="form-control @error('wards') is-invalid @enderror" name="wards" value="{{ old('wards') }}" required autocomplete="wards">
                                    <option value="">--Phường và Xã--</option>
                                </select>
                                @error('wards')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                //load province ajax
                                $.ajax({
                                    url: '{{ route('provinces') }}',
                                    type: 'POST',
                                    data: {
                                        '_token': '{{ csrf_token() }}'
                                    },
                                    success: function(data){
                                        $.each(data, function(key, value){
                                            $('#province').append('<option value="'+value.id+'">'+value.name+'</option>');
                                        });
                                    }
                                });
                            });
                            //get id province selected
                            //load district ajax
                            $('#province').change(function(){
                                var province_id = $(this).val();
                                $.ajax({
                                    url: '{{ route('districts') }}',
                                    type: 'POST',
                                    data: {
                                        'province_id': province_id,
                                        '_token': '{{ csrf_token() }}'
                                    },
                                    success: function(data){
                                        $('#district').empty();
                                        $('#district').append('<option value="">---Quận và Huyện---</option>');
                                        $.each(data, function(key, value){
                                            $('#district').append('<option value="'+value.id+'">'+value.name+'</option>');
                                        });
                                    }
                                });
                            });
                            //get id district selected
                            //load wards ajax
                            $('#district').change(function(){
                                var district_id = $(this).val();
                                $.ajax({
                                    url: '{{ route('wards') }}',
                                    type: 'POST',
                                    data: {
                                        'district_id': district_id,
                                        '_token': '{{ csrf_token() }}'
                                    },
                                    success: function(data){
                                        $('#wards').empty();
                                        $('#wards').append('<option value="">---Phường và Xã---</option>');
                                        $.each(data, function(key, value){
                                            $('#wards').append('<option value="'+value.id+'">'+value.name+'</option>');
                                        });
                                    }
                                });
                            });
                        </script>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
