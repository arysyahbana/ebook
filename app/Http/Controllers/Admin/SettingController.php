<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Exception;
use App\Helpers\GlobalFunction;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private function validateData(Request $request, $imageRule = 'required')
    {
        return $request->validate([
            'cover' => $imageRule . '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'kkm' => 'required'
        ], [
            'cover.required' => 'Cover wajib diisi.',
            'cover.image' => 'File harus berupa gambar.',
            'cover.mimes' => 'Format file harus jpeg, png, jpg, gif, atau svg.',
            'cover.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'judul.required' => 'Judul wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'kkm.required' => 'Nilai KKM wajib diisi.',
        ]);
    }
    public function index()
    {
        $page = 'Setting';
        $index = Setting::first();
        return view('admin.pages.setting.index', compact('page', 'index'));
    }

    public function store(Request $request)
    {
        try {
            $data = $this->validateData($request);
            if ($request->hasFile('cover')) {
                $coverName = GlobalFunction::saveImage($request->file('cover'), 'cover', 'cover');
                $data['cover'] = $coverName;
            }
            Setting::create($data);
            return back()->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function update(Request $request, $id)
    {
        try {
            $data = $this->validateData($request, 'sometimes');
            if ($request->hasFile('cover')) {
                $coverName = GlobalFunction::saveImage($request->file('cover'), 'cover', 'cover');
                $data['cover'] = $coverName;
            }
            Setting::updateOrCreate(['id' => $id], $data);
            return back()->with('success', 'Data berhasil disimpan.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Setting::destroy($id);
            return back()->with('success', 'Data berhasil dihapus.');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
