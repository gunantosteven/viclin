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
<center><h1>PT. Viclin Surabaya</h1></center>
<h2>Surat Jalan Faktur Penjualan {{ $jual->nojual }}</h2>

<br>
<table style="width:100%">
  <tr>
    <th>Nama Barang</th>
     <th>Harga Satuan Kg</th>
     <th>Jumlah Kg</th>
     <th>Jumlah Ekor</th>
     <th>Keterangan</th>
  </tr>
  @foreach ($detiljuals as $key => $item)
            <tr>
                 <td>{{  DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
                 <td>{{ $item['hargasatuankg'] }}</td>
                 <td>{{ $item['jumlahkg'] }}</td>
                 <td>{{ $item['jumlahekor'] }}</td>
                 <td>{{ $item['keterangan'] }}</td>
            </tr>
   @endforeach
</table>
<br>
Total Items : {{ $detiljuals->count() }}
</body>
</html>
