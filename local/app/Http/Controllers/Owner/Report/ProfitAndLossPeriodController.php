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

		$totalpurchase = DB::table('beli')
            ->join('detilbeli', 'beli.nobeli', '=', 'detilbeli.nobeli')
            ->where('beli.tglfaktur', '>=', $tanggalawal)
    		->where('beli.tglfaktur', '<=', $tanggalakhir)
            ->sum(DB::raw('detilbeli.hargasatuankg * detilbeli.jumlahkg'));
    	$biayaexspbeli = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayaexspbeli');
    	$biayasusutbeli = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayasusutbeli');
    	$biayakarantina = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayakarantina');
    	$biayaclearance = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayaclearance');
    	$biayaimpor = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayaimpor');
    	$biayalab = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayalab');
    	$biayafreight = Beli::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayafreight');
    	$totalAllPurchase = $totalpurchase + $biayaexspbeli + $biayasusutbeli + $biayakarantina + $biayaclearance
    						+ $biayaimpor + $biayalab + $biayafreight;

    	$totalsales = DB::table('jual')
            ->join('detiljual', 'jual.nojual', '=', 'detiljual.nojual')
            ->where('jual.tglfaktur', '>=', $tanggalawal)
    		->where('jual.tglfaktur', '<=', $tanggalakhir)
            ->sum(DB::raw('detiljual.hargasatuankg * detiljual.jumlahkg'));
    	$biayaekspjual = Jual::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayaekspjual');
    	$biayasusutjual = Jual::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayasusutjual');
    	$biayastereo = Jual::where('tglfaktur', '>=', $tanggalawal)
    				->where('tglfaktur', '<=', $tanggalakhir)->sum('biayastereo');
    	$totalAllSales = $totalsales + $biayaekspjual + $biayasusutjual + $biayastereo;

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
    		compact('totalpurchase', 'biayaexspbeli', 'biayasusutbeli', 'biayakarantina', 'biayaclearance', 'biayaimpor', 'biayalab', 'biayafreight', 'totalAllPurchase',    
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
