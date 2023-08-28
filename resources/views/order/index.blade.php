@extends('layouts.master')
@section('title','Add Order')
@section('subjudul','Add Order')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Add Order</li>

@endsection

@section ('content')
 <style>
        /* Custom styling for the <hr> element */
        hr {
            border: none; /* Remove the default border */
            height: 2px; /* Set the height of the rule */
            background-color: #333; /* Set the background color */
            margin: 20px 0; /* Add some spacing above and below */
        }
    </style>
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Add Order</h6>
                  </div>
                </div>
              </div>
              <div class="card-body">
            <form role="form" method="POST" action="{{ route('dokter.store') }}" enctype="multipart/form-data">
                        @csrf

                <div class="mb-3">
                     

                        

                        <div class="form-group row">

                         <div id="input-container">
                <!-- Initial input group -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Enter value">
                    <div class="input-group-append">
                        <button class="btn btn-danger remove-input" type="button">Remove</button>
                    </div>
                </div>
            </div>
            
            <button type="button" class="btn btn-success" id="add-input">Add Input</button>
            
            <button type="submit" class="btn btn-primary">Submit</button>


                            <label for="email" class="col-md-4 col-form-label text-md-right">Pasien</label>
                            <div class="col-md-6">
                                <input  placeholder="Pasien" type="text" class="form-control" id="name"  name="name" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Dokter</label>
                            <div class="col-md-6">
                                <input  placeholder="Dokter" type="text" class="form-control" id="nik"  name="nik" required >
                            </div>
                        </div>
<hr style="">
 <div class="form-group row">
 
                <div class="input-group" id="input-container1">
                   <label for="email" class="col-md-4 col-form-label text-md-right">RBC</label>
                       
                    <input type="text" style="height: 70%;" class="form-control" name="rbc[]" placeholder="Enter value">
                  <button type="button" class="btn btn-success" id="add-input1">Add Input</button>
                  <button type="button" class="btn btn-danger" id="remove-input1">Remove Input</button>
               
                </div>

                    <div class="input-group" id="input-container2">
                   <label for="email" class="col-md-4 col-form-label text-md-right">MCV</label>
                       
                    <input type="text" style="height: 70%;" class="form-control" name="input[]" placeholder="Enter value">
                  <button type="button" class="btn btn-success" id="add-input">Add Input</button>
            <button type="button" class="btn btn-danger" id="remove-input">Remove Input</button>
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
 <script>
        jQuery(document).ready(function() {
            const inputContainer = jQuery("#input-container");
            const addInputButton = jQuery("#add-input");
            
            // Add new input group
            addInputButton.click(function() {
                const newInputGroup = `
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-danger remove-input" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer.append(newInputGroup);
            });
            
            // Remove input group
            inputContainer.on("click", ".remove-input", function() {
                jQuery(this).closest(".input-group").remove();
            });
        });
    </script>
 

    @endsection