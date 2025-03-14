@extends('admin.app')

@section('title', 'Edit Profile')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Edit Profile</h6>
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="table-responsive p-0">
                            <form action="{{ route('profile.update',$user->id) }}" method="post">
                                @csrf
                                <x-admin.input type="text" placeholder="Nama"
                                    label="Nama" name="name"
                                    value="{{ $user->name ?? '' }}" />
                                <x-admin.input type="text" placeholder="Nim"
                                    label="Nim" name="nim"
                                    value="{{ $user->nim ?? '' }}" />
                                <x-admin.input type="number" placeholder="Nomor HP"
                                    label="Nomor HP" name="no_hp"
                                    value="{{ $user->no_hp ?? '' }}" />
                                <x-admin.input type="text" placeholder="Alamat"
                                    label="Alamat" name="alamat"
                                    value="{{ $user->alamat ?? '' }}" />
                                <x-admin.input type="email" placeholder="Email"
                                    label="Email" name="email"
                                    value="{{ $user->email ?? '' }}" />
                                <Label>Jenis Kelamin</Label>
                                <select class="form-select mb-3"
                                    aria-label="Default select example" name="jenis_kelamin">
                                    <option hidden value="">--- Pilih Jenis Kelamin ---
                                    </option>
                                    <option value="Pria"
                                        {{ $user->jenis_kelamin == 'Pria' ? 'selected' : '' }}>
                                        Pria
                                    </option>
                                    <option value="Wanita"
                                        {{ $user->jenis_kelamin == 'Wanita' ? 'selected' : '' }}>
                                        Wanita</option>
                                </select>
                                <Label>Role</Label>
                                <select class="form-select mb-3"
                                    aria-label="Default select example" name="role">
                                    <option hidden>--- Pilih Role ---</option>
                                    <option value="Admin"
                                        {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="Mahasiswa"
                                        {{ $user->role == 'Mahasiswa' ? 'selected' : '' }}>
                                        Mahasiswa</option>
                                </select>
                                <x-admin.input type="password" placeholder="********" label="Password" name="password" />
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
