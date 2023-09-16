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
.swal2-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.swal2-popup {
    width: 700px; /* Adjust the width as per your requirement */
    /* Add any other styles you need for the modal here */
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
<!-- SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@section('js')

<script>
function transferData(id){

          jQuery.ajax({
                    url: "{{ route('testdata.cekpasien') }}",
                    data : {
                        'pasien_id' : id
                    },
                    dataType: 'json',

                    success: function (response) {
                      if(response.status == 'tidak ada'){

                              Swal.fire({
                                title: 'Informasi',
                                text: response.pesan,
                                icon: 'warning',
                            });

                      }else{
                         function loadTableData(id) {
                // Load the table data via AJAX and insert it into the SweetAlert modal
                jQuery.ajax({
                    url: "{{ route('testdata.loadtabledata') }}", // Replace with your endpoint
                    dataType: 'html',
                    data : {
                        'pasien_id' : id
                    },
                    success: function (data) {
                        Swal.fire({
                            title: 'Informasi',
                            html: '<div id="tableContainer">' + data + '</div>', // Container for the table
                            text: response.pesan,
                            icon: 'warning',
                             customClass: {
        container: 'custom-swal-width' // Apply the custom CSS class to the modal
    },
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, transfer !'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Handle the transfer action if needed
                                var selectedData = [];
                                      jQuery('input[name="pilih[]"]:checked').each(function () {
                                          selectedData.push(jQuery(this).val());
                                      });
                                      console.log(selectedData);

                                      // Now you can use the selectedData array to send the data via AJAX or perform other actions
                                      if (selectedData.length > 0) {
                                          jQuery.ajax({
                                              url: "{{ route('testdata.senddata') }}", // Replace with your endpoint for sending data
                                              method: 'POST',
                                              data: {
                                                  selectedData: selectedData,
                                                  pasien_id : id
                                              },
                                              success: function (response) {
                                                  Swal.fire('Success', 'Data has been transferred.', 'success');
                                              },
                                              error: function () {
                                                  Swal.fire('Error', 'Failed to transfer data.', 'error');
                                              }
                                          });
                                      } else {
                                          Swal.fire('Info', 'No checkboxes are selected.', 'info');
                                      }
                            }
                        });
                    },
                    error: function () {
                        Swal.fire('Error', 'Failed to load table data', 'error');
                    }
                });
            }

            loadTableData(id);

                        // jQuery("#tableContainer").html(response.status);
           
                        //   Swal.fire({
                        //     title: 'Informasi',
                        //      html: '<div id="tableContainer"></div>',
                        //     text: response.pesan,
                        //     icon: 'warning',
                        //     showCancelButton: true,
                        //     confirmButtonColor: '#d33',
                        //     cancelButtonColor: '#3085d6',
                        //     confirmButtonText: 'Yes, transfer !'
                        // }).then((result) => {
                        //     if (result.isConfirmed) {
                        //       console.log('ok');
                                // Perform your delete action here, e.g., an AJAX request
                                // $.ajax({
                                //     type: 'DELETE',
                                //     url: '/delete/' + userId, // Replace with your delete route
                                //     success: function(response) {
                                //         // Handle success, e.g., remove the row from the DataTable
                                //         table.row($(this)).remove().draw();
                                //         Swal.fire('Deleted!', 'The user has been deleted.', 'success');
                                //     },
                                //     error: function() {
                                //         Swal.fire('Error', 'An error occurred while deleting the user.', 'error');
                                //     }
                                // });
                        //     }
                        // });

                      }
                   

              },
                });

  // jQuery.ajax({
  //                       type: 'DELETE',
  //                       // url: '/delete/' + userId, // Replace with your delete route
  //                       success: function(response) {
  //                           // Handle success, e.g., remove the row from the DataTable
  //                           // table.row($(this)).remove().draw();
  //                           // Swal.fire('Deleted!', 'The user has been deleted.', 'success');
  //                       },
  //                       error: function() {
  //                           Swal.fire('Error', 'An error occurred while deleting the user.', 'error');
  //                       }
  //                   });

  
  //  Swal.fire({
  //               title: 'Are you sure?',
  //               text: 'You are about to delete ' + data[0] + '.',
  //               icon: 'warning',
  //               showCancelButton: true,
  //               confirmButtonColor: '#d33',
  //               cancelButtonColor: '#3085d6',
  //               confirmButtonText: 'Yes, delete it!'
  //           }).then((result) => {
  //               if (result.isConfirmed) {
  //                   // Perform your delete action here, e.g., an AJAX request
  //                   $.ajax({
  //                       type: 'DELETE',
  //                       url: '/delete/' + userId, // Replace with your delete route
  //                       success: function(response) {
  //                           // Handle success, e.g., remove the row from the DataTable
  //                           table.row($(this)).remove().draw();
  //                           Swal.fire('Deleted!', 'The user has been deleted.', 'success');
  //                       },
  //                       error: function() {
  //                           Swal.fire('Error', 'An error occurred while deleting the user.', 'error');
  //                       }
  //                   });
  //               }
  //           });
}
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