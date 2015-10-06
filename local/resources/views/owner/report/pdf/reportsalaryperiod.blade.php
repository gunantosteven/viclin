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
<h1>Report Salary Period</h1>
<h1>Month : {{ $bulan }} Year : {{ $tahun }}</h1>
<h2>Employee : @if($idemp == "%") {{ "All Employees" }} @else {{ DB::table('employees')->where('id', $idemp)->first()->namaemp }} @endif </h2>
<hr>
<table style="width:100%">
      <tr>
         <th>No</th>
         <th>City-Employee</th>
         <th>Transaction Date</th>
         <th>Nominal</th>
         <th>Information</th>
      </tr>
      {{--*/ $count = 1; $total = 0; /*--}} 
      @foreach ($salaries as $key => $salary)
        {{--*/ $total += $salary->nominal /*--}}
        <tr>
             <td>{{ $count++ }}</td>
             <td>{{ DB::table('employees')->where('id', $salary->idemp)->first()->kotaemp }}-{{ DB::table('employees')->where('id', $salary->idemp)->first()->namaemp }}</td>
             <td>{{ date("d F Y",strtotime($salary->tgltransaksi)) }}</td>
             <td align="right">{{ number_format($salary->nominal, 2) }}</td>
             <td >{{ $salary->keterangan }}</td>
        </tr>  
      @endforeach
        <tr>
             <td></td>
             <td></td>
             <td colspan="1">Total</td>
             <td align="right">{{ number_format($total, 2) }}</td>
             <td ></td>
        </tr> 
</table>
</body>
</html>
