@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('admin.createzone')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('zones.index') }} ">{{trans('admin.zone')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createzone')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('zones.store') }}" >
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--name--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                                <input type="text" name="name" autofocus class="form-control" value="{{ old('name') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ trans('admin.distance') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="distance"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         @foreach($distances as $distance)
                                            <option value="{{ $distance->distance }}">{{ $distance->distance}}</option>
                                         @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>{{trans('admin.distance')}} <span class="text-danger">*</span></label>
                                <input type="number" step="1" name="distance" autofocus class="form-control" value="{{ old('distance') }}" required>
                            </div> --}}
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ trans('admin.from_time') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="from_time"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         @foreach($times as $time)
                                            <option value="{{ $time->time }}">{{ $time->time}}</option>
                                         @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ trans('admin.to_time') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="to_time"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         @foreach($times as $time)
                                            <option value="{{ $time->time }}">{{ $time->time}}</option>
                                         @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> {{ trans('admin.package') }}
                                :</label>
                            <select  class="form-select" aria-label="Default select example" name="package_id"
                                     id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                     @foreach($packages as $package)
                                        @if(app()->getLocale()=='ar')
                                            <option value="{{ $package->id }}">{{ $package->name_ar}}</option>
                                        @else
                                            <option value="{{ $package->id }}">{{ $package->name_en}}</option>
                                        @endif

                                     @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.distance_time_price')}} <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="distance_time_price" autofocus class="form-control" value="{{ old('distance_time_price') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class='col-md-12'>
                            <div class="form-group">
                                <label>{{trans('admin.discount_trips')}} <span class="text-danger">*</span></label>
                                <input type="number" step="1" name="discount_trips" autofocus class="form-control" value="{{ old('discount_trips') }}" required>
                            </div>
                        </div-col-md-12>
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
