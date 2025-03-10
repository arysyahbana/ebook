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
    private function validateData(Request $request)
    {
        return $request->validate([
            'tipe_soal' => 'required',
            'materi' => 'required',
            'file' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'soal' => 'required',
            'skor' => 'required|integer',
            'pilihan' => 'sometimes|array',
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
        $quizSemuaMateri = Quiz::where('materi','semuaMateri')->get();
        return view('admin.pages.quiz.index', compact('page', 'quiz','quizSemuaMateri'));
    }

    public function create()
    {
        $page = 'Quiz';
        $materi = Materi::select('id', 'nama_materi')->get();
        if($materi->isEmpty()){
            return redirect()->route('quiz.show')->with('error', 'Belum ada Materi');
        }
        return view('admin.pages.quiz.add', compact('page', 'materi'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateData($request);
            if ($request->hasFile('file')) {
                $randName = Str::uuid()->toString();
                $fileName = GlobalFunction::saveImage($request->file('file'), $randName, 'quiz');
                $validatedData['file'] = $fileName;
            }
            Quiz::create($validatedData);
            return redirect()->route('quiz.show')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $page = 'Quiz';
        $quiz = Quiz::with('rMateri')->where('id', $id)->first();
        $materi = Materi::select('id', 'nama_materi')->get();
        return view('admin.pages.quiz.edit', compact('page', 'quiz', 'materi'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $this->validateData($request);
            $existingQuiz = Quiz::select('file', 'tipe_soal')->where('id', $id)->first();

            if (str_contains($existingQuiz->tipe_soal, 'Bergambar') && $validatedData['tipe_soal'] == 'Objektif' || $validatedData['tipe_soal'] == 'Uraian') {
                GlobalFunction::deleteImage($existingQuiz->file, 'quiz/');
                $validatedData['file'] = null;
            }

            if (str_contains($existingQuiz->tipe_soal, 'Objektif') && str_contains($validatedData['tipe_soal'], 'Uraian')) {
                $validatedData['pilihan'] = null;
                $validatedData['jawaban_benar'] = null;
            }

            if ($request->hasFile('file')) {
                $fileName = !empty($existingQuiz->file)
                    ? GlobalFunction::saveImage($request->file('file'), $existingQuiz->file, 'quiz')
                    : GlobalFunction::saveImage($request->file('file'), Str::uuid()->toString(), 'quiz');

                $validatedData['file'] = $fileName;
            }

            Quiz::updateOrCreate(['id' => $id], $validatedData);
            return redirect()->route('quiz.show')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->id;
            $quiz = Quiz::find($id);
            if($quiz->file != null){
                GlobalFunction::deleteImage($quiz->file, 'quiz/');
            }
            $quiz->delete();
            return redirect()->route('quiz.show')->with('success', 'Data berhasil dihapus.');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
