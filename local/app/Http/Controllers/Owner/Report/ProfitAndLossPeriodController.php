<?php namespace App\Http\Controllers\Owner\Report;

use App\Models\Beli;
use App\Models\DetilBeli;
use App\Models\Jual;
use App\Models\DetilJual;
use App\Models\Cost;
use App\Models\Salary;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Session;

use PDF;
use App;
use View;
use DB;

class ProfitAndLossPeriodController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$tanggalawal = date('Y-m-d');
    	$tanggalakhir = date('Y-m-d');
		return view('/owner/report/profitandlossperiod', compact('tanggalawal', 'tanggalakhir'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$tanggalawal = Request::input('tanggalawal');
		$tanggalakhir = Request::input('tanggalakhir');

		$belis =  DB::table('beli')
            ->where('tglorderbeli', '>=', $tanggalawal)
    		->where('tglorderbeli', '<=', $tanggalakhir)->get();
		$totalpurchase = DB::table('beli')
            ->join('detilbeli', 'beli.nobeli', '=', 'detilbeli.nobeli')
            ->where('beli.tglorderbeli', '>=', $tanggalawal)
    		->where('beli.tglorderbeli', '<=', $tanggalakhir)
            ->sum(DB::raw('detilbeli.hargasatuankg * detilbeli.jumlahkg'));
        $micellanous = 0;
        $handling = 0;
        foreach ($belis as $key => $beli)
        {
        	$micellanous += $beli->bm+$beli->pph+$beli->storage+$beli->trmc+$beli->spc+$beli->time+$beli->dokumen+$beli->ppn+$beli->stamp;
        	$handling += $beli->handling+$beli->over+$beli->adm+$beli->edi+$beli->rush;
        }
    	$biayasusutbeli = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)->sum('biayasusutbeli');
    	$biayakarantina = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)->sum('biayakarantina');
    	$biayalab = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)->sum('biayalab');
    	$biayafreight = Beli::where('tglorderbeli', '>=', $tanggalawal)
    				->where('tglorderbeli', '<=', $tanggalakhir)->sum('biayafreight');
    	$totalAllPurchase = $totalpurchase + $biayakarantina + $biayalab + $biayafreight + $micellanous + $handling - $biayasusutbeli;

    	$totalsales = DB::table('jual')
            ->join('detiljual', 'jual.nojual', '=', 'detiljual.nojual')
            ->where('jual.tglorderjual', '>=', $tanggalawal)
    		->where('jual.tglorderjual', '<=', $tanggalakhir)
            ->sum(DB::raw('detiljual.hargasatuankg * detiljual.jumlahkg'));
    	$biayaekspjual = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->sum('biayaekspjual');
    	$biayasusutjual = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->sum('biayasusutjual');
    	$biayastereo = Jual::where('tglorderjual', '>=', $tanggalawal)
    				->where('tglorderjual', '<=', $tanggalakhir)->sum('biayastereo');
    	$totalAllSales = $totalsales + $biayaekspjual + $biayastereo - $biayasusutjual;

    	$biayabensin = Cost::where('tgl', '>=', $tanggalawal)
    				->where('tgl', '<=', $tanggalakhir)
    				->where('biaya', '=', 'BENSIN')->sum('nominal');
    	$biayaekspedisi = Cost::where('tgl', '>=', $tanggalawal)
    				->where('tgl', '<=', $tanggalakhir)
    				->where('biaya', '=', 'BIAYAEKSPEDISI')->sum('nominal');
    	$tolparkir = Cost::where('tgl', '>=', $tanggalawal)
    				->where('tgl', '<=', $tanggalakhir)
    				->where('biaya', '=', 'TOLPARKIR')->sum('nominal');
    	$lainlain = Cost::where('tgl', '>=', $tanggalawal)
    				->where('tgl', '<=', $tanggalakhir)
    				->where('biaya', '=', 'LAINLAIN')->sum('nominal');
    	$salary = Salary::where('tgltransaksi', '>=', $tanggalawal)
    				->where('tgltransaksi', '<=', $tanggalakhir)->sum('nominal');
    	$totalAllBiaya = $biayabensin + $biayaekspedisi + $tolparkir + $lainlain + $salary;

    	$profitandloss = $totalAllSales - $totalAllPurchase - $totalAllBiaya;

    	$pdf = PDF::loadView('owner.report.pdf.reportprofitandlossperiod', 
    		compact('totalpurchase', 'biayasusutbeli', 'biayakarantina', 'biayalab', 'biayafreight', 'micellanous', 'handling', 'totalAllPurchase',    
    			'totalsales', 'biayaekspjual', 'biayasusutjual', 'biayastereo', 'totalAllSales',  
    			'biayabensin', 'biayaekspedisi', 'tolparkir', 'lainlain', 'salary', 'totalAllBiaya',
    			'profitandloss', 
    			'tanggalawal', 'tanggalakhir'));
		return $pdf->setPaper('a4')->stream('reportprofitandlossperiod' . '.pdf');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
