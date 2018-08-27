@extends('layouts.master')


@section('title', 'Outlets')


@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>@yield('title')</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{route('getNewOutlets')}}">@lang('system.new_outlet')</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                            <thead>
                            <tr>
                                <th width="5%">@lang('system.no')</th>
                                <th>@lang('system.outlet_id')</th>
                                <th>@lang('system.name')</th>
                                <th>@lang('system.address')</th>
                                <th>@lang('system.phone')</th>
                                <th style="width: 120px">@lang('system.active')</th>
                                <th width="10%">@lang('system.action')</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>@lang('system.no')</th>
                                <th>@lang('system.outlet_id')</th>
                                <th>@lang('system.name')</th>
                                <th>@lang('system.address')</th>
                                <th>@lang('system.phone')</th>
                                <th>@lang('system.active')</th>
                                <th>@lang('system.action')</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @php($i = 1)
                            @foreach($outlets as $outlet)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$outlet->outlet_id}}</td>
                                <td>{{$outlet->outlet_name}}</td>
                                <td>{{$outlet->outlet_address}}</td>
                                <td>{{$outlet->outlet_phone}}</td>
                                <td>
                                    <span class="switch">
                                        <label>@lang('system.no')<input type="checkbox" {{$outlet->outlet_status == 1 ? 'checked' : ''}}><span class="lever switch-col-red"></span>@lang('system.yes')</label>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-{{Auth::user()->theme}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="javascript:void(0);">Separated link</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection