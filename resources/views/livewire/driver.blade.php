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
                <th><b>{{trans('admin.name')}} @if(!isset($search))@sortablelink('name','↓↑')@endif</b></th>
                <th>{{trans('admin.email')}}</th>
                <th>{{trans('admin.phone_number')}}</th>
                <th>{{trans('admin.start_cost')}}</th>
                <th>{{trans('admin.edit')}}</th>
                <th>{{trans('admin.delete')}}</th>
                <th>{{trans('admin.view')}}</th>
                <th>{{trans('admin.viewlocation')}}</th>
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
                    <td>
                        {{$driver->start_cost}}
                    </td>
                    @if($driver->status=='pending')
                    <td><a href="{{ route('driver.active',$driver->id) }} " class="btn btn-secondary btn-sm">{{trans('admin.active')}}</a></td>
                    <td><a href="{{ route('driver.inactive',$driver->id) }}" class="btn btn-danger btn-sm">{{trans('admin.inactive')}}</a></td>
                    @else
                    <td><a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-secondary btn-sm">{{trans('admin.edit')}}</a></td>
                    <td>
                        <form method="post" action="{{ route('driver.destroy', $driver->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="{{ trans('admin.delete') }}">
                        </form>
                    </td>
                    @endif
                    <td><a href="{{ route('driver.show',$driver->id) }} " class="btn btn-secondary btn-sm">{{trans('admin.view')}}</a></td>
                    <td><a href="{{ route('driver.show_location',$driver->id) }} " class="btn btn-secondary btn-sm">{{trans('admin.viewlocation')}}</a></td>

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

</div>
{!! $drivers->appends(\Request::except('page'))->render() !!}
