@extends('/admin/app')

@section('content')
<div class="container">
<h1>Cetak Surat Jalan</h1>
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
             <td><a href="{{route('admin.penyusutan.edit',1)}}" class="btn btn-warning">Cetak</a></td>
         </tr>

     </tbody>

 </table>
</div>
@endsection
