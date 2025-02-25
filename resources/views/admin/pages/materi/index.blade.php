@extends('admin.app')

@section('title', 'Settings')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Materi</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addMateri"><i
                                class="fa fa-plus" aria-hidden="true"></i><span
                                class="text-capitalize ms-1">Tambah</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Nama Materi</x-admin.th>
                                        <x-admin.th>Judul Materi</x-admin.th>
                                        <x-admin.th>Isi Materi</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot
                                    <tr>
                                        <x-admin.td>1</x-admin.td>
                                        <x-admin.td>
                                            nama materi
                                        </x-admin.td>
                                        <x-admin.td>Vector ABCD</x-admin.td>
                                        <x-admin.td
                                            style="word-wrap: break-word; word-break: break-word; white-space: normal; min-width: 300px">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, officia ex? Esse maxime quam doloribus numquam, alias iusto nihil nam.
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editMateri"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusMateri"><i class="fa fa-trash"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Materi -->
                                        <div class="modal fade" id="editMateri"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="editMateriLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editMateriLabel">Edit Data Materi
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="#"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <x-admin.input type="text" placeholder="Nama Materi"
                                                                label="Nama Materi" name="nama_materi"
                                                                value="Materi 1" />

                                                            <x-admin.input type="text" placeholder="Judul Materi"
                                                                label="Judul Materi" name="judul_materi"
                                                                value="Vector" />

                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Video Materi
                                                                    Sebelumnya</label>
                                                                <br>
                                                                <div class="text-center">
                                                                    <div class="overflow-hidden rounded mx-auto">
                                                                        <video class="w-100 h-100 object-fit-cover" controls>
                                                                            <source src="{{ asset('dist/assets/img/vid.mp4') }}" type="video/mp4">
                                                                            Browser Anda tidak mendukung tag video.
                                                                        </video>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                             <x-admin.input type="file" placeholder="Video Materi Baru" label="Video Materi" name="video_materi" />

                                                            <label>Isi Materi</label>
                                                            <textarea class="form-control mb-3" name="isi_materi" id="edit_isi_materi" cols="20" rows="5">
                                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugiat quisquam dolor nisi inventore unde. Voluptates, inventore! Voluptatibus, eos temporibus!
                                                            </textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-success">Update</button>
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus Materi -->
                                        <div class="modal fade" id="hapusMateri"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="hapusMateriLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusMateriLabel">Hapus Data Materi
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="{{ asset('dist/assets/img/bin.gif') }}" alt=""
                                                            class="img-fluid w-25">
                                                        <p>Yakin ingin menghapus data?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="#"
                                                            type="submit" class="btn btn-sm btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>

                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Add Materi -->
    <div class="modal fade" id="addMateri" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addMateriLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addMateriLabel">Tambah Data Materi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <x-admin.input type="text" placeholder="Nama Materi" label="Nama Materi" name="nama_materi" />

                        <x-admin.input type="text" placeholder="Judul Materi" label="Judul Materi" name="judul_materi" />

                        <x-admin.input type="file" placeholder="Video Materi" label="Video Materi" name="video_materi" />

                        <label>Isi Materi</label>
                        <textarea class="form-control mb-3" name="isi_materi" id="isi_materi" cols="20" rows="5"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
