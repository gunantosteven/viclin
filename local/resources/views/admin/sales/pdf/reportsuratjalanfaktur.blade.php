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
    font-family: "Times New Roman";
    font-size: 14px;
}
.d2 {
    display:table-cell;
    text-align:center;
    font-family: "Times New Roman";
    font-size: 14px;
    width:50%;
}
.d3 {
    display:table-cell;
    text-align:left;
    font-family: "Times New Roman";
    font-size: 14px;
    width:5%;
}
.d4 {
    display:table-cell;
    text-align:left;
    font-family: "Times New Roman";
    font-size: 14px;
    width:15%;
}
table {
    font-size:12px;
}
</style>
</head>
<body>
<div class="tablefortext">
    <div class="tr">
        <div class="d1"><font size="18px"><b>SURAT JALAN No. {{ $jual->nojual }}</b></font></div>
        <div class="d3"><u>TUAN</u><br>TOKO<br></div>
        <div class="d4">{{ $customer->company }} - {{ $customer->namacust }}<br>
                        {{ $customer->alamatcust }}<br>
                        {{ $customer->kotacust }}<br>
                        {{ $customer->telpcust }}</u><br>
                        </div>
    </div>
</div>

<br>
<font size="12px">Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan................................................... No. ...............................................................</font>
<table style="width:100%">
  <tr>
     <th>BANYAKNYA</th>
     <th>NAMA BARANG</th>
  </tr>
  @foreach ($detiljuals as $key => $item)
            <tr>
                 <td>{{ $item['jumlahekor'] }}</td>
                 <td>{{ DB::table('items')->where('id', $item['idbrg'])->first()->namabrg }}</td>
            </tr>
   @endforeach
</table>
<br>
<div class="tablefortext">
    <div class="tr">
        <div class="d1"></div>
        <div class="d1">Tanda terima</div>
        <div class="d2">Hormat kami,</div>
        <div class="d4"></div>
    </div>
</div>

</body>
</html>
