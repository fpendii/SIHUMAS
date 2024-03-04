@extends('layout.main')

@section('content')
    <div class="page-heading">
        <h3>{{ $page }}</h3>
    </div>
    @include('partial.tabel_permohonan')
@endsection
