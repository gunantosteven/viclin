@extends('/owner/app')

@section('content')
<h1>History Retur Faktur Penjualan</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>No Retur Jual</th>
         <th>No Faktur Jual</th>
         <th>Tanggal Retur Jual</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>

        <tr>
             <td></td>
             <td></td>
             <td></td>
             <td>
                <a href="{{route('admin.sales.revisifaktur.edit',1)}}" class="btn btn-warning">Read</a>
             </td>
        </tr>

        </td>

     </tbody>


 </table>
@endsection