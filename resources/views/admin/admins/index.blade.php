@extends('layouts.admin.app')

@section('custom-css')
    @livewireStyles
@endsection

@section('content')

    <div>
        <h2>{{ trans('admin.index') }}</h2>
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
        <li class="breadcrumb-item">{{ trans('admin.index') }}</li>
    </ul>

    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('admins.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>{{ trans('admin.create') }}</a>
                        <form method="post" action="" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{ trans('admin.delete') }}</button>
                        </form><!-- end of form -->
                </div><!-- end of row -->

                <!-- table admins -->

                @livewire('search-live-admin')

                <!-- End table admins -->

            </div><!-- end of tile -->
        </div><!-- end of col -->

    </div><!-- end of row -->
        <script type="text/javascript">

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
