@extends("web::layouts.grids.4-4-4")

@section('left')

    @include("eveuniverse::examples.normal")

@endsection


@section('center')

    @include("eveuniverse::examples.modal")

@endsection


@section('right')

    @include("eveuniverse::examples.server")

@endsection