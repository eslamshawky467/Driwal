@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('admin.admin')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }} ">{{trans('admin.package')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createpackage')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('packages.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--name--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin.name_ar')}} <span class="text-danger">*</span></label>
                                <input type="text" name="name_ar" autofocus class="form-control" value="{{ old('name_ar') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin.name_en')}} <span class="text-danger">*</span></label>
                                <input type="text" name="name_en" autofocus class="form-control" value="{{ old('name_en') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin.description_ar')}} <span class="text-danger">*</span></label>
                                <input type="text" name="description_ar" autofocus class="form-control" value="{{ old('description_ar') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin.description_en')}} <span class="text-danger">*</span></label>
                                <input type="text" name="description_en" autofocus class="form-control" value="{{ old('description_en') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.price')}} <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="price" autofocus class="form-control" value="{{ old('price') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.tripsnumber')}} <span class="text-danger">*</span></label>
                                <input type="number" step="1" name="number_trips" autofocus class="form-control" value="{{ old('number_trips') }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.enddate')}} <span class="text-danger">*</span></label>
                                <input type="date" step="1" name="end_date" autofocus class="form-control" value="{{ old('end_date') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ trans('admin.status') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="status"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         <option value="active">{{ trans('admin.active')}}</option>
                                         <option value="inactive">{{ trans('admin.inactive')}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.image')}} <span class="text-danger">*</span></label>
                                <input type="file"  name="image" autofocus class="form-control" required>
                            </div>
                        </div>
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
