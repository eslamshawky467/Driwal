@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.admin')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        {{-- <li class="breadcrumb-item"><a href="{{ route('accounts_admin.index') }}">{{trans('admin.index')}}</a></li> --}}
        <li class="breadcrumb-item">{{trans('admin.edit')}}</li>
    </ul>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="{{ route('car_model.update', $model->id) }}" method="post"enctype="multipart/form-data">
                    {{ method_field('put') }}
                    @csrf

                    <div class="form-group">
                        <label>{{trans('car.model')}} <span class="text-danger">*</span></label>
                        <input type="number" name="model" class="form-control" value="{{ old('model')}}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>{{trans('admin.submit')}}</button>
                    </div>
                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection
