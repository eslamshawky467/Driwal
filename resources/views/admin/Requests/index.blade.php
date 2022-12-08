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
                    <div class="col-md-12">
                        {{-- <a href="{{ route('packages.create') }} " class="btn btn-dark"><i class="fa fa-plus"></i>{{ trans('admin.createpackage') }}</a> --}}
                        <form method="post" action="{{ route('requests.bulkdelete') }} " style="display: inline-block;">
                            @csrf
                            {{-- @method('delete') --}}
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</button>
                        </form><!-- end of form -->
                    </div><!-- end of row -->
                </div>

                    <div class="row">
                        <div class="container">
                        </div>
                        <div class="col-md-12">

                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                                    <thead class="alldata">
                                    <tr>
                                        <th><input type="checkbox" id="checkboxall"/></th>
                                        <th><b>{{ trans('request.campany.name') }}@sortablelink('name_'.app()->getLocale(),'↓↑')</b></th>
                                        <th><b>{{ trans('request.package.name') }}</b></th>
                                        <th>{{ trans('request.status') }} </th>
                                        <th><b>{{ trans('request.location') }}</b></th>

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
                                            <td>{{$request->status}}</td>
                                            <td><a href="{{route('requests.showLocation',$request->id)}}" class="btn btn-primary btn-sm">{{ trans('car.show_location') }}</a></td>



                                            @if($request->status != 'pending')

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
                                {!! $requests->appends(\Request::except('page'))->render() !!}


                            </div><!-- end of table responsive -->

                        </div><!-- end of col -->

                    </div><!-- end of row -->

                </div><!-- end of tile -->
            </div><!-- end of col -->

        </div><!-- end of row -->
        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value=$(this).val();
                if($value)
                {
                    $('.alldata').hide();
                    $('.searchdata').show();
                }
                else{
                    $('.alldata').show();
                    $('.searchdata').hide();
                }
                $.ajax({
                    type:'get',
                    url:'{{ URL::to('search/admin')}}',
                    data:{'search':$value},
                    success:function(data){
                        console.log(data);
                        $('#Content').html(data);
                    }
                });
            })
        </script>
@endsection
@push('scripts')
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            </script>
            <script>
                $(document).on('change', '.checkbox', function () {
                    getSelectedRecords();
                });
                // used to select all records
                $(document).on('change', '#checkboxall', function () {
                    $('.checkbox').prop('checked', this.checked);
                    getSelectedRecords();
                });
                function getSelectedRecords() {
                    var recordIds = [];
                    $.each($(".checkbox:checked"), function () {
                        recordIds.push($(this).val());
                    });
                    $('#record-ids').val(JSON.stringify(recordIds));
                    recordIds.length > 0
                        ? $('#bulk-delete').attr('disabled', false)
                        : $('#bulk-delete').attr('disabled', true)
                }
            </script>
@endpush
