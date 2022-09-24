<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $pegawai = Pegawai::join('departemens', 'pegawais.departemen_id', '=', 'departemens.id')->paginate(5);
        
        return view('pegawai.index', compact('pegawai'));
    }
}