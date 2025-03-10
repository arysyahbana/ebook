<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\GlobalFunction;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use DB;
use Exception;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    private function validateData(Request $request)
    {
        return $request->validate([
            'id' => 'required',
            'nama_materi' => 'required',
            'judul_materi' => 'required',
            'video_materi' => 'sometimes|file|mimes:mp4,mov,ogg,qt,mkv,webm',
            'isi_materi' => 'sometimes',
        ], [
            'id.required' => 'Urutan materi tidak boleh kosong',
            'nama_materi.required' => 'Nama materi wajib diisi.',
            'judul_materi.required' => 'Judul wajib diisi.',
            'video_materi.video' => 'File harus berupa video.',
            'video_materi.mimes' => 'Format file harus mp4, mov, ogg, qt mkv, atau webm.',
            'isi_materi.required' => 'Isi materi wajib diisi.',
        ]);
    }
    public function index()
    {
        $page = 'Materi';
        $materi = Materi::get();
        return view('admin.pages.materi.index', compact('page','materi'));
    }

    public function create()
    {
        $page = 'Materi';
        $checkIdMateri = Materi::orderBy('id', 'desc')->first();
        if ($checkIdMateri) {
            $newId = $checkIdMateri->id + 1;
        } else {
            $newId = 1;
        }
        return view('admin.pages.materi.add', compact('page', 'newId'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $this->validateData($request);
            $checkIdMateri = Materi::where('id',$data['id'])->first();
            if($checkIdMateri){
                return back()->with('error', 'Materi ke '.$data['id'].' Sudah Ada');
            }
            if ($request->hasFile('video_materi')) {
                $videoName = GlobalFunction::saveVideo($request->file('video_materi'), 'materi_'.$data['id'], 'materi');
                $data['video_materi'] = $videoName;
            }
            // dd($data);die;
            DB::table('materis')->insert($data);
            return redirect()->route('materi.show')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $page = 'Materi';
        $materi = Materi::findOrFail($id);
        return view('admin.pages.materi.edit', compact('page','materi'));
    }

    public function update(Request $request, $id){
        try {
            $data = $this->validateData( $request );
            if ($request->hasFile('video_materi')) {
                $videoName = GlobalFunction::saveVideo($request->file('video_materi'), 'materi_'.$data['id'], 'materi');
                $data['video_materi'] = $videoName;
            }
            Materi::updateOrCreate(['id' => $id], $data);
            return redirect()->route('materi.show')->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $materi = Materi::findOrFail($id);
            if ($materi->video_materi) {
                GlobalFunction::deleteVideo($materi->video_materi, 'materi/');
            }
            foreach ($materi->rQuiz as $quiz) {
                if ($quiz->file) {
                    GlobalFunction::deleteImage($quiz->file, 'quiz/');
                }
                $quiz->delete();
            }
            $materi->delete();
            return redirect()->route('materi.show')->with('success', 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
