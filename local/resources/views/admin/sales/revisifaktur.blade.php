@extends('/admin/app')

@section('content')
<h1>Revisi Faktur Penjualan</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>No Faktur</th>
         <th>Customer</th>
         <th>Tanggal Order</th>
         <th>Tanggal Jatuh Tempo</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>

        <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td>
                <a href="{{route('admin.sales.revisifaktur.edit',1)}}" class="btn btn-warning">Update</a>
             </td>
        </tr>

        </td>

     </tbody>


 </table>
@endsection