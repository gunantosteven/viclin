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
    font-size: 12px;
}
.d2 {
    display:table-cell;
    text-align:center;
    font-family: "Times New Roman";
    font-size: 12px;
    width:50%;
}
.d3 {
    display:table-cell;
    text-align:left;
    font-family: "Times New Roman";
    font-size: 12px;
    width:10%;
}
.d4 {
    display:table-cell;
    text-align:left;
    font-family: "Times New Roman";
    font-size: 12px;
    width:15%;
}
table {
    font-size:10px;
}
</style>
</head>
<body>
<font size="15px"><b>CV VICLIN – TRADING LINES –</b></font><br>
<font size="15px">Add : Jalan Raya Mastrip 22 Kedurus, Surabaya 60223</font><br>
<font size="15px">Telpon : +62317667628, Fax : +62317662463</font>
<center><font size="15px"><b>INVOICE</b></font><br></center>
<div class="tablefortext">
	<div class="tr">
        <div class="d1">Invoice No</div>
        <div class="d1">: {{ $jual->nojual }}</div>
        <div class="d3">Sold To</div>
        <div class="d4">: </div>
    </div>
    <div class="tr">
        <div class="d1">Delivery Date</div>
        <div class="d1">: {{ date("d F Y",strtotime($jual->deliverydate)) }}</div>
        <div class="d3">Name</div>
        <div class="d4">: {{ DB::table('customers')->where('id', $jual['nikcust'])->first()->namacust }}</div>
    </div>
    <div class="tr">
        <div class="d1">Terms of Sale</div>
        <div class="d1">: 
        <?php 
            $datetime1 = new DateTime(($jual->tglorderjual));
            $datetime2 = new DateTime(($jual->tgltempojual));
            $interval = $datetime1->diff($datetime2);
            echo $interval->format(' %R%a Days');
        ?> 
        </div>
        <div class="d3">Company</div>
        <div class="d4">: {{ DB::table('customers')->where('id', $jual['nikcust'])->first()->company }}</div>
    </div>
    <div class="tr">
        <div class="d1">Payment Date</div>
        <div class="d1">: {{ date("d F Y",strtotime($jual->paymentdate)) }}</div>
        <div class="d3">Add</div>
        <div class="d4">: Surabaya</div>
    </div>
    <div class="tr">
        <div class="d1">Transfer information</div>
        <div class="d1">:  Beneficiary name CV. Viclin<br>
						&nbsp; Panin Bank KCP Wiyung Surabaya<br>
						&nbsp; Accont No : 4165010554</div>
        <div class="d3">Currency</div>
        <div class="d4">: Rupiah</div>
    </div>

</div>
<table style="width:100%">
  <tr>
     <th>Commodity Description</th>
     <th>No Of Box</th>
     <th>Pcs</th>
     <th>Kg</th>
     <th>Unit Prices</th>
     <th>Net Sales</th>
  </tr>
  @foreach ($detiljuals as $key => $item)
            <tr>
            	 <td>{{ $item['keterangan'] }}</td>
            	 <td>{{ $item['noofbox'] }}</td>
            	 <td>{{ $item['jumlahekor'] }}</td>
            	 <td>{{ $item['jumlahkg'] }}</td>
            	 <td align="right">{{ number_format($item['hargasatuankg'], 2) }}</td>
            	 <td align="right">{{ number_format($item['hargasatuankg'] * $item['jumlahekor'], 2) }}</td>
            </tr>
   @endforeach
   	<tr>
   		 <td></td>
   		 <td></td>
   		 <td></td>
    	 <td colspan="2" align="center">Total Price</td>
    	 <td align="right">{{ number_format($totalprice, 2) }}</td>
    </tr>
</table>
<br>
<div class="tablefortext">
	<div class="tr">
        <div class="d1"></div>
        <div class="d1"></div>
        <div class="d3"></div>
        <div class="d4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Counter Sign By</div>
    </div>
    <div class="tr">
        <div class="d1"></div>
        <div class="d1"></div>
        <div class="d3"></div>
        <div class="d4">&nbsp;</div>
    </div>
    <div class="tr">
        <div class="d1"></div>
        <div class="d1"></div>
        <div class="d3"></div>
        <div class="d4">&nbsp;</div>
    </div>
    <div class="tr">
        <div class="d1"></div>
        <div class="d1"></div>
        <div class="d3"></div>
        <div class="d4">&nbsp;</div>
    </div>
    <div class="tr">
        <div class="d1"></div>
        <div class="d1"></div>
        <div class="d3"></div>
        <div class="d4"><hr></div>
    </div>
</div>
<font size="12px"><b>No Claims For the Shortages Or Allowances Considered Made On Day Delevery</b></font><br>
<center><font size="12px"><b>* ORIGINAL *</b></font><br></center>

</body>
</html>
