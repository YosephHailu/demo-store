@extends('layouts.app')

@push('top-scripts')
@endpush

@section('content')
<div class="fixed-action-btn" id="fixed1" style="height: 80px;">
    <a href="{{ route('register') }}" title="Register user" class="btn btn-floating btn-primary btn-lg"
        style="background-color: rgb(244, 67, 54);">
        <i class="fas fa-plus"></i>
    </a>
</div>
<div class="card">
    <div class="card-header d-flex pb-0">
        <h3 class="card-title">USERS LIST</h3>

        <div class="right" style="margin-left: auto !important">
            <form class=" input-group w-auto my-auto d-none d-sm-flex">
                <input autocomplete="off" type="search" class="form-control rounded" placeholder="Search"
                    style="min-width: 125px;" />
                <span class="input-group-text border-0 d-none d-lg-flex position-absolute text-lighter"
                    style="right: 0"><i class="fas fa-search"></i></span>
            </form>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-light">
                    <th><b>Name</b></th>
                    <th><b>Email</b></th>
                    <th><b>Role</b></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>Manager</td>
                        <td class="w-12" style="max-width: 65px;">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-indigo btn-floating mx-2">
                                <i class="fas fa-pen"></i>
                            </a>

                            <button type="button" class="btn btn-danger btn-floating mx-2">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection