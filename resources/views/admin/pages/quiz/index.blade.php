@extends('admin.app')

@section('title', 'Settings')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Quiz</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addQuiz"><i
                                class="fa fa-plus" aria-hidden="true"></i><span
                                class="text-capitalize ms-1">Tambah</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Soal</x-admin.th>
                                        <x-admin.th>Jawaban</x-admin.th>
                                        <x-admin.th>Tipe Soal</x-admin.th>
                                        <x-admin.th>File</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot
                                    <tr>
                                        <x-admin.td>1</x-admin.td>
                                        <x-admin.td style="word-wrap: break-word; word-break: break-word; white-space: normal; min-width: 300px">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, sequi.
                                        </x-admin.td>
                                        <x-admin.td style="word-wrap: break-word; word-break: break-word; white-space: normal; min-width: 300px">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptatum soluta mollitia enim, quasi sed.
                                        </x-admin.td>
                                        <x-admin.td>
                                            Objektif
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="{{ asset('dist/assets/img/banner.jpg') }}"
                                                target="_blank">
                                                <img src="{{ asset('dist/assets/img/banner.jpg') }}"
                                                    alt="" style="max-width: 100px" class="img-fluid img-thumbnail">
                                            </a>
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editQuiz"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Edit</span></a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusQuiz"><i class="fa fa-trash"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Quiz -->
                                        <div class="modal fade" id="editQuiz"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="editQuizLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editQuizLabel">Edit Data Materi
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="#"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label>Soal</label>
                                                            <textarea class="form-control mb-3" name="soal" id="soal" cols="20" rows="5">
                                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi, pariatur?
                                                            </textarea>

                                                            <label>Jawaban</label>
                                                            <textarea class="form-control mb-3" name="jawaban" id="jawaban" cols="20" rows="5">
                                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, porro.
                                                            </textarea>

                                                            <Label>Tipe Soal</Label>
                                                            <select class="form-select mb-3" aria-label="Default select example" name="type"
                                                                id="type">
                                                                <option selected hidden value="">--- Pilih Kategori ---</option>
                                                                <option value="Objektif">Objektif</option>
                                                                <option value="Objektif Bergambar">Objektif Bergambar</option>
                                                                <option value="Uraian">Uraian</option>
                                                                <option value="Uraian Bergambar">Uraian Bergambar</option>
                                                            </select>

                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">File
                                                                    Sebelumnya</label>
                                                                <br>
                                                                <div class="text-center">
                                                                    <img src="{{ asset('dist/assets/img/banner.jpg') }}"
                                                                        alt="" style="max-width: 300px"
                                                                        class="img-fluid img-thumbnail">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">File</label>
                                                                <input class="form-control" type="file" id="formFile"
                                                                    name="file">
                                                            </div>

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

                                        <!-- Modal Hapus Quiz -->
                                        <div class="modal fade" id="hapusQuiz"
                                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="hapusQuizLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusQuizLabel">Hapus Data Quiz
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

    <!-- Modal Add Quiz -->
    <div class="modal fade" id="addQuiz" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addQuizLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addQuizLabel">Tambah Data Quiz</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label>Soal</label>
                        <textarea class="form-control mb-3" name="soal" id="soal" cols="20" rows="5"></textarea>

                        <label>Jawaban</label>
                        <textarea class="form-control mb-3" name="jawaban" id="jawaban" cols="20" rows="5"></textarea>

                        <Label>Tipe Soal</Label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type"
                            id="type">
                            <option selected hidden value="">--- Pilih Kategori ---</option>
                            <option value="Objektif">Objektif</option>
                            <option value="Objektif Bergambar">Objektif Bergambar</option>
                            <option value="Uraian">Uraian</option>
                            <option value="Uraian Bergambar">Uraian Bergambar</option>
                        </select>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">File</label>
                            <input class="form-control" type="file" id="formFile" name="file">
                        </div>

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
