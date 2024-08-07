@extends('partial.tabel_permohonan')

@section('content')
    <div class="email-user-list list-group ps ps--active-y">
        <ul class="users-list-wrapper media-list">
            @foreach ($dataPermohonan as $item)
                <a href="{{url('admin/desain/detail-arsip/'.$item->id_pesanan)}}">
                    <li class="media mail-read">
                        <div class="user-action">
                            <div class="checkbox-con me-3">
                                <div class="checkbox checkbox-shadow checkbox-sm">
                                    <input type="checkbox" id="checkboxsmall12" class='form-check-input'>
                                    <label for="checkboxsmall12"></label>
                                </div>
                            </div>
                            <span class="favorite">
                                @if ($item->status == 'ditolak' || $item->status == 'tidak selesai')
                                    <i class="bi bi-x-circle icon"></i>
                                @elseif ($item->status == 'selesai')
                                    <i class="bi bi-check-circle icon"></i>
                                @endif
                            </span>
                        </div>
                        <div class="pr-50">
                            <div class="avatar" style="transform: translateX(10px)">
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
