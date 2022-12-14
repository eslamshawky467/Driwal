@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('admin.createdriver')}}</h2>
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
        <li class="breadcrumb-item"><a href="{{route('driver.index')}}">{{trans('admin.driver')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createdriver')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{route('driver.store')}} " enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="{{ old('name') }}" required>
                    </div>

                    {{--phone number--}}
                    <div class="form-group">
                        <label>{{trans('admin.phone_number')}} <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" autofocus class="form-control" value="{{ old('phone_number') }}" required>
                    </div>
                      {{--id number--}}
                      <div class="form-group">
                        <label>{{trans('car.id_number')}} <span class="text-danger">*</span></label>
                        <input type="number" name="id_number" autofocus class="form-control" value="{{ old('id_number') }}" required>
                    </div>
                      {{--license expiration--}}
                      <div class="form-group">
                        <label>{{trans('car.license_expiration')}} <span class="text-danger">*</span></label>
                        <input type="date" name="license_expiration" autofocus class="form-control" value="{{ old('license_expiration') }}" required>
                    </div>
                      {{--license number--}}
                      <div class="form-group">
                        <label>{{trans('car.license_number')}} <span class="text-danger">*</span></label>
                        <input type="number" name="license_number" autofocus class="form-control" value="{{ old('license_number') }}" required>
                    </div>

                     {{--number plate --}}
                     <div class="form-group">
                        <label>{{trans('car.number_plate')}} <span class="text-danger">*</span></label>
                        <input type="text" name="number_plate" autofocus class="form-control" value="{{ old('number_plate') }}" required>
                    </div>


                     {{-- transport year--}}
                     <div class="form-group">
                        <label>{{trans('car.transport_year')}} <span class="text-danger">*</span></label>
                        <input type="date" name="transport_year" autofocus class="form-control" value="{{ old('transport_year') }}" required>
                    </div>

                     {{--governorate --}}
                     <div class="form-group">
                        <label>{{trans('car.governorate')}} <span class="text-danger">*</span></label>
                        <input type="text" name="governorate" autofocus class="form-control" value="{{ old('governorate') }}" required>
                    </div>

                     {{--neighborhood --}}
                     <div class="form-group">
                        <label>{{trans('car.neighborhood')}} <span class="text-danger">*</span></label>
                        <input type="text" name="neighborhood" autofocus class="form-control" value="{{ old('neighborhood') }}" required>
                    </div>

                     {{--street --}}
                     <div class="form-group">
                        <label>{{trans('car.street')}} <span class="text-danger">*</span></label>
                        <input type="text" name="street" autofocus class="form-control" value="{{ old('street') }}" required>
                    </div>



                {{--building number--}}
                <div class="form-group">
                  <label>{{trans('car.building_number')}} <span class="text-danger">*</span></label>
                  <input type="number" name="building_number" autofocus class="form-control" value="{{ old('building_number') }}" required>
              </div>

                    {{--start cost--}}

                    <div class="form-group">
                        <label>{{trans('admin.start_cost')}} <span class="text-danger">*</span></label>
                        <input type="number" step="1" name="start_cost" autofocus class="form-control" value="{{ old('start_cost') }}" required>
                    </div>

                    {{--email--}}
                    <div class="form-group">
                        <label>{{trans('admin.email')}} <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>


                    {{--password--}}
                    <input type="hidden" name="password" value="password">

                    {{--Files--}}
                    <div class="form-group">
                        <label>{{trans('admin.files')}} <span class="text-danger">*</span></label>

                        <input
                        name="files[]"
                        type="file"
                        class="form-control"
                        multiple required>
                    </div>

                    {{--Status--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.status') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
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
                            @foreach ($nationlities as $nation)
                                @if (app()->getLocale() == 'en')
                                    <option value="{{ $nation->id }}">{{ $nation->name_en }}</option>
                                @else
                                    <option value="{{ $nation->id }}">{{ $nation->name_ar }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    {{--car models--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('driver.model') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_model"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            @foreach ($car_models as $car_model)

                                <option value="{{ $car_model->id }}">{{ $car_model->model }}</option>

                            @endforeach
                        </select>
                    </div>

                    {{--car types--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('driver.type') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="car_type"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            @foreach ($types as $type)
                            @if (app()->getLocale() == 'en')
                            <option value="{{ $type->id }}">{{ $type->type_en }}</option>
                            @else
                            <option value="{{ $type->id }}">{{ $type->type_ar }}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-plus"></i>{{trans('admin.submit')}}</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection
@push('scripts')
<script>
function myFunction3() {
var x = document.getElementById("pass");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
function myFunction4() {
var x = document.getElementById("confirm");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>
@endpush
