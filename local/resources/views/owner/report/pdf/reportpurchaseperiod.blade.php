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
@foreach ($belis as $key => $beli)
    <h3>Invoice Sales {{ $beli->nobeli }}</h3>

    <div class="tablefortext">
        <div class="tr">
            <div class="d1"><b>Supplier : {{ DB::table('suppliers')->where('id', $beli['idsupp'])->first()->namasupp }}</b></div>
            <div class="d3"><b>Order Date : {{ date("d F Y",strtotime($beli->tglorderbeli)) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Expansion Cost : {{ number_format($beli->biayaexspbeli, 2) }}</b></div>
            <div class="d3"><b>Due Date : {{ $beli->tgltempobeli }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Quarantine Cost : {{ number_format($beli->biayakarantina, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Clearance Cost : {{ number_format($beli->biayaclearance, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Import Cost : {{ number_format($beli->biayaimpor, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Lab Cost : {{ number_format($beli->biayalab, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Freight Cost : {{ number_format($beli->biayafreight,2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Depreciation Cost Purchase : {{ number_format($beli->biayasusutbeli, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Micellanous Cost : {{ number_format($beli->bm+$beli->pph+$beli->storage+$beli->trmc+$beli->spc+$beli->time+$beli->dokumen+$beli->ppn+$beli->stamp, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Handling Cost  : {{ number_format($beli->handling+$beli->over+$beli->adm+$beli->edi+$beli->rush, 2) }}</b></div>
        </div>
    </div>

    <br>
    <table style="width:100%">
      <tr>
        <th>Item Name</th>
         <th>Unit Price Kg</th>
         <th>Total Kg</th>
         <th>Total Tail</th>
         <th>Information</th>
      </tr>
      {{--*/ $detilbelis = DB::table('detilbeli')->where('nobeli', $beli->nobeli)->get() /*--}} 
      @foreach ($detilbelis as $key => $item)
                <tr>
                     <td>{{  DB::table('items')->where('kodebrg', $item->kodebrg)->first()->namabrg }}</td>
                     <td>{{ number_format($item->hargasatuankg, 2) }}</td>
                     <td>{{ $item->jumlahkg }}</td>
                     <td>{{ $item->jumlahekor }}</td>
                     <td>{{ $item->keterangan }}</td>
                </tr>
       @endforeach
    </table>
    <br>
    {{ 'Total items : ' . DB::table('detilbeli')->where('nobeli', $beli->nobeli)->count() }}
@endforeach

</body>
</html>
