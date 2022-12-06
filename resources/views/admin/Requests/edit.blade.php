@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.editdriver')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('driver.index') }}">{{trans('admin.Companies')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.editdriver')}}</li>
    </ul>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="{{ route('requests.update', $requests->id) }}" method="post"enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    @csrf
                    {{--name--}}
                    <input id="id" type="hidden" name="id" class="border"
                           value="{{ $requests->id }}">


                    {{--status--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.status') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            <option type="hidden" value="">{{$requests->status}}</option>
                            <option value="approved">approved</option>
                            <option value="canceled">canceled</option>
                        </select>
                    </div>

                    {{--nationlities--}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>{{trans('admin.submit')}}</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

