@extends('layouts.master')
@section('title','Order data')
@section('subjudul','List Order data')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Order data</li>

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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>

@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Tabel Order data</h6>
                  </div>
                   <div class="col-6 text-end">
                    <a class="btn btn-sm bg-success text-white" href="{{ route('order.index') }}"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Order</a>

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
                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KODE TRANSAKSI</th> --}}
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PATIENT ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PATIENT NAME</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TIMESTAMP</th>

                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 5%">JUMLAH RESULT TEST ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 5%">RESULT STATUS</th>

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
<!-- SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('js')

<script>
    jQuery(document).ready(function () {
      // alert(1);
      loadtabel();

    });
let dataTable; // Define a global variable to hold the DataTables instance

    function loadtabel(){
      if (dataTable) {
        dataTable.destroy(); // Destroy the existing DataTables instance if it exists
    }
        jQuery('#data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('order.listdata') }}", // Replace with your route
            columns: [
                 {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                // { data: 'KODETRANSAKSI', name: 'KODETRANSAKSI' },
                { data: 'PATIENT_ID_OPT', name: 'PATIENT_ID_OPT' },

                { data: 'PATIENT_NAME', name: 'PATIENT_NAME' },
                { data: 'tgl', name: 'tgl' },

                { data: 'RESULT_TEST_ID', name: 'RESULT_TEST_ID' },
                
                { data: 'RESULT_STATUS', name: 'RESULT_STATUS' },
               {data: 'action', name: 'action', orderable: false, searchable: false},

//  {data: 'action', name: 'action', orderable: false, searchable: false},
                // Define more columns as needed
            ]
        });
    }

    function hapusData(id,time){
        Swal.fire({
                            title: 'Informasi',
                            text: 'Apakah anda yakin menghapus data ini?',
                            icon: 'warning',
                             customClass: {
        container: 'custom-swal-width' // Apply the custom CSS class to the modal
    },
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Hapus'
                        }).then((result) => {
                            if (result.isConfirmed) {
                         
                                          jQuery.ajax({
                                              url: "{{ route('order.hapusdata') }}", // Replace with your endpoint for sending data
                                              method: 'POST',
                                              data: {
                                                  id: id,
                                                  time : time
                                              },
                                              success: function (response) {
                                                  Swal.fire('Success', 'Data has been deleted.', 'success');
                                                  // loadtabel();
                                                   window.location.reload();
                                              },
                                              error: function () {
                                                  Swal.fire('Error', 'Failed to deleted.', 'error');
                                              }
                                          });
                                     
                            }
                        });

    }
</script>

@endsection