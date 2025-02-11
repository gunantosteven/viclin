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
    text-align:right;
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
<h1>Report Profit And Loss Period</h1>
<h1>Start Date {{ date("d F Y",strtotime($tanggalawal)) }} to {{ date("d F Y",strtotime($tanggalakhir)) }}</h1>
<hr>
<u><h4>Income :</h4></u>

<div class="tablefortext">
        <div class="tr">
            <div class="d1">Total Sales</div>
            <div class="d2"><b>{{ number_format($totalsales, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Purchase Depreciation</div>
            <div class="d2"><b>{{ number_format($biayasusutbeli, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Total All</b></div>
            <div class="d2"><b></b></div>
            <div class="d3"><b>{{ number_format($income, 2) }}</b></div>
        </div>
</div>

<br>
<u><h4>Expenses :</h4></u>

<div class="tablefortext">
        <div class="tr">
            <div class="d1">Total Purchase</div>
            <div class="d2"><b>{{ number_format($totalpurchase, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Quarantine Cost</div>
            <div class="d2"><b>{{ number_format($biayakarantina, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Lab Cost</div>
            <div class="d2"><b>{{ number_format($biayalab, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Freight Cost</div>
            <div class="d2"><b>{{ number_format($biayafreight, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Micellanous Cost</div>
            <div class="d2"><b>{{ number_format($micellanous, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Handling Cost</div>
            <div class="d2"><b>{{ number_format($handling, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Expedition Cost</div>
            <div class="d2"><b>{{ number_format($biayaekspjual, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Sales Depreciation</div>
            <div class="d2"><b>{{ number_format($biayasusutjual, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Styrofoam Cost</div>
            <div class="d2"><b>{{ number_format($biayastereo, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Total All</b></div>
            <div class="d2"><b></b></div>
            <div class="d3"><b>({{ number_format($expenses, 2) }})</b></div>
        </div>
</div>

<br>
<u><h4>Costs :</h4></u>

<div class="tablefortext">
        <div class="tr">
            <div class="d1">Total Gasoline</div>
            <div class="d2"><b>{{ number_format($biayabensin, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Toll Parking</div>
            <div class="d2"><b>{{ number_format($tolparkir, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total ETC</div>
            <div class="d2"><b>{{ number_format($lainlain, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1">Total Salary</div>
            <div class="d2"><b>{{ number_format($salary, 2) }}</b></div>
        </div>
        <div class="tr">
            <div class="d1"><b>Total All</b></div>
            <div class="d2"><b></b></div>
            <div class="d3"><b>({{ number_format($costs, 2) }})</b></div>
        </div>
</div>

<br>
@if ($profitandloss > 0)
<b>Total Profit  (Income - Expenses - Costs) : {{ number_format($income, 2) }} - {{ number_format($expenses, 2) }} - {{ number_format($costs, 2) }} = {{ number_format($profitandloss, 2) }}</b>
@elseif ($profitandloss < 0)
<b>Total Loss  (Income - Expenses - Costs) : {{ number_format($income, 2) }} - {{ number_format($expenses, 2) }} - {{ number_format($costs, 2) }} = {{ number_format($profitandloss, 2) }}</b>
@elseif ($totalAllSales === 0)
<b>Total Profit or Loss  (Income - Expenses - Costs) : {{ number_format($income, 2) }} - {{ number_format($expenses, 2) }} - {{ number_format($costs, 2) }} = {{ number_format($profitandloss, 2) }}</b>
@endif
</body>
</html>
