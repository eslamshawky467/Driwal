
@extends('layouts.admin.app')
@livewireStyles

@section('content')

    <div>
        <h2>{{trans('admin.FAQ')}}</h2>
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
    @if(session()->has('message'))
        <div class="alert alert-danger">
            <p class="mb-0">{{ session()->get('message') }}</p>
         </div>
    @endif
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.FAQ')}}</li>
    </ul>

    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('qa.create') }}" class="btn btn-dark"><i class="fa fa-plus"></i> {{trans('admin.createqa')}}</a>
                        <form method="post" action="{{ route('settings.delete') }}" style="display: inline-block;">
                            @csrf
                            {{-- @method('delete') --}}
                            <input type="hidden" name="record_ids" id="record-ids">
                            <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{trans('admin.delete')}}</button>
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
                                                    <th><b>{{ trans('admin.question')}}  </b></th>
                                                    <th>{{ trans('admin.answer') }}</th>
                                                    <th>{{ trans('admin.edit') }}</th>
                                                    <th>{{ trans('admin.delete') }}</th>
                                                </tr>
                                                <tbody class="alldata">
                                                @foreach($qa as $q)
                                                <tr id="sid{{ $q->id}}">

                                                        <td>
                                                            <input type="checkbox" name="ids[{{ $q->id }}]" class="checkbox" value="{{ $q->id }}"/>
                                                        </td>
                                                        @if(app()->getLocale()=='ar')
                                                        <td>
                                                            {{$q->title_ar}}
                                                        </td>
                                                        <td>
                                                            {{ $q->description_ar }}
                                                        </td>
                                                        @else
                                                        <td>
                                                            {{$q->title_en}}
                                                        </td>
                                                        <td>
                                                            {{ $q->description_en }}
                                                        </td>
                                                        @endif

                                                   <td><a href=" {{ route('qa.update',$q->id) }}" class="btn btn-secondary btn-sm">{{ trans('admin.edit') }}</a></td>
                                                    <td><a href="{{ route('settings.destroy',$q->id) }}" class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                <tbody id="Content" class="searchdata">
                                                </tbody>
                                                <thead class="searchdata" id="Content">
                                                </thead>
                                            </table>
                                            </table>
                                        </div><!-- end of table responsive -->
                                    </div>
                                    </div><!-- end of col -->

                                    </div><!-- end of row -->

                                    </div><!-- end of tile -->
                                    {!! $qa->appends(\Request::except('page'))->render() !!}

                                    </div><!-- end of col -->

                                    </div><!-- end of row -->
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


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
    @endpush
    @livewireScripts
