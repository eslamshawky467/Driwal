@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>@lang('admin.cost')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="">{{trans('admin.cost')}}</a></li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{ route('costs.edit') }}">
                    @csrf
                    @method('post')
                    @include('admin.partials._errors')

                    @if(session()->has('edit'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('edit') }}</strong>
                        </div>
                    @endif

                    @if(session()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('message') }}</strong>
                        </div>
                    @endif
                    {{--kilo_cost--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin.kilo_cost')}} <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="kilo_cost" autofocus class="form-control" value="{{ old('kilo_cost',$costs->kilo_cost) }}" required>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{trans('admin.waiting_cost')}} <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" name="waiting_cost" autofocus class="form-control" value="{{ old('waiting_cost',$costs->waiting_cost) }}" required>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{trans('admin.cost_admin')}} <span class="text-danger">*</span></label>
                                <input type="number" name="admin_cost" step="0.01" class="form-control" value="{{ old('admin_cost',$costs->admin_cost) }}" required>
                            </div>
                        </div>
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
