@extends('layouts.admin.app')

@section('content')

    <div>
        <h2>{{trans('admin.accounts')}}</h2>
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
    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{trans('admin.home')}}</a></li>
        <li class="breadcrumb-item">{{trans('admin.accounts')}}</li>
    </ul>
    <div class="row">

        <div class="col-md-12">
            <div class="tile shadow">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <a href="{{ route('client_accounts.create' )}}" class="btn btn-dark"><i class="fa fa-plus"></i> {{trans('admin.addclint')}}</a>
                    </div><!-- end of row -->
                </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table datatable" id="admins-table" style="width: 100%;">
                <thead class="alldata">
                <tr>
                    <th><input type="checkbox" id="checkboxall"/></th>
                    <th>{{trans('admin.name')}}</th>
                    <th>{{trans('admin.bank_balance')}}</th>
                    <th>{{trans('admin.user_id')}}</th>
                    <th>{{trans('admin.status')}}</th>
                    <th>{{trans('admin.Action')}}</th>
                </tr>
                <tbody class="alldata">
                    @foreach($accounts as $account)
                        @if($account->status!='pending')
                        <tr id="sid{{ $account->id}}">
                            <td>
                                <input type="checkbox" name="ids[{{ $account->id }}]" class="checkbox" value="{{ $account->id }}"/>
                            </td>
                            <td>
                                    {{$account->user->name}}
                            </td>
                            <td>
                                {{$account->balance}}
                            </td>
                            <td>
                                {{$account->id}}
                            </td>
                            <td>
                                {{trans('admin.'.$account->status)}}</td>

                            <td><a href="{{route('client_accounts.edit',$account->id) }} " class="btn btn-secondary btn-sm">{{trans('admin.edit')}}</a>
                            <a href="{{route('client_accounts.delete',$account->id) }}" class="btn btn-danger btn-sm">{{trans('admin.delete')}}</a>
                            <a href="{{route('client_accounts.show',$account->id) }}" class="btn btn-secondary btn-sm">{{trans('admin.showx')}}</a></td>
                        </tr>

                                @else

                    <tbody class="alldata">
                    <tr id="sid{{ $account->id}}">
                        <td>
                            <input type="checkbox" name="ids[{{ $account->id }}]" class="checkbox" value="{{ $account->id }}"/>
                        </td>
                        <td>
                                {{$account->user->name}}
                        </td>

                        <td>
                            {{$account->balance}}
                        </td>
                        <td>
                            {{$account->id}}
                        </td>
                        <td>
                            {{$account->status}}</td>
                        <td><a href="{{route('client_accounts.approve',$account->id) }} " class="btn btn-secondaary btn-sm">{{trans('admin.approved')}}</a>
                        <a href="{{route('client_accounts.delete',$account->id) }}" class="btn btn-danger btn-sm">{{trans('admin.canceled')}}</a>
                        {{-- <a href="" class="btn btn-danger btn-sm">{{trans('admin.show')}}</a></td> --}}
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

    </div><!-- end of col -->
    {{-- {!! $accounts->appends(\Request::except('page'))->render() !!} --}}
</div>
@endsection
