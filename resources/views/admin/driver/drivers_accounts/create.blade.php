@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('admin.createdriveraccount')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('driversaccounts.index') }} ">{{trans('admin.driversaccounts')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createdriveraccount')}}</li>
    </ul>
    @if(session()->has('message'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session()->get('message') }}</strong>

    </div>
@endif
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('driversaccounts.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ trans('admin.name') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="driver_id"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                                         @foreach ($drivers as $driver )
                                         <option value="{{ $driver->id }}">{{ $driver->name}}</option>
                                         @endforeach
                                </select>
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
                                         <option value="pending">{{ trans('admin.pending') }}</option>
                                         <option value="approved">{{ trans('admin.approved') }}</option>
                                         <option value="canceled">{{ trans('admin.canceled') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.files')}} <span class="text-danger">*</span></label>
                                <input type="file"  name="files[]" autofocus class="form-control" accept="image/*" multiple required>
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
