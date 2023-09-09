@extends('layouts.master')
@section('title','Order data')
@section('subjudul','Detail Order data')
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
@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Detail Order data</h6>
                  </div>
                </div>
              </div>

          <div class="card-body ">
         
            <div class="table-responsive p-0">
     <form id="detailForm">
                    <div class="mb-3">
                        <label for="detailId" class="form-label"> <h6> ID: {{ $model->PATIENT_ID_OPT  }} </h6> </label>
                    </div>
                    <div class="mb-3">
                        <label for="detailName" class="form-label"><h6> Name: {{ $model->PATIENT_NAME  }} </h6></label>
                    </div>
                     <div class="mb-3">
                        <label for="detailName" class="form-label"><h6> Paket: {{ $nama_paket  }} </h6></label>
                    </div>
                    <!-- Add more detail fields as needed -->
                    <hr>
                    <table class="table align-items-center mb-0 table-primary table-hover table-bordered">
                    <thead> 
                    <tr>
                        {{-- <th>Kode transaksi</th> --}}
                        <th>Result Test</th>

                        <th>Result Value</th>
                    </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $item)
                              <tr>
                              {{-- <td>{{ $item->KODETRANSAKSI }}</td> --}}
                              <td>{{ $item->RESULT_TEST_ID }}</td>

                              <td>{{ $item->RESULT_VALUE }}</td>


                              </tr>
                        @endforeach
                     </tbody>
                    </table>


                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
