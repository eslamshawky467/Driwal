<div class="row">
    <div class="container">
        <div class ="search">
            <label style="font-size: 30px; color:black"><b>{{ trans('admin.search') }}</b></label>
            <input type ="search" wire:model="search" placeholder="{{ trans('admin.search') }}" class="form-control" >
        </div>
    </div>
    <div class="col-md-12">

        <div class="table-responsive">

            <table class="table datatable" id="admins-table" style="width: 100%;">
                <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><b>{{ trans('admin.name') }} @sortablelink('name','↓↑')</b></th>
                    <th>{{ trans('admin.email') }}</th>
                    <th>{{ trans('admin.edit') }}</th>
                    <th>{{ trans('admin.delete') }}</th>
                </tr>
                <tbody class="alldata">
                @foreach ($admins as $admin)
                    <tr id="sid1">
                            <td>
                                -
                            </td>
                            <td>
                                {{$admin->name}}
                            </td>
                            <td>
                                {{$admin->email}}
                            </td>
                            @if ($admin->id == 1)
                                <td>
                                    -
                                </td>
                                <td>
                                    -
                                </td>
                            @else
                                <td><a href="{{route('admins.edit', $admin->id)}}" class="btn btn-success btn-sm">{{ trans('admin.edit') }}</a></td>
                                <td><a href="{{route('admins.destory', $admin->id)}}" class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
                            @endif
                    </tr>
                @endforeach
                </tbody>
                <tbody id="Content" class="searchdata">
                </tbody>
                <thead class="searchdata" id="Content">
                </thead>
            </table>
            </table>

        </div><!-- end of tile -->
            {!! $admins->appends(\Request::except('page'))->render() !!}
    </div><!-- end of col -->   
</div>