<?php

namespace App\Http\Controllers\Verifikator;

use App\Http\Controllers\Controller;
use App\Models\LogProposal;
use App\Models\Proposal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerifikatorSuratController extends Controller
{
    //

    public function index()
    {

        $data = Proposal::with('user')->get();
        return view('pages.verifikator.surat.index', [
            'data' => $data
        ]);
    }

    public function detail($id)
    {
        $data = Proposal::with('user')->find($id);
        return view('pages.verifikator.surat.detail', [
            'data' => $data
        ]);
    }

    public function setuju($id)
    {
        $data = Proposal::find($id);
        $data->status = 'Setda';
        $data->save();

        LogProposal::create([
            'proposal_id' => $id,
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Surat Disetujui oleh Verifikator'
        ]);

        return redirect()->back()->withSuccess('Berhasil Menyetujui Surat');
    }

    public function tolak($id)
    {
        $data = Proposal::find($id);
        $data->is_status = "0";
        $data->save();

        LogProposal::create([
            'proposal_id' => $id,
            'tanggal' => Carbon::now(),
            'deskripsi' => 'Surat Ditolak oleh Verifikator'
        ]);

        return redirect()->back()->withSuccess('Berhasil Menolak Surat');
    }
}
