@extends('layouts.master')


@section('title', 'Product')

@section('css')
    <link href="{{asset('/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
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
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn bg-{{Auth::user()->theme}} waves-effect pull-right " data-toggle="modal" data-target="#modal_product">@lang('system.new_product')</button>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">@lang('system.number')</th>
                                                        <th>@lang('system.category_code')</th>
                                                        <th>@lang('system.model_code')</th>
                                                        <th>@lang('system.remark')</th>
                                                        <th class="text-center">@lang('system.action')</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th class="text-center">@lang('system.number')</th>
                                                        <th>@lang('system.category_code')</th>
                                                        <th>@lang('system.model_code')</th>
                                                        <th>@lang('system.remark')</th>
                                                        <th class="text-center">@lang('system.action')</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @php($i=1)
                                                    @foreach($products as $product)
                                                        <tr>
                                                            <td class="text-center">{{$i++}}</td>
                                                            <td style="text-transform: uppercase;" >{{$product->category_code}}</td>
                                                            <td style="text-transform: uppercase;" >{{$product->model_code}}</td>
                                                            <td>{{$product->model_remark}}</td>
                                                            <td class="text-center">
                                                                <button onclick="hapus('{{$product->id}}','MsSubscriberProduct')" type="button" class="btn bg-{{Auth::user()->theme}} btn-circle waves-effect waves-circle waves-float">
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
                                <div role="tabpanel" class="tab-pane animated fadeIn" id="category">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <button type="button" class="btn bg-{{Auth::user()->theme}} waves-effect pull-right " data-toggle="modal" data-target="#modal_category">@lang('system.new_category')</button>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">@lang('system.number')</th>
                                                        <th>@lang('system.category_code')</th>
                                                        <th>@lang('system.remark')</th>
                                                        <th class="text-center">@lang('system.action')</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th class="text-center">@lang('system.number')</th>
                                                        <th>@lang('system.category_code')</th>
                                                        <th>@lang('system.remark')</th>
                                                        <th class="text-center">@lang('system.action')</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @php($i=1)
                                                    @foreach($categories as $category)
                                                    <tr>
                                                        <td class="text-center">{{$i++}}</td>
                                                        <td style="text-transform: uppercase;" >{{$category->category_code}}</td>
                                                        <td>{{$category->category_remark}}</td>
                                                        <td class="text-center">
                                                            <button onclick="hapus('{{$category->id}}','MsSubscriberCategoryProduct')" type="button" class="btn bg-{{Auth::user()->theme}} btn-circle waves-effect waves-circle waves-float">
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
        <div class="modal fade" id="modal_category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_category_label">@lang('system.new_category')</h4>
                    </div>
                    <form id="form_category" name="form_category">
                        <div class="modal-body">
                            <div class="col-md-4">
                                <div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                        <input style="text-transform: uppercase;" id="category_code" name="category_code" type="text" class="form-control"/>
                                        <label for="category_code" class="form-label">@lang('system.category_code')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-float form-group-lg">
                                    <div class="form-line">
                                        <input id="category_remark" name="category_remark"  type="text" class="form-control" />
                                        <label for="category_remark" class="form-label">@lang('system.remark')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="bt_save_category" type="button" class="btn bg-{{Auth::user()->theme}} waves-effect pull-right">@lang('system.save')</button>
                            <button type="button" class="btn btn-danger waves-effect pull-left" data-dismiss="modal">@lang('system.close')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal_product" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal_category_label">@lang('system.new_category')</h4>
                    </div>
                    <form id="form_product" name="form_product">
                        <div class="modal-body">
                            <div class="col-md-12 p-b-20">
                                <label for="category_code_select" class="form-label" style="font-weight: normal">@lang('system.choose_category')</label>
                                <select class="form-control show-tick" id="category_code_select" name="category_code">
                                    <option value="x" readonly>-- @lang('system.choose_category') --</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->category_code}}">{{$category->category_code. ' - ' .$category->category_remark}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float form-group">
                                    <div class="form-line">
                                        <input style="text-transform: uppercase;" id="model_code" name="model_code" type="text" class="form-control"/>
                                        <label for="model_code" class="form-label">@lang('system.model_code')</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float form-group">
                                    <div class="form-line">
                                        <input id="model_remark" name="model_remark"  type="text" class="form-control" />
                                        <label for="model_remark" class="form-label">@lang('system.remark')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="bt_save_product" type="button" class="btn bg-{{Auth::user()->theme}} waves-effect pull-right">@lang('system.save')</button>
                            <button type="button" class="btn btn-danger waves-effect pull-left" data-dismiss="modal">@lang('system.close')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <!-- Select Plugin Js -->
    <script src="{{asset('/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <script>

        function hapus(id,tablenya) {
            if (confirm('{{ __('system.are_you_sure') }}')) {
                loadStart();
                let url  = '{{ route('postProductSetting') }}';
                $.post(url, {
                    _token : token,
                    action : 'delete',
                    table : tablenya,
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
            let bt_save_product = $('#bt_save_product');
            bt_save_category.on('click',function () {
                let product_code = document.getElementById("category_code");
                let product_remark = document.getElementById("category_remark");

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
                        table : 'MsSubscriberCategoryProduct',
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


            });
            bt_save_product.on('click',function () {
                let category_code = document.getElementById('category_code_select');
                let model_code = document.getElementById('model_code');
                let model_remark = document.getElementById('model_remark');
                if (category_code.value === 'x') {
                    showNotification("{{__('system.please_choose_category')}}");
                    category_code.focus();
                    return false;
                }
                if (model_code.value.length < 5 ) {
                    showNotification(model_code.nextElementSibling.innerText+" {{ __('system.minimum_character',['value' => 5]) }}");
                    model_code.focus();
                    return false;
                }

                if (model_remark.value.length === 0) {
                    showNotification(model_remark.nextElementSibling.innerText+" {{ __('system.cannot_be_empty') }}");
                    model_remark.focus();
                    return false;
                }
                if (confirm('{{ __('system.are_you_sure') }}')) {
                    loadStart();
                    let form = $('#form_product').serializeArray();
                    let url  = '{{ route('postProductSetting') }}';
                    $.post(url, {
                        _token : token,
                        action : 'new',
                        table : 'MsSubscriberProduct',
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