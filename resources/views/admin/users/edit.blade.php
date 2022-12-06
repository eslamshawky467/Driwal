@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.admin')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('clints.index') }}">{{trans('admin.users')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.edituser')}}</li>
    </ul>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="{{ route('clints.update', 'test') }}" method="post"enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    {{--name--}}
                    <input id="id" type="hidden" name="id" class="border"
                           value="{{ $users->id }}">
                    <div class="form-group">
                        <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $users->name) }}" required>
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>{{trans('admin.email')}} <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $users->email) }}" required>
                    </div>



                    {{--email--}}
                    <div class="form-group">
                        <label>{{trans('admin.phone_number')}} <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $users->phonenumber) }}" required>
                    </div>
                    <div class="form-group">
                        <label>{{trans('admin.identity_card')}} <span class="text-danger">*</span></label>
                        <input type="text" name="identity_card" class="form-control" value="{{ old('identity_card', $users->id_number) }}" required>
                    </div>


                    {{--password--}}
                    <input type="hidden" name="password" value="password">

                    {{--password_confirmation--}}
                    <input  type="hidden" name="password_confirmation" class="form-control" value="password_confirmation" required >

                    @if (app()->getLocale() == 'en')
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> {{trans('admin.country_id')}}
                                :</label>
                            <select  class="form-select" aria-label="Default select example" name="nationality_id"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                <option  value="{{$users->nationality_id}}">{{$users->nationality->name_en}}</option>
                                @foreach ($countries as $country )
                                    <option value="{{$country->id}}">{{ $country->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> {{trans('admin.country_id')}}
                                :</label>
                            <select  class="form-select" aria-label="Default select example" name="nationality_id"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                                <option type="hidden" value="{{$users->nationality_id}}">{{$users->nationality->name_ar}}</option>
                                @foreach ($countries as $country )
                                    <option value="{{$country->id}}">{{ $country->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ trans('admin.status') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="{{$users->status}}">{{trans('admin.'.$users->status)}}</option>
                            <option value="active">{{ trans('admin.active') }}</option>
                            <option value="inactive">{{ trans('admin.inactive') }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-light"><i class="fa fa-edit"></i>{{trans('admin.submit')}}</button>
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
