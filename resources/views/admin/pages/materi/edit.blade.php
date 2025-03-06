@extends('admin.app')

@section('title', 'Edit Materi')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Edit Materi</h6>
                <div class="card mb-4">
                    <div class="card-body px-5 pt-4 pb-2">
                        <form action="{{ route('materi.update', $materi->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <x-admin.input type="number" placeholder="Ex 1,2,3" label="Materi Ke-" name="id" value="{{$materi->id ?? ''}}" readonly/>

                                <x-admin.input type="text" placeholder="Nama Materi"
                                    label="Nama Materi" name="nama_materi"
                                    value="{{ $materi->nama_materi ?? '' }}" />

                                <x-admin.input type="text" placeholder="Judul Materi"
                                    label="Judul Materi" name="judul_materi"
                                    value="{{ $materi->judul_materi ?? '' }}" />

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Video Materi
                                        Sebelumnya</label>
                                    <br>
                                    <div class="text-center">
                                        <div class="overflow-hidden rounded mx-auto">
                                            <video class="w-100 h-100 object-fit-cover" controls>
                                                <source src="{{ asset('dist/assets/video/materi/' . $materi->video_materi) }}" type="video/mp4">
                                                Browser Anda tidak mendukung tag video.
                                            </video>
                                        </div>
                                    </div>
                                </div>

                                <x-admin.input type="file" placeholder="Video Materi Baru" label="Video Materi" name="video_materi" />

                                <label>Isi Materi</label>
                                <textarea class="form-control mb-3" name="isi_materi" id="edit_isi_materi" cols="20" rows="5">
                                    {!!$materi->isi_materi ?? ''!!}
                                </textarea>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
