 @extends('backend.layout.master')

 @section('main-content')
     <style>
         .team-form-container {
             margin-top: 20px;
             overflow-x: auto;
         }

         .team-roster-table {
             width: 100%;
             border-collapse: collapse;
             font-family: 'Poppins', sans-serif;
             background: #fff;
             border-radius: 10px;
             overflow: hidden;
             box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
         }

         .team-roster-table thead {
             background: #007bff;
             color: #fff;
             text-align: center;
         }

         .team-roster-table th,
         .team-roster-table td {
             padding: 12px 15px;
             text-align: center;
             border-bottom: 1px solid #ddd;
             vertical-align: middle;
         }

         .team-roster-table tbody tr:nth-child(even) {
             background: #f9f9f9;
         }

         .team-roster-table tbody tr:hover {
             background: #eef5ff;
         }

         /* Input & Select Styling */
         .team-roster-table input[type="text"],
         .team-roster-table input[type="number"],
         .team-roster-table select {
             width: 100%;
             padding: 8px 10px;
             border: 1px solid #ccc;
             border-radius: 6px;
             font-size: 14px;
             outline: none;
             transition: all 0.3s ease;
         }

         .team-roster-table input:focus,
         .team-roster-table select:focus {
             border-color: #007bff;
             box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
         }

         /* Responsive for mobile */
         @media (max-width: 768px) {
             .team-roster-table thead {
                 display: none;
             }

             .team-roster-table,
             .team-roster-table tbody,
             .team-roster-table tr,
             .team-roster-table td {
                 display: block;
                 width: 100%;
             }

             .team-roster-table tr {
                 margin-bottom: 15px;
                 border: 1px solid #ddd;
                 border-radius: 8px;
                 padding: 10px;
             }

             .team-roster-table td {
                 text-align: left;
                 padding: 10px 5px;
                 border: none;
             }

             .team-roster-table td:before {
                 content: attr(data-label);
                 font-weight: 600;
                 display: block;
                 margin-bottom: 5px;
                 color: #007bff;
             }
         }
     </style>


     <style>
         .team-form-container {
             margin-top: 20px;
             overflow-x: auto;
         }

         .team-roster-table {
             width: 100%;
             border-collapse: collapse;
             font-family: 'Poppins', sans-serif;
             background: #fff;
             border-radius: 10px;
             overflow: hidden;
             box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
         }

         .team-roster-table thead {
             background: #007bff;
             color: #fff;
             text-align: center;
         }

         .team-roster-table th,
         .team-roster-table td {
             padding: 12px 15px;
             text-align: center;
             border-bottom: 1px solid #ddd;
             vertical-align: middle;
         }

         .team-roster-table tbody tr:nth-child(even) {
             background: #f9f9f9;
         }

         .team-roster-table tbody tr:hover {
             background: #eef5ff;
         }

         .team-roster-table input[type="text"],
         .team-roster-table input[type="number"],
         .team-roster-table select {
             width: 100%;
             padding: 8px 10px;
             border: 1px solid #ccc;
             border-radius: 6px;
             font-size: 14px;
             outline: none;
             transition: all 0.3s ease;
         }

         .team-roster-table input:focus,
         .team-roster-table select:focus {
             border-color: #007bff;
             box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
         }
     </style>


    <div class="main-section text-center">
    <p class="size-guide text-center"><i class="fa-solid fa-ruler"></i> Player Information</p>


    <form action="{{ route('player.store') }}" method="POST" class="d-flex justify-content-center">
        @csrf

        <!-- Center Wrapper -->
        <div class="team-form-container w-75"> {{-- yahan width control kar sakte ho (w-50 / w-75) --}}
            <table class="table table-bordered team-roster-table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Number</th>
                        <th>Shirt Size</th>
                        <th>Short Size</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="details-wrapper">
                    <tr class="detail-row">
                        <td><div class="form-group mb-3">
    <label for="soccer_id">Select Soccer Record</label>
    <select name="soccer_id" id="soccer_id" class="form-control" required>
        <option value="">-- Select Soccer --</option>
        @foreach ($soccers as $soccer)
            <option value="{{ $soccer->id }}">
                {{ strtoupper($soccer->fit_type) }} - {{ strtoupper($soccer->kit_type) }} - {{ strtoupper($soccer->collar_type) }}
            </option>
        @endforeach
    </select>
</div></td>
                        <td><input type="text" name="name[]" class="form-control" placeholder="Enter name" required></td>
                        <td><input type="number" name="number[]" class="form-control" placeholder="0" min="1" required></td>
                        <td>
                            <select name="shirt_size[]" class="form-control" required>
                                <option value="">Select</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                            </select>
                        </td>
                        <td>
                            <select name="short_size[]" class="form-control" required>
                                <option value="">Select</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                            </select>
                        </td>
                        <td><input type="number" name="quantity[]" class="form-control" value="1" min="1" required></td>
                        <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>
                    </tr>
                </tbody>
            </table>

            <button type="button" id="addRow" class="btn btn-primary">+ Add Player</button>

            <div class="btn_box mt-3 text-center">
                <button type="submit" class="addtocart_btn btn btn-success">Add to cart</button>
            </div>
        </div>
    </form>
</div>


 @endsection


 @section('script')
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             const wrapper = document.getElementById("details-wrapper");
             const addRowBtn = document.getElementById("addRow");

             // Add Row
             addRowBtn.addEventListener("click", function() {
                 const newRow = document.createElement("tr");
                 newRow.classList.add("detail-row");

                 newRow.innerHTML = `
            <td><input type="text" name="name[]" class="form-control" placeholder="Enter name" required></td>
            <td><input type="number" name="number[]" class="form-control" placeholder="0" min="1" required></td>
            <td>
                <select name="shirt_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                </select>
            </td>
            <td>
                <select name="short_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                </select>
            </td>
            <td><input type="number" name="quantity[]" class="form-control" value="1" min="1" required></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>
        `;

                 wrapper.appendChild(newRow);
             });

             // Remove Row
             wrapper.addEventListener("click", function(e) {
                 if (e.target && e.target.classList.contains("remove-row")) {
                     e.target.closest("tr").remove();
                 }
             });
         });
     </script>
 @endsection
