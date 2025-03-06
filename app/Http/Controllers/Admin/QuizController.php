<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Quiz;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    private function validateData(Request $request){
        return $request->validate([
            'tipe_soal' => 'required',
            'materi' => 'required',
            'file' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'soal' => 'required',
            'skor' => 'required|integer',
            'pilihan'=> 'sometimes|array',
            'jawaban_benar' => 'sometimes',
        ], [
            'tipe_soal.required' => 'Tipe soal wajib diisi.',
            'materi.required' => 'Materi wajib diisi.',
            'file.image' => 'File harus berupa gambar.',
            'file.mimes' => 'Format file harus jpeg, png, jpg, gif, atau svg.',
            'file.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'soal.required' => 'Isi materi wajib diisi.',
            'skor.required' => 'Skor wajib diisi.',
            'skor.integer' => 'Skor harus berupa angka.',
            'pilihan.array' => 'Pilihan harus berupa array.',
            'jawaban_benar.required' => 'Jawaban benar wajib diisi.',
        ]); 
    }
    public function index()
    {
        $page = 'Quiz';
        $quiz = Materi::with('rQuiz')->get();
        return view('admin.pages.quiz.index', compact('page','quiz'));
    }

    public function create()
    {
        $page = 'Quiz';
        $materi = Materi::select('id','nama_materi')->get();
        return view('admin.pages.quiz.add', compact('page','materi'));
    }

    public function store(Request $request){
        try{
            $data = $this->validateData($request);
            $convertJson = json_encode($data['pilihan']);
            $data['pilihan'] = $convertJson;
            if ($request->hasFile('file')) {
                $randName = Str::uuid()->toString();
                $fileName = GlobalFunction::saveImage($request->file('file'), $randName, 'quiz');
                $data['file'] = $fileName;
            }
            Quiz::create($data);
            return redirect()->route('quiz.show')->with('success','Data berhasil disimpan.');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit()
    {
        $page = 'Quiz';
        return view('admin.pages.quiz.edit', compact('page'));
    }
}
