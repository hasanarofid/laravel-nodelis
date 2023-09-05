@extends('layouts.master')
@section('title','Inventory')
@section('subjudul','List Inventory')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Inventory</li>

@endsection
<style>
#data-table_info{
   font-size: 12px;
}
#data-table_paginate{
   font-size: 12px;
}
#data-table tbody tr {
    font-size: 12px; /* Adjust the font size to your desired value */
}

#data-table thead tr {
    font-size: 14px; /* Adjust the font size to your desired value */
}


</style>
@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                   <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tabel Inventory</h6>
                  </div>
                  <div class="col-6 text-end">
                    <a class="btn btn-sm bg-success text-white" href="{{ route('inventory.add') }}"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Inventory</a>
                  </div>
                </div>
              </div>

          <div class="card-body ">
          @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    {{ Session::forget('success') }}
@endif
<style>
#data-table_info{
   font-size: 12px;
}
#data-table_paginate{
   font-size: 12px;
}
#data-table tbody tr {
    font-size: 12px; /* Adjust the font size to your desired value */
}

</style>
            <div class="table-responsive p-0">
             <table class="table align-items-center table-primary  table-bordered" id="data-table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Master Tindakan</th>

                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Stok</th>
                    <th class="text-uppercase text-xxs font-weight-bolder opacity-7">Aksi</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
@section('js')

<script>
    jQuery(document).ready(function () {
      // alert(1);
        jQuery('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('inventory.list') }}", // Replace with your route
            columns: [
                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'name', name: 'name' },
                { data: 'sub', name: 'sub' },

                { data: 'stok', name: 'stok' },
               {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>

@endsection