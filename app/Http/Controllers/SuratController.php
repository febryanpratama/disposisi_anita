<?php

namespace App\Http\Controllers;

use App\Models\LogProposal;
use App\Models\Proposal;
use App\Models\Surat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratController extends Controller
{
    //
    public function index()
    {
        $data = Proposal::with('user', 'log', 'user.detail')->where('status', 'TU Umum')->where('is_status', '2')->get();
        // $data = Proposal::with('user', 'log', 'user.detail')->where('status', 'Setda')->where('is_status', '2')->whereRelation('user.detail', 'jenis_pemohon', 'Individu')->get();

        // dd($data);
        return view('admin.surat.index', [
            'data' => $data
        ]);
    }
    public function indexIndividu()
    {
        $data = Proposal::with('user', 'log', 'user.detail')->where('jenis_pemohon', 'Individu')->get();
        // $data = Proposal::with('user', 'log', 'user.detail')->where('status', 'Setda')->whereRelation('user.detail', 'jenis_pemohon', 'Individu')->get();

        // dd($data);
        return view('admin.surat.index', [
            'data' => $data
        ]);
    }
    public function indexOrganisasi()
    {
        $data = Proposal::with('user', 'log', 'user.detail')->where('jenis_pemohon', 'Organisasi')->get();
        // $data = Proposal::with('user', 'log', 'user.detail')->where('status', 'Setda')->where('is_status', '2')->whereRelation('user.detail', 'jenis_pemohon', 'Individu')->get();

        // dd($data);
        return view('admin.surat.index', [
            'data' => $data
        ]);
    }
    public function detail($surat_id)
    {
        $proposal = Proposal::with('user', 'log', 'user.detail')->where('id', $surat_id)->first();

        return view('admin.surat.detail', [
            'data' => $proposal
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
        $surat = Proposal::where('id', $surat_id)->first();

        if (!$surat) {
            return back()->withError('Data Tidak Ditemukan');
        }

        $surat->update([
            'status' => 'Setda'
        ]);

        LogProposal::create([
            'proposal_id' => $surat->id,
            'status' => 'Setda',
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Proposal telah diverifikasi oleh TU Umum'
        ]);

        return back()->withSuccess('Surat berhasil Diverifikasi TU Umum');
    }
}
