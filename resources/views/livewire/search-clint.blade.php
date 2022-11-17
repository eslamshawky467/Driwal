<div class="row">
    <div class="col-md-12">
        <div class="tile shadow">
            <div class="row mb-2">
                <div class="col-md-12">
                    <a href="{{route('clints.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> {{trans('admin.createuser')}}</a>
                    <form method="post" action="{{route('All_Delete')}}" style="display: inline-block;">
                        @csrf
                        
                        <input type="hidden" name="record_ids" id="record-ids">
                        <button type="submit" class="btn btn-danger" id="bulk-delete" disabled="true"><i class="fa fa-trash"></i> {{trans('admin.delete')}}</button>
                    </form><!-- end of form -->
                </div><!-- end of row -->

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
                                    <th><input type="checkbox" id="checkboxall"/></th>
                                    <th><b>{{trans('admin.name')}} @sortablelink('name','↓↑')</b></th>
                                    <th>{{trans('admin.email')}}</th>
                                    <th>{{trans('admin.phone_number')}}</th>
                                    <th>{{trans('admin.identity_card')}}</th>
                                    <th>{{trans('admin.country_id')}}</th>
                                    <th>{{trans('admin.edit')}}</th>
                                    <th>{{trans('admin.delete')}}</th>
                                </tr>
                                <tbody class="alldata">
                                @foreach($users as $user)
                                    <tr id="sid{{ $user->id}}">
                                        <td>
                                            <input type="checkbox" name="ids[{{ $user->id }}]" class="checkbox" value="{{ $user->id }}"/>
                                        </td>
                                        <td>
                                            {{$user->name}}</td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{$user->phone_number}}
                                        </td>
                                        <td>
                                            {{$user->identity_card}}
                                        </td>
                                        @if (app()->getLocale() == 'en')
                                        <td>
                                            {{$user->nationality->name_en}}
                                        </td>
                                        @else
                                        <td>
                                            {{$user->nationality->name_ar}}
                                        </td>
                                        @endif
                                        <td><a href="{{ route('clints.edit', $user->id) }}" class="btn btn-success btn-sm">{{trans('admin.edit')}}</a></td>
                                        <td><a href="{{ route('clint.block', $user->id) }}" class="btn btn-danger btn-sm">{{trans('admin.delete')}}</a></td>
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
            {!! $users->appends(\Request::except('page'))->render() !!}
        </div><!-- end of col -->
    </div><!-- end of row -->
</div>