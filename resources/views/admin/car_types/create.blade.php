@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('car.create_car_types')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('car_type.index')}}">{{trans('car.index_car_types')}}</a></li>

        {{-- <li class="breadcrumb-item"><a href="{{route('driver.index')}}">{{trans('admin.driver')}}</a></li> --}}
        <li class="breadcrumb-item">{{trans('car.create_car_types')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{route('car_type.store')}}">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--type_en--}}
                    <div class="form-group">
                        <label>{{trans('car.type_en')}} <span class="text-danger">*</span></label>
                        <input type="text" name="type_en" autofocus class="form-control" value="{{ old('type_en') }}">
                    </div>

                   {{--type_ar--}}
                   <div class="form-group">
                        <label>{{trans('car.type_ar')}} <span class="text-danger">*</span></label>
                        <input type="text" name="type_ar" autofocus class="form-control" value="{{ old('type_ar') }}">
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
