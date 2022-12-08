@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{ trans('admin.driversaccounts') }}</h2>
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
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ trans('admin.home') }}</a></li>
        <li class="breadcrumb-item">{{ trans('admin.driversaccounts') }}</li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('driversaccounts.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i>{{ trans('admin.createdriveraccount') }}</a>
                        <form method="post" action="{{ route('driversaccounts.bulkdelete') }} " style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{ trans('admin.cancel') }}</button>
                        </form><!-- end of form -->
                    </div><!-- end of row -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table datatable" id="admins-table" style="width: 100%;">
                                <thead class="alldata">
                                <tr>
                                    <th><input type="checkbox" id="checkboxall"/></th>
                                    <th><b>{{ trans('admin.name') }} </b></th>
                                    <th><b>{{ trans('admin.amount') }} </b></th>
                                    <th>{{ trans('admin.operation') }}</th>
                                    <th>{{ trans('admin.view') }}</th>
                                </tr>
                            <tbody class="alldata">
                            @foreach ($accounts as $account)
                                <tr id="sid{{ $account->id }}">

                                        <td>
                                            <input type="checkbox" name="ids[]" class="checkbox" value="{{ $account->id }}"/>
                                        </td>
                                        <td>
                                            {{ $account->User->name }}
                                        </td>
                                        <td>
                                            {{ $account->balance }}
                                        </td>
                                        @if ($account->status=='pending')
                                            <td>
                                                <a href=" {{ route('driveraccount.approve',$account->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.approve') }}</a>
                                                <a href="{{ route('driveraccount.cancel',$account->id) }} " class="btn btn-danger btn-sm">{{ trans('admin.cancel') }}</a>
                                            </td>
                                        @else
                                            <td>
                                                <a href=" {{ route('driversaccounts.show',$account->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.edit') }}</a>
                                                <a href="{{ route('driversaccounts.destroy',$account->id) }} " class="btn btn-danger btn-sm">{{ ($account->status=='approved')? trans('admin.cancel'):trans('admin.approve') }}</a>
                                            </td>
                                        @endif
                                            <td>
                                                <a href=" {{ route('driveraccount.show',$account->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.view') }}</a>
                                            </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {!! $accounts->appends(\Request::except('page'))->render() !!}

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
