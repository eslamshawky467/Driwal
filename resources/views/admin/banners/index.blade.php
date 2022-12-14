@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('driver.banners')}}</h2>
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
        <li class="breadcrumb-item">{{trans('driver.banners')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('banner.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> {{trans('admin.gallery')}}</a>
                    </div><!-- end of row -->
                </div>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th>{{ trans('admin.image') }} </th>
                                        <th>{{ trans('admin.delete') }}</th>
                                    </tr>
                                    <tbody class="alldata">
                                    @foreach($banners as $b)
                                        <tr>
                                            <td><img src= {{URL::to('/images/banners/'. $b->file_name)}} style="width:150px;"></td>
                                            {{-- <td><img src="/bannerFolder/{{ $b->image}}" style="width:150px;"></td> --}}

                                            <td><a href="{{route('banner.delete',$b->id)}}" class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
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
