@extends('admin.app')

@section('title', 'Daftar Users')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Daftar Users</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-end">
                        <a href="{{ route('users.download') }}" class="btn bg-gradient-success"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Nama</x-admin.th>
                                        <x-admin.th>Nim</x-admin.th>
                                        <x-admin.th>Nilai Akhir</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot

                                    <tr>
                                        <x-admin.td>1</x-admin.td>
                                        <x-admin.td>Budiono Siregar</x-admin.td>
                                        <x-admin.td>1212121212</x-admin.td>
                                        <x-admin.td>90</x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Detail</span></a>
                                        </x-admin.td>

                                    </tr>
                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailLabel">Detail Budiono Siregar</h1>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <div class="modal-body">
                    <table class="table text-center text-sm text-dark">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Quiz</th>
                            <th scope="col">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Vector ABCD</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Vector BCDE</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Vector CDEF</td>
                            <td>90</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Semua Materi</td>
                            <td>90</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
