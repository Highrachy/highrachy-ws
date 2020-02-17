<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Highrachy : no dreams just Plans. ::.</title>
<link href="reset.css" rel="stylesheet" type="text/css" />
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
    <div id="header" align="center">
    	<div id="headerTop"></div>
        <div id="headerTopImage">
            <img src="Images/TopLeft.gif" alt="top left image" width="250" height="6" />
            <img src="Images/Highrachy-logo.png" alt="Highrachy logo" width="211" height="48" />
            <img src="Images/TopRight.gif" alt="Top right Image" width="250" height="6" />
        </div>
    </div>
    <!-- End of Header -->
        <div id="navigation">
            <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="About Us.php">About Us </a></li>
                <li><a href="Our Team.php"> Our Team </a></li>
                <li><a href="Our Services.php"> Our Services </a></li>
                <li><a href="PortFolio.php"> Portfolio </a></li>
                <li><a href="News.php"> News n New</a></li>
                <li><a href="#"><span class="selected"> Contact Us </span></a></li>
            </ul>  
        </div> 
        <!-- End of Navigation -->
        
        <div id="body">
            <div id="Welcome">
               <h2>WELCOME TO OUR WEBSITE...</h2>
                    HIGHRACHY intergrated technologies is a dynamicism that helps its clients achieve success on projects so that they can fully realize their expected business outcomes.
             </div>
             <!-- End of Welcome -->
             <div id="content">
                    <div id="contentLeft">
                        <h2 class="grayback">Project/Business<br />Management &amp; Consulting</h2>
                        <h2 class="grayback">Web Technologies &amp;<br />Software Packages</h2>
                        <h2 class="grayback">Computer Engineering &amp;<br />Networking</h2>
                        <span class="info"> For more information about <b id="highrachy">Highrachy intergrated technologies</b>
                                          download a copy of our company profile here...
                        </span>
                        <div id="ClickHere">
                            <div class="clickHere" style="float:left">
                              <p><img src="Images/clickHere.png" alt="Doc Version" width="36" height="36" /><br />
                                Click Here </p>
                            </div>
                            <div class="clickHere" style="float:right">
                                  <p><img src="Images/AdobeReader.png" alt="Adobe Reader Version" width="36" height="36" /><br />
                                    Click Here</p>
                            </div>
          		     	</div><!-- End of Click Here -->
                    </div><!-- End of Content Left-->
                    
                   <div id="contentAbout">
                       <span class="heading">Contact Us</span>
                       <div id="CenterBorder"> 
                           <div id="lightbackground"><span class="text finetune"><?php echo $_SESSION['Contact'] ?> </span></div>
                        </div>
                        <div id="music">
                            <form id="form1" name="ContactUsForm" method="post" action="sendMail.php">
                              <fieldset>
                                  <legend class="blue">Fill your Suggestions here</legend>
                                  <table width="400" border="0" align="left" cellpadding="3" cellspacing="0">
                                    <tr>
                                      <td align="right">Name</td>
                                      <td><input type="text" name="Name" id="Name" /></td>
                                    </tr>
                                    <tr>
                                      <td align="right">E-mail</td>
                                      <td><input type="text" name="Email" id="Email" /></td>
                                    </tr>
                                    <tr>
                                      <td align="right">Subject</td>
                                      <td><input type="text" name="Subject" id="Subject" /></td>
                                    </tr>
                                    <tr>
                                      <td align="right">Comments</td>
                                      <td><textarea name="Comments" cols="30" rows="5" id="Comments"></textarea></td>
                                    </tr>
                                    <tr>
                                      <td>&nbsp;</td>
                                      <td><input type="submit" name="submit" id="submit" class="btn red" value="Submit" />
                                          <input type="reset" name="button" id="button" class="btn red" value="Clear All" />
                                          </td>
                                    </tr>
                                  </table>
                              </fieldset>
                          </form>
                      </div>
				</div><!--End of Content About -->
                 
              </div><!--End of Content -->
              <div id="footer"><div id="dottedline"><?php include('includes/footer.inc.php'); ?></div></div>   
         </div>
         <!-- End of Body -->
</div>
<!-- End of Container -->
</body>
</html>
