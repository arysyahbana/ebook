@extends('admin.app')

@section('title', 'Detail')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Detail History</h6>
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-end">
                        <a href="{{ route('users.download') }}" class="btn bg-gradient-success"><i
                                class="bi bi-plus-circle"></i><span class="text-capitalize ms-1">Unduh Rekap Data</span></a>
                    </div>
                    <div class="card-body px-5 pt-0 pb-2">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="materi1-tab" data-bs-toggle="tab" data-bs-target="#materi1" type="button" role="tab">Materi 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="materi2-tab" data-bs-toggle="tab" data-bs-target="#materi2" type="button" role="tab">Materi 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="materi3-tab" data-bs-toggle="tab" data-bs-target="#materi3" type="button" role="tab">Materi 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="semua-materi-tab" data-bs-toggle="tab" data-bs-target="#semuamateri" type="button" role="tab">Semua Materi</button>
                            </li>
                        </ul>

                        <div class="tab-content mt-3">
                            <div class="tab-pane fade show active" id="materi1" role="tabpanel">
                                <div class="table-responsive p-0">
                                    <x-admin.table>
                                        @slot('header')
                                            <tr>
                                                <x-admin.th>No</x-admin.th>
                                                <x-admin.th>Soal</x-admin.th>
                                                <x-admin.th>Jawaban</x-admin.th>
                                                <x-admin.th>Kunci Jawaban</x-admin.th>
                                                <x-admin.th>Skor</x-admin.th>
                                            </tr>
                                        @endslot

                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 0 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                    </x-admin.table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="materi2" role="tabpanel">
                                <div class="table-responsive p-0">
                                    <x-admin.table>
                                        @slot('header')
                                            <tr>
                                                <x-admin.th>No</x-admin.th>
                                                <x-admin.th>Soal</x-admin.th>
                                                <x-admin.th>Jawaban</x-admin.th>
                                                <x-admin.th>Kunci Jawaban</x-admin.th>
                                                <x-admin.th>Skor</x-admin.th>
                                            </tr>
                                        @endslot

                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 0 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                    </x-admin.table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="materi3" role="tabpanel">
                                <div class="table-responsive p-0">
                                    <x-admin.table>
                                        @slot('header')
                                            <tr>
                                                <x-admin.th>No</x-admin.th>
                                                <x-admin.th>Soal</x-admin.th>
                                                <x-admin.th>Jawaban</x-admin.th>
                                                <x-admin.th>Kunci Jawaban</x-admin.th>
                                                <x-admin.th>Skor</x-admin.th>
                                            </tr>
                                        @endslot

                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 0 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                    </x-admin.table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="semuamateri" role="tabpanel">
                                <div class="table-responsive p-0">
                                    <x-admin.table>
                                        @slot('header')
                                            <tr>
                                                <x-admin.th>No</x-admin.th>
                                                <x-admin.th>Soal</x-admin.th>
                                                <x-admin.th>Jawaban</x-admin.th>
                                                <x-admin.th>Kunci Jawaban</x-admin.th>
                                                <x-admin.th>Skor</x-admin.th>
                                            </tr>
                                        @endslot

                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 0 </x-admin.td>

                                            </tr>
                                            <tr>
                                                <x-admin.td>1</x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque, dolor. </x-admin.td>
                                                <x-admin.td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, earum? </x-admin.td>
                                                <x-admin.td> a. Lorem ipsum dolor sit amet. </x-admin.td>
                                                <x-admin.td> 20 </x-admin.td>

                                            </tr>
                                    </x-admin.table>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="table-responsive p-0">
                            <x-admin.table id="datatable">
                                @slot('header')
                                    <tr>
                                        <x-admin.th>No</x-admin.th>
                                        <x-admin.th>Quiz</x-admin.th>
                                        <x-admin.th>Nilai</x-admin.th>
                                        <x-admin.th>Action</x-admin.th>
                                    </tr>
                                @endslot

                                    <tr>
                                        <x-admin.td>1</x-admin.td>
                                        <x-admin.td>Vector ABCD</x-admin.td>
                                        <x-admin.td>90</x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Detail</span></a>
                                        </x-admin.td>

                                    </tr>
                                    <tr>
                                        <x-admin.td>2</x-admin.td>
                                        <x-admin.td>Vector BCDE</x-admin.td>
                                        <x-admin.td>90</x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Detail</span></a>
                                        </x-admin.td>

                                    </tr>
                                    <tr>
                                        <x-admin.td>3</x-admin.td>
                                        <x-admin.td>Vector CDEF</x-admin.td>
                                        <x-admin.td>90</x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Detail</span></a>
                                        </x-admin.td>

                                    </tr>
                                    <tr>
                                        <x-admin.td>4</x-admin.td>
                                        <x-admin.td>Semua Materi</x-admin.td>
                                        <x-admin.td>90</x-admin.td>
                                        <x-admin.td>
                                            <a href="#" class="btn bg-gradient-primary" data-bs-toggle="modal"
                                                data-bs-target="#detail"><i class="fa fa-eye"
                                                    aria-hidden="true"></i><span
                                                    class="text-capitalize ms-1">Detail</span></a>
                                        </x-admin.td>

                                    </tr>
                            </x-admin.table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detail" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailLabel">Detail Quiz Vektor ABCD</h1>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <div class="modal-body">
                    <table class="table text-center text-sm text-dark">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">No</th>
                            <th scope="col">Soal</th>
                            <th scope="col">Jawaban</th>
                            <th scope="col">Kunci</th>
                            <th scope="col">Skor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem ea voluptates, recusandae est quo suscipit neque ipsam quasi accusamus eaque provident aspernatur autem tenetur sint nulla temporibus modi, sed quidem.</td>
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
