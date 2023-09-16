@extends('layouts.master')
@section('title','Test data')
@section('subjudul','List Test data')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Test data</li>

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


</style>
@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tabel Test data</h6>
                  </div>
                  <div class="col-6 text-end">
                    {{-- <a class="btn btn-sm bg-info text-white" href="{{ route('testdata.transfer') }}"><i class="fa fa-send-o" aria-hidden="true"></i>&nbsp;&nbsp;Transfer Order</a> --}}

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
             <table class="table align-items-center mb-0 table-primary table-hover table-bordered" id="data-table">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">DEVICEID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PATIENT ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PATIENT NAME</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">JUMLAH RESULT TEST ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
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
            ajax: "{{ route('testdata.list') }}", // Replace with your route
            columns: [
                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'DEVICE_ID1', name: 'DEVICE_ID1' },
                { data: 'PATIENT_ID_OPT', name: 'PATIENT_ID_OPT' },

                { data: 'PATIENT_NAME', name: 'PATIENT_NAME' },
                { data: 'RESULT_TEST_ID', name: 'RESULT_TEST_ID' },
               {data: 'action', name: 'action', orderable: false, searchable: false},

//  {data: 'action', name: 'action', orderable: false, searchable: false},
                // Define more columns as needed
            ]
        });
    });
</script>

@endsection