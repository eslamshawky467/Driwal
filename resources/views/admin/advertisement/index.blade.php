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
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.accounts')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('ad.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('admin.persons')}}</a>
                    </div><!-- end of row -->

                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th><input type="checkbox" id="checkboxall"/></th>
                                        <th><b>{{ trans('admin.name') }}</b></th>
                                        <th>{{ trans('admin.vidoe') }} </th>
                                        <th>{{ trans('admin.edit') }}</th>
                                        <th>{{ trans('admin.delete') }}</th>
                                    </tr>
                                    <tbody class="alldata">
                                    @foreach($advertisements as $advertisement)
                                        <tr id="sid{{ $advertisement->id}}">
                                            <td>
                                                <input type="checkbox" name="ids[{{ $advertisement->id }}]" class="checkbox" value="{{ $advertisement->id }}"/>
                                            </td>
                                            <td>{{$advertisement->name}}</td>
                                            <td><a href="{{ route('ad.show',$advertisement->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('admin.ad.show')}}</a></td>

                                            {{-- <td><a href=" {{route('ad.edit',$p->id)}}" class="btn btn-success btn-sm">{{ trans('admin.edit') }}</a></td> --}}
                                            <td><a href="{{route('ad.delete',$advertisement->id)}}" class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div><!-- end of table responsive -->

                        </div><!-- end of col -->

                    </div><!-- end of row -->

                </div><!-- end of tile -->
            </div><!-- end of col -->

        </div><!-- end of row -->
@endsection
