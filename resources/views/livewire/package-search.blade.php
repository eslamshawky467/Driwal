<div>

    <div class ="search">
        <label style="font-size: 30px; color:black"><b>{{ trans('admin.search') }}</b></label>
        <input type ="search" name="search"
               placeholder="{{ trans('admin.search') }}" wire:model='package_search' class="form-control" >
    </div>
    <div class="table-responsive">
        <table class="table datatable" id="admins-table" style="width: 100%;">
            <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th><b>{{ trans('admin.name') }}  </b></th>
                    <th>{{ trans('admin.description') }}</th>
                    <th>{{ trans('admin.price') }}</th>
                    <th>{{ trans('admin.tripsnumber') }}</th>
                    <th>{{ trans('admin.status') }}</th>
                    <th>{{ trans('admin.enddate') }}</th>
                    <th>{{ trans('admin.edit') }}</th>
                    <th>{{ trans('admin.delete') }}</th>
                </tr>
            </thead>
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
    </div>

</div>
