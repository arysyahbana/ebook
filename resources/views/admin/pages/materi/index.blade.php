@extends('admin.app')

@section('title', 'Materi')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Materi</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <a href="{{ route('materi.create') }}" class="btn bg-gradient-success">
                            <i class="fa fa-plus"></i>
                            <span class="text-capitalize ms-1">Tambah</span>
                        </a>
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
                                    <x-admin.th>Video Materi Materi</x-admin.th>
                                    <x-admin.th>Action</x-admin.th>
                                </tr>
                                @endslot
                                @foreach ($materi as $data)
                                    <tr>
                                        <x-admin.td>{{$loop->iteration}}</x-admin.td>
                                        <x-admin.td>{{$data->nama_materi}} </x-admin.td>
                                        <x-admin.td>{{$data->judul_materi}} </x-admin.td>
                                        <x-admin.td
                                            style="word-wrap: break-word; word-break: break-word; white-space: normal; min-width: 300px">
                                            {!!$data->isi_materi!!}
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="{{ asset('dist/assets/video/materi/' . $data->video_materi) }}" target="_blank">
                                                {{$data->video_materi}}
                                            </a>
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="{{ route('materi.edit', $data->id) }}" class="btn bg-gradient-info">
                                                <i class="fa fa-pencil"></i>
                                                <span class="text-capitalize ms-1">Edit</span>
                                            </a>
                                            <a href="#" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusMateri"><i class="fa fa-trash"
                                                    aria-hidden="true"></i><span class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Hapus Materi -->
                                        <div class="modal fade" id="hapusMateri" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusMateriLabel"
                                            aria-hidden="true">
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
                                                        <a href="{{ route('materi.destroy', $data->id) }}" type="submit" class="btn btn-sm btn-danger">Hapus</a>
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach

                            </x-admin.table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection