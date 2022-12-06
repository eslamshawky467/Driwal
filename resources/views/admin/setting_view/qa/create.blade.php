@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('admin.admin')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('qa.index') }}">{{trans('admin.FAQ')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createqa')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('qa.store') }}">
                    @csrf
                    @method('post')
                    @include('admin.partials._errors')

                    <div class="form-group">
                        <label>{{trans('admin.questionar')}} <span class="text-danger">*</span></label>
                        <input type="text" name="title_ar" autofocus class="form-control" value="{{ old('title_ar') }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{trans('admin.questionen')}} <span class="text-danger">*</span></label>
                        <input type="text" name="title_en" autofocus class="form-control" value="{{ old('title_en') }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{trans('admin.answerar')}} <span class="text-danger">*</span></label>
                        <textarea name="description_ar" autofocus class="form-control"  required>{{ old('description_ar') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>{{trans('admin.answeren')}} <span class="text-danger">*</span></label>
                        <textarea name="description_en" autofocus class="form-control"  required>{{ old('description_en') }}</textarea>
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
