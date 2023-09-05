@extends('layouts.master')
@section('title','Edit Master Tindakan')
@section('subjudul','Edit Master Tindakan')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Master Tindakan</li>

@endsection

@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Edit Master Tindakan</h6>
                  </div>
                </div>
              </div>
              <div class="card-body">
            <form role="form" method="POST" action="{{ route('inventory.update',array('id'=>$model->id)) }}" enctype="multipart/form-data">
                        @csrf

                <div class="mb-3">
                       
                     

                    
                          {{-- <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">Master Tindakan</label>
                              <div class="col-md-6">
                          <select name="tindakan_id" id="tindakan_id" class="form-control" style="width: 100%;">
                            
                          </select>
                              </div>
                          </div>     --}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input  placeholder="Nama" type="text" class="form-control" id="name"  name="name" required  value="{{  $model->name }}" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Stok</label>
                            <div class="col-md-6">
                                <input  placeholder="Stok" type="number" class="form-control" id="stok"  name="stok" required value="{{  $model->stok }}">
                            </div>
                        </div>

                       

                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn bg-success text-white w-100 my-4 mb-2">Edit</button>
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

                  jQuery('#tindakan_id').select2({
                  ajax: {
                     url: "{{ route('inventory.getmaster') }}",
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
