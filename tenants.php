<?php $title = "contact";

$script = false;
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
require('functions/form.php');
require('functions/validation.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$list_of_properties = [
  '5-apartment-units' => [
    'name' => '5 Apartment Units',
    'description' => '4 units of 2-bedroom apartments and 1 unit of 1-bedroom apartment',
    'address' => '12 Toyin Adefala street, Oke Ire Nla, Ajah.',
  ],
  'blissville-uno' => [
    'name' => 'Blissville Uno',
    'description' => '4 units of 4-bedroom maisonettes and 8 units of 3-bedroom apartments',
    'address' => 'Blissville Apartments, Prince Kemi Olusesi street, off Dreamworld Africana Way.',
  ],
  'block-of-flats' => [
    'name' => 'A block of flats with BQ',
    'description' => '2 units of 2-bedroom apartments (1 bathrrom, 2 toilets), 1 unit of 1- bedroom apartment and 1 BQ',
    'address' => '6, Segun Sodiya drive, Thomas Estate, (TERRA HAVEN), Ajah.',
  ],


];

if (isset($_GET['type'])){
  $key = strtolower($_GET['type']);
} else {
  // $errors[] = 'Invalid Property Type is not specified';
  $key =  key($list_of_properties);
}

if (isset($key) && (array_key_exists($key, $list_of_properties))){
  $property = $list_of_properties[$key];
} else {
  // $errors[] = 'Property Type is not specified';
  $key = key($list_of_properties);
  $property = $list_of_properties[$key];
}


//Add a new Testimonial
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $data = $errors = array();



  # -- Tenant Full Name
  $data['tenant_full_name'] = assign('tenant_full_name','req','Please enter a valid Full Name');

  # -- Title
  $data['title'] = assign('title','req','Please enter a valid Title');

  # -- First Name
  $data['first_name'] = assign('first_name','minlen=3','Please enter a valid First Name');

  # -- Middle Name
  if (exists('middle_name')){
    $data['middle_name'] = assign('middle_name','minlen=3','Please enter a valid Middle Name');
  }

  # -- Last Name
  $data['last_name'] = assign('last_name','minlen=3','Please enter a valid Last Name');

  # -- Mobile
  $data['mobile'] = assign('mobile','range=6-14','Please enter a valid Mobile Number');

  # -- Home Telephone
  if (exists('home_telephone')){
    $data['home_telephone'] = assign('home_telephone','range=6-14','Please enter a Home Phone Number');
  }
  # -- Personal Email
  $data['personal_email'] = assign('personal_email','email','Please enter a valid Personal Email');

  # -- Work Email
  if (exists('work_email')){
    $data['work_email'] = assign('work_email','email','Please enter a valid Work Email');
  }

  # -- BVN
  if (exists('bvn')) {
    $data['bvn'] = assign('bvn','minlen=11','BVN should be 11 digits');
    $data['bvn'] = assign('bvn','maxlen=11','BVN should be 11 digits');
  }

  # -- Identification Type
  $data['id_type'] = assign('id_type','req','Please select an identification type');

  # -- Identification Number
  $data['id_no'] = assign('id_no','req','Please enter a valid identification number');

  # -- Current Address
  $data['current_address'] = assign('current_address','minlen=5','Please enter a valid Address');

  # -- PostCode
  if (exists('postcode')){
    $data['postcode'] = assign('postcode','req','Please enter a valid Postcode');
  }

  # -- Time at Address
  if (exists('time_at_address')){
   $data['time_at_address'] = assign('time_at_address','req','Please enter a valid Time at Address');
  }

  # -- State of Origin
  if (exists('state_of_origin')) {
    $data['state_of_origin'] = assign('state_of_origin','req','Enter your State of Origin');
  }

  # -- Marital Status
  $data['marital_status'] = assign('marital_status','req','Select your Marital Status');

  # -- Date of Birth
  $data['day_of_birth'] = assign('day_of_birth','req','Select your Day of Birth');
  $data['month_of_birth'] = assign('month_of_birth','req','Select your Month of Birth');
  $data['year_of_birth'] = assign('year_of_birth','req','Select your Year of Birth');

  # -- Previous Employment
  $data['previous_employment'] = assign('previous_employment','req','Please enter a valid details of your previous employment');

  # -- Emerency Contact Full Name
  $data['emergency_contact_full_name'] = assign('emergency_contact_full_name','req','Please enter a valid emergency contact full name');

  # -- Emerency Contact Relationship
  $data['emergency_contact_relationship'] = assign('emergency_contact_relationship','req','Please enter a valid emergency contact relationship');

  # -- Emerency Contact Telephone 1
  $data['emergency_contact_telephone_1'] = assign('emergency_contact_telephone_1','req','Please enter a valid emergency contact telephone 1');

  # -- Emerency Contact Telephone 2
  if (exists('emergency_contact_telephone_2')) {
    $data['emergency_contact_telephone_2'] = assign('emergency_contact_telephone_2','req','Please enter a valid emergency contact telephone 2');
  }

  # -- Emerency Contact Email
  $data['emergency_contact_email'] = assign('emergency_contact_email','req','Please enter a valid emergency contact email');

  # -- Emerency Contact Address
  $data['emergency_contact_address'] = assign('emergency_contact_address','req','Please enter a valid emergency contact address');



	if (empty($errors)) { // If everything's OK...
    // Add property information
    $data['property_name'] = $property['name'];
    $data['property_address'] = $property['address'];
    $data['property_description'] = $property['description'];
    // $name = $data['tenant_full_name'];
    // $subject = "Tenant Application Form ($name)";
		// $ourEmail = "haruna@highrachy.com";

    // $body = "";
    // foreach ($data as $key => $value) {
    //   $body .= "<strong>".$key."</strong>: ".$value."\n";
    // }

		//Send the message to us
		// $headers = "From: {$name}\r\nReply-To: {$ourEmail}\r\n";
		// mail($ourEmail, $subject, $body,$headers);


    $value = $db->insert_query("tenants",$data);

    if ($value >= 1) { // If it ran OK.

      $_POST = array();
      $data = array();
      $success = "Your tenancy form has been submitted successfully";
    } else { // If it did not run OK.
      trigger_error('You could not be registered due to a system error. We apologize for any inconvenience.');
    }
  }
}


 ?>
<?php include('includes/header2.inc.php'); ?>
     </div>
     <!--End of Top Container-->

     <section>
     	<div class="container">
            <div id="content" class="row">
                <?php include('includes/breadcrumb2.inc.php'); ?>
                <div class="maincontent content-padding">

                <div class="row">
                  <div class="col-sm-12">
                    <h2>TENANT APPLICATION FORM</h2>
                    <?php alert() ?>

                    <div class="lead font-weight-bold">
                    Thank you for your request to rent one of our properties. The process to secure the flat/house is as follows:
                    </div>

                    <ol>
                      <li>A <strong>holding deposit</strong> of ₦50, 000 should be paid to Highrachy Investment and Technology Limited, at the time of application. This will enable us to take the property off the market and commence credit and reference checks. The holding deposit can be refunded should you fail these checks.</li>
                      <li>After deposit, complete the below application and return to us as soon as possible to info@highrachy.com along with a photo ID such as International passport photo or driver’s license. If you are applying as a Non-Nigerian, we will need a passport and copies of residency visas as appropriate.</li>
                      <li>Once the checks are completed to and approved by the landlord, we will proceed to lease signing.</li>
                      <li>The amount of the rent (less the holding deposit of ₦50, 000) will then be due immediately and the first year’s rent is payable on or before the lease start date.</li>
                    </ol>

                    <p class="">Please also be aware that the rent due date will be the lease start date.</p>
                  </div>

                  <div id="contact" class="col-sm-12">

                        <div id="message"></div>
                        <form class="form-horizontal form-overwrite" method="post">

                        <h3 class="mt-30 text-red">Property Details</h3>

                        <label class="control-label">Property Name:</label>
                        <p class="lead font-weight-bold"><?php echo $property['name'] ?></p>

                        <label class="control-label">Address of Property:</label>
                        <p class="lead font-weight-bold"><?php echo $property['address'] ?></p>

                        <label class="control-label">Description:</label>
                        <p class="lead font-weight-bold"><?php echo $property['description'] ?></p>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="tenant_full_name" class="control-label">Tenant's Full Name *</label>
                              <?php Text('tenant_full_name','','class="form-control" placeholder="Enter tenant`s full name"') ?>
                              <?php show_errors('tenant_full_name') ?>
                            </div>
                          </div>

                          <p class="text-small mb-15 text-muted">
                            Note that the individual whose information is filled herein will be responsible for making all payments (including rent, Service charges and levies). Kindly specify if the property will be occupied by multiple persons and specify the number and provide details of other occupants in the space provided below.
                          </p>


                          <div class="form-group">
                            <div class="col-sm-6">
                              <label for="title" class="control-label">Title *</label>
                              <?php Text('title','','class="form-control" placeholder="Enter your title"') ?>
                              <?php show_errors('title') ?>
                            </div>
                            <div class="col-sm-6">
                              <label for="first_name" class="control-label">First Name *</label>
                              <?php Text('first_name','','class="form-control" placeholder="Enter your first name"') ?>
                              <?php show_errors('first_name') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-6">
                              <label for="middle_name" class="control-label">Middle Name</label>
                              <?php Text('middle_name','','class="form-control" placeholder="Enter your middle name"') ?>
                              <?php show_errors('middle_name') ?>
                            </div>
                            <div class="col-sm-6">
                              <label for="last_name" class="control-label">Last Name *</label>
                              <?php Text('last_name','','class="form-control" placeholder="Enter your last name"') ?>
                              <?php show_errors('last_name') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-6">
                              <label for="mobile" class="control-label">Mobile Telephone *</label>
                              <?php Text('mobile','','class="form-control" placeholder="Enter your mobile"') ?>
                              <?php show_errors('mobile') ?>
                            </div>
                            <div class="col-sm-6">
                              <label for="home_telephone" class="control-label">Home Telephone</label>
                              <?php Text('home_telephone','','class="form-control" placeholder="Enter your home telephone"') ?>
                              <?php show_errors('home_telephone') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-6">
                              <label for="personal_email" class="control-label">Personal Email *</label>
                              <?php Email('personal_email','','class="form-control" placeholder="Enter your personal email"') ?>
                              <?php show_errors('personal_email') ?>
                            </div>
                            <div class="col-sm-6">
                              <label for="work_email" class="control-label">Work Email</label>
                              <?php Email('work_email','','class="form-control" placeholder="Enter your work email"') ?>
                              <?php show_errors('work_email') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="bvn" class="control-label">BVN
                              <small class="text-small">(for identity purposes only. Does not give access to accounts)</small></label>
                              <?php Text('bvn','','class="form-control" placeholder="Enter your bvn"') ?>
                              <?php show_errors('bvn') ?>
                            </div>
                          </div>

                          <div class="form-group">

                            <div class="col-sm-6">
                              <label for="id_type" class="control-label">Identification Type *</label>
                              <?php Select('id_type',
                              [
                                '' => "Select Identification Type",
                                "Driver's Lincense" => "Driver's Lincense",
                                "International Passport" => "International Passport",
                              ],'','class="form-control"') ?>
                              <?php show_errors('id_type') ?>
                            </div>
                            <div class="col-sm-6">
                            <label for="id_no" class="control-label">Identification Number *</label>
                              <?php Text('id_no','','class="form-control" placeholder="Enter your identification number"') ?>
                              <?php show_errors('id_no') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="current_address" class="control-label">Current Address *</label>
                              <?php Textarea('current_address','','class="form-control" placeholder="Enter your current address"') ?>
                              <?php show_errors('current_address') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-6">
                              <label for="postcode" class="control-label">Postcode</label>
                              <?php Text('postcode','','class="form-control" placeholder="Enter your postcode"') ?>
                              <?php show_errors('postcode') ?>
                            </div>
                            <div class="col-sm-6">
                              <label for="time_at_address" class="control-label">Time At Current Address (in Years and Month)</label>
                                  <?php Text('time_at_address','','class="form-control" placeholder="In Years and Months"') ?>
                                  <?php show_errors('time_at_address') ?>
                            </div>
                          </div>

                          <div class="form-group">

                            <div class="col-sm-6">
                              <label for="state_of_origin" class="control-label">State of Origin</label>
                              <?php Text('state_of_origin','','class="form-control" placeholder="Enter your state of origin"') ?>
                              <?php show_errors('state_of_origin') ?>
                            </div>

                            <div class="col-sm-6">
                              <label for="marital_status" class="control-label">Marital Status *</label>
                              <?php Select('marital_status',
                              [
                                '' => "Select Marital Status",
                                "Single" => "Single",
                                "Married" => "Married",
                                "Divorced" => "Divorced",
                                "Separated" => "Separated",
                                "Widowed" => "Widowed",
                              ],'','class="form-control" placeholder="Enter your marital status"') ?>
                              <?php show_errors('marital_status') ?>
                            </div>
                          </div>


                          <div class="form-group">

                            <div class="col-sm-4">
                              <label for="day_of_birth" class="control-label">Date of Birth *</label>
                              <?php
                              $days = array('' => 'Select day *');
                              for ($i = 1; $i <= 31; $i++) {
                                  $days[$i] = $i;
                              }
                                Select('day_of_birth',$days, '','class="form-control" placeholder="Select Day"');
                                show_errors('day_of_birth');
                              ?>
                            </div>
                            <div class="col-sm-4">
                              <label for="month_of_birth" class="control-label">&nbsp;</label>
                              <?php Select('month_of_birth',[
                                "" => 'Month of Birth *',
                                "January" => 'January',
                                "February" => 'February',
                                "March" => 'March',
                                "April" => 'April',
                                "May" => 'May',
                                "June" => 'June',
                                "July" => 'July',
                                "August" => 'August',
                                "September" => 'September',
                                "October" => 'October',
                                "November" => 'November',
                                "December" => 'December',
                              ],'','class="form-control"') ?>
                              <?php show_errors('month_of_birth') ?>
                            </div>
                            <div class="col-sm-4">
                              <label for="year_of_birth" class="control-label">&nbsp;</label>
                              <?php
                              $year = array('' => 'Select Year *');
                              for ($i = 1930; $i <= 2020; $i++) {
                                  $year[$i] = $i;
                              }
                              Select('year_of_birth',$year, '','class="form-control"');
                              show_errors('year_of_birth');
                              ?>
                            </div>
                          </div>


                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="previous_employment" class="control-label">Previous Employment * </label>
                              <?php Textarea('previous_employment','','class="form-control" placeholder="The required information under ‘previous employment’ is to be provided if you are currently self-employed."') ?>
                              <small class="text-small">Please provide sufficient information as to the name, location, position held and number of years spent at the organization </small>
                              <?php show_errors('previous_employment') ?>
                            </div>
                          </div>



                          <h3 class="mt-60 text-red">Emergency Contact</h3>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="emergency_contact_full_name" class="control-label">Full Name *</label>
                              <?php Text('emergency_contact_full_name','','class="form-control" placeholder="Enter your emergency contact full name"') ?>
                              <?php show_errors('emergency_contact_full_name') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="emergency_contact_relationship" class="control-label">Relationship *</label>
                              <?php Text('emergency_contact_relationship','','class="form-control" placeholder="Enter your relationship"') ?>
                              <?php show_errors('emergency_contact_relationship') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-6">
                              <label for="emergency_contact_telephone_1" class="control-label">Telephone 1 *</label>
                              <?php Text('emergency_contact_telephone_1','','class="form-control" placeholder="Enter your emergency contact phone number"') ?>
                              <?php show_errors('emergency_contact_telephone_1') ?>
                            </div>
                            <div class="col-sm-6">
                              <label for="emergency_contact_telephone_2" class="control-label">Telephone 2</label>
                              <?php Text('emergency_contact_telephone_2','','class="form-control" placeholder="Enter your emergency contact phone number 2"') ?>
                              <?php show_errors('emergency_contact_telephone_2') ?>
                            </div>

                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="emergency_contact_email" class="control-label">Email *</label>
                              <?php Email('emergency_contact_email','','class="form-control" placeholder="Enter your emergency contact email address"') ?>
                              <?php show_errors('emergency_contact_email') ?>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-12">
                              <label for="emergency_contact_address" class="control-label">Address * </label>
                              <?php Textarea('emergency_contact_address','','class="form-control" placeholder="Enter your emergency contact address"') ?>
                              <?php show_errors('emergency_contact_address') ?>
                            </div>
                          </div>

                          <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>&nbsp;
                            <button type="reset" class="btn btn-default" data-type="reset">&nbsp;Clear</button>&nbsp;
                          </div>

                        </form>
                    </div>
      				  </div>


                </div>
                <!-- End of Main Content -->
            </div>
    	</div>
     </section>

        <?php include('includes/footer2.inc.php'); ?>

    </body>
</html>
