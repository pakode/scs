@extends('layouts.master')


@section('title', 'New Outlet')


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
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form id="form_outlet" name="form_outlet">
                                <div class="form-group form-float">
                                    <div class="form-line disabled">
                                        <input id="outlet_name" name="outlet_name" type="text" class="form-control" />
                                        <label for="outlet_name" class="form-label">@lang('system.outlet_name')</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line disabled">
                                        <input id="outlet_phone" name="outlet_phone" type="text" class="form-control" />
                                        <label for="outlet_phone" class="form-label">@lang('system.outlet_phone')</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line editable disabled">
                                        <input id="outlet_address" name="outlet_address" type="text" class="form-control" />
                                        <label for="outlet_address" class="form-label">@lang('system.outlet_address')</label>
                                    </div>
                                </div>
                                <button id="bt_save_outlet" type="button" class="btn bg-{{Auth::user()->theme}} m-t-15 waves-effect pull-right hidden">@lang('system.save')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection