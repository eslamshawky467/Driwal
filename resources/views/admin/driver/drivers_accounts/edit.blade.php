@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.editdriveraccount')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('driversaccounts.index') }}">{{trans('admin.driversaccounts')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.editdriveraccount')}}</li>
    </ul>

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="{{ route('driversaccounts.update', 'test') }}" method="post">
                    {{ method_field('patch') }}
                    @csrf
                    <input id="id" type="hidden" name="id" class="border"
                           value="{{ $account->id }}">
                    {{--status--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"> {{ __('admin.status') }}
                                    :</label>
                                <select  class="form-select" aria-label="Default select example" name="status"
                                         id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                                    <option  value="{{$account->status}}" selected>{{trans('admin.'.$account->status)}}</option>
                                    <option value="pending">{{ trans('admin.pending') }}</option>
                                    <option value="approved">{{ trans('admin.approved') }}</option>
                                    <option value="canceled">{{ trans('admin.canceled') }}</option>
                                </select>
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
