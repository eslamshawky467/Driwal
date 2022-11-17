<div class="row mb-2">
    <div class="container">
        <div class ="search">
            <label style="font-size: 30px; color:black"><b>{{trans('admin.search')}}</b></label>
            <input type ="search" wire:model="search"
                    placeholder="{{trans('admin.search')}}" class="form-control" >
        </div>
    </div>
    <div class="col-md-12">

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
                @foreach($companies as $company)
                    <tr id="sid{{ $company->id}}">
                        <td>
                            <input type="checkbox" name="ids" class="checkbox" value="{{ $company->id }}"/>
                        </td>
                        <td>
                            {{$company->name}}</td>
                        <td>
                            {{$company->email}}
                        </td>
                        <td>
                            {{$company->phone_number}}
                        </td>
                        <td><a href="{{ route('Companies.edit', $company->id) }}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a></td>
                        <td>
                            <form method="post" action="{{ route('Companies.destroy', $company->id) }}">
                                @csrf
                                @method('DELETE')
                                {{-- <input type="hidden" name="company_id" value="{{ $company->id }}"> --}}
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

        </div><!-- end of table responsive -->

    </div><!-- end of col -->
    {!! $companies->appends(\Request::except('page'))->render() !!}
</div>
