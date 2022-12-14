<div>
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
                        <th><b>{{trans('order.id')}}
                            @if(!isset($search))@sortablelink('name','↓↑')@endif</b>
                        </th>
                        <th>{{trans('order.location')}}</th>
                        <th>{{trans('order.myLocation')}}</th>
                        <th>{{trans('order.clientName')}}</th>
                        <th>{{trans('order.requestName')}}</th>
                        <th>{{trans('order.status')}}</th>
                    </tr>
                    <tbody class="alldata">
                    @foreach($finisheds as $finished)
                        <tr id="sid{{ $finished->id}}">
                            <td>
                                <input type="checkbox" name="ids" class="checkbox" value="{{ $finished->id }}"/>
                            </td>

                            <td>
                                {{$finished->location}}</td>
                            <td>
                                {{$finished->my_location}}
                            </td>

                            <td>
                                {{$finished->client->name}}
                            </td>
                            <td>
                                {{$finished->requests->company->name}}
                            </td>

                            <td>
                                {{$finished->status}}
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

    </div>
    {{-- {!! $finished->appends(\Request::except('page'))->render() !!} --}}

</div>
