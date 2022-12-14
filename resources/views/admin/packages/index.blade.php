@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{ trans('admin.packages') }}</h2>
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
        <li class="breadcrumb-item">{{ trans('admin.packages') }}</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('packages.create') }} " class="btn btn-dark"><i class="fa fa-plus"></i>{{ trans('admin.createpackage') }}</a>
                        <form method="post" action="{{ route('packages.bulkdelete') }} " style="display: inline-block;">
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
                                    <th><b>{{ trans('admin.name') }} @sortablelink('name_'.app()->getLocale(),'↓↑')</b></th>
                                    <th>{{ trans('admin.description') }}</th>
                                    <th>{{ trans('admin.price') }}</th>
                                    <th>{{ trans('admin.tripsnumber') }}</th>
                                    <th>{{ trans('admin.remining_trips') }}</th>
                                    <th>{{ trans('admin.status') }}</th>
                                    <th>{{ trans('admin.enddate') }}</th>
                                    <th>{{ trans('admin.edit') }}</th>
                                    <th>{{ trans('admin.delete') }}</th>
                                </tr>
                            <tbody class="alldata">
                            @foreach ($packages as $package)
                                <tr id="sid{{ $package->id }} ">

                                        <td>
                                            <input type="checkbox" name="ids[]" class="checkbox" value="{{ $package->id }}"/>
                                        </td>
                                        @if (app()->getLocale()=='ar')
                                        <td>
                                            {{ $package->name_ar }}
                                        </td>
                                        <td>
                                            {{ $package->description_ar }}
                                        </td>
                                        @else
                                        <td>
                                            {{ $package->name_en }}
                                        </td>
                                        <td>
                                            {{ $package->description_en }}
                                        </td>
                                        @endif
                                        <td>
                                            {{ $package->price }}
                                        </td>
                                        <td>
                                            {{ $package->number_trips }}
                                        </td>

                                        <td>
                                            {{ $package->remaining_trips }}
                                        </td>
                                        <td>
                                            {{ $package->status }}
                                        </td>
                                        <td>
                                            {{ $package->end_date }}
                                        </td>
                                   <td><a href=" {{ route('packages.show',$package->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.edit') }}</a></td>
                                   <td><a href="{{ route('packages.destroy',$package->id) }} " class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $packages->appends(\Request::except('page'))->render() !!}

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
