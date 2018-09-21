@extends('layouts.master')


@section('title', 'Company')

@section('css')
    <style>
        .form-group .form-line.disabled:after {
            border-bottom: 1px solid #ddd; }


        /*.form-group .form-line.fokuski:after {
            border-bottom: 2px solid blue; }*/
    </style>
@endsection


@section('content')
    <div class="row clearfix">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>@yield('title')</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:edit();">@lang('system.edit')</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <form id="form_company" name="form_company">
                                <div class="form-group form-float">
                                    <div class="form-line disabled">
                                        <input id="company_name" name="company_name" type="text" class="form-control" value="{{$company->company_name}}" disabled />
                                        <label for="company_name" class="form-label">@lang('system.company_name')</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line disabled">
                                        <input id="company_email" name="company_email" type="text" class="form-control" value="{{$company->company_email}}" disabled />
                                        <label for="company_email" class="form-label">@lang('system.company_email')</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line disabled">
                                        <input id="company_phone" name="company_phone" type="text" class="form-control" value="{{$company->company_email}}" disabled />
                                        <label for="company_phone" class="form-label">@lang('system.company_phone')</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line editable disabled">
                                        <input id="company_address" name="company_address" type="text" class="form-control" value="{{$company->company_address}}" disabled />
                                        <label for="company_address" class="form-label">@lang('system.company_address')</label>
                                    </div>
                                </div>
                                <button id="bt_save_company" type="button" class="btn bg-{{Auth::user()->theme}} m-t-15 waves-effect pull-right hidden">@lang('system.save')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box hover-expand-effect hover-zoom-effect">
                <div class="icon bg-{{Auth::user()->theme}}">
                    <i class="material-icons">meeting_room</i>
                </div>
                <div class="content">
                    <div class="text">@lang('system.outlet')</div>
                    <div class="number count-to" data-from="0" data-to="{{$company->outlet_total}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
            <div class="info-box hover-expand-effect hover-zoom-effect">
                <div class="icon bg-{{Auth::user()->theme}}">
                    <i class="material-icons">supervised_user_circle</i>
                </div>
                <div class="content">
                    <div class="text">@lang('system.users')</div>
                    <div class="number count-to" data-from="0" data-to="{{$users}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <script>

        $(function () {
            initCounters();
        });
        //Widgets count plugin
        function initCounters() {
            $('.count-to').countTo();
        }

        function edit() {
            let el = $('.form-line.editable');
            let bt = $('#bt_save_company');
            el.removeClass('disabled');
            el.find('input').prop('disabled',false);
            bt.removeClass('hidden');
            bt.on('click',function () {
                let company_address = document.getElementById("company_address");
                if (company_address.value.length < 3) {
                    showNotification(company_address.nextElementSibling.innerText+" {{ __('system.minimum_character',['value' => 3]) }}");
                    company_address.focus();
                    return false;
                }
                loadStart();
                let form= $('#form_company').serializeArray();
                let url  = '{{ route('postCompany') }}';
                $.post(url, {
                    _token : token,
                    data : objectifyForm(form)
                },function(data){
                }).fail(function(response) {
                    alert('Error: ' + response.responseText);
                    loadStop();
                }).done(function () {
                    showNotification(null);
                    loadStop();
                    bt.addClass('hidden');
                    el.addClass('disabled');
                    el.find('input').prop('disabled',true);
                });
            })
        }
    </script>
@endsection