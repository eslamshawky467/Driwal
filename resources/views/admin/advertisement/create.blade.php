@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('admin.admin')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('ad.index') }}">{{trans('admin.users')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.createuser')}}</li>
    </ul>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <div class="row">
        <div class="col-md-12">

            <div class="tile shadow">
                <form method="post" action="{{ route('ad.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    @include('admin.partials._errors')

                    <div class="form-group">
                        <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="form-group">
                    <label>Select to upload:</label>
                    <input name="image[]" type="file" class="form-control"  required>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>{{trans('admin.submit')}}</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection

