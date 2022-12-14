@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('admin.createrequest')}}</h2>
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
        <li class="breadcrumb-item"><a href="{{route('requests.index')}}">{{trans('admin.requests')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createrequest')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                {{--  --}}
                <form method="post" action="{{ route('package_company.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.package') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="package_id"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            @foreach ($packages as $package)

                            @if (app()->getLocale() == 'en')
                            <option value="{{ $package->id }}">{{ $package->name_en }}</option>

                            @else
                            <option value="{{ $package->id }}">{{ $package->name_ar }}</option>

                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.company') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="company_id"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            @foreach ($companies as $company)

                                <option value="{{ $company->id }}">{{ $company->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{{trans('trip.count')}} <span class="text-danger">*</span></label>
                        <input type="number" name="count" autofocus class="form-control" value="{{ old('count') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="status" value="approved">
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-plus"></i>{{trans('driver.register')}}</button>
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
