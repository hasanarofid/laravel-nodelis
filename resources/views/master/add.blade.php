@extends('layouts.master')
@section('title','Add Master')
@section('subjudul','Add Master')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Add Master</li>

@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">

@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Add Master</h6>
                  </div>
                </div>
              </div>
              <div class="card-body">
            <form role="form" method="POST" action="{{ route('master.store') }}" enctype="multipart/form-data">
                        @csrf

                <div class="mb-3">
                     
                       <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nama Master Test</label>
                            <div class="col-md-6">

                                    <select name="master_test_id" id="master_test_id" class="form-control" style="width: 100%;">
                                    </select>
                          
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input  placeholder="Nama" type="text" class="form-control" id="nama"  name="nama" required >
                            </div>
                        </div>

                        <div class="form-group row">
    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
    <div class="col-md-6">
        <input type="checkbox" name="status" id="status"  value="true" checked>
    </div>
</div>
                        

                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn bg-success text-white w-100 my-4 mb-2">Simpan</button>
                </div>
              </form>
            </div>

        </div>
      </div>
    </div>

  </div>
@endsection
       @section('js')
       <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>

         <script>
            jQuery(document).ready(function () {

                  jQuery('#master_test_id').select2({
                  ajax: {
                     url: "{{ route('master.getMasterTest') }}",
                     dataType: 'json',
                     processResults: function(data) {
                           return {
                              results: data
                           };
                     }
                  }
               });
            });

          
         </script>
       @endsection

