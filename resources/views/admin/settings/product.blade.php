@extends('layouts.master')


@section('title', 'Product')


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
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <ul class="nav nav-tabs tab-col-{{Auth::user()->theme}}" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#product" data-toggle="tab">@lang('system.product')</a>
                                </li>
                                <li role="presentation">
                                    <a href="#category" data-toggle="tab">@lang('system.category')</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane animated fadeIn active" id="product">
                                    <b>Home Content</b>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control">
                                                    <label class="form-label">Username</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="password" class="form-control">
                                                    <label class="form-label">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float form-group-lg">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" />
                                                    <label class="form-label">Large Input</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" />
                                                    <label class="form-label">Default Input</label>
                                                </div>
                                            </div>
                                            <div class="form-group form-float form-group-sm">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" />
                                                    <label class="form-label">Small Input</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane animated fadeIn" id="category">
                                    <p><strong>@lang('system.new_category')</strong></p>
                                    <div class="row clearfix">
                                        <form id="form_category" name="form_category">
                                            <div class="col-md-4">
                                                <div class="form-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input style="text-transform: uppercase;" id="product_code" name="product_code" type="text" class="form-control"/>
                                                        <label for="product_code" class="form-label">@lang('system.product_code')</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group form-float form-group-sm">
                                                    <div class="form-line">
                                                        <input id="product_remark" name="product_remark"  type="text" class="form-control" />
                                                        <label for="product_remark" class="form-label">@lang('system.product_remark')</label>
                                                    </div>
                                                </div>
                                                <button id="bt_save_category" type="button" class="btn bg-{{Auth::user()->theme}} waves-effect pull-right">@lang('system.save')</button>
                                            </div>
                                        </form>
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">@lang('system.number')</th>
                                                        <th>@lang('system.product_code')</th>
                                                        <th>@lang('system.remark')</th>
                                                        <th class="text-center">@lang('system.action')</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th class="text-center">@lang('system.number')</th>
                                                        <th>@lang('system.product_code')</th>
                                                        <th>@lang('system.remark')</th>
                                                        <th class="text-center">@lang('system.action')</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @php($i=1)
                                                    @foreach($categories as $category)
                                                    <tr>
                                                        <td class="text-center">{{$i++}}</td>
                                                        <td style="text-transform: uppercase;" >{{$category->product_code}}</td>
                                                        <td>{{$category->product_remark}}</td>
                                                        <td class="text-center">
                                                            <button onclick="hapus('{{$category->id}}')" type="button" class="btn bg-{{Auth::user()->theme}} btn-circle waves-effect waves-circle waves-float">
                                                                <i class="material-icons">delete_forever</i>
                                                            </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>

        function hapus(id) {
            if (confirm('{{ __('system.are_you_sure') }}')) {
                loadStart();
                let url  = '{{ route('postProductSetting') }}';
                $.post(url, {
                    _token : token,
                    action : 'delete',
                    id : id
                },function(data){
                }).fail(function(response) {
                    alert('Error: ' + response.responseText);
                    loadStop();
                }).done(function () {
                    showNotification(null);
                    loadStop();
                    setTimeout(function () {
                        location.reload()
                    },1000)
                });
            } else {
                return false;
            }

        }
        $(function () {
            let bt_save_category = $('#bt_save_category');
            bt_save_category.on('click',function () {
                let product_code = document.getElementById("product_code");
                let product_remark = document.getElementById("product_remark");

                if (product_code.value.length < 2) {
                    showNotification(product_code.nextElementSibling.innerText+" {{ __('system.minimum_character',['value' => 2]) }}");
                    product_code.focus();
                    return false;
                }
                if (product_remark.value.length === 0) {
                    showNotification(product_remark.nextElementSibling.innerText+" {{ __('system.cannot_be_empty') }}");
                    product_remark.focus();
                    return false;
                }
                if (confirm('{{ __('system.are_you_sure') }}')) {
                    loadStart();
                    let form = $('#form_category').serializeArray();
                    let url  = '{{ route('postProductSetting') }}';
                    $.post(url, {
                        _token : token,
                        action : 'new',
                        data : objectifyForm(form)
                    },function(data){
                    }).fail(function(response) {
                        alert('Error: ' + response.responseText);
                        loadStop();
                    }).done(function () {
                        showNotification(null);
                        loadStop();
                        setTimeout(function () {
                            location.reload()
                        },1000)
                    });
                } else {
                    return false;
                }


            })
        })
    </script>


@endsection