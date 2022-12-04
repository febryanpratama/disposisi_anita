<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    //
    public function index()
    {
        $data = Surat::get();
        return view('admin.surat.index', [
            'data' => $data
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'asal_surat' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'sifat' => 'required',
            'ringkasan' => 'required',
            'keterangan' => 'required',
            // 'tanggal_diterima' => 'required',
            'tanggal_distribusi' => 'required',
            // 'gambar_surat' => 'required',
            // 'status' => 'required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        // dd($request->hasFile('gambar_surat'));

        if ($request->hasFile('gambar_surat')) {
            $file = $request->file('gambar_surat');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/surat/', $fileName);

            // dd($fileName);
            $data['gambar_surat'] = $fileName;
        }

        $data['user_id'] = auth()->user()->id;
        $data['tanggal_diterima'] = Carbon::now();

        // dd($data);

        Surat::create($data);

        return back()->withSuccess('Surat berhasil ditambahkan');
    }

    public function verifikasi($surat_id)
    {
        $surat = Surat::find($surat_id);
        $surat->status = 'Verifikasi';
        $surat->save();

        return back()->withSuccess('Surat berhasil diverifikasi');
    }
    public function tolak($surat_id)
    {
        $surat = Surat::find($surat_id);
        $surat->status = 'Ditolak';
        $surat->save();

        return back()->withSuccess('Surat berhasil ditolak');
    }
    public function diterima($surat_id)
    {
        $surat = Surat::find($surat_id);
        $surat->status = 'Diterima';
        $surat->save();

        return back()->withSuccess('Surat berhasil Diterima');
    }
}
