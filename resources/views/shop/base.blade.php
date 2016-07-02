@extends('layouts.shop')

@section('aimeos_styles')
    <link rel="stylesheet" href="{{ asset('packages/aimeos/shop/themes/elegance/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('packages/aimeos/shop/themes/elegance/aimeos.css') }}" />
@endsection

@section('aimeos_scripts')
    <script type="text/javascript" src="{{ asset('packages/aimeos/shop/themes/jquery-ui.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/aimeos/shop/themes/aimeos.js') }}"></script>
    <script type="text/javascript" src="{{ asset('packages/aimeos/shop/themes/elegance/aimeos.js') }}"></script>
@endsection