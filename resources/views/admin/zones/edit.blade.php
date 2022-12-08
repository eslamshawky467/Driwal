@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.editzone')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href=" {{ route('zones.index') }}">{{trans('admin.zone')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.editzone')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="{{ route('zones.update','test') }}" method="post">
                    {{ method_field('patch') }}
                    @csrf
                    @include('admin.partials._errors')
                    {{--name--}}
                    <input id="id" type="hidden" name="id" class="border" value="{{ $zone->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                                <input type="text" name="name" autofocus class="form-control" value="{{ old('name',$zone->name) }}" required>
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
                                         <option value="{{ $zone->distance }}" selected>{{ $zone->distance}}</option>
                                         @foreach($distances as $distance)
                                            <option value="{{ $distance->distance }}">{{ $distance->distance}}</option>
                                         @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ trans('admin.from_time') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="from_time"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <option value="{{ $zone->from_time }}" selected>{{ $zone->from_time}}</option>
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
                                         <option value="{{ $zone->to_time }}" selected>{{ $zone->to_time}}</option>
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
                                     @if(app()->getLocale()=='ar')
                                            <option value="{{ $zone->Package->id }}">{{ $zone->Package->name_ar}}</option>
                                        @else
                                            <option value="{{ $zone->Package->id }}">{{ $zone->Package->name_en}}</option>
                                        @endif
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
                                <input type="number" step="0.01" name="distance_time_price" autofocus class="form-control" value="{{ old('distance_time_price',$zone->distance_time_price) }}" required>
                            </div>
                        </div>
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
