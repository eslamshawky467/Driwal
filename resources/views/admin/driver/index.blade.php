@extends('layouts.admin.app')
@livewireStyles

@section('content')

    <div>
        <h2>{{ trans('admin.driver') }}</h2>
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
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{ trans('admin.home') }}</a></li>
        <li class="breadcrumb-item">{{ trans('admin.driver') }}</li>
    </ul>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tile shadow">
                    <a href="{{ route('driver.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>{{ trans('admin.create') }}</a>
                    <form method="post" action="{{route('driver.delete_All','test')}}" style="display: inline-block;">
                        @csrf
                        <input type="hidden" name="record_ids" id="record-ids">
                        <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</button>
                    </form>
                    @livewire('driver')
            </div>
        </div>
    </div>


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
@livewireScripts