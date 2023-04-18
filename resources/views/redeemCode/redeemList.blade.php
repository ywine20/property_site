@extends('master')

@section('title', 'Project List - SMT')
@section('css')

@endsection

@section('content')

    <div class="container my-5">
        <div class="">
            <a href="{{ route('profile.generateRedeemCodePage') }}"><h1 class="btn btn-primary mt-5">Add RedeemCode</h1></a>
        </div>
    </div>

@endsection
@section('script')

@endsection
@push('clientScript')

@endpush