@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('trip.finished')}}</h2>
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
        <li class="breadcrumb-item">{{trans('trip.finished')}}</li>
    </ul>

    @livewire('finished')

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
                url:'{{ URL::to('search/user')}}',
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
    @livewireScripts
@endpush
