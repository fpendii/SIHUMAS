@extends('partial.tabel_permohonan')

@section('content')
    <div class="container">
    <div class="email-user-list list-group ps ps--active-y">
        {{-- <ul class="users-list-wrapper media-list"> --}}
            <ul class="users-list-wrapper media-list" style="width: 96%">
            @foreach ($dataPermohonan as $item)
                <a href="{{url('admin/editing-video/detail/'.$item->id_pesanan)}}"style="width: 10%">
                    <li class="media mail-read">
                        <div class="user-action">
                            
                            <span class="favorite">

                                <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
                                    <use xlink:href="/template/dist/assets/static/images/bootstrap-icons.svg#star" />
                                </svg>
                            </span>
                        </div>
                        <div class="pr-50">
                            <div class="avatar">
                                <img class="rounded-circle" src="/template/dist/assets/compiled/jpg/3.jpg"
                                    alt="Generic placeholder image">
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="user-details">
                                <div class="mail-items">
                                    <span class="list-group-item-text text-truncate mb-0">{{ $item->username }}</span>
                                </div>
                                <div class="mail-meta-item">
                                    <span class="float-right">
                                        <span class="mail-date">{{ $item->time_ago }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="mail-message">
                                <p class="list-group-item-text mb-0 truncate">{{ $item->pesan }}</p>
                                <div class="mail-meta-item">
                                    <span class="float-right">
                                        <span class="bullet bullet-warning bullet-sm"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection