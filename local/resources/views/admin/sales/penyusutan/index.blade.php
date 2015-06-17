@extends('/admin/app')

@section('content')
<h1>Revisi Biaya Penyusutan</h1>
<a href="{{url('admin/sales/penyusutan/create')}}" class="btn btn-success">Input Biaya Penyusutan</a>
<hr>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>No Faktur</th>
     <th>Tanggal Order</th>
     <th>Biaya Penyusutan</th>
     <th colspan="1">Actions</th>
 </tr>
 </thead>
 <tbody>
     <tr>
         <td></td>
         <td></td>
         <td></td>
         <td><a href="{{route('admin.sales.penyusutan.edit',1)}}" class="btn btn-warning">Revisi</a></td>
     </tr>

 </tbody>

</table>
@endsection
