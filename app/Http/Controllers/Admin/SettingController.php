<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $page = 'Setting';
        return view('admin.pages.setting.index', compact('page'));
    }
}
