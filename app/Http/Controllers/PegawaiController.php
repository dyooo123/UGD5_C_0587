<?php

namespace App\Http\Controllers;

use App\Mail\PegawaiMail;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Mail;
use Exception;

class PegawaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $pegawai = Pegawai::with('departemens')->paginate(5);        
        return view('pegawai.index', compact('pegawai'));
    }

     /**
    * create
    *
    * @return void
    */
    public function create(){
        return view('pegawai.create');
    }

    /**
    * store
    *
    * @param Request $request
    * @return void
    */
    
    public function store(Request $request){
        //Validasi Formulir
        $this->validate($request, [
            'nomor_induk_pegawai' => 'required',
            'nama_pegawai' => 'required|max:15',
            'departemen_id' => 'required',
            'email' => 'required|unique:pegawais|email:rfc,dns',
            'telepon' => 'required|digits_between:10,13',
            'gender' => 'required|digits_between:0,1',
            'status' => 'required|digits_between:0,1'
        ]);

        //Fungsi Simpan Data ke dalam Database
        Pegawai::create([
            'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'departemen_id' => $request->departemen_id,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'status' => $request->status
        ]);
      
        try{
            //Mengisi variabel yang akan ditampilkan pada view mail
            $content = [
                'body' => $request->nomor_induk_pegawai,
            ];
            //Mengirim email ke emailtujuan@gmail.com
            Mail::to('aldyoputra21@gmail.com')->send(new PegawaiMail($content));

            //Redirect jika berhasil mengirim email
            return redirect()->route('pegawai.index')
            ->with(['success'=> 'Data Berhasil Disimpan, email telah terkirim!']);
        }catch(Exception $e){        
        //Redirect jika gagal mengirim email
            return redirect()->route('pegawai.index')
            ->with(['success'=> 'Data Berhasil Disimpan, namun gagal mengirim email!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nomor_induk_pegawai' => 'required',
            'nama_pegawai' => 'required|max:15',
            'departemen_id' => 'required',
            'email' => 'required|unique:pegawais|email:rfc,dns',
            'telepon' => 'required|digits_between:10,13',
            'gender' => 'required',
            'status' => 'required'
        ]);

        Pegawai::find($id)->update($request->all());

        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai telah diganti.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::find($id)->delete();
        //
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai telah dihapus.');
    }
    
}