<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Tps;
use App\Models\Dpt;
use App\Models\User;
use App\Models\DptResult; // Assuming this model contains the vote results
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct() {
        //Permission Check
        // $this->middleware(['permission:read tps'])->only('index');
        // $this->middleware(['permission:create tps'])->only('create');
        // $this->middleware(['permission:write tps'])->only('edit');
    }
    public function index()
    {
        
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        return view('pages.dashboards.index');
    
    }
    public function _index()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Get the authenticated user
            
            $roles = $user->getRoleNames(); 
            // dd($roles[0]);
            if ($roles[0] === 'petugas') {
                return redirect()->route('dpt.index');
            }
        }
        
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        
        $suaraSah = Dpt::sum('jss');  // Total number of voters (dpt_total)
        $tidakSah = Dpt::sum('jsts');  // Total number of voters (dpt_total)
        $suaraTotal = Dpt::sum('jssdts');  // Total number of voters (dpt_total)
        $total = Tps::sum('dpt_total');  // Total number of voters (dpt_total)

        $tps = Tps::all();
        $tpsCount = count($tps);
        // Retrieve Dpt records updated after November 1, 2024
        $dpts = Dpt::where('updated_at', '>=', Carbon::create(2024, 11, 1))
        ->with('tps')
        ->orderBy('updated_at', 'desc') // Order by the most recent updated_at
        ->get();

        // Get the count of all Dpt records updated after November 1, 2024
        $tpsCountUpdated = $dpts->count();
        
        $calons = Calon::with(['cabup', 'cawabup', 'calon_partai'])
        ->orderBy('id_calon')
        ->get();

        // Initialize an array to hold the results
        $results = [];
        // dd($total);
        $totalVotes = DptResult::sum('total_votes');  // Total votes cast
        
        $tota1 = $total - $totalVotes;  // Remaining votes (if needed)
        
        $totalVotesByTps = $tota1 < 0 ? 0 : $tota1;  // Ensure total votes don't go negative
        
        // Calculate the percentage based on the total number of voters (dpt_total)
        $percentage = $total > 0 ? ($tota1 * 100) / $total : 0;  // Avoid division by zero
        

        foreach ($calons as $calon) {
            // Retrieve the DptResult instances related to this candidate
            $dptResults = DptResult::where('id_calon', $calon->id_calon)->get();

            // Sum valid votes for the candidate
            $validVotes = $dptResults->sum('total_votes');
            
            // Calculate percentage of valid votes for the candidate
            $percentage = $totalVotes > 0 ? ($validVotes / $totalVotes) * 100 : 0;

            // Prepare the data for the candidate
            $results[$calon->id_calon] = [
                'calon_id' => $calon->id_calon,
                'calon_title' => $calon->title,
                'calon_photo' => $calon->photo!=null ? Storage::disk('public')->url($calon->photo) : $calon->photo,
                'cabupName' => $calon->cabup ? $calon->cabup->name : 'N/A',  // Access cabup user directly
                'cabupPhoto' => $calon->photo ? 'storage/' . $calon->photo : null,
                'cawabupName' => $calon->cawabup ? $calon->cawabup->name : 'N/A', // Access cawabup user directly
                'cawabupPhoto' => $calon->cawabup ? 'storage/' . $calon->cawabup->photo : null,                
                'validVotes' => $validVotes, 
                'percentage' => $percentage,  // Correct percentage calculation
                'partai' => $calon->calon_partai->pluck('nama_partai')->toArray(),
                'partaiLogo' => $calon->calon_partai->pluck('logo_partai')->map(function($logo) {
                    return 'storage/' . $logo; // Prepend 'storage/' to each party logo
                })->toArray(),
            ];
        }

                
        $wedas = $this->getTotalVotesByPenyelenggara('WEDA SELATAN');
        $weda = $this->getTotalVotesByPenyelenggara('WEDA');
        $wedatengah = $this->getTotalVotesByPenyelenggara('WEDA TENGAH');
        $wedautara = $this->getTotalVotesByPenyelenggara('WEDA UTARA');
        $wedatimur = $this->getTotalVotesByPenyelenggara('WEDA TIMUR');
        $pataniib = $this->getTotalVotesByPenyelenggara('PATANI BARAT');
        $patanii = $this->getTotalVotesByPenyelenggara('PATANI');
        $pataniiu = $this->getTotalVotesByPenyelenggara('PATANI UTARA');
        $pataniit = $this->getTotalVotesByPenyelenggara('PATANI TIMUR');
        $gebee = $this->getTotalVotesByPenyelenggara('PULAU GEBE');

        // Hasilkan array dalam format yang diinginkan
        $wedas = [
            (int) $wedas->total_votes_calon_1,
            (int) $wedas->total_votes_calon_2,
            (int) $wedas->total_votes_calon_3
        ];

        $weda = [
            (int) $weda->total_votes_calon_1,
            (int) $weda->total_votes_calon_2,
            (int) $weda->total_votes_calon_3
        ];

        $wedate = [
            (int) $wedatengah->total_votes_calon_1,
            (int) $wedatengah->total_votes_calon_2,
            (int) $wedatengah->total_votes_calon_3
        ];

        $wedau = [
            (int) $wedautara->total_votes_calon_1,
            (int) $wedautara->total_votes_calon_2,
            (int) $wedautara->total_votes_calon_3
        ];

        $wedati = [
            (int) $wedatimur->total_votes_calon_1,
            (int) $wedatimur->total_votes_calon_2,
            (int) $wedatimur->total_votes_calon_3
        ];
        $patanib = [
            (int) $pataniib->total_votes_calon_1,
            (int) $pataniib->total_votes_calon_2,
            (int) $pataniib->total_votes_calon_3
        ];
        $patani = [
            (int) $patanii->total_votes_calon_1,
            (int) $patanii->total_votes_calon_2,
            (int) $patanii->total_votes_calon_3
        ];
        $pataniu = [
            (int) $pataniiu->total_votes_calon_1,
            (int) $pataniiu->total_votes_calon_2,
            (int) $pataniiu->total_votes_calon_3
        ];
        $patanit = [
            (int) $pataniit->total_votes_calon_1,
            (int) $pataniit->total_votes_calon_2,
            (int) $pataniit->total_votes_calon_3
        ];
        $gebe = [
            (int) $gebee->total_votes_calon_1,
            (int) $gebee->total_votes_calon_2,
            (int) $gebee->total_votes_calon_3
        ];
        return view('pages.dashboards.index', compact('results', 'tpsCount', 'total', 'suaraTotal', 'suaraSah', 'tidakSah', 'dpts', 'tpsCountUpdated', 'totalVotes', 'totalVotesByTps', 'percentage', 'wedas', 'weda', 'wedate', 'wedau', 'wedati', 'patanib', 'patani', 'pataniu', 'patanit', 'gebe'));
    }


    function getTotalVotesByPenyelenggara($penyelenggara) {
        return DB::table('dpt_results as dr')
            ->join('dpt as d', 'dr.id_dpt', '=', 'd.id_dpt')
            ->join('tps as t', 'd.id_tps', '=', 't.id_tps')
            ->where('t.nama_ketua_penyelenggara', $penyelenggara)
            ->selectRaw('
                SUM(CASE WHEN dr.id_calon = 1 THEN dr.total_votes ELSE 0 END) AS total_votes_calon_1,
                SUM(CASE WHEN dr.id_calon = 2 THEN dr.total_votes ELSE 0 END) AS total_votes_calon_2,
                SUM(CASE WHEN dr.id_calon = 3 THEN dr.total_votes ELSE 0 END) AS total_votes_calon_3
            ')
            ->first();
    }
}
