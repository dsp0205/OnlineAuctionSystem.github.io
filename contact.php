<?php
include("header.php");
if(isset($_POST['submit']))
{
	include("contactphpmailer.php");
	$msg = "<b>Name : </b>" . $_POST['name'] ." " . $_POST['lastname'] ." <br><br>
	<b>Email : </b>" . $_POST['email'] . "<br><br>
	<b>Subject : </b>" . $_POST['subject'] . "<br><br>
	<b>message : </b>" . $_POST['message'] . "<br><br>
	";
	sendmail($emailid, $cstname , "Enquiry mail..", $msg);
	echo $otp;
}
?>
            
            <!-- breadcrumb-area start -->
            <div class="breadcrumb-area bg-gray">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="breadcrumb-list">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- breadcrumb-area end -->
            
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container-fluid  p-0">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <div class="contact-form-inner">
                                <h2>TELL US YOUR QUERY</h2>
                                <form method="POST" action="">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text" placeholder="First name*" name="name" required>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text"  placeholder="Last name*" name="lastname" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <input type="email"  placeholder="Email*" name="email" required>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <input type="text" placeholder="Subject*" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <textarea placeholder="Message *" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="contact-submit-btn">
                                        <button class="submit-btn" type="submit" name="submit">Send Email</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 plr-0">
                            <div class="contact-address-area">
                                <h2>CONTACT US</h2>
                                <ul>
                                    <li>
                                        <i class="fa fa-fax">&nbsp;</i> Registered Office : Regal Commercial Services, Flat No. 301, 3rd Floor, Unity Homes Bldg, Punjagutta, Hyderabad.India</li>
                                    <li>
                                        <i class="fa fa-phone">&nbsp;</i> info@haraaj.in</li>
                                    <li>
                                        <i class="fa fa-envelope-o"></i>&nbsp; +91-7893871573</li>
                                </ul>
                            </div>
                        </div>
						
						
                    </div>
					
					

                </div>
            </div>
            <!-- content-wraper end -->
            

<!-- footer-area start -->
<?php
include("footer.php");
?>
			