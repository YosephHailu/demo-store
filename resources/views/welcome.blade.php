@extends('layouts.app_public')

@section('content')

<div class="container bg-light p-5 mt-4">
    <div>
        <h3 class="text-center text-uppercase"><b>Top selling shops</b></h3>
    </div>
    <div class="row">
        <div class="col-xl-4 col-lg-6 mb-4">
            <a href="{{ route('store.detail', 1) }}">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                style="width: 45px; height: 45px" class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">John Doe</p>
                                <p class="text-muted mb-0">john.doe@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Alex Ray</p>
                            <p class="text-muted mb-0">alex.ray@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Kate Hunington</p>
                            <p class="text-muted mb-0">kate.hunington@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/9.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Soraya Letto</p>
                            <p class="text-muted mb-0">soraya.letto@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/11.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Zeynep Dudley</p>
                            <p class="text-muted mb-0">zeynep.dudley@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="https://mdbootstrap.com/img/new/avatars/15.jpg" alt=""
                            style="width: 45px; height: 45px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">Ayat Black</p>
                            <p class="text-muted mb-0">ayat.black@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection