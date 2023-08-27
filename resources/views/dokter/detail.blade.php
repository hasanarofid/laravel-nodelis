@extends('layouts.master')
@section('title','Detail Dokter')
@section('subjudul','Detail Dokter')
@section('breadcrumbs')
<li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Dashboard</a></li>
<li class="breadcrumb-item text-sm text-white active" aria-current="page">Detail Dokter</li>

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
h1 {
    text-align: center;
    margin-bottom: 20px;
}

.patient-card {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 20px;
    display: flex;
}

.patient-info {
    flex: 1;
}

.patient-medical {
    flex: 1;
    border-left: 1px solid #ccc;
    padding-left: 20px;
}

h2 {
    font-size: 1.2rem;
    margin-top: 0;
}

p {
    margin: 10px 0;
}

strong {
    font-weight: bold;
}

/* Responsive layout for smaller screens */
@media (max-width: 600px) {
    .patient-card {
        flex-direction: column;
    }

    .patient-medical {
        border-left: none;
        padding-left: 0;
        margin-top: 20px;
    }
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
                    <h6 class="mb-0">Detail Dokter </h6>
                  </div>
                </div>
              </div>

          <div class="card-body ">


           <h1>Dokter Details</h1>
        <div class="patient-card">
            <div class="patient-info">
                <h2>{{ $model->name  }}</h2>
                <p><strong>NIK:</strong> {{ $model->nik  }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $model->sex  }}</p>
                <p><strong>Specialist:</strong> {{ $model->specialist  }}</p>
                <p><strong>Address:</strong> {{ $model->address  }}</p>
            </div>
            {{-- <div class="patient-medical">
                <h2>Medical Information</h2>
                <p><strong>Blood Type:</strong> O+</p>
                <p><strong>Allergies:</strong> None</p>
                <p><strong>Conditions:</strong> Hypertension</p>
            </div> --}}
        </div>
         
            
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
