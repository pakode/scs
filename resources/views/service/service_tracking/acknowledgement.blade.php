@extends('layouts.master')


@section('title', 'New Order')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>New Order</h2>

            {{ Request::segment(1) }}
        </div>
    </div>
</section>
@endsection