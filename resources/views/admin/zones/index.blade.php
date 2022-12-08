@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{ trans('admin.zones') }}</h2>
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
        <li class="breadcrumb-item"><a href=" ">{{ trans('admin.home') }}</a></li>
        <li class="breadcrumb-item">{{ trans('admin.zones') }}</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('zones.create') }} " class="btn btn-dark"><i class="fa fa-plus"></i>{{ trans('admin.createzone') }}</a>
                        <form method="post" action="{{ route('zones.bulkdelete') }} " style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</button>
                        </form><!-- end of form -->
                    </div><!-- end of row -->
                </div>
                <div class="row">
                    {{-- <div class="container">
                        <div class ="search">
                            <label style="font-size: 30px; color:black"><b>{{ trans('admin.search') }}</b></label>
                            <input type ="search" name="search" id="search"
                                   placeholder="{{ trans('admin.search') }}" class="form-control" >
                        </div>
                    </div> --}}
                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                <thead class="alldata">
                                <tr>
                                    <th><input type="checkbox" id="checkboxall"/></th>
                                    <th><b>{{ trans('admin.name') }} </b></th>
                                    <th>{{ trans('admin.distance') }}</th>
                                    <th>{{ trans('admin.from_time') }}</th>
                                    <th>{{ trans('admin.to_time') }}</th>
                                    <th>{{ trans('admin.distance_time_price') }}</th>
                                    <th>{{ trans('admin.package') }}</th>
                                    <th>{{ trans('admin.edit') }}</th>
                                    <th>{{ trans('admin.delete') }}</th>
                                </tr>
                            <tbody class="alldata">
                            @foreach ($zones as $zone)
                                <tr id="sid{{ $zone->id }}">

                                        <td>
                                            <input type="checkbox" name="ids[]" class="checkbox" value="{{ $zone->id }}"/>
                                        </td>
                                        <td>
                                            {{ $zone->name }}
                                        </td>
                                        <td>
                                            {{ $zone->distance }}
                                        </td>
                                        <td>
                                            {{ $zone->from_time }}
                                        </td>
                                        <td>
                                            {{ $zone->to_time }}
                                        </td>
                                        <td>
                                            {{$zone->distance_time_price  }}
                                        </td>
                                        @if (app()->getLocale()=='ar')
                                            <td>
                                                {{ $zone->Package->name_ar }}
                                            </td>
                                        @else
                                            <td>
                                                {{ $zone->Package->name_en }}
                                            </td>
                                        @endif
                                   <td><a href=" {{ route('zones.show',$zone->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.edit') }}</a></td>
                                   <td><a href="{{ route('zones.destroy',$zone->id) }} " class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $zones->appends(\Request::except('page'))->render() !!}

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->
    </div>

<!-- end of row -->
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
