@extends('/admin/app')

@section('content')
<div class="container">
<h1>Viclin Items Stock</h1>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Kode</th>
         <th>Category</th>
         <th>Nama</th>
         <th>StockKG</th>
         <th>Status</th>
         <th>StockBrg</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($items as $item)
         <tr>
             <td>{{ $item->kodebrg }}</td>
             <td>{{ DB::table('categories')->where('id', $item->id_category)->first()->namakategori }}</td>
             <td>{{ $item->namabrg }}</td>
             <td>{{ $item->stokkg }}</td>
             <td>{{ $item->status }}</td>
             <td>{{ $item->stokbrg }}</td>
             <td><a href="{{url('admin/items',$item->id)}}" class="btn btn-primary">Read</a></td>
         </tr>
     @endforeach

     </tbody>

 </table>
</div>
@endsection
