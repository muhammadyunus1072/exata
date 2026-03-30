<?php

namespace App\Http\Controllers\AlurPencairan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlurPencairanAlurProsesController extends Controller
{
    public function index()
    {
        return view('app.alur-pencairan.alur-pencairan-alur-proses.index');
    }

    public function create()
    {
        return view('app.alur-pencairan.alur-pencairan-alur-proses.detail', ["objId" => null]);
    }

    public function edit(Request $request)
    {
        return view('app.alur-pencairan.alur-pencairan-alur-proses.detail', ["objId" => $request->id]);
    }
}
