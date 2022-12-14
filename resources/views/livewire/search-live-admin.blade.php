<div class="search">
    <div class ="search">
        <label style="font-size: 30px; color:black"><b>{{ trans('admin.search') }}</b></label>
        <input type ="search" name="search"
               placeholder="{{ trans('admin.search') }}" wire:model='search'  class="form-control" >
    </div>
    <div class="col-md-12">

        <div class="table-responsive">

            <table class="table datatable" id="admins-table" style="width: 100%;">
                <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><b>{{ trans('admin.name')}}   @if(!isset($search))@sortablelink('name','↓↑')@endif </b></th>
                    <th>{{ trans('admin.email') }}</th>
                    <th>{{ trans('admin.edit') }}</th>
                    <th>{{ trans('admin.delete') }}</th>
                </tr>
                <tbody class="alldata">
                @foreach($admins as $admin)
                <tr id="sid{{ $admin->id}}">
                    @if($admin->id==1)
                        <td>
                            -
                        </td>
                        <td>
                            {{$admin->name}}</td>
                        <td>
                            {{$admin->email}}
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            -
                        </td>
                        @else
                        <td>
                            <input type="checkbox" name="ids[{{ $admin->id }}]" class="checkbox" value="{{ $admin->id }}"/>
                        </td>
                        <td>
                            {{$admin->name}}</td>
                            <td>
                            {{$admin->email}}
                        </td>
                   <td><a href="{{ route('admins.edit',$admin->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.edit') }}</a></td>
                    <td><a href="{{ route('admins.destroy',$admin->id) }}" class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>
                </tr>
                    @endif
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
</div>
{!! $admins->appends(\Request::except('page'))->render() !!}

