@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('admin.createcontact_us')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('contact_us.index') }}">{{trans('admin.contact')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createcontact_us')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('contact_us.store') }}">
                    @csrf
                    @method('post')
                    @include('admin.partials._errors')

                    {{--title--}}
                    <div class="form-group">
                        <label>{{trans('admin.titlear')}} <span class="text-danger">*</span></label>
                        <input type="text" name="title_ar" autofocus class="form-control" value="{{ old('name_ar') }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{trans('admin.titleen')}} <span class="text-danger">*</span></label>
                        <input type="text" name="title_en" autofocus class="form-control" value="{{ old('title_en') }}" required>
                    </div>


                    <div class="form-group">
                        <label>{{trans('admin.url')}} <span class="text-danger">*</span></label>
                        <input type="text" name="url" autofocus class="form-control" value="{{ old('url') }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{trans('admin.icon')}} <span class="text-danger">*</span></label>
                        <input type="text" name="icon" autofocus class="form-control" placeholder="FontAweson Icon Ex : fa fa-facebook" value="{{ old('icon') }}" required>
                    </div>



                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary"><i class="fa fa-edit"></i>{{trans('admin.submit')}}</button>
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
