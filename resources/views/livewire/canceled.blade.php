<div class="row">
    <div class="col-md-12">
        <div class="tile shadow">
            <div class="row mb-2">
{{--                                <div class="col-md-12">--}}
{{--                                    <a href="{{route('clints.create')}}" class="btn btn-dark"><i class="fa fa-plus"></i> {{trans('admin.createuser')}}</a>--}}
{{--                                    <form method="post" action="{{route('All_Delete')}}" style="display: inline-block;">--}}
{{--                                        @csrf--}}

{{--                                        <input type="hidden" name="record_ids" id="record-ids">--}}
{{--                                        <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{trans('admin.delete')}}</button>--}}
{{--                                    </form><!-- end of form -->--}}
{{--                                </div><!-- end of row -->--}}

                <div class="row">
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
{{--                                    <th><input type="checkbox" id="checkboxall"/></th>--}}
{{--                                    <th><b>{{trans('admin.name')}}--}}
                                    <th><b>{{ trans('trip.drivername') }} </b></th>
                                    <th>{{ trans('trip.clientname') }}</th>
                                    <th>{{ trans('trip.location') }}</th>
                                    <th>{{ trans('trip.mylocation') }}</th>

                                    <th>{{ trans('trip.price') }}</th>
                                    <th>{{ trans('trip.distance') }}</th>
                                    <th>{{ trans('trip.status') }}</th>
                                    <th>{{ trans('trip.paymenttype') }}</th>

                                </tr>
                                <tbody class="alldata">
                                @foreach ($trips as $trip)
                                    <tr id="sid{{ $trip->id }} ">

{{--                                    <td>--}}
{{--                                        <input type="checkbox" name="ids[]" class="checkbox" value="{{ $trip->id }}"/>--}}
{{--                                    </td>--}}

                                        <td>
                                            {{ $trip->driver->name }}
                                        </td>
                                        <td>
                                            {{ $trip->client->name }}
                                        </td>
                                        <td>
                                            {{ $trip->order->location }}
                                        </td>
                                        <td>
                                            {{ $trip->order->my_location }}
                                        </td>




                                        <td>
                                            {{ $trip->price }}
                                        </td>
                                        <td>
                                            {{ $trip->distance }}
                                        </td>

                                        <td>
                                            {{ $trip->status }}
                                        </td>
                                        <td>
                                            {{ $trip->payment_type }}
                                        </td>

                                        {{--                                        <td><a href=" {{ route('packages.show',$package->id) }} " class="btn btn-secondary btn-sm">{{ trans('admin.edit') }}</a></td>--}}
                                        {{--                                        <td><a href="{{ route('packages.destroy',$package->id) }} " class="btn btn-danger btn-sm">{{ trans('admin.delete') }}</a></td>--}}
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

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->
    </div><!-- end of row -->
</div>
{!! $trips->appends(\Request::except('page'))->render() !!}
