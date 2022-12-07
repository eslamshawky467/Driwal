@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.accounts')}}</h2>
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


    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                {{-- {{route('client_accounts.update',$account->id) }} --}}
                <form action="{{route('client_accounts.update',$account->id) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('put') }}
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> {{trans('admin.status')}}
                            :</label>
                        <select  class="form-select" aria-label="Default select example" name="status"
                                 id="exampleFormControlTextarea1" placeholder="." style="border: 1px solid #e3e3e3;padding: 1rem;border-radius: 1px;font-size: 15px;" required>

                                 <option  value="{{$account->status}}" selected>{{trans('admin.'.$account->status)}}</option>
                                 <option  value="pending" >{{ trans('admin.pending') }}</option>
                                 <option  value="approved" >{{ trans('admin.approved') }}</option>
                                 <option  value="canceled" >{{ trans('admin.canceled') }}</option>
                        </select>
                    </div>
                    <div class="px-5 py-4">
                        <button type="submit" class="btn btn-light btn-lg">{{ trans('admin.update') }}</button>
                      </div>
                </form>
            </div>


@endsection
