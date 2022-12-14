@extends('layouts.admin.app')

@section('content')

<div>
        <h2>{{trans('admin.admin')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('accounts.index') }}">{{trans('admin.index')}}</a></li>
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
                <form action="{{ route('active') }}" method="post"enctype="multipart/form-data">
                    @csrf
                    {{--name--}}
                    <input  type="hidden" name="id" class="border"
                           value="{{ $accounts->id }}">

                                <input id="id" type="hidden" name="propperity_id" class="border"
                                value="{{ $accounts->propperity_id }}">

                       <input id="id" type="hidden" name="sender_id" class="border"
                           value="{{ $accounts->sender_id }}">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{trans('admin.status')}}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                            <option type="hidden" value="{{$accounts->status}}">{{$accounts->status}}</option>
                            <option value="active">active</option>
                            <option value="onhold">onhold</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>{{trans('admin.submit')}}</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
@endsection

