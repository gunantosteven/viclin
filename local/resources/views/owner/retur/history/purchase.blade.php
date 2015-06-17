@extends('/owner/app')

@section('content')
<h1>History Retur Faktur Pembelian</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>No Retur Beli</th>
         <th>No Faktur Beli</th>
         <th>Tanggal Retur Beli</th>
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