<style>
    .no-bullet {
        list-style-type: none;
    }
</style>

@extends('layout.main')

@section('content')
    <div class="page-heading">
        <h3>{{ $page }}</h3>
    </div>
    @include('partial.tabel_permohonan')
@endsection
