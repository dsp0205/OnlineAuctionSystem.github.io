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
                                <li class="breadcrumb-item active">About us</li>
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
                                <h2>About Us</h2>
                                
                                
</div>
                        </div>
<p>At our open-house trading platform, the Registered Users can easily post their used personal items (such as Used Watches, Used Apparels, Used Computers & other Used Electronic Products, etc. for auction; and can fetch good price from their personal items through our e-auction module which is dynamic, user-friendly, transparent, and gives you a 100% secured access.</p>
<p>We, REGAL COMMERCIAL SERVICES® act only as a facilitator (or Auctioneer) in bringing both Buyer & Seller together in selling & purchasing used personal items in a transparent & legal manner.</p>

<h3>Our Values</h3>
<p>Our greatest asset is the reputation we have built over the years in terms of reliability, integrity, transparency, trust, and excellence in the auctioning services. We aim to fulfil our commitment and provide first-rate customer service.</p>

<h3>Our Vision</h3>
<p>After establishing a strong foot at national front, we aim to build a global network; thus, providing a reliable online platform to Sellers & Buyers from all across India. On establishing a secure base, we ensure to manage all sorts of auctioning activities be it small or major. Our main objective is bringing ease to our clients such that auctioning is not a burden for common person and bidding is not a matter of risk for anyone across the Nation. </p>

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