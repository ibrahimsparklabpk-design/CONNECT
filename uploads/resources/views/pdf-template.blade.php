<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Custom Orders</title>




    <!-- Theme Config Js -->


    <!-- App css -->
    <link href="assets/admin_deshboard/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link rel="stylesheet" href="assets/css/custom-orders.css">

</head>

<body>


    <div class="content-page">

        <div class="content">
            @foreach($products as $product)
            @php

            $productCustomerId = $product->customer_id;
            @endphp
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- ==========MyOwndashboard============== -->
                <!-- Main Section Starts-->
                <div class="cart-heading">

                    <p>Orders</p>

                </div>
                <div class="p-list-headings">
                    @foreach($customePayments as $customePayment)
                    @if($customePayment->customer_id == $productCustomerId)
                    <table>
                        <tr>
                            <td>
                                <div class="p-h">
                                    <p>Price:&nbsp;&nbsp;<br>{{ $customePayment->price }}</p>
                                </div>

                            </td>
                            <td>
                                <div class="p-h">
                                    <p>Quantity:&nbsp;&nbsp;<br>{{ $customePayment->total_quantity }}</p>
                                </div>


                            </td>
                            <td>
                                <div class="p-h">
                                    <p>Total Price:&nbsp;&nbsp;<br>{{ $customePayment->payment }}</p>
                                </div>


                            </td>
                        </tr>
                    </table>



                    @endif
                    @endforeach
                </div>


                <div class="content-area">
                    <div class="product-info">
                        <div class="img-div">
                            
                              <img src="{{ asset('storage/uploads/' . basename($product->custom_image)) }}" width="300" height="300">
                         
                        </div>
                        <div class="info-div">




                            <h3 class="t-headings">CUSTOM SOCCER JERSEY</h3>
                            <table>
                                <tr>
                                    <td>Sleeve Length:&nbsp;&nbsp; {{ $product->sleeve_length }}</td>
                                    <td>Team Logo:&nbsp;&nbsp; {{ $product->team_logo }}</td>
                                    <td>Collar Type:&nbsp;&nbsp; {{ $product->collar_type }}</td>
                                    <td>Kit:&nbsp;&nbsp; {{ $product->kit }}</td>
                                </tr>
                                <tr>
                                    <td>Fit Type:&nbsp;&nbsp;{{ $product->fit_type }}</td>
                                    <td>Inside Collar Message:&nbsp;&nbsp;{{ $product->inside_collar_message }}</td>
                                    <td>Your Collar Message:&nbsp;&nbsp;{{ $product->collar_text }}</td>
                                    <td>Add a Goalkeeper Kit?:&nbsp;&nbsp;{{ $product->goalkeeper_kit }}</td>
                                </tr>
                                <tr>
                                    <td>Padded:&nbsp;&nbsp;{{ $product->padded }}</td>
                                    <td>Goalkeeper Sleeve:&nbsp;&nbsp;{{ $product->goalkeeper_sleeve }}</td>
                                    <td>Goalkeeper Jersey
                                        Design:&nbsp;&nbsp;{{ $product->goalkeeper_jersey_design }}</td>
                                    <td>Jersey Color: &nbsp;&nbsp;{{ $product->jersey_color }}</td>
                                </tr>
                                <tr>
                                    <td>Staff/Other:&nbsp;&nbsp; {{ $product->staff_other }}</td>
                                    <td>Staff Kit:&nbsp;&nbsp;{{ $product->staff_kit }}</td>
                                    <td>Staff Collar Type:&nbsp;&nbsp;{{ $product->staff_collar_type }}</td>
                                    <td>Staff Fit Type:&nbsp;&nbsp;{{ $product->staff_fit_type }}</td>
                                </tr>
                            </table>


                            <div class="table-flex" style="display: block;">


                                <h3 class="t-headings">ROSTER INFORMATION</h3>
                                <div class="flex-container">


                                    <div class="roster-info">
                                        <h4 class="t-headings">KIT INFORMATION</h4>

                                        @foreach($sizeGuides as $sizeGuide)
                                        @if($sizeGuide->customer_id == $productCustomerId)
                                        <table>
                                            <tr>
                                                <td>Roster Name:&nbsp;&nbsp;{{ $sizeGuide->size_guide_name }}</td>
                                                <td>R-No:&nbsp;&nbsp;{{ $sizeGuide->size_guide_number }}</td>
                                                <td>R-Shirt Size:&nbsp;&nbsp;{{ $sizeGuide->size_guide_shirt_size }}
                                                </td>
                                                <td>R-Short Size:&nbsp;&nbsp;{{ $sizeGuide->size_guide_short_size }}
                                                </td>
                                                <td>Quantity:&nbsp;&nbsp;{{ $sizeGuide->size_guide_quantity }}
                                                </td>
                                            </tr>

                                        </table>
                                        @endif
                                        @endforeach

                                    </div>






                                    <div class="staff-info">
                                        <h4 class="t-headings">STAFF KIT INFORMATION</h4>
                                        @foreach($sizeStaffs as $sizeStaff)
                                        @if($sizeStaff->customer_id == $productCustomerId)
                                        <table>
                                            <tr>
                                                <td>Roster Name:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_name }}
                                                </td>
                                                <td>

                                                    Sleeves
                                                    Length:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_sleeves_length }}
                                                </td>
                                                <td>
                                                    Pants
                                                    Length:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_pants_length }}
                                                </td>

                                                <td>Shirt Size:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_shirt_size }}
                                                </td>
                                                <td>Pants Size:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_pants_size }}
                                                </td>
                                                <td>Quantity:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_quantity }}</td>
                                            </tr>



                                        </table>
                                        @endif
                                        @endforeach

                                    </div>

                                    <!-- payment table -->
                                    <div class="staff-info">
                                        <h4 class="t-headings">PAYMENT INFORMATION</h4>
                                        @foreach($customePayments as $customePayment)
                                        @if($customePayment->customer_id == $productCustomerId)
                                        <table>
                                            <tr>
                                                <h3>
                                                    Delivery
                                                </h3>
                                                <td>
                                                    Email:&nbsp;&nbsp;<br>{{ $customePayment->p_email }}
                                                </td>
                                                <td>

                                                    Country:&nbsp;&nbsp;<br>{{ $customePayment->delivery_country }}
                                                </td>
                                                <td>
                                                    First
                                                    name:&nbsp;&nbsp;<br>{{ $customePayment->delivery_first_name }}
                                                </td>

                                                <td>
                                                    Last
                                                    name:&nbsp;&nbsp;<br>{{ $customePayment->delivery_last_name }}
                                                </td>

                                            </tr>
                                            <tr>

                                                <td>
                                                    Company:&nbsp;&nbsp;<br>{{ $customePayment->delivery_company }}
                                                </td>
                                                <td colspan="2">
                                                    Address:&nbsp;&nbsp;<br>{{ $customePayment->delivery_address }}
                                                </td>
                                                <td>
                                                    Apartment:&nbsp;&nbsp;<br>{{ $customePayment->delivery_apartment }}
                                                </td>


                                            </tr>
                                            <tr>
                                                <td>
                                                    City:&nbsp;&nbsp;<br>{{ $customePayment->delivery_city }}
                                                </td>
                                                <td>
                                                    State:&nbsp;&nbsp;<br>{{ $customePayment->delivery_state }}
                                                </td>

                                                <td>
                                                    ZIP
                                                    code:&nbsp;&nbsp;<br>{{ $customePayment->delivery_zip_code }}
                                                </td>
                                                <td>
                                                    Phone:&nbsp;&nbsp;<br>{{ $customePayment->delivery_phone }}
                                                </td>
                                            </tr>

                                        </table>
                                        <table>
                                            <tr>
                                                <h3>
                                                    Payment
                                                </h3>
                                                <td>

                                                    Account Holder
                                                    Name:&nbsp;&nbsp;<br>{{ $customePayment->account_holder_name }}
                                                </td>
                                                <td>

                                                    Price:&nbsp;&nbsp;<br>{{ $customePayment->price }}
                                                </td>
                                                <td>
                                                    Quantity:&nbsp;&nbsp;<br>{{ $customePayment->total_quantity }}
                                                </td>

                                                <td>
                                                    Total
                                                    Price:&nbsp;&nbsp;<br>{{ $customePayment->payment }}
                                                </td>

                                            </tr>


                                        </table>

                                        <table>
                                            <tr>
                                                <h3>
                                                    Billing Address
                                                </h3>
                                                <td>
                                                    First
                                                    name:&nbsp;&nbsp;<br>{{ $customePayment->billing_first_name }}
                                                </td>
                                                <td>

                                                    Last
                                                    name:&nbsp;&nbsp;<br>{{ $customePayment->billing_last_name }}
                                                </td>
                                                <td colspan="2">
                                                    Address:&nbsp;&nbsp;<br>{{ $customePayment->billing_address }}
                                                </td>



                                            </tr>
                                            <tr>

                                                <td>
                                                    Apartment:&nbsp;&nbsp;<br>{{ $customePayment->billing_apartment }}
                                                </td>
                                                <td>

                                                    City:&nbsp;&nbsp;<br>{{ $customePayment->billing_city }}
                                                </td>
                                                <td>


                                                    State:&nbsp;&nbsp;<br>{{ $customePayment->billing_state }}
                                                </td>

                                                <td>


                                                    ZIP code:&nbsp;&nbsp;<br>{{ $customePayment->billing_zip_code }}
                                                </td>



                                            </tr>


                                        </table>
                                        @endif
                                        @endforeach


                                    </div>
                                    <!-- end payment table -->
                                </div>

                                <!-- <p class="R-delievery-p">RUSH DELIVERY: No</p> -->
                            </div>

                        </div>
                    </div>




                </div>
                <br>


            </div>
            @endforeach








        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
</body>

</html>