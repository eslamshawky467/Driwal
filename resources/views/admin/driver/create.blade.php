@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('admin.createdriver')}}</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item"><a href="{{route('driver.index')}}">{{trans('admin.driver')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.create')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <form method="post" action="{{route('driver.store')}}">
                    @csrf
                    @method('post')

                    @include('admin.partials._errors')

                    {{--name--}}
                    <div class="form-group">
                        <label>{{trans('admin.name')}} <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="{{ old('name') }}">
                    </div>

                    {{--phone number--}}
                    <div class="form-group">
                        <label>{{trans('admin.phone_number')}} <span class="text-danger">*</span></label>
                        <input type="text" name="phone_number" autofocus class="form-control" value="{{ old('phone_number') }}">
                    </div>


                    {{--email--}}
                    <div class="form-group">
                        <label>{{trans('admin.email')}} <span class="text-danger">*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    </div>

                    {{--id_number--}}
                    <input type="hidden" name="id_number" class="form-control" value="{{ rand(1, 10000) }}">

                    {{--password--}}
                    <input type="hidden" name="password" value="password">

                    {{--Status--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.status') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>

                    {{--nationlities--}}
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{ __('admin.nation') }}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="nation"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;">
                            @foreach ($nationlities as $nation)
                                @if (app()->getLocale() == 'en')
                                    <option value="{{ $nation->id }}">{{ $nation->name_en }}</option>
                                @else 
                                    <option value="{{ $nation->id }}">{{ $nation->name_ar }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>{{trans('admin.submit')}}</button>
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
