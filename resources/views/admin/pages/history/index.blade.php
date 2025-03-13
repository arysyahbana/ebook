@extends('admin.app')

@section('title', 'Daftar Users')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>History Nilai</h6>
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
                                @foreach ($historys as $key => $history)
                                    <tr>
                                        <x-admin.td>{{ $loop->iteration }}</x-admin.td>
                                        <x-admin.td>{{ $history->name }}</x-admin.td>
                                        <x-admin.td>{{ $history->nim }}</x-admin.td>
                                        <x-admin.td>{{ $history->rJawaban[$key]->nilai }}</x-admin.td>
                                        <x-admin.td>
                                            <a href="{{ route('history.detail') }}" class="btn bg-gradient-primary">
                                                <i class="fa fa-eye"></i>
                                                <span class="text-capitalize ms-1">Detail</span>
                                            </a>
                                        </x-admin.td>

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