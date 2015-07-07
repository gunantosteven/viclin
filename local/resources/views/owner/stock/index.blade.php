@extends('/owner/app')

@section('content')
<h1>Viclin Products Stock</h1>
 <a href="{{url('owner/items/create')}}" class="btn btn-success">Create Item</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Code</th>
         <th>Category</th>
         <th>Name</th>
         <th>StockKg</th>
         <th>Status</th>
         <th>StockTail</th>
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
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection
