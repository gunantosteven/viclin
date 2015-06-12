@extends('/owner/app')

@section('content')
<div class="container">
<h1>Revisi Faktur Penjualan</h1>
    <table class="table table-striped table-bordered table-hover">
         <thead>
         <tr class="bg-info">
             <th>No Faktur Pembelian</th>
             <th>Supplier</th>
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
                    <a href="{{route('admin.sales.revisifaktur.show',1)}}" class="btn btn-warning">Read</a>
                 </td>
            </tr>

            </td>

         </tbody>


     </table>
     
</div>
@endsection