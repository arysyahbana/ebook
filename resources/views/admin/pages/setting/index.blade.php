@extends('admin.app')

@section('title', 'Settings')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Data Settings</h6>
                <div class="card mb-4">
                    @if ($index->isEmpty())
                        <div class="card-header pb-0 d-flex justify-content-between">
                            <a href="#" class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#addSetting"><i
                                    class="fa fa-plus" aria-hidden="true"></i><span
                                    class="text-capitalize ms-1">Tambah</span></a>
                        </div>
                    @endif
                    <div class="card-body px-5 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                <tr>
                                    <x-admin.th>No</x-admin.th>
                                    <x-admin.th>Cover</x-admin.th>
                                    <x-admin.th>Judul</x-admin.th>
                                    <x-admin.th>Deskripsi</x-admin.th>
                                    <x-admin.th>Action</x-admin.th>
                                </tr>
                                @endslot
                                @foreach ($index as $data)
                                    <tr>
                                        <x-admin.td>1</x-admin.td>
                                        <x-admin.td>
                                            <a href="{{ asset('dist/assets/img/cover/' . $data->cover) }}" target="_blank">
                                                <img src="{{ asset('dist/assets/img/banner.jpg') }}" alt=""
                                                    style="max-width: 100px" class="img-fluid img-thumbnail">
                                            </a>
                                        </x-admin.td>
                                        <x-admin.td>{{ $data->judul }}</x-admin.td>
                                        <x-admin.td
                                            style="word-wrap: break-word; word-break: break-word; white-space: normal; min-width: 300px">
                                            {{ $data->deskripsi }}
                                        </x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-info" data-bs-toggle="modal"
                                                data-bs-target="#editSetting"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i><span class="text-capitalize ms-1">Edit</span></a>
                                            <a href="" class="btn bg-gradient-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusSetting"><i class="fa fa-trash"
                                                    aria-hidden="true"></i><span class="text-capitalize ms-1">Hapus</span></a>
                                        </x-admin.td>

                                        <!-- Modal Edit Setting -->
                                        <div class="modal fade" id="editSetting" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="editSettingLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editSettingLabel">Edit Data Settings
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{route('setting.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Cover
                                                                    Sebelumnya</label>
                                                                <br>
                                                                <div class="text-center">
                                                                    <img src="{{ asset('dist/assets/img/cover/' . $data->cover) }}"
                                                                        alt="" style="max-width: 300px"
                                                                        class="img-fluid img-thumbnail">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="formFile" class="form-label">Cover</label>
                                                                <input class="form-control" type="file" id="formFile"
                                                                    name="cover">
                                                            </div>

                                                            <x-admin.input type="text" placeholder="Judul" label="Judul"
                                                                name="judul" value="{{ $data->judul }}" />

                                                            <label>Deskripsi</label>
                                                            <textarea class="form-control mb-3" name="deskripsi" id="deskripsi" cols="20" rows="5">
                                                                {{ $data->deskripsi }}
                                                            </textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-sm btn-success">Update</button>
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Hapus Setting -->
                                        <div class="modal fade" id="hapusSetting" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusSettingLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="hapusSettingLabel">Hapus Data Settings
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
                                                        <a href="{{route('setting.destroy', $data->id)}}" type="submit"
                                                            class="btn btn-sm btn-danger">Hapus</a>
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

    <!-- Modal Add Settings -->
    <div class="modal fade" id="addSetting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addSettingLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addSettingLabel">Tambah Data Settings</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Cover</label>
                            <input class="form-control" type="file" id="formFile" name="cover">
                        </div>

                        <x-admin.input type="text" placeholder="Judul" label="Judul" name="judul" />

                        <label>Deskripsi</label>
                        <textarea class="form-control mb-3" name="deskripsi" id="deskripsi" cols="20" rows="5"></textarea>

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