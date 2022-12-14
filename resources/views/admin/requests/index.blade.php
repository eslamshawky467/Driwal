@extends('layouts.admin.app')
@section('content')

    <div>
        <h2>{{trans('request.requests')}}</h2>
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
        <li class="breadcrumb-item">{{trans('request.requests')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">

                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th><input type="checkbox" id="checkboxall"/></th>
                                        <th><b>{{ trans('request.campany.name') }}</b></th>
                                        <th><b>{{ trans('request.package.name') }}</b></th>
                                        <th><b>{{ trans('request.location') }}</b></th>
                                        <th>{{ trans('request.status') }} </th>
                                        <th>{{ trans('request.action') }}</th>
                                        <th>{{ trans('request.delete') }}</th>
                                    </tr>
                                    <tbody class="alldata">
                                    @foreach($requests as $request)
                                        <tr id="sid{{ $request->id}}">
                                            <td>
                                                <input type="checkbox" name="ids[{{ $request->id }}]" class="checkbox" value="{{ $request->id }}"/>
                                            </td>

                                            <td>{{$request->company->name}}</td>
                                            <td>{{$request->Packge->name_ar}}</td>
                                            <td><a href="{{route('requests.showLocation',$request->id)}}" class="btn btn-primary btn-sm">{{ trans('request.show.location') }}</a></td>
                                            <td>{{$request->status}}</td>


                                            @if($request->status == 'approved' || $request->status == 'canceled')

                                            <td><a href="{{route('requests.showImage',$request->id)}}" class="btn btn-primary btn-sm">{{ trans('request.show.image') }}</a>
                                            <a href="{{route('requests.showMap',$request->id)}}" class="btn btn-primary btn-sm">{{ trans('request.show.map') }}</a>
                                            <a href="{{route('requests.edit',$request->id)}}" class="btn btn-primary btn-sm">{{ trans('admin.edit') }}</a></td>



                                            @else
                                            <td><a href="{{route('requests.approved',$request->id)}}" class="btn btn-primary btn-sm">{{ trans('request.approve') }}</a>
                                            <a href="{{route('requests.cancel',$request->id)}}" class="btn btn-danger btn-sm">{{ trans('request.cancel') }}</a></td>


                                            @endif
                                            <td><a href="{{route('requests.delete',$request->id)}}" class="btn btn-danger btn-sm">{{ trans('request.delete') }}</a></td>
                                            {{-- <td><a href=" {{route('ad.edit',$p->id)}}" class="btn btn-success btn-sm">{{ trans('admin.edit') }}</a></td> --}}
                                            {{-- <td><a href="{{ route('requests.showImage',$request->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('admin.requests.show')}}</a></td> --}}


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
