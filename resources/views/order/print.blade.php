<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
  <style>
        /* Tambahkan gaya CSS untuk kop surat di sini */
     .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f0f0f0;
}

.left-image img,
.right-image img {
    max-height: 50px; /* Sesuaikan tinggi gambar sesuai kebutuhan */
    max-width: 50px; /* Sesuaikan lebar gambar sesuai kebutuhan */
}
 .left-image {
            width: 100px; /* Sesuaikan lebar gambar kiri */
        }

        .right-image {
            width: 100px; /* Sesuaikan lebar gambar kanan */
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
</head>
<body>
<table width="100%" id="headerlaporan" >
        
        <TR>
            <TD ROWSPAN="3" rowspan="3" WIDTH="80" ALIGN="CENTER" VALIGN="MIDDLE">
				       <img src="{{ public_path('logopemprov.png') }}" width="150" style="float:left;max-width: 90px; width:90px;" class='image_report'/>
               
            </TD>
            
            <TD ALIGN=CENTER VALIGN=MIDDLE colspan=" <?php echo (!empty($colspan)) ? ($colspan-1) : "5"; ?>" nowrap>
                <B><FONT FACE="Liberation Serif" SIZE=<?php echo isset($judulFont)?$judulFont:5; ?> color="black"><?php echo "<div>PEMERINTAH PROVINSI  </div>" ?></FONT></B>
            </TD>
            <TD ROWSPAN="3" rowspan="3" WIDTH="80" ALIGN="CENTER" VALIGN="MIDDLE">
         <img src="{{ public_path('logopemprov.png') }}" width="150" style="float:left;max-width: 90px; width:90px;" class='image_report'/>
             
     
            </TD>
        </TR>
         <TR>
            <TD ALIGN=CENTER VALIGN=MIDDLE colspan=" <?php echo (!empty($colspan)) ? ($colspan-1) : "5"; ?>" nowrap>
                <FONT ALIGN=CENTER VALIGN=MIDDLE FACE="Liberation Serif"  SIZE=2 color="black">info</FONT>
            </TD>
        </TR>
        <TR>
            <TD ALIGN=CENTER VALIGN=MIDDLE colspan=" <?php echo (!empty($colspan)) ? ($colspan-1) : "5"; ?>" nowrap>
                <FONT ALIGN=CENTER VALIGN=MIDDLE FACE="Liberation Serif"  SIZE=2 color="black">info</FONT>
            </TD>
        </TR>
         <TR>
            <TD ALIGN=CENTER VALIGN=MIDDLE colspan=" <?php echo (!empty($colspan)) ? ($colspan-1) : "5"; ?>" nowrap>
                <FONT ALIGN=CENTER VALIGN=MIDDLE FACE="Liberation Serif" color="black">Telp./Fax. (031) 5501046 / (031) 5501180 - </FONT>
            </TD>
        </TR>

        <TR>
            <TD ALIGN=CENTER VALIGN=MIDDLE colspan=" <?php echo (!empty($colspan)) ? ($colspan-1) : "5"; ?>" nowrap>
                <FONT ALIGN=CENTER VALIGN=MIDDLE FACE="Liberation Serif" color="black">Telp./Fax. (031) 5501046 / (031) 5501180 - </FONT>
            </TD>
        </TR>
        
         <TR>
            <TD colspan="9" HEIGHT=6 style="border-bottom: 3px solid #000000" ></TD>
        </TR>
</table>


    <!-- Konten lainnya -->
    <div class="container-fluid ">
     <h1>Laporan Pasien</h1>

        
        <div class="patient-card">
            <div class="patient-medical">
                <h2>Informasi pasien</h2>
                <p><strong>Nama:</strong> {{  $pasien->name }}</p>
                <p><strong>No Rm:</strong> {{  $pasien->no_rm }}</p>
                <p><strong>Alamat:</strong> {{  $pasien->address }}</p>
            </div>
   <br>
            <div class="patient-medical">
                <h2>Medical Information</h2>
                <p><strong>Kode Transaksi :</strong> {{ $model->KODETRANSAKSI  }}</p>
                <p><strong>Result Test:</strong> {{ $model->RESULT_TEST_ID }}</p>
                <p><strong>Result Value :</strong> {{ $model->RESULT_VALUE }}</p>
                <p><strong>Tanggal :</strong> {{ $model->RESULT_DATE }}</p>

            </div>
        </div>
    </div>

  </div>
</body>
</html>
