@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.editdriver')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('driver.index') }}">{{trans('admin.Companies')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.editdriver')}}</li>
    </ul>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="{{ route('driver.update', 'test') }}" method="post"enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    {{--name--}}
                    <input id="id" type="hidden" name="id" class="border"
                           value="{{ $driver->id }}">
                    <div class="form-group">
                        <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $driver->name) }}">
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>{{trans('admin.email')}} <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $driver->email) }}">
                    </div>

                    {{--phone number--}}
                    <div class="form-group">
                        <label>{{trans('admin.phone_number')}} <span class="text-danger">*</span></label>
                        <input type="number" name="phone_number" class="form-control" value="{{ old('phone_number', $driver->phonenumber) }}">
                    </div>

                    {{--password--}}
                    <input type="hidden" name="password" value="password">
                    
                    {{--status--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.status') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="{{$driver->status}}">{{$driver->status}}</option>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>

                    {{--nationlities--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.nation') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="nation"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="{{$driver->nationality_id}}">{{$driver->nation->name_ar}}</option>
                            @foreach ($nationlities as $nation )
                                <option value="{{$nation->id}}">{{ $nation->name_ar }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>{{trans('admin.submit')}}</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
@push('scripts')
    <script>
        function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        function myFunction2() {
            var x = document.getElementById("confirm");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush
