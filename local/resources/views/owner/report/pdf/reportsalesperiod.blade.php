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
<h1>Report Sales Period</h1>
<h1>Start Date {{ date("d F Y",strtotime($tanggalawal)) }} to {{ date("d F Y",strtotime($tanggalakhir)) }}</h1>
<h2>Customer : @if($nikcust == "%") {{ "All Customers" }} @else {{ DB::table('customers')->where('id', $nikcust)->first()->namacust }} @endif </h2>
<hr>
<table style="width:100%">
      <tr>
         <th>No</th>
         <th>Company-Customer</th>
         <th>Order Date</th>
         <th>Due Date</th>
         <th>Nominal</th>
         <th>Status Payment</th>
      </tr>
      {{--*/ $count = 1; $total = 0; /*--}} 
      @foreach ($juals as $key => $jual)
        {{--*/ $subtotal = DB::table('detiljual')
                     ->select(DB::raw('SUM(hargasatuankg * jumlahekor) as subtotal'))
                     ->where('nojual', '=', $jual->nojual)
                     ->first()->subtotal /*--}} 
        {{--*/ $total += $subtotal + $jual->biayaekspjual + $jual->biayastereo - $jual->biayasusutjual /*--}}
        <tr>
             <td>{{ $count++ }}</td>
             <td>{{ DB::table('customers')->where('id', $jual->nikcust)->first()->company }}-{{ DB::table('customers')->where('id', $jual->nikcust)->first()->namacust }}</td>
             <td>{{ date("d F Y",strtotime($jual->tglorderjual)) }}</td>
             <td>{{ date("d F Y",strtotime($jual->tgltempojual)) }}</td>
             <td align="right">{{ number_format($subtotal + $jual->biayaekspjual + $jual->biayastereo - $jual->biayasusutjual, 2) }}</td>
             <td >{{ $jual->payment }}</td>
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
