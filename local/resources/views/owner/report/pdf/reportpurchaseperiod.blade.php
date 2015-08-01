<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
.tablefortext {
    display:table;
    width:100%;   
}
.tr {
    display:table-row;
}
.d1 {
    display:table-cell;
    width:25%;
}
.d2 {
    display:table-cell;
    text-align:center;
    width:50%;
}
.d3 {
    display:table-cell;
    text-align:right;
    width:25%;
}
</style>
</head>
<body>
<h1>Report Purchase Period</h1>
<h1>Start Date {{ date("d F Y",strtotime($tanggalawal)) }} to {{ date("d F Y",strtotime($tanggalakhir)) }}</h1>
<h2>Supplier : @if($idsupp == "%") {{ "All Suppliers" }} @else {{ DB::table('suppliers')->where('id', $idsupp)->first()->namasupp }} @endif </h2>
<hr>
<table style="width:100%">
      <tr>
         <th>No</th>
         <th>Supplier</th>
         <th>Order Date</th>
         <th>Due Date</th>
         <th>Nominal</th>
         <th>Status Payment</th>
      </tr>
      {{--*/ $count = 1; $total = 0; /*--}} 
      @foreach ($belis as $key => $beli)
        {{--*/ $subtotal = DB::table('detilbeli')
                     ->select(DB::raw('SUM(hargasatuankg * jumlahekor) as subtotal'))
                     ->where('nobeli', '=', $beli->nobeli)
                     ->first()->subtotal /*--}} 
        {{--*/ $micellanous = $beli->bm+$beli->pph+$beli->storage+$beli->trmc+$beli->spc+$beli->time+$beli->dokumen+$beli->ppn+$beli->stamp /*--}} 
        {{--*/ $handling = $beli->handling+$beli->over+$beli->adm+$beli->edi+$beli->rush /*--}} 
        {{--*/ $total += $subtotal + $beli->biayakarantina + $beli->biayalab + $beli->biayafreight + $micellanous + $handling - $beli->biayasusutbeli /*--}}
        <tr>
             <td>{{ $count++ }}</td>
             <td>{{ DB::table('suppliers')->where('id', $beli->idsupp)->first()->namasupp }}</td>
             <td>{{ date("d F Y",strtotime($beli->tglorderbeli)) }}</td>
             <td>{{ date("d F Y",strtotime($beli->tgltempobeli)) }}</td>
             <td align="right">{{ number_format($subtotal + $beli->biayakarantina + $beli->biayalab + $beli->biayafreight + $micellanous + $handling - $beli->biayasusutbeli, 2) }}</td>
             <td >{{ $beli->payment }}</td>
        </tr>  
      @endforeach
        <tr>
             <td></td>
             <td></td>
             <td colspan="2">Total</td>
             <td align="right">{{ number_format($total, 2) }}</td>
             <td ></td>
        </tr> 
</table>
</body>
</html>
