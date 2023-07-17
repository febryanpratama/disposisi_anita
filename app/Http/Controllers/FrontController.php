<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    //

    public function index()
    {

        // $proses = Proposal::whereIn('is_status', ['1', '2'])->count();
        // $setuju = Proposal::whereNotIn('is_status', ['1'])->count();
        // $all = Proposal::count();

        $total = Proposal::whereIn('is_status', ['1', '2'])->sum('jumlah_biaya');
        $user = User::count();

        if (auth()->user()->hasRole('Pemohon')) {
            $proses = Proposal::where('user_id', Auth::user()->id)->whereIn('is_status', ['2'])->count();
            $setuju = Proposal::where('user_id', Auth::user()->id)->whereIn('is_status', ['1'])->where('status', 'Selesai')->count();
            $all = Proposal::where('user_id', Auth::user()->id)->count();
            $ditolak = Proposal::where('user_id', Auth::user()->id)->where('is_status', '0')->count();

            $proposal = Proposal::with('log')->where('user_id', auth()->user()->id)->orderBy('created_at', "DESC")->first();
            $listProposal = Proposal::with('log')->where('user_id', auth()->user()->id)->orderBy('created_at', "DESC")->limit(5)->get();
            // dd('admin');
            // dd($proposal);
            return view('dashboard', [
                'setuju' => $setuju,
                'proses' => $proses,
                'all' => $all,
                'total' => $total,
                'pengguna' => $user,
                'ditolak' => $ditolak,
                'proposal' => $proposal,
                'listproposal' => $listProposal
            ]);
        }

        $proses = Proposal::whereIn('is_status', ['2'])->count();
        $setuju = Proposal::whereIn('is_status', ['1'])->where('status', 'Selesai')->count();
        $all = Proposal::count();
        $ditolak = Proposal::where('is_status', '0')->count();
        $listProposal = Proposal::with('log')->orderBy('created_at', "DESC")->limit(5)->get();


        // $arr_chart = [];
        // for ($i = 1; $i <= 12; $i++) {
        //     $arr_chart[] = Proposal::whereMonth('created_at', $i)->whereYear('created_at', Carbon::now()->year)->count();
        // }

        $januari = Proposal::whereMonth('created_at', '01')->whereYear('created_at', Carbon::now()->year)->count();
        $februari = Proposal::whereMonth('created_at', '02')->whereYear('created_at', Carbon::now()->year)->count();
        $maret = Proposal::whereMonth('created_at', '03')->whereYear('created_at', Carbon::now()->year)->count();
        $april = Proposal::whereMonth('created_at', '04')->whereYear('created_at', Carbon::now()->year)->count();
        $mei = Proposal::whereMonth('created_at', '05')->whereYear('created_at', Carbon::now()->year)->count();
        $juni = Proposal::whereMonth('created_at', '06')->whereYear('created_at', Carbon::now()->year)->count();
        $juli = Proposal::whereMonth('created_at', '07')->whereYear('created_at', Carbon::now()->year)->count();
        $agustus = Proposal::whereMonth('created_at', '08')->whereYear('created_at', Carbon::now()->year)->count();
        $september = Proposal::whereMonth('created_at', '09')->whereYear('created_at', Carbon::now()->year)->count();
        $oktober = Proposal::whereMonth('created_at', '10')->whereYear('created_at', Carbon::now()->year)->count();
        $november = Proposal::whereMonth('created_at', '11')->whereYear('created_at', Carbon::now()->year)->count();
        $desember = Proposal::whereMonth('created_at', '12')->whereYear('created_at', Carbon::now()->year)->count();

        // dd($januari);
        // dd($arr_chart);
        return view('dashboard', [
            'setuju' => $setuju,
            'proses' => $proses,
            'all' => $all,
            'total' => $total,
            'pengguna' => $user,
            'ditolak' => $ditolak,
            'listproposal' => $listProposal,
            'januari' => $januari,
            'februari' => $februari,
            'maret' => $maret,
            'april' => $april,
            'mei' => $mei,
            'juni' => $juni,
            'juli' => $juli,
            'agustus' => $agustus,
            'september' => $september,
            'oktober' => $oktober,
            'november' => $november,
            'desember' => $desember,
        ]);
    }
    public function indexLanding()
    {
        return view('layouts.base_front');
    }

    public function sendsms(Request $request)
    {
        $userkey = '59d153f6a599';
        $passkey = '695fdb3a186c34dca5d8255a';
        $telepon = $request['no_telpon'];
        $message = $request['messages'];
        // $url = 'https://console.zenziva.net/reguler/api/sendsms/';
        // $curlHandle = curl_init();
        // curl_setopt($curlHandle, CURLOPT_URL, $url);
        // curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        // curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        // curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        // curl_setopt($curlHandle, CURLOPT_POST, 1);
        // curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
        //     'userkey' => $userkey,
        //     'passkey' => $passkey,
        //     'to' => $telepon,
        //     'message' => $message
        // ));
        // $results = json_decode(curl_exec($curlHandle), true);
        // // dd($results);
        // curl_close($curlHandle);

        // return response()->json($results);

        $results = Http::withoutVerifying()->withoutVerifying()->post('https://console.zenziva.net/reguler/api/sendsms/', [
            'userkey' => $userkey,
            'passkey' => $passkey,
            // 'to' => '088744882202',
            // 'message' => 'Haki Tessstt'
            'to' => $telepon,
            'message' => $message
        ]);
        // dd($results);

        // $response = $results->body();

        return response()->json($results->body());
    }
}
