@extends('layouts.master')
@section('title','Add Order')
@section('subjudul','Add Order')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Add Order</li>
    

@endsection

@section ('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css">
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
            <form role="form" method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                        @csrf

                <div class="mb-3">
                     

                        

                        <div class="form-group row">

                         

            
            
            


                            <label for="email" class="col-md-4 col-form-label text-md-right">Pasien</label>
                            <div class="col-md-6">
                              <select class="form-control" id="pasien"  name="pasien">
                              </select>

                               </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Dokter</label>
                            <div class="col-md-6">
                               <select class="form-control" id="dokter"  name="dokter">
                              </select>

                            </div>
                        </div>
<hr style="">
 <div class="form-group row">
                <!-- hgb --> 
                <div id="input-container">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">HGB</label>
                              <input style="height: 70%;" name="hgb[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input">Add Input</button>
                              </div>
                           </div>
                  </div>
                  <!-- end hgb -->

                   <!-- wbc --> 
                  <div id="input-container2">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">WBC</label>
                              <input style="height: 70%;" name="wbc[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input2">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end wbc --> 

                    <!-- PLT --> 
                  <div id="input-container3">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">PLT</label>
                              <input style="height: 70%;" name="plt[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input3">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end PLT --> 

                   <!-- RBC --> 
                  <div id="input-container4">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">RBC</label>
                              <input style="height: 70%;" name="rbc[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input4">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end RBC --> 

                   <!-- HCT --> 
                  <div id="input-container5">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">HCT </label>
                              <input style="height: 70%;" name="hct[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input5">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end HCT --> 

                     <!-- MCV --> 
                  <div id="input-container6">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">MCV </label>
                              <input style="height: 70%;" name="mcv[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input6">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end MCV --> 

                    <!-- MCH --> 
                  <div id="input-container7">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">MCH </label>
                              <input style="height: 70%;" name="mch[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input7">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end MCH --> 

                    <!-- MCHC --> 
                  <div id="input-container8">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">MCHC </label>
                              <input style="height: 70%;" name="mchc[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input8">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end MCHC --> 

                     <!-- PLT_Clumps --> 
                  <div id="input-container9">
                           <div class="input-group mb-3">
                              <label for="email" class="col-md-4 col-form-label text-md-right">PLT_Clumps </label>
                              <input style="height: 70%;" name="pltclumps[]" type="text" class="form-control" placeholder="Enter value">

                              <div class="input-group-append">
                                    <button type="button" class="btn btn-sm btn-success" id="add-input9">Add Input</button>
                              </div>
                           </div>
                  </div>
                   <!-- end PLT_Clumps --> 
            
          
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
        jQuery(document).ready(function() {

            
         //PLT_Clumps
              const inputContainer9 = jQuery("#input-container9");
            const addInputButton9 = jQuery("#add-input9");
            
            // Add new input group
            addInputButton9.click(function() {
                const newInputGroup9 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="pltclumps[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input9" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer9.append(newInputGroup9);
            });
            
            // Remove input group
            inputContainer9.on("click", ".remove-input9", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end PLT_Clumps


         //MCHC
              const inputContainer8 = jQuery("#input-container8");
            const addInputButton8 = jQuery("#add-input8");
            
            // Add new input group
            addInputButton8.click(function() {
                const newInputGroup8 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="mchc[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input8" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer8.append(newInputGroup8);
            });
            
            // Remove input group
            inputContainer8.on("click", ".remove-input8", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end MCHC

         //MCH
              const inputContainer7 = jQuery("#input-container7");
            const addInputButton7 = jQuery("#add-input7");
            
            // Add new input group
            addInputButton7.click(function() {
                const newInputGroup7 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="mch[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input7" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer7.append(newInputGroup7);
            });
            
            // Remove input group
            inputContainer7.on("click", ".remove-input7", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end MCH


         //MCV
              const inputContainer6 = jQuery("#input-container6");
            const addInputButton6 = jQuery("#add-input6");
            
            // Add new input group
            addInputButton6.click(function() {
                const newInputGroup6 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="mcv[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input6" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer6.append(newInputGroup6);
            });
            
            // Remove input group
            inputContainer6.on("click", ".remove-input6", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end MCV

         jQuery('#pasien').select2({
                ajax: {
                    url: "{{ route('order.getpasien') }}",
                    dataType: 'json',
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    }
                }
            });

             jQuery('#dokter').select2({
                ajax: {
                    url: "{{ route('order.getDokter') }}",
                    dataType: 'json',
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    }
                }
            });


            const inputContainer = jQuery("#input-container");
            const addInputButton = jQuery("#add-input");
            
            // Add new input group
            addInputButton.click(function() {
                const newInputGroup = `
                    <div class="input-group mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                    <input style="height: 70%;" name="hgb[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer.append(newInputGroup);
            });
            
            // Remove input group
            inputContainer.on("click", ".remove-input", function() {
                jQuery(this).closest(".input-group").remove();
            });


            const inputContainer2 = jQuery("#input-container2");
            const addInputButton2 = jQuery("#add-input2");
            
            // Add new input group
            addInputButton2.click(function() {
                const newInputGroup2 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="wbc[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input2" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer2.append(newInputGroup2);
            });
            
            // Remove input group
            inputContainer2.on("click", ".remove-input2", function() {
                jQuery(this).closest(".input-group").remove();
            });

            //plt
              const inputContainer3 = jQuery("#input-container3");
            const addInputButton3 = jQuery("#add-input3");
            
            // Add new input group
            addInputButton3.click(function() {
                const newInputGroup3 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="plt[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input3" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer3.append(newInputGroup3);
            });
            
            // Remove input group
            inputContainer3.on("click", ".remove-input3", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end plt

            //RBC
              const inputContainer4 = jQuery("#input-container4");
            const addInputButton4 = jQuery("#add-input4");
            
            // Add new input group
            addInputButton4.click(function() {
                const newInputGroup4 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="rbc[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input4" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer4.append(newInputGroup4);
            });
            
            // Remove input group
            inputContainer4.on("click", ".remove-input4", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end RBC

            //HCT
              const inputContainer5 = jQuery("#input-container5");
            const addInputButton5 = jQuery("#add-input5");
            
            // Add new input group
            addInputButton5.click(function() {
                const newInputGroup5 = `
                    <div class="input-group mb-3">
                     <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                              <input style="height: 70%;" name="hct[]" type="text" class="form-control" placeholder="Enter value">
                        <div class="input-group-append">
                            <button class="btn btn-sm btn-danger remove-input5" type="button">Remove</button>
                        </div>
                    </div>
                `;
                inputContainer5.append(newInputGroup5);
            });
            
            // Remove input group
            inputContainer5.on("click", ".remove-input5", function() {
                jQuery(this).closest(".input-group").remove();
            });
            // end HCT

        });


    </script>
 

    @endsection