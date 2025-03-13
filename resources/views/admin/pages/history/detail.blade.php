@extends('admin.app')

@section('title', 'Detail')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h6>Detail History</h6>
                <div class="card mb-4">
                    <div class="card-body p-5">
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
                                    {{-- Total Skor --}}
                                    <div class="d-flex flex-column flex-md-row justify-content-end">
                                        <div class="card bg-light text-center shadow-sm px-4 py-2">
                                            <h5 class="mb-0">Total Skor</h5>
                                            <span class="badge bg-success fs-4 mt-1">90</span>
                                        </div>
                                    </div>
                                    {{-- end Total Skor --}}

                                    {{-- soal 1 --}}
                                    <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex gap-2">
                                                    <div>1</div>
                                                    <div class="flex-grow-1">
                                                        <div class="overflow-hidden rounded mb-3"
                                                            style="max-width: 30rem; max-height: 30rem;">
                                                            <img src="{{ asset('dist/assets/img/quiz/060eb26a-2281-4e1f-a40f-300c528e6bbb.png') }}" alt=""
                                                                class="w-100 h-100 object-cover">
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique magnam expedita ab at eos eveniet magni soluta perferendis ex temporibus.</p>
                                                        <div class="mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban1" id="j1a">
                                                                <label class="form-check-label" for="j1a">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban1" id="j1b" checked>
                                                                <label class="form-check-label" for="j1b">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-check-lg text-success h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban1" id="j1c">
                                                                <label class="form-check-label" for="j1c">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban1" id="j1d">
                                                                <label class="form-check-label" for="j1d">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban1" id="j1e">
                                                                <label class="form-check-label" for="j1e">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>

                                                            <div class="mt-5">
                                                                <a href="{{ asset('dist/assets/img/apple-icon.png') }}" class="btn btn-primary" target="_blank">Lihat Berkas</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    {{-- end soal 1 --}}

                                    {{-- soal 2 --}}
                                    <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex gap-2">
                                                    <div>2</div>
                                                    <div class="flex-grow-1">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique magnam expedita ab at eos eveniet magni soluta perferendis ex temporibus.</p>
                                                        <div class="mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban2" id="j2a">
                                                                <label class="form-check-label" for="j2a">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-check-lg text-success h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban2" id="j2b">
                                                                <label class="form-check-label" for="j2b">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban2" id="j2c">
                                                                <label class="form-check-label" for="j2c">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban2" id="j2d" checked>
                                                                <label class="form-check-label" for="j2d">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawaban2" id="j2e">
                                                                <label class="form-check-label" for="j2e">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>

                                                            <div class="mt-5">
                                                                <a href="{{ asset('dist/assets/img/apple-icon.png') }}" class="btn btn-primary" target="_blank">Lihat Berkas</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    {{-- end soal 2 --}}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="materi2" role="tabpanel">
                                <div class="table-responsive p-0">
                                    {{-- Total Skor --}}
                                    <div class="d-flex flex-column flex-md-row justify-content-end">
                                        <div class="card bg-light text-center shadow-sm px-4 py-2">
                                            <h5 class="mb-0">Total Skor</h5>
                                            <span class="badge bg-success fs-4 mt-1">90</span>
                                        </div>
                                    </div>
                                    {{-- end Total Skor --}}

                                    {{-- soal--}}
                                    <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex gap-2">
                                                    <div>1</div>
                                                    <div class="flex-grow-1">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique magnam expedita ab at eos eveniet magni soluta perferendis ex temporibus.</p>
                                                        <div class="mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri2" id="j2a">
                                                                <label class="form-check-label" for="j2a">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-check-lg text-success h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri2" id="j2b">
                                                                <label class="form-check-label" for="j2b">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri2" id="j2c">
                                                                <label class="form-check-label" for="j2c">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri2" id="j2d" checked>
                                                                <label class="form-check-label" for="j2d">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri2" id="j2e">
                                                                <label class="form-check-label" for="j2e">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>

                                                            <div class="mt-5">
                                                                <a href="{{ asset('dist/assets/img/apple-icon.png') }}" class="btn btn-primary" target="_blank">Lihat Berkas</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    {{-- end soal --}}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="materi3" role="tabpanel">
                                <div class="table-responsive p-0">
                                    {{-- Total Skor --}}
                                    <div class="d-flex flex-column flex-md-row justify-content-end">
                                        <div class="card bg-light text-center shadow-sm px-4 py-2">
                                            <h5 class="mb-0">Total Skor</h5>
                                            <span class="badge bg-success fs-4 mt-1">90</span>
                                        </div>
                                    </div>
                                    {{-- end Total Skor --}}

                                    {{-- soal --}}
                                    <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex gap-2">
                                                    <div>1</div>
                                                    <div class="flex-grow-1">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique magnam expedita ab at eos eveniet magni soluta perferendis ex temporibus.</p>
                                                        <div class="mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri3" id="j2a">
                                                                <label class="form-check-label" for="j2a">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-check-lg text-success h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri3" id="j2b">
                                                                <label class="form-check-label" for="j2b">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri3" id="j2c">
                                                                <label class="form-check-label" for="j2c">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri3" id="j2d" checked>
                                                                <label class="form-check-label" for="j2d">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanMateri3" id="j2e">
                                                                <label class="form-check-label" for="j2e">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>

                                                            <div class="mt-5">
                                                                <a href="{{ asset('dist/assets/img/apple-icon.png') }}" class="btn btn-primary" target="_blank">Lihat Berkas</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    {{-- end soal --}}
                                </div>
                            </div>

                            <div class="tab-pane fade" id="semuamateri" role="tabpanel">
                                <div class="table-responsive p-0">
                                    {{-- Total Skor --}}
                                    <div class="d-flex flex-column flex-md-row justify-content-end">
                                        <div class="card bg-light text-center shadow-sm px-4 py-2">
                                            <h5 class="mb-0">Total Skor</h5>
                                            <span class="badge bg-success fs-4 mt-1">90</span>
                                        </div>
                                    </div>
                                    {{-- end Total Skor --}}

                                     {{-- soal --}}
                                    <div class="border-start border-4 border-primary ps-3 ps-sm-4 mt-4 mb-5">
                                        <div class="d-flex flex-column flex-md-row gap-3">
                                            <div class="flex-grow-1">
                                                <div class="d-flex gap-2">
                                                    <div>1</div>
                                                    <div class="flex-grow-1">
                                                        <div class="overflow-hidden rounded mb-3"
                                                            style="max-width: 30rem; max-height: 30rem;">
                                                            <img src="{{ asset('dist/assets/img/quiz/060eb26a-2281-4e1f-a40f-300c528e6bbb.png') }}" alt=""
                                                                class="w-100 h-100 object-cover">
                                                        </div>
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique magnam expedita ab at eos eveniet magni soluta perferendis ex temporibus.</p>
                                                        <div class="mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanSemua" id="a">
                                                                <label class="form-check-label" for="a">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanSemua" id="b" checked>
                                                                <label class="form-check-label" for="b">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-check-lg text-success h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanSemua" id="c">
                                                                <label class="form-check-label" for="c">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanSemua" id="d">
                                                                <label class="form-check-label" for="d">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="jawabanSemua" id="e">
                                                                <label class="form-check-label" for="e">asdasdad</label>
                                                                &nbsp;
                                                                <i class="bi bi-x text-danger h5"></i>
                                                            </div>

                                                            <div class="mt-5">
                                                                <a href="{{ asset('dist/assets/img/apple-icon.png') }}" class="btn btn-primary" target="_blank">Lihat Berkas</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                    {{-- end soal --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
                radio.addEventListener("click", function (event) {
                    event.preventDefault(); // Mencegah perubahan pilihan
                });
            });
        });
    </script>
@endsection
