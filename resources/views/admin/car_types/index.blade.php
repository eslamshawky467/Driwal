@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('car.index_car_types')}}</h2>
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
        <li class="breadcrumb-item">{{trans('car.index_car_types')}}</li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('car_type.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('car.create_car_types')}}</a>
                        </div>
                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>

                                        @if (app()->getLocale() == 'en')
                                            <th>{{trans('car.type_en')}}</th>
                                        @else
                                            <th>{{trans('car.type_ar')}}</th>
                                        @endif


                                        <th>{{trans('admin.Action')}}</th>
                                    </tr>
                                    <tbody class="alldata">
                                    @foreach($types as $type)
                                            <tr>

                                                <td>
                                                @if (app()->getLocale() == 'en')
                                                    {{$type->type_en}}
                                                @else
                                                      {{$type->type_ar}}
                                                @endif

                                                </td>

                                                <td><a href=" {{route('car_type.edit',$type->id)}}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a>
                                                </td>
                                                <td>
                                                    <form method="post" action="{{route('car_type.delete',$type->id)}}">
                                                        @csrf
                                                        <button  class="btn btn-danger btn-sm">
                                                            {{ trans('admin.delete') }}
                                                        </button>
                                                        </form>
                                                </td>
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
