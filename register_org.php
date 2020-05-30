<?php

session_start();
error_reporting(0);
if($_SESSION['loggedin'] == TRUE)
{
  header("location: login.php");
  exit();
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
     <!-- <link rel="stylesheet" type="text/css" href="css/register_css.css"> -->
    <link href="assets/css/style.css" rel="stylesheet" />
    </head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <a class="navbar-brand" href="index.php"><img class="logo-custom" src="assets/img/logo180-50.png" alt="Sparks Education Point"  /></a> -->
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right" >
                  <li ><a href="index.php">HOME</a></li>
                  <li><a href="register.php">Student Register</a></li>
                  <li><a href="login.php">Verify Registration</a></li>
                  <li><a href="index.php">Courses</a></li>
                  <li><a href="result_view.php">View Result</a></li>                     
                  <li><a href="index.php">CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>

<form class="form-horizontal" method="POST" action="pay.php" enctype="multipart/form-data" style="margin-left:220px; width: 950px;">
    <fieldset>
    <!-- Form Name -->
    <h2 style="margin-left: 200px; font-family: 'Verdana, sans-serif' ">REGISTRATION APPLICATION FORM</h2>
    <hr>
    <!-- Branch -->
    <h4 style="margin-left: 300px;">&nbsp;&nbsp;&nbsp; Registration Details / पंजीयन का विवरण <span style="color:red">*</span></h4>
    <hr>
    
    <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Course</label>
            <div class="col-md-4">
              <select id="selectbasic" name="course" class="form-control">
                <option data-value='{"course": "ADCA Diploma (1 year)", "fee":"90000" }'>ADCA Diploma (1 year)</option>
                <option data-value='{"course": "DOAP Diploma (1 year)", "fee":"4230" }'>DOAP Diploma (1 year)</option>
                <option data-value='{"course": "DCP (6 month)", "fee":"2" }'>DCP (6 Month)</option>
                <option data-value='{"course": "DTP Short Term (3 month)", "fee":"2300" }'>DTP Short Term (3 months)</option>
              </select>
            </div>
          </div>

    <div class="form-group">
            <label class="col-md-4 control-label" for="selectbasic">Branch Code</label>
            <div class="col-md-4">
              <select id="branch_code" name="branch_code" class="form-control">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
               </select>
             </div>
     </div>
          <!-- Fee -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="selectbasic">Fee</label>
                <div class="col-md-4">
                    <input type="number" class="form-control" id="Price" name="amount" readonly>
                </div>
            </div>
           
    
          <!-- /Fee -->
     <!-- Select Basic -->
    <hr>
    <h4>&nbsp;&nbsp;&nbsp; Applicant's Personal Details /आवेदक का व्यक्तिगत विवरण<span style="color:red">*</span></h4>
    <hr>


    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="name">Applicant's full name / आवेदक का पूरा नाम </label>  
      <div class="col-md-4">
      <input id="name" name="name" type="text" maxlength="30" placeholder="Your Full Name" class="form-control input-md" pattern=".{4,}" required title="4 characters minimum">
      </div>
    </div>
    
   
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="father">Father's Name / पिता का नाम </label>  
      <div class="col-md-4">
      <input id="father" name="fathername" type="text" maxlength = "30" placeholder="Your Fathers Name" class="form-control input-md" pattern=".{5,}" required title="5 characters minimum">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="mother">	Mother's Name / माता का नाम </label>  
      <div class="col-md-4">
      <input id="mother" name="mothername" type="text" maxlength = "30" placeholder="Your Mother's Name" class="form-control input-md" pattern=".{5,}" required title="5 characters minimum">
        
      </div>
    </div>
    
    <!-- Multiple Radios -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="gender">Gender / लिंग</label>
      <div class="col-md-4">
      <div class="radio">
        <label for="gender-0" style="margin-left: -25px!important;">
          <input type="radio" name="gender" id="gender-0" value="Male" checked="checked" style="margin-left: -200px!important;"required>
          Male
        </label>
        </div>
      <div class="radio">
        <label for="gender-1" style="margin-left: -25px!important;">
          <input type="radio" name="gender" id="gender-1" value="Female" style="margin-left: -200px!important;" required>
          Female
        </label>
        </div>
      </div>
    </div>
    
    <div>
      <label class="col-md-4 control-label" for="dob">Date of Birth / जन्म दिनांक</label>  
      <input type="date" id="date" name="dob" required>
  </div>
<br/>
<!-- Select Basic -->
<div class="form-group">
        <label class="col-md-4 control-label" for="martial">Marital Status / वैवाहिक स्थिति</label>
        <div class="col-md-4">
          <select id="martial" name="martial" class="form-control">
            <option value="Married">Married</option>
            <option value="Unmarried">Unmarried</option>
          </select>
        </div>
      </div>
      
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="category">Category / वर्ग</label>
        <div class="col-md-4">
          <select id="category" name="category" class="form-control">
            <option value="GEN">GEN</option>
            <option value="SC">SC</option>
            <option value="OBC">OBC</option>
            <option value="OTHER">OTHER</option>
          </select>
        </div>
      </div>
      
      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="religion">Religion / धर्म</label>
        <div class="col-md-4">
          <select id="religion" name="religion" class="form-control">
            <option value="Hinduism">Hinduism</option>
            <option value="Islam">Islam</option>
            <option value="Jainism">Jainism</option>
            <option value="Sikhism">Sikhism</option>
            <option value="Buddhism">Buddhism</option>
            <option value="Other">Other</option>
          </select>
        </div>
      </div>

      <div id ="contact">
    <hr>
        <h4 style="margin-left: 300px;">&nbsp;&nbsp;&nbsp; Contact Details / संपर्क विवरण<span style="color:red">*</span></h4>
      <hr>

    </div>
    <div class="form-group">
            <label class="col-md-4 control-label" for="addr">Address Line/ पता पंक्ति</label>  
            <div class="col-md-4">
            <input id="addr" name="addr" type="text" maxlength = "100" placeholder="Address" class="form-control input-md" pattern=".{30,}" required title="30 characters minimum">
            <span class="help-block">Max Length 100 Characters.</span>  
            </div>
            </div>
    </div>
    <div class="form-group">
            <label class="col-md-4 control-label" for="addr">City Name / शहर का नाम</label>  
            <div class="col-md-4">
            <input id="city" name="city" type="text" maxlength = "100" placeholder="City Name" class="form-control input-md" pattern=".{5,}" required title="5 characters minimum">
            <span class="help-block">Max Length 100 Characters.</span>  
            </div>
            </div>
    </div>
        <!-- Text input-->
        <div class="form-group">
                        <label class="col-md-4 control-label" for="number">Mobile Number / मोबाइल नंबर</label>  
                        <div class="col-md-4">
                        <input id="number" name="number" type="text" maxlength = "11" placeholder="Your Mobile No." class="form-control input-md" pattern=".{10,}" required title="10 characters minimum">
                        <span class="help-block">e.g. 09876543210 </span>  

                        </div>
                        </div>
          
          <div id ="education">
                <hr>
                <h4>&nbsp;&nbsp;&nbsp; Educational / Qualification Details / शैक्षिक / योग्यता का विवरण <span style="color:red">*</span></h4>
                <hr>
            </div>
            <div class="form-group">
                    <label class="col-md-4 control-label" for="qualification">Highest Educational Qualification / उच्चतम शैक्षिक योग्यता </label>  
                    <div class="col-md-4">
                    <input id="qualification" name="qualification" type="text" maxlength = "50" placeholder="" class="form-control input-md" pattern=".{3,}" required title="3 characters minimum">
                    </div>
                  </div>
                  
                  <!-- Text input -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="year">Year of Passing / उत्तीर्ण वर्ष </label>  
                    <div class="col-md-4">
                    <input id="year" name="yearofp" type="date" placeholder="Your Last Qualification Passing Date." class="form-control input-md" pattern=".{4,}" required title="4 characters minimum">
                    </div>
                  </div>
                  
                  <div id ="identification">
                      <hr>
                        <h4 style="margin-left: 300px;">&nbsp;&nbsp;&nbsp; Identification Details / पहचान की सूचना <span style="color:red">*</span></h4>
                      <hr>
                  </div>

                  <div class="form-group">
                        <label class="col-md-4 control-label" for="aadhar">	Aadhar Card Number / आधार कार्ड संख्या</label>  
                        <div class="col-md-4">
                        <input id="aadhar" name="aadhar" type="text" maxlength= "30" placeholder="Aadhar Card No." class="form-control input-md" pattern=".{8,}" required title="8 characters minimum">
                        </div>
                  </div>
                      
                      <!-- File Button -->
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="signature">Upload Signature / हस्ताक्षर अपलोड करें</label>
                        <div class="col-md-4">
                          <input id="signature" name="signature" class="input-file" type="file" required>
                        <span class="help-block">e.g. signature.jpg (file under 100kb) </span>  
                        </div>
                      </div>
                      
                      <!-- File Button --> 
                      <div class="form-group">
                        <label class="col-md-4 control-label" for="photo">Upload Photo / फोटो अपलोड करें *</label>
                        <div class="col-md-4">
                          <input name="image" id="image" class="input-file" type="file" required>
                        <span class="help-block">e.g. photo.jpg (file under 100kb)</span>
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for="number">Password</label>  
                        <div class="col-md-4">
                        <input id="password" name="password" type="password" placeholder="Your Password" class="form-control input-md" pattern=".{3,}" required title="6 characters minimum">

                          </div>
                        </div>
                            
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="number">Re-enter Password</label>  
                        <div class="col-md-4">
                        <input id="password" name="pass" type="password" placeholder="Your Password" class="form-control input-md" pattern=".{3,}" required title="6 characters minimum">
                          </div>
                        </div>
                      
                      <div id ="note">
    <hr>

                            <h4 class="danger">&nbsp; &nbsp; <span style="color:red">*</span>Note: Please Check All The Details Before Final Submission.<span style="color:red">*</span></h4>
    <hr>

                        </div>
            </fieldset>
            <button type="submit" id="submit" class="btn btn-primary">Pay Fee</button>
        </form>
        <div style="width:1528px; margin-left:-110px; " id="footer">

            <a href="https://portala.info" style="color: #ffff;" target="portala.info">Website By Portala Inc. COPYRIGHT © PORTALA INC. | World Fastest Online IDE</a>
      
      </div>
    </body>

</html>
    <style>
    .form-horizontal{
    padding-top: 70px;
    }
    body{
    background-color: #31597C;
    }
    #submit{
      margin-top: 30px;
      margin-left: 380px;
    }
    fieldset{
      background-color: lightblue;
      border-radius: 5px;
    }
#date{

-webkit-width: 300px;
-moz-height: 300px;
-moz-height: 100px;
}

h4{
  margin-left: 200px;
}
 
 select{
   width: 600px!important;
 }
 input{
   width: 600px!important;
 }
 label{
  margin-left: 100px;
 }
 
    </style>

<!-- Fee Show -->
<script>
        $('#selectbasic').change(function () {
            var option_value = $(this).val();
            $('#Price').val(option_value);
        });

</script>

<script>
$("#selectbasic").change(function(){
  var option_value = $(this).val();
    $('#Price').val($(this).find(":selected").data("value").fee);
});
</script>