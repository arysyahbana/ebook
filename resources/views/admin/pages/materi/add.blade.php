@extends('admin.app')

@section('title', 'Tambah Materi')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Tambah Materi</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 pt-4 pb-2">
                        <form action="#" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <x-admin.input type="text" placeholder="Nama Materi" label="Nama Materi" name="nama_materi" />

                                <x-admin.input type="text" placeholder="Judul Materi" label="Judul Materi" name="judul_materi" />

                                <x-admin.input type="file" placeholder="Video Materi" label="Video Materi" name="video_materi" />

                                <label>Isi Materi</label>
                                <textarea class="form-control mb-3" name="isi_materi" id="isi_materi" cols="20" rows="5"></textarea>

                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
