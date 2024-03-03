<style>
    .edit-button {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 10px 20px;
        text-align: center;
        cursor: pointer;
        opacity: 0;
        transition: 0.4s;
    }

    .image-container:hover .edit-button {
        opacity: 1;
    }

    .image-container img {
        transition: filter 0.3s;
        /* tambahkan transisi untuk efek yang lebih halus */
    }

    .image-container:hover img {
        filter: brightness(40%);
        /* ubah nilai brightness sesuai keinginan Anda */
    }
</style>

@extends('layout.main')

@section('content')
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="image-container">
                                <img class="img-fluid w-100 photo-profil" src="/template/dist/assets/compiled/jpg/banana.jpg"
                                    alt="Card image cap">
                                <div class="edit-button"><i class="fa fa-edit"></i></i>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Horizontal Form with Icons</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="first-name-horizontal-icon">Name</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            id="first-name-horizontal-icon" @readonly(true)>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="email-horizontal-icon">Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="email" class="form-control" placeholder="Email"
                                                            id="email-horizontal-icon" @readonly(true)>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-envelope"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="contact-info-horizontal-icon">Mobile</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="number" class="form-control" placeholder="Mobile"
                                                            id="contact-info-horizontal-icon" @readonly(true)>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-phone"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-8 offset-md-4">
                                                <div class='form-check'>
                                                    <div class="checkbox">
                                                        <input type="checkbox" id="checkbox2" class='form-check-input'
                                                            checked>
                                                        <label for="checkbox2">Remember Me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
