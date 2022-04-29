<?php
include("header.php");
?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">How It Works</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper mt-95">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-6">
                            <div class="about-us-img">
                                <img alt="" src="images/online-auction.jpg">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-info-wrapper">
                                                     <h1style="font-size:60">How It Works</h1>
                                                    
        
<Li> </Li>
<Li> </Li>

<h2>User Registration</h2>

<p> 1.	User visits Haraaj.in Website. </p>
<p> 2.	User Registers himself/Herself on Homepage by providing basic information such as: User Name (Mandatory), Mobile No. (Mandatory), Email ID (Optional), and desired secured Password. </p>
<p> 3.	User receives OTP on his mobile or Email ID. User enters OTP on Haraaj.in for verification. </p>
<p> 4.	After successful verification, User Account is activated. </p>
<p> 5.	User can now Sell or Bid for any product. </p>
<p> 6.	IMPORTANT: Registered Users who intends to Sell or Bid for a product has to provide their Bank Account No. & IFSC Code & Physical Address in order to facilitate Payments, Refunds & Product Deliveries. This information will not be disclosed to any other User. It will be kept confidential & secured by Haraaj.in </p>
<Li> </Li>

<h2>Bidding</h2>

<p> 1.	Registered User who has a product to sell under given categories, can post their product along with Images, Videos, Title & Description. </p>
<p> 2.	Seller will define Minimum Bid Price & Increment Amount thereof. Seller also specifies Bidding End Time. </p>
<p> 3.	After successfully posting the Product for Auction, other Registered Users can bid for that particular product. </p>
<p> 4.	The Registered User who bids the highest price for the product by closing time is declared Winner by Haraaj.in. </p>
<Li> </Li>
<h2>Payment & Delivery</h2>
<p> 1.	The Highest Bidder then proceeds to pay the Bidding Amount through Secured Payment Gateway to Haraaj.in. </p>
<p> 2.	After successful payment, Haraaj.in informs the Seller that the payment is received, and the Seller can now ship the product to the Buyer. </p>
<p> 3.	Haraaj.in’s integrated Delivery Provider collects the product from the Seller and delivers it to the Buyer. The same is updated on Haraaj.in through Third Party Delivery Integration. </p>
<p> 4.	After successful delivery of the product to the Buyer, Haraaj.in credits the Bank Account of the Seller. </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            
            <div class="project-count-area bg-gray pt-80 pb-50 mt-95">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-count text-center mb-30">
                                <div class="count-icon">
                                    <span class="ion-ios-briefcase-outline"></span>
                                </div>
                                <div class="count-title">
                                    <h2 class="count">
<?php 
$sql ="SELECT * FROM customer";
$qsql = mysqli_query($con,$sql);
echo  mysqli_num_rows($qsql); 
?>
									</h2>
                                    <span>Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-count text-center mb-30">
                                <div class="count-icon">
                                    <span class="ion-ios-wineglass-outline"></span>
                                </div>
                                <div class="count-title">
                                    <h2 class="count"><?php 
$sql ="SELECT * FROM product";
$qsql = mysqli_query($con,$sql);
echo  mysqli_num_rows($qsql); 
?></h2>
                                    <span>Auction Products</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-count text-center mb-30">
                                <div class="count-icon">
                                    <span class="ion-ios-lightbulb-outline"></span>
                                </div>
                                <div class="count-title">
                                    <h2 class="count"><?php 
$sql ="SELECT * FROM bidding";
$qsql = mysqli_query($con,$sql);
echo  mysqli_num_rows($qsql); 
?></h2>
                                    <span>biddings</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-count text-center mb-30">
                                <div class="count-icon">
                                    <span class="ion-happy-outline"></span>
                                </div>
                                <div class="count-title">
                                    <h2 class="count"><?php 
$sql ="SELECT * FROM winners";
$qsql = mysqli_query($con,$sql);
echo  mysqli_num_rows($qsql); 
?></h2>
                                    <span>Winners</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
<?php
include("footer.php");
?>