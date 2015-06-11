@extends('/admin/app')

@section('content')
<div class="container">
<h1>Cetak Faktur Penjualan</h1>
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
                    {!! Form::open(['method' => 'GET', 'route'=>['admin.sales.cetakfaktur.index']]) !!}
                    {!! Form::submit('Cetak', ['class' => 'btn']) !!}
                    {!! Form::close() !!}
                 </td>
            </tr>

            </td>

         </tbody>


     </table>
     
</div>
@endsection