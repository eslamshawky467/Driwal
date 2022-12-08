@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.editdriver')}}</h2>
    </div>
    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
        </div>
    @endif
    @if(session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>

        </div>
    @endif
    @if(session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('edit') }}</strong>
        </div>
    @endif

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('driver.index') }}">{{trans('admin.driver')}}</a></li>
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
                        <input type="text" name="name" class="form-control" value="{{ old('name', $driver->name) }}" required>
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>{{trans('admin.email')}} <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $driver->email) }}" required>
                    </div>

                    {{--phone number--}}
                    <div class="form-group">
                        <label>{{trans('admin.phone_number')}} <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number', $driver->phonenumber) }}" required>
                    </div>

                    {{--start cost--}}
                    <div class="form-group">
                        <label>{{trans('admin.start_cost')}} <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="start_cost" autofocus class="form-control" value="{{ old('start_cost',$driver->start_cost) }}" required>
                    </div>

                {{--id number--}}
                <div class="form-group">
                    <label>{{trans('admin.id_number')}} <span class="text-danger">*</span></label>
                    <input type="number" name="id_number" class="form-control" value="{{ old('id_number', $driver->id_number) }}" required>
                </div>

                    {{--license number--}}
                    <div class="form-group">
                        <label>{{trans('admin.license_number')}} <span class="text-danger">*</span></label>
                        <input type="number" name="license_number" class="form-control" value="{{ old('license_number', $driver->license_number) }}" required>
                    </div>

                    {{-- license expiration--}}
                    <div class="form-group">
                        <label>{{trans('admin.license_expiration')}} <span class="text-danger">*</span></label>
                        <input type="date" name="license_expiration" class="form-control" value="{{ old('license_expiration', $driver->license_expiration) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>{{trans('admin.license_expiration')}} <span class="text-danger">*</span></label>
                        <input type="date" name="license_expiration" class="form-control" value="{{ old('license_expiration') }}" required >
                    </div>

                    {{-- transport year--}}
                    <div class="form-group">
                        <label>{{trans('admin.transport_year')}} <span class="text-danger">*</span></label>
                        <input type="date" name="transport_year" class="form-control" value="{{ old('transport_year', $driver->transport_year) }}" disabled>
                    </div>
                    <div class="form-group">
                        <label>{{trans('admin.transport_year')}} <span class="text-danger">*</span></label>
                        <input type="date" name="transport_year" class="form-control" value="{{ old('transport_year') }}" required>
                    </div>


                    {{--number plate --}}
                    <div class="form-group">
                        <label>{{trans('admin.number_plate')}} <span class="text-danger">*</span></label>
                        <input type="text" name="number_plate" class="form-control" value="{{ old('number_plate', $driver->number_plate) }}"required>
                    </div>

                    {{--governorate --}}
                    <div class="form-group">
                        <label>{{trans('admin.governorate')}} <span class="text-danger">*</span></label>
                        <input type="text" name="governorate" class="form-control" value="{{ old('governorate', $driver->governorate) }}"required>
                    </div>

                    {{--neighborhood --}}
                    <div class="form-group">
                        <label>{{trans('admin.neighborhood')}} <span class="text-danger">*</span></label>
                        <input type="text" name="neighborhood" class="form-control" value="{{ old('neighborhood', $driver->neighborhood) }}"required>
                    </div>

                    {{--street --}}
                    <div class="form-group">
                        <label>{{trans('admin.street')}} <span class="text-danger">*</span></label>
                        <input type="text" name="street" class="form-control" value="{{ old('street', $driver->street) }}"required>
                    </div>

                    {{--building number --}}
                    <div class="form-group">
                        <label>{{trans('admin.building_number')}} <span class="text-danger">*</span></label>
                        <input type="number" name="building_number" class="form-control" value="{{ old('building_number', $driver->building_number) }}"required>
                    </div>

                    {{--password--}}
                    <input type="hidden" name="password" value="password">

                    {{--status--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.status') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="{{$driver->status}}">{{trans('admin.'.$driver->status)}}</option>
                            <option value="active">{{ trans('admin.active') }}</option>
                            <option value="inactive">{{ trans('admin.inactive') }}</option>
                        </select>
                    </div>

                    {{--nationlities--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.nationality') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="nation"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">

                            <option type="hidden" value="{{$driver->nationality_id}}">{{(app()->getLocale()=='ar')?$driver->nation->name_ar:$driver->nation->name_en}}</option>
                            @foreach ($nationlities as $nation )
                                <option value="{{$nation->id}}">{{(app()->getLocale()=='ar')? $nation->name_ar:$nation->name_en }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--car types--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.types') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_type"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">

                            <option type="hidden" value="{{$driver->type_id}}">{{(app()->getLocale()=='ar')?$driver->type->type_ar:$driver->type->type_en}}</option>
                            @foreach ($types as $car_type )
                                <option value="{{$car_type->id}}">{{(app()->getLocale()=='ar')? $car_type->type_ar:$car_type->type_en }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{--car models--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.model') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_model"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">

                            <option type="hidden" value="{{$driver->model_id}}">{{$driver->model->model}}</option>
                            @foreach ($car_models as $car_model )
                                <option value="{{$car_model->id}}">{{$car_model->model }}</option>
                            @endforeach
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
