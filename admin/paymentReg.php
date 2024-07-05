<?php
include("header.php");


?>


<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <!-- <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
        
    </div> -->
    <h1 style="text-align: center;color:  #5b7c99; ">Customer Payment Register Form</h1>
    <form action="" method="">
        <div class="form-group  ">
            <label for="firstName">Customer Name</label>
            <input id="firstName" class="form-control" type="text" name="firstName">
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="phone">Phone no</label>
                <input id="phone" class="form-control" type="text" name="phone">
            </div>

            <div class="form-group col-6">
                <label for="userImg">Your image</label>
                <input id="userImg" class="form-control" type="file" name="userImg">
            </div>
        </div>
        <div class="form-group ">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" required name="email">
        </div>




        <div class="form-group">
            <label for="bank">Bank account</label>
            <input id="bank" class="form-control" type="text" name="bank" placeholder="FXO-193432">
        </div>
        <input id="payment" class="form-check-input" type="checkbox" name="" value="kpay">
        <label for="payment" class="form-check-label">Kbzpay</label>
        <input id="payment" class="form-check-input" type="checkbox" name="" value="kpay">
        <label for="payment" class="form-check-label">Wavepay</label>
        <input id="payment" class="form-check-input" type="checkbox" name="" value="kpay">
        <label for="payment" class="form-check-label">Ayapay</label>
        <br /><br />


        <button class="btn btn-primary" style="margin-left: 15px;" type="submit">Register</button>



    </form>
</div>
<!-- Blank End -->


<?php
include("footer.php");

?>