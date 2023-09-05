@extends('layouts.master')
@section('title','Add Master Tindakan')
@section('subjudul','Add Master Tindakan')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Master Tindakan</a></li>
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
@endsection
@section ('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">

 <div class="container-fluid py-2">
 

       <div class="row">
         <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                     <div class="row">
                     <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Form Add Master Tindakan </h6>
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
              
               @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                     <form action="{{ route('mastertindakan.store') }}"
                        method="POST"
                        enctype="multipart/form-data">
                     @csrf
                         <div class="form-group">
                              <label for="name">Tipe</label>
                              <select name="is_sub" id="is_sub" class="form-control">
                                 <option value="kegiatan">Master Utama</option>
                                 <option value="sub">Sub Master</option>
                              </select>
                     </div>
                      <div class="form-group" id="div_sub_kegiatan" >
                        <label for="name">Master Utama</label>
                        <select name="id_master" id="id_master" class="form-control" style="width: 100%;">
                          
                        </select>

               </div>
                     <div class="form-group">
                              <label for="name">Nama</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Nama Master Tindakan" required>
                     </div>


                 

                    

<div class="form-group ">
                              <label for="name">Stok</label>
                                             <input  placeholder="Stok" type="number" class="form-control" id="stok"  name="stok" required >
                
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
               jQuery("#div_sub_kegiatan").hide();
                  jQuery('#id_master').select2({
                  ajax: {
                     url: "{{ route('mastertindakan.getmaster') }}",
                     dataType: 'json',
                     processResults: function(data) {
                           return {
                              results: data
                           };
                     }
                  }
               });
            });

            jQuery("#is_sub").change(function(){
               var sub = jQuery(this).val();
               if(sub == 'sub'){
                  jQuery("#div_sub_kegiatan").show();
               }else{
                  jQuery("#div_sub_kegiatan").hide();
               }
            })
         </script>
       @endsection

