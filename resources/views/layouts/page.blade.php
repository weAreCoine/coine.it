@extends('layouts._models._page')

@section('header')
    @include('layouts.parts.header', ['light' => true, 'isLandingPage' => $isLandingPage ?? false])
@endsection
