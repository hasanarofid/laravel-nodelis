   <table class="table align-items-center mb-0 table-primary table-hover table-bordered" id="tableContainer">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pilih</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PATIENT ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PATIENT NAME</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Timestamp</th>
                
                  </tr>
                </thead>
                <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($tableData as $row)
        <tr>
            <td>{{ $no++ }}</td>

                        <td style="text-align: center;">
                         <input type="checkbox" value="{{ $row->TIMESTAMP }}" name="pilih[]" >
                          </td>

            <td>{{ $row->PATIENT_ID_OPT }}</td>
            <td>{{ $row->PATIENT_NAME }}</td>
            <td>{{ $row->RESULT_TEST_ID }}</td>
            <td>{{ $row->TIMESTAMP }}</td>


            <!-- Add more table cells as needed -->
        </tr>
        @endforeach
                </tbody>
                
              </table>