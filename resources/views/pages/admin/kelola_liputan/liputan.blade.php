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
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Todo List</h3>
                    <p class="text-subtitle text-muted">Permohonan Liputan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Todo List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Task App Widget Starts -->
        <section class="tasks">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Tasks
                            </h4>
                            <ul class="list-inline d-flex mb-0">
                                <li class="d-flex align-items-center">
                                    <i class="bx bx-check-circle font-medium-3 me-50"></i>
                                    <div class="dropdown">
                                        <div class="dropdown-toggle me-1" role="button" id="dropdownMenuButton"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Task
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Option 1</a>
                                            <a class="dropdown-item" href="#">Option 2</a>
                                            <a class="dropdown-item" href="#">Option 3</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bx bx-sort me-50 font-medium-3"></i>
                                    <div class="dropdown">
                                        <div class="dropdown-toggle" role="button" id="dropdownMenuButton2"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Task
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item" href="#">Option 1</a>
                                            <a class="dropdown-item" href="#">Option 2</a>
                                            <a class="dropdown-item" href="#">Option 3</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body px-0 py-1 overflow-auto">
                            <ul class="widget-todo-list-wrapper no-bullet" id="widget-todo-list">
                                @for ($i = 0; $i < 10; $i++)
                                <li class="widget-todo-item mb-3">
                                    <div
                                        class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                        <div class="widget-todo-title-area d-flex align-items-center gap-2">
                                            <i data-feather="list" class="cursor-move"></i>
                                            <label for="checkbox-1" class="widget-todo-title ms-2">Add SCSS and JS files if
                                                required</label>
                                        </div>
                                        <div class="widget-todo-item-action d-flex align-items-center">
                                            <div class="badge badge-pill bg-light-success me-1">Proses</div>
                                            <div class="avatar bg-warning">
                                                <img src="/template/dist/assets/compiled/jpg/1.jpg" alt="" srcset="">
                                            </div>
                                            <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                        </div>
                                    </div>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card widget-todo">
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                            <h4 class="card-title d-flex">
                                <i class="bx bx-check font-medium-5 pl-25 pr-75"></i>Progress
                            </h4>

                        </div>
                        <div class="container text-center mt-3">
                            <div class="row">
                              <div class="col text-success">
                                Selesai
                                <h1 >
                                    5
                                </h1>
                              </div>
                              <div class="col text-warning">
                                Proses
                                <h1>
                                    5
                                </h1>
                              </div>
                              <div class="col text-danger">
                                Tidak Selesai
                                <h1>
                                    5
                                </h1>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
