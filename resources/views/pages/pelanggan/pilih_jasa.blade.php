@extends('layout.main_pelanggan')

<style>
    .box-jasa {
        transition: all 0.3s;
    }

    .box-jasa:hover {
        transform: translateY(-2px);
    }
</style>

@notifyCss

@section('content')
    <div class="page-heading">
        <h3>Layanan Yang Tersedia Di Humas</h3>

    </div>
    <div class="page-content">
        <section class="row">
            <div class="">
                <div class="row">
                    <div class="col-6 box-jasa col-lg-4 col-md-6">
                        <a href="{{ url('jasa/desain') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2" style="padding: 10px">
                                                <svg width='' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M368.4 18.3c21.9-21.9 57.3-21.9 79.2 0l46.1 46.1c21.9 21.9 21.9 57.3 0 79.2l-71 71L412.2 225 371.6 374.1c-4.8 17.8-18.1 32-35.5 38.1L72 505c-18.5 6.5-39.1 1.8-52.9-12S.5 458.5 7 440L99.8 175.9c6.1-17.4 20.3-30.6 38.1-35.5L287 99.8l10.4-10.4 71-71zM296.9 146.8L150.5 186.7c-2.5 .7-4.6 2.6-5.4 5.1L62.5 426.9 164.7 324.7c-3-6.3-4.7-13.3-4.7-20.7c0-26.5 21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48c-7.4 0-14.4-1.7-20.7-4.7L85.1 449.5l235.1-82.6c2.5-.9 4.4-2.9 5.1-5.4l39.9-146.4-68.3-68.3z"/></svg>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Desain</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 box-jasa col-lg-4 col-md-6">
                        <a href="{{ url('jasa/editing-video') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2" style="padding: 10px">
                                                <svg width="82" height="62" viewBox="0 0 82 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M77.8662 0H76.5897V3.19124C76.5897 4.24435 75.7281 5.10598 74.675 5.10598H68.2925C67.2394 5.10598 66.3777 4.24435 66.3777 3.19124V0H15.3179V3.19124C15.3179 4.24435 14.4563 5.10598 13.4032 5.10598H7.02072C5.96761 5.10598 5.10598 4.24435 5.10598 3.19124V0H3.82948C1.70731 0 0 1.70731 0 3.82948V57.4423C0 59.5644 1.70731 61.2718 3.82948 61.2718H5.10598V58.0805C5.10598 57.0274 5.96761 56.1658 7.02072 56.1658H13.4032C14.4563 56.1658 15.3179 57.0274 15.3179 58.0805V61.2718H66.3777V58.0805C66.3777 57.0274 67.2394 56.1658 68.2925 56.1658H74.675C75.7281 56.1658 76.5897 57.0274 76.5897 58.0805V61.2718H77.8662C79.9884 61.2718 81.6957 59.5644 81.6957 57.4423V3.82948C81.6957 1.70731 79.9884 0 77.8662 0ZM15.3179 49.1451C15.3179 50.1982 14.4563 51.0598 13.4032 51.0598H7.02072C5.96761 51.0598 5.10598 50.1982 5.10598 49.1451V42.7626C5.10598 41.7095 5.96761 40.8478 7.02072 40.8478H13.4032C14.4563 40.8478 15.3179 41.7095 15.3179 42.7626V49.1451ZM15.3179 33.8271C15.3179 34.8802 14.4563 35.7419 13.4032 35.7419H7.02072C5.96761 35.7419 5.10598 34.8802 5.10598 33.8271V27.4446C5.10598 26.3915 5.96761 25.5299 7.02072 25.5299H13.4032C14.4563 25.5299 15.3179 26.3915 15.3179 27.4446V33.8271ZM15.3179 18.5092C15.3179 19.5623 14.4563 20.4239 13.4032 20.4239H7.02072C5.96761 20.4239 5.10598 19.5623 5.10598 18.5092V12.1267C5.10598 11.0736 5.96761 10.212 7.02072 10.212H13.4032C14.4563 10.212 15.3179 11.0736 15.3179 12.1267V18.5092ZM58.7188 51.698C58.7188 52.7512 57.8571 53.6128 56.804 53.6128H24.8917C23.8385 53.6128 22.9769 52.7512 22.9769 51.698V36.3801C22.9769 35.327 23.8385 34.4654 24.8917 34.4654H56.804C57.8571 34.4654 58.7188 35.327 58.7188 36.3801V51.698ZM58.7188 24.8917C58.7188 25.9448 57.8571 26.8064 56.804 26.8064H24.8917C23.8385 26.8064 22.9769 25.9448 22.9769 24.8917V9.57371C22.9769 8.5206 23.8385 7.65897 24.8917 7.65897H56.804C57.8571 7.65897 58.7188 8.5206 58.7188 9.57371V24.8917ZM76.5897 49.1451C76.5897 50.1982 75.7281 51.0598 74.675 51.0598H68.2925C67.2394 51.0598 66.3777 50.1982 66.3777 49.1451V42.7626C66.3777 41.7095 67.2394 40.8478 68.2925 40.8478H74.675C75.7281 40.8478 76.5897 41.7095 76.5897 42.7626V49.1451ZM76.5897 33.8271C76.5897 34.8802 75.7281 35.7419 74.675 35.7419H68.2925C67.2394 35.7419 66.3777 34.8802 66.3777 33.8271V27.4446C66.3777 26.3915 67.2394 25.5299 68.2925 25.5299H74.675C75.7281 25.5299 76.5897 26.3915 76.5897 27.4446V33.8271ZM76.5897 18.5092C76.5897 19.5623 75.7281 20.4239 74.675 20.4239H68.2925C67.2394 20.4239 66.3777 19.5623 66.3777 18.5092V12.1267C66.3777 11.0736 67.2394 10.212 68.2925 10.212H74.675C75.7281 10.212 76.5897 11.0736 76.5897 12.1267V18.5092Z" fill="white"/>
                                                    </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Video Editing</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 box-jasa col-lg-4 col-md-6">
                        <a href="{{ url('jasa/editing-foto') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2" style="padding: 10px">
                                                <svg width="82" height="64" viewBox="0 0 82 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M68.0797 54.4638V56.7331C68.0797 60.4931 65.0317 63.5411 61.2718 63.5411H6.80797C3.04799 63.5411 0 60.4931 0 56.7331V20.4239C0 16.6639 3.04799 13.6159 6.80797 13.6159H9.0773V20.4239H7.65897C7.43327 20.4239 7.21682 20.5136 7.05722 20.6732C6.89763 20.8328 6.80797 21.0492 6.80797 21.2749V55.8821C6.80797 56.1078 6.89763 56.3243 7.05722 56.4839C7.21682 56.6435 7.43327 56.7331 7.65897 56.7331H60.4208C60.6465 56.7331 60.8629 56.6435 61.0225 56.4839C61.1821 56.3243 61.2718 56.1078 61.2718 55.8821V54.4638H68.0797ZM74.0367 6.80797H21.2749C21.0492 6.80797 20.8328 6.89763 20.6732 7.05723C20.5136 7.21682 20.4239 7.43327 20.4239 7.65897V42.2662C20.4239 42.4919 20.5136 42.7083 20.6732 42.8679C20.8328 43.0275 21.0492 43.1172 21.2749 43.1172H74.0367C74.2624 43.1172 74.4789 43.0275 74.6384 42.8679C74.798 42.7083 74.8877 42.4919 74.8877 42.2662V7.65897C74.8877 7.43327 74.798 7.21682 74.6384 7.05723C74.4789 6.89763 74.2624 6.80797 74.0367 6.80797ZM74.8877 0C78.6477 0 81.6957 3.04799 81.6957 6.80797V43.1172C81.6957 46.8772 78.6477 49.9251 74.8877 49.9251H20.4239C16.6639 49.9251 13.6159 46.8772 13.6159 43.1172V6.80797C13.6159 3.04799 16.6639 0 20.4239 0H74.8877ZM37.4439 15.8853C37.4439 19.0185 34.9038 21.5586 31.7705 21.5586C28.6373 21.5586 26.0972 19.0185 26.0972 15.8853C26.0972 12.752 28.6373 10.212 31.7705 10.212C34.9038 10.212 37.4439 12.752 37.4439 15.8853ZM27.2319 29.5012L32.8364 23.8967C33.501 23.2321 34.5787 23.2321 35.2435 23.8967L40.8478 29.5012L55.5297 14.8194C56.1943 14.1548 57.2719 14.1548 57.9367 14.8194L68.0797 24.9626V36.3092H27.2319V29.5012Z" fill="white"/>
                                                    </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Foto Editing</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 box-jasa col-lg-4 col-md-6">
                        <a href="{{ url('jasa/pas-foto') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2" style="padding: 12px">
                                                <svg width="90" height="90" viewBox="0 0 90 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M85.6957 6.67003V82.9193C85.6957 84.4234 84.4766 85.6425 82.9725 85.6425H6.72319C5.21922 85.6425 4 84.4234 4 82.9193V6.67003C4 5.16606 5.21922 3.94685 6.72319 3.94685H82.9725C84.4766 3.94685 85.6957 5.16606 85.6957 6.67003Z" stroke="white" stroke-width="6.80797" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M4 62.9493L35.7705 49.3333L85.6957 72.0266" stroke="white" stroke-width="6.80797" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M63.0024 35.7174C57.989 35.7174 53.9251 31.6533 53.9251 26.6401C53.9251 21.6268 57.989 17.5628 63.0024 17.5628C68.0158 17.5628 72.0797 21.6268 72.0797 26.6401C72.0797 31.6533 68.0158 35.7174 63.0024 35.7174Z" stroke="white" stroke-width="6.80797" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Pas Foto</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 box-jasa col-lg-4 col-md-6">
                        <a href="{{ url('jasa/liputan') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2" style="padding: 10px">
                                                <svg width="82" height="55" viewBox="0 0 82 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M47.6842 0H6.77961C3.03522 0 0 3.03522 0 6.77961V47.6842C0 51.4286 3.03522 54.4638 6.77961 54.4638H47.6842C51.4286 54.4638 54.4638 51.4286 54.4638 47.6842V6.77961C54.4638 3.03522 51.4286 0 47.6842 0ZM74.5473 5.3471L59.0024 16.0697V38.3941L74.5473 49.1025C77.5542 51.1733 81.6957 49.06 81.6957 45.4432V9.00638C81.6957 5.40383 77.5683 3.27634 74.5473 5.3471Z" fill="white"/>
                                                    </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Liputan</h6>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 box-jasa col-lg-4 col-md-6">
                        <a href="{{ url('jasa/publikasi') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2" style="padding: 10px">
                                                <svg width="82" height="55" viewBox="0 0 82 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M78.2917 0H12.4813C10.6013 0 9.0773 1.52399 9.0773 3.40399V4.53865H3.40399C1.52399 4.53865 0 6.06264 0 7.94264V46.5212C0 50.9078 3.55603 54.4638 7.94264 54.4638H74.8877C78.6477 54.4638 81.6957 51.4158 81.6957 47.6558V3.40399C81.6957 1.52399 80.1717 0 78.2917 0ZM7.94264 47.6558C7.6417 47.6558 7.3531 47.5363 7.14031 47.3235C6.92752 47.1107 6.80797 46.8221 6.80797 46.5212V11.3466H9.0773V46.5212C9.0773 46.8221 8.95775 47.1107 8.74496 47.3235C8.53217 47.5363 8.24357 47.6558 7.94264 47.6558ZM41.4152 45.3865H19.8566C18.9167 45.3865 18.1546 44.6244 18.1546 43.6845V42.5498C18.1546 41.6099 18.9167 40.8478 19.8566 40.8478H41.4152C42.3551 40.8478 43.1172 41.6099 43.1172 42.5498V43.6845C43.1172 44.6244 42.3551 45.3865 41.4152 45.3865ZM70.9164 45.3865H49.3578C48.4179 45.3865 47.6558 44.6244 47.6558 43.6845V42.5498C47.6558 41.6099 48.4179 40.8478 49.3578 40.8478H70.9164C71.8563 40.8478 72.6184 41.6099 72.6184 42.5498V43.6845C72.6184 44.6244 71.8563 45.3865 70.9164 45.3865ZM41.4152 31.7705H19.8566C18.9167 31.7705 18.1546 31.0085 18.1546 30.0686V28.9339C18.1546 27.994 18.9167 27.2319 19.8566 27.2319H41.4152C42.3551 27.2319 43.1172 27.994 43.1172 28.9339V30.0686C43.1172 31.0085 42.3551 31.7705 41.4152 31.7705ZM70.9164 31.7705H49.3578C48.4179 31.7705 47.6558 31.0085 47.6558 30.0686V28.9339C47.6558 27.994 48.4179 27.2319 49.3578 27.2319H70.9164C71.8563 27.2319 72.6184 27.994 72.6184 28.9339V30.0686C72.6184 31.0085 71.8563 31.7705 70.9164 31.7705ZM70.9164 18.1546H19.8566C18.9167 18.1546 18.1546 17.3925 18.1546 16.4526V10.7793C18.1546 9.83937 18.9167 9.0773 19.8566 9.0773H70.9164C71.8563 9.0773 72.6184 9.83937 72.6184 10.7793V16.4526C72.6184 17.3925 71.8563 18.1546 70.9164 18.1546Z" fill="white"/>
                                                    </svg>

                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Publikasi</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">

                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Arsip Layanan</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>Status Layanan</th>
                                                <th>Layanan</th>
                                                <th>Pesan</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($PermohonanPelanggan as $item)

                                                <tr>

                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            @if ($item->status == 'selesai')
                                                                <span class="badge bg-success">{{ $item->status }}</span>
                                                            @elseif($item->status == 'pending')
                                                                <span class="badge bg-primary">{{ $item->status }}</span>
                                                                @elseif($item->status == 'proses')
                                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                                                @else
                                                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="col-3">
                                                        <div class="d-flex align-items-center">
                                                            <p class="font-bold ms-3 mb-0">{{ $item->jenis_jasa }}</p>
                                                        </div>
                                                    </td>
                                                    <td class="col-auto">
                                                        <p class=" mb-0">{{ Str::limit($item->pesan, 50) }}</p>
                                                    </td>
                                                    <td class="col-2 text-right">
                                                        <span class="float-right">
                                                            <span style="font-size: 12px"
                                                                class="mail-date">{{ $item->time_ago }}</span>
                                                        </span>
                                                    </td>
                                                    <td class="col-auto">
                                                        <a href="jasa/cek-permohonan/{{$item->id_pesanan}}/{{$item->jenis_jasa}}" type="button" class="btn btn-primary btn-sm">Cek</a>
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

        </section>
    </div>
    <x-notify::notify />
    </div>
@endsection
@notifyJs
