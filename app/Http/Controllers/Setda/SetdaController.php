<?php

namespace App\Http\Controllers\Setda;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\FotoLapangan;
use App\Models\LogProposal;
use App\Models\Proposal;
use App\Services\Setda\SetdaService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SetdaController extends Controller
{
    //

    protected $setdaService;

    public function __construct(SetdaService $setdaService)
    {
        $this->setdaService = $setdaService;
    }

    public function indexIndividu()
    {

        $title = "List Data Surat";

        $response = $this->setdaService->getDataIndividu();

        return view("pages.setda.surat.index", [
            'title' => $title,
            'data' => $response['data']
        ]);
    }
    public function indexOrganisasi()
    {

        $title = "List Data Surat";

        $response = $this->setdaService->getDataOrganisasi();

        if ($response['status']) {
            # code...
            return view("pages.setda.surat.index", [
                'title' => $title,
                'data' => $response['data']
            ]);
        } else {
            return back()->withErrors($response['messages']);
        }
    }

    public function detail($surat_id)
    {
        // dd($surat_id);
        $title = "Detail Pengajuan";
        $response = $this->setdaService->detailSurat($surat_id);

        $anggota = Anggota::get();
        // dd($response);

        return view("pages.setda.surat.detail", [
            'title' => $title,
            'data' => $response['data'],
            'anggota' => $anggota,
            'surat_id' => $surat_id
        ]);
    }

    public function status(Request $request)
    {
        // dd($request->all());
        if ($request->status == 'Diproses') {
            $proposal = Proposal::with('foto')->where('is_status', '2')->whereNotIn('status', ['Selesai', 'Ditolak'])->get();
        } else if ($request->status == 'Disetujui') {
            $proposal = Proposal::with('foto')->where('is_status', '1')->where('status', 'Selesai')->get();
        } else {
            $proposal = Proposal::with('foto')->where('is_status', '0')->where('status', 'Ditolak')->get();
        }

        // dd($proposal);
        return view('pages.setda.surat.index', [
            'title' => 'List Data Surat ' . $request->status,
            'data' => $proposal
        ]);
    }

    public function ubah(Request $request, $surat_id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'surat_id' => 'required|numeric|exists:proposals,id',
            'status' => 'required|in:Diterima,Ditolak',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        // dd($request->all());
        if ($request->status == 'Diterima') {
            $strrepl = str_replace('Rp. ', '', $request['nominal_disetujui']);
            $strrepl2 = str_replace('.', '', $strrepl);
            $proposal = Proposal::where('id', $surat_id)->update([
                'uraian_usulan' => $request['catatan'],
                // 'jumlah' => $request['jumlah'],
                'nominal_usulan' => $strrepl2,
                'status' => 'Walikota'
            ]);

            // dd($proposal);


            LogProposal::create([
                'proposal_id' => $surat_id,
                'catatan' => $request->catatan ?? null,
                'name' => 'KESRA',
                'tanggal' => Carbon::now(),
                'deskripsi' => 'Proposal telah diterima oleh KESRA'
            ]);

            return back()->withSuccess('Berhasil Mengubah Data');
        } else {
            $proposal = Proposal::where('id', $surat_id)->update([
                // 'uraian_usulan' => $request['catatan'],
                // 'jumlah' => $request['jumlah'],
                // 'nominal_usulan' => $request['nominal'],
                'status' => 'Ditolak'
            ]);

            LogProposal::create([
                'proposal_id' => $surat_id,
                'catatan' => $request->catatan ?? null,
                'name' => 'KESRA',
                'tanggal' => Carbon::now(),
                'deskripsi' => 'Proposal telah ditolak oleh KESRA'
            ]);

            return back()->withSuccess('Berhasil Mengubah Data');
        }
    }

    public function setuju(Request $request, $surat_id)
    {
        // dd($request->all());
        // $title = "Setujui Surat";

        $response = $this->setdaService->setuju($request->all(), $surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            // dd($response['message']);
            return back()->withErrors($response['message']);
        }
    }

    public function anggota(Request $request, $surat_id)
    {
        // dd($request->all());
        $proposal = Proposal::where('id', $surat_id)->first();

        if (!$proposal) {
            return back()->withErrors("Proposal Tidak Valid");
        }

        $proposal->update([
            'anggota_id' => $request['anggota_id']
        ]);

        return back()->withSuccess('Berhasil Melakukan penambahan petugas Lapangan');
    }

    public function tolak($surat_id)
    {
        // $title = "Tolak Surat";

        $response = $this->setdaService->tolak($surat_id);

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            return back()->withErrors($response['message']);
        }
    }

    public function indexPertanggungjawaban()
    {
        $title = "List Data Pertanggungjawaban";
        $response = $this->setdaService->getDataPertanggungjawaban();

        return view('pages.setda.pertanggunjawaban.index', [
            'title' => $title,
            'data' => $response['data']
        ]);
    }

    public function fotoLapangan(Request $request)
    {
        // dd($request->all());
        foreach ($request->foto_lapangan as $item) {

            // dd($item);
            $iname = time() . "_" . $item->getClientOriginalName() . "." . $item->getClientOriginalExtension();
            $tujuan_upload = 'file_lapangan';
            $item->move($tujuan_upload, $iname);

            FotoLapangan::create([
                'proposal_id' => $request['surat_id'],
                'foto_lapangan' => $iname
            ]);
        }

        return back()->withSuccess('Data Lapangan Berhasil Diinput');
    }

    public function postPertanggungjawaban(Request $request)
    {

        // dd($request->all());

        $surat = Proposal::where('id', $request->surat_id)->first();

        if (!$surat) {
            return back()->withErrors('Data Surat Tidak Valid');
        }

        // dd($request->all());
        if (array_key_exists('bukti_pertanggunjawaban', $request->all())) {
            $file = $request['bukti_pertanggunjawaban'];
            $bukti = time() . "_" . $file->getClientOriginalName() . "." . $file->getClientOriginalExtension();
            $tujuan_upload = 'bukti_pertanggunjawaban';
            $file->move($tujuan_upload, $bukti);
        }

        $surat->update([
            'bukti_pertanggunjawaban' => $bukti,
        ]);

        return back()->withSuccess('Berhasil Mengupload Bukti Pertanggungjawaban');
    }

    public function indexAnggota()
    {
        $title = 'List Data Anggota';

        $data = Anggota::get();

        return view('pages.setda.anggota.index', [
            'title' => $title,
            'data' => $data
        ]);
    }

    public function postAnggota(Request $request)
    {
        // dd($request->all());
        $response = $this->setdaService->postAnggota($request->all());

        if ($response['status']) {
            # code...
            return back()->withSuccess($response['message']);
        } else {
            return back()->withErrors($response['message']);
        }
    }
}
