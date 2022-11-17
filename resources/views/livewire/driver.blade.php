<div class="col-md-12 mb-2">
    <div class ="search">
        <label style="font-size: 30px; color:black"><b>{{trans('admin.search')}}</b></label>
        <input type ="search" wire:model="search"
                placeholder="{{trans('admin.search')}}" class="form-control" >
    </div>
    <div class="table-responsive">

        <table class="table datatable" id="admins-table" style="width: 100%;">
            <thead class="alldata">
            <tr>
                <th><input type="checkbox" id="checkboxall"/></th>
                <th><b>{{trans('admin.name')}} @sortablelink('name','↓↑')</b></th>
                <th>{{trans('admin.email')}}</th>
                <th>{{trans('admin.phone_number')}}</th>
                <th>{{trans('admin.edit')}}</th>
                <th>{{trans('admin.delete')}}</th>
            </tr>
            <tbody class="alldata">
            @foreach($drivers as $driver)
                <tr id="sid{{ $driver->id}}">
                    <td>
                        <input type="checkbox" name="ids" class="checkbox" value="{{ $driver->id }}"/>
                    </td>
                    <td>
                        {{$driver->name}}</td>
                    <td>
                        {{$driver->email}}
                    </td>
                    <td>
                        {{$driver->phonenumber}}
                    </td>
                    <td><a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a></td>
                    <td>
                        <form method="post" action="{{ route('driver.destroy', $driver->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="حذف">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tbody id="Content" class="searchdata">
            </tbody>
            <thead class="searchdata" id="Content">
            </thead>
        </table>
        </table>

    </div>
    {!! $drivers->appends(\Request::except('page'))->render() !!}
</div>