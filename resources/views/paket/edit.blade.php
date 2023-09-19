@extends('layouts.master')
@section('title','Edit Paket')
@section('subjudul','Edit Paket')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Edit Paket</li>

@endsection

@section ('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Edit Paket</h6>
                  </div>
                </div>
              </div>
              <div class="card-body">
            <form role="form" method="POST" action="{{ route('paket.update',array('id'=>$model->id)) }}" enctype="multipart/form-data">
                        @csrf

                <div class="mb-3">
                     

                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nama</label>
                            <div class="col-md-6">
                                <input  placeholder="Nama" type="text" class="form-control" id="nama"  name="nama" required  value="{{  $model->nama }}" >
                            </div>
                        </div>
                      <div class="form-group row">
    <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
    <div class="col-md-6">
        <input type="checkbox" name="status" id="status"  value="true" {{ ($model->status == true) ? 'checked' : '' }} >
    </div>
</div>
                        

                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn bg-success text-white w-100 my-4 mb-2">edit</button>
                </div>
              </form>
            </div>

        </div>
      </div>
    </div>

  </div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {
        const selectOption = document.getElementById('jenis');
        const dropdownContainer = document.getElementById('dropdownContainer');
        selectOption.addEventListener('change', function () {
            const selectedValue = selectOption.value;
            if(selectedValue == 'Pelayanan'){
               
               dropdownContainer.style.display = 'block';
            }else{
             dropdownContainer.style.display = 'none';

            }

        });
    });

</script>