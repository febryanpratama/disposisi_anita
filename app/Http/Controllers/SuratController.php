<?php

namespace App\Http\Controllers;

use App\Models\Anggaran;
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
    public function indexIndividu(Request $request)
    {
        // dd($request->all());
        if($request->tanggal_mulai && $request->tanggal_selesai){
            $data = Proposal::with('user', 'log', 'user.detail')->where('jenis_pemohon', 'Individu')->whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_selesai])->get();
        }else{
            $data = Proposal::with('user', 'log', 'user.detail')->where('jenis_pemohon', 'Individu')->get();
        }
        // $data = Proposal::with('user', 'log', 'user.detail')->where('status', 'Setda')->whereRelation('user.detail', 'jenis_pemohon', 'Individu')->get();

        // dd($data);
        return view('admin.surat.index', [
            'data' => $data
        ]);
    }
    public function indexOrganisasi(Request $request)
    {
        if($request->tanggal_mulai && $request->tanggal_selesai){
            $data = Proposal::with('user', 'log', 'user.detail')->where('jenis_pemohon', 'Organisasi')->whereBetween('created_at', [$request->tanggal_mulai, $request->tanggal_selesai])->get();
        }else{
            $data = Proposal::with('user', 'log', 'user.detail')->where('jenis_pemohon', 'Organisasi')->get();
        }
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

    public function ubah(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'catatan' => 'nullable|string',
            'status' => 'required|in:Diterima,Ditolak',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return back()->withErrors($validator->errors()->first());
        }
        $surat = Proposal::where('id', $request->surat_id)->first();

        if (!$surat) {
            return back()->withError('Data Tidak Ditemukan');
        }

        if ($request->status == 'Diterima') {
            $surat->update([
                'status' => 'Setda',
                'tahun_anggaran' => $request->tahun_anggaran ?? null,
                'jenis_permohonan' => $request->jenis_permohonan
            ]);

            LogProposal::create([
                'proposal_id' => $surat->id,
                'catatan' => $request->catatan ?? null,
                'name' => 'TU Umum',
                'tanggal' => Carbon::now(),
                'deskripsi' => 'Proposal telah diverifikasi oleh TU Umum'
            ]);
        } else {
            $surat->update([
                'status' => 'Ditolak',
                'is_status' => '0'
            ]);

            LogProposal::create([
                'proposal_id' => $surat->id,
                'catatan' => $request->catatan ?? null,
                'name' => 'TU Umum',
                'tanggal' => Carbon::now(),
                'deskripsi' => 'Proposal ditolak oleh TU Umum'
            ]);
        }

        return back()->withSuccess('Status surat berhasil Diperbaharui');
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
            'name' => 'TU Umum',
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Proposal telah diverifikasi oleh TU Umum'
        ]);

        return back()->withSuccess('Surat berhasil Diverifikasi TU Umum');
    }

    public function indexAnggaran()
    {

        $data = Anggaran::get();
        return view('admin.anggaran.index', [
            'data' => $data
        ]);
    }

    public function postAnggaran(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'jenis_anggaran' => 'required|string|in:Bantuan Sosial,Hibah',
            'nominal_anggaran' => 'required|numeric',
            'tahun_anggaran' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors()->first());
        }

        $check = Anggaran::where('jenis_anggaran', $request->jenis_anggaran)->where('tahun_anggaran', $request->tahun_anggaran)->first();

        if ($check) {
            return back()->withErrors('Anggaran sudah ada');
        }

        Anggaran::create([
            'jenis_anggaran' => $request['jenis_anggaran'],
            'nominal_anggaran' => $request['nominal_anggaran'],
            'tahun_anggaran' => $request['tahun_anggaran'],
        ]);

        return back()->withSuccess('Anggaran berhasil ditambahkan');
    }

    public function ubahAnggaran(Request $request){
        $validator = Validator::make($request->all(), [
            'anggaran_id' => 'required|numeric|exists:anggarans,id',
            'jenis_anggaran' => 'required|string|in:Bantuan Sosial,Hibah',
            'nominal_anggaran' => 'required|numeric',
            'tahun_anggaran' => 'required|numeric',
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors()->first());
        }

        $anggaran = Anggaran::where('id', $request->anggaran_id)->update([
            'jenis_anggaran' => $request['jenis_anggaran'],
            'nominal_anggaran' => $request['nominal_anggaran'],
            'tahun_anggaran' => $request['tahun_anggaran'],
        ]);

        return back()->withSuccess('Anggaran berhasil diubah');
    }

    public function hapusAnggaran(Request $request){
        $validator = Validator::make($request->all(), [
            'anggaran_id' => 'required|numeric|exists:anggarans,id'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors()->first());
        }

        $anggaran = Anggaran::where('id', $request->anggaran_id)->first();

        if(!$anggaran){
            return back()->withErrors('Data tidak ditemukan');
        }

        $anggaran->delete();

        return back()->withSuccess('Anggaran berhasil dihapus');
    }
}
