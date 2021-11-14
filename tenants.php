<?php $title = "contact";

include('Mail.php');
require_once ('Mail/mime.php'); // PEAR Mail_Mime packge

global $local;

$script = false;
include('includes/config.inc.php');
require(MAILER);
require(DB);
require('functions/database.class.php');
require('functions/form.php');
require('functions/validation.php');
require('functions/upload.inc.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$list_of_properties = [
  'quiver-court-bedroom-flat' => [
    'name' => 'Quiver court',
    'description' => '1 bedroom flat - 1 bath, 2 toilets',
    'address' => '12 Toyin Adefala street, Oke Ire Nla, Ajah.',
  ],
  'quiver-court-2-bedroom-flat' => [
    'name' => 'Quiver court',
    'description' => '2 bedroom flat - 2 baths, 3 toilets',
    'address' => '12 Toyin Adefala street, Oke Ire Nla, Ajah.',
  ],
  'blissville-uno-3-bedroom-flat' => [
    'name' => 'Blissville Uno',
    'description' => ' 3 bedroom flat - A maid\'s room, 4 baths, 5 toilets',
    'address' => 'Blissville Apartments, Prince Kemi Olusesi street, off Dreamworld Africana Way, Lekki.',
  ],
  'tera-haven-flat-2-bedroom-flat' => [
    'name' => 'Tera Haven',
    'description' => '2 bedroom flat - 2 baths, 3 toilets',
    'address' => '6, Segun Sodiya drive, Thomas Estate, Ajah',
  ],
  'tera-haven-1-room-and-parlour' => [
    'name' => 'Tera Haven',
    'description' => '1 room and parlor - 1 bath, 1 toilet',
    'address' => '6, Segun Sodiya drive, Thomas Estate, Ajah',
  ],
  'tera-haven-1-single-room' => [
    'name' => 'Tera Haven',
    'description' => '1 single room - No bathroom included',
    'address' => '6, Segun Sodiya drive, Thomas Estate, Ajah',
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

//Add a new Tenant
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $data = $errors = array();

  # -- Tenant Picture
  // check if valid image
  $pics= assign('tenant_picture','image','Please upload a valid tenant image');
  if (isset($pics)) {
    $data['tenant_picture'] = upload_file('tenant_picture', 'tenant-'.time(), 'img/tenants/');

    if (!isset($data['tenant_picture'])) {
      $errors['tenant_picture'] = "Unable to upload image. Please try again";
    }
  }



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

  # -- Landlord Full Name
  $data['landlord_full_name'] = assign('landlord_full_name','minlen=3','Please enter a valid landlord full name');


  # -- Landlord Address
  $data['landlord_address'] = assign('landlord_address','minlen=3','Please enter a valid landlord address');


  # -- Landlord Postcode
  $data['landlord_postcode'] = assign('landlord_postcode','minlen=3','Please enter a valid landlord postcode');

  # -- Landlord Telephone
  $data['landlord_telephone'] = assign('landlord_telephone','minlen=3','Please enter a valid landlord telephone');

  # -- Landlord Email
  $data['landlord_email'] = assign('landlord_email','minlen=3','Please enter a valid landlord telephone');

  # -- Never Rented Before
  if (exists('never_rented_before')) {
    $never_rented_before = assign('never_rented_before','req','Please select a valid option');
    if (is_array($never_rented_before)) {
      $data['never_rented_before'] = $never_rented_before[0];
    }
  }


  # -- Own Last Property
  if (exists('own_last_property')) {
    $own_last_property = assign('own_last_property','req','Please select a valid option');
    if (is_array($own_last_property)) {
      $data['own_last_property'] = $own_last_property[0];
    }
  }

  # -- Company Name
  $data['employment_company_name'] = assign('employment_company_name','minlen=3','Please enter a valid company name');

  # -- Position Title
  $data['employment_position_title'] = assign('employment_position_title','minlen=3','Please enter a valid position title');

  # -- Contract Type
  $data['employment_contract_type'] = assign('employment_contract_type','req','Please select a valid option');

  # -- Company Address
  $data['employment_company_address'] = assign('employment_company_address','minlen=3','Please enter a valid company address');

  # -- Start Date
  $data['month_of_start_date'] = assign('month_of_start_date','req','Select your Month of Start Date');
  $data['year_of_start_date'] = assign('year_of_start_date','req','Select your Year of Start Date');


  # -- Postcode
  $data['employment_postcode'] = assign('employment_postcode','req','Please enter a valid postcode');


  # -- Manager Name
  $data['employment_manager_name'] = assign('employment_manager_name','minlen=3','Please enter a valid manager name');


  # -- Manager Position
  $data['employment_manager_position'] = assign('employment_manager_position','minlen=3','Please enter a valid manager position');


  # -- Manager Email
  $data['employment_manager_email'] = assign('employment_manager_email','email','Please enter a valid manager email');


  # -- Manager Phone
  $data['employment_manager_phone'] = assign('employment_manager_phone','minlen=5','Please enter a valid manager phone');


  # -- Employment Details
  if (exists('more_details_on_employment')) {
    $data['more_details_on_employment'] = assign('more_details_on_employment','minlen=3','Please enter a valid employment details');
  }

  # -- Change employer before tenancy start date
  if (exists('change_employer_before_tenancy_start_date')) {
    $change_employer_before_tenancy_start_date = assign('change_employer_before_tenancy_start_date','req','Please select a valid option');
    if (is_array($change_employer_before_tenancy_start_date)) {
      $data['change_employer_before_tenancy_start_date'] = $change_employer_before_tenancy_start_date[0];
    }
  }

  # -- Self Employed
  if (exists('self_employed')) {
    $self_employed = assign('self_employed','req','Please select a valid option');
    if (is_array($self_employed)) {
      $data['self_employed'] = $self_employed[0];
    }
  }


  # -- Dependant Name 1
  if (exists('dependent_name_1')) {
    $data['dependent_name_1'] = assign('dependent_name_1','req','Please enter a valid dependant name 1');
  }

  # -- Dependant Occupation 1
  if (exists('dependent_occupation_1')) {
    $data['dependent_occupation_1'] = assign('dependent_occupation_1','req','Please enter a valid dependant occupation 1');
  }

  if (exists('dependent_name_1') && !exists('dependent_occupation_1')) {
    $errors['dependent_occupation_1'] = 'Please enter an occupation for dependant 1';
  }

  # -- Dependant Relationship 1
  if (exists('dependent_relationship_1')) {
    $data['dependent_relationship_1'] = assign('dependent_relationship_1','req','Please select a valid dependant relationship 1');
  }

  if (exists('dependent_name_1') && !exists('dependent_relationship_1')) {
    $errors['dependent_relationship_1'] = 'Please select a relationship for dependant 1';
  }

  # -- Dependant Age 1
  if (exists('dependent_age_1')) {
    $data['dependent_age_1'] = assign('dependent_age_1','req','Please enter a valid dependant age 1');
  }

  if (exists('dependent_name_1') && !exists('dependent_age_1')) {
    $errors['dependent_age_1'] = 'Please enter a valid age for dependant 1';
  }

  # -- Dependant ID
  $valid_dependent_data_1 = isset($data['dependent_name_1']) && isset($data['dependent_relationship_1']) && isset($data['dependent_age_1']);
  if (!isset($file_1) && $valid_dependent_data_1 && ($data['dependent_relationship_1'] == "Co-residents" || (int)$data['dependent_age_1'] >= 18)) {
    $file_1= assign('dependent_id_1','file','Please upload a valid file for dependant 1');
    $data['dependent_id_1'] = upload_file('dependent_id_1', strtolower(str_replace(' ', '-', $data['dependent_name_1']))."-".time(), 'img/tenants/');

    if (!isset($data['dependent_id_1'])) {
      $errors['dependent_id_1'] = "Unable to upload ID for dependendent 1. Please try again";
    }
  }


  # -- Dependant Name 2
  if (exists('dependent_name_2')) {
    $data['dependent_name_2'] = assign('dependent_name_2','req','Please enter a valid dependant name 2');
  }

  # -- Dependant Occupation 2
  if (exists('dependent_occupation_2')) {
    $data['dependent_occupation_2'] = assign('dependent_occupation_2','req','Please enter a valid dependant occupation 2');
  }

  if (exists('dependent_name_2') && !exists('dependent_occupation_2')) {
    $errors['dependent_occupation_2'] = 'Please enter an occupation for dependant 2';
  }

  # -- Dependant Relationship 2
  if (exists('dependent_relationship_2')) {
    $data['dependent_relationship_2'] = assign('dependent_relationship_2','req','Please select a valid dependant relationship 2');
  }

  if (exists('dependent_name_2') && !exists('dependent_relationship_2')) {
    $errors['dependent_relationship_2'] = 'Please select a relationship for dependant 2';
  }

  # -- Dependant Age 2
  if (exists('dependent_age_2')) {
    $data['dependent_age_2'] = assign('dependent_age_2','req','Please enter a valid dependant age 2');
  }

  if (exists('dependent_name_2') && !exists('dependent_age_2')) {
    $errors['dependent_age_2'] = 'Please enter a valid age for dependant 2';
  }

  # -- Dependant ID
  $valid_dependent_data_2 = isset($data['dependent_name_2']) && isset($data['dependent_relationship_2']) && isset($data['dependent_age_2']);
  if (!isset($file_2) && $valid_dependent_data_2 && ($data['dependent_relationship_2'] == "Co-residents" || (int)$data['dependent_age_2'] >= 18)) {
    $file_2= assign('dependent_id_2','file','Please upload a valid file for dependant 2');
    $data['dependent_id_2'] = upload_file('dependent_id_2', strtolower(str_replace(' ', '-', $data['dependent_name_2']))."-".time(), 'img/tenants/');

    if (!isset($data['dependent_id_2'])) {
      $errors['dependent_id_2'] = "Unable to upload ID for dependendent 2. Please try again";
    }
  }

  # -- Dependant Name 3
  if (exists('dependent_name_3')) {
    $data['dependent_name_3'] = assign('dependent_name_3','req','Please enter a valid dependant name 3');
  }

  # -- Dependant Occupation 3
  if (exists('dependent_occupation_3')) {
    $data['dependent_occupation_3'] = assign('dependent_occupation_3','req','Please enter a valid dependant occupation 3');
  }

  if (exists('dependent_name_3') && !exists('dependent_occupation_3')) {
    $errors['dependent_occupation_3'] = 'Please enter an occupation for dependant 3';
  }

  # -- Dependant Relationship 3
  if (exists('dependent_relationship_3')) {
    $data['dependent_relationship_3'] = assign('dependent_relationship_3','req','Please select a valid dependant relationship 3');
  }

  if (exists('dependent_name_3') && !exists('dependent_relationship_3')) {
    $errors['dependent_relationship_3'] = 'Please select a relationship for dependant 3';
  }

  # -- Dependant Age 3
  if (exists('dependent_age_3')) {
    $data['dependent_age_3'] = assign('dependent_age_3','req','Please enter a valid dependant age 3');
  }

  if (exists('dependent_name_3') && !exists('dependent_age_3')) {
    $errors['dependent_age_3'] = 'Please enter a valid age for dependant 3';
  }

  # -- Dependant ID
  $valid_dependent_data_3 = isset($data['dependent_name_3']) && isset($data['dependent_relationship_3']) && isset($data['dependent_age_3']);
  if (!isset($file_3) && $valid_dependent_data_3 && ($data['dependent_relationship_3'] == "Co-residents" || (int)$data['dependent_age_3'] >= 18)) {
    $file_3= assign('dependent_id_3','file','Please upload a valid file for dependant 3');
    $data['dependent_id_3'] = upload_file('dependent_id_3', strtolower(str_replace(' ', '-', $data['dependent_name_3']))."-".time(), 'img/tenants/');

    if (!isset($data['dependent_id_3'])) {
      $errors['dependent_id_3'] = "Unable to upload ID for dependendent 3. Please try again";
    }
  }

  # -- Dependant Name 4
  if (exists('dependent_name_4')) {
    $data['dependent_name_4'] = assign('dependent_name_4','req','Please enter a valid dependant name 4');
  }

  # -- Dependant Occupation 4
  if (exists('dependent_occupation_4')) {
    $data['dependent_occupation_4'] = assign('dependent_occupation_4','req','Please enter a valid dependant occupation 4');
  }

  if (exists('dependent_name_4') && !exists('dependent_occupation_4')) {
    $errors['dependent_occupation_4'] = 'Please enter an occupation for dependant 4';
  }

  # -- Dependant Relationship 4
  if (exists('dependent_relationship_4')) {
    $data['dependent_relationship_4'] = assign('dependent_relationship_4','req','Please select a valid dependant relationship 4');
  }

  if (exists('dependent_name_4') && !exists('dependent_relationship_4')) {
    $errors['dependent_relationship_4'] = 'Please select a relationship for dependant 4';
  }

  # -- Dependant Age 4
  if (exists('dependent_age_4')) {
    $data['dependent_age_4'] = assign('dependent_age_4','req','Please enter a valid dependant age 4');
  }

  if (exists('dependent_name_4') && !exists('dependent_age_4')) {
    $errors['dependent_age_4'] = 'Please enter a valid age for dependant 4';
  }

  # -- Dependant ID
  $valid_dependent_data_4 = isset($data['dependent_name_4']) && isset($data['dependent_relationship_4']) && isset($data['dependent_age_4']);
  if (!isset($file_4) && $valid_dependent_data_4 && ($data['dependent_relationship_4'] == "Co-residents" || (int)$data['dependent_age_4'] >= 18)) {
    $file_4= assign('dependent_id_4','file','Please upload a valid file for dependant 4');
    $data['dependent_id_4'] = upload_file('dependent_id_4', strtolower(str_replace(' ', '-', $data['dependent_name_4']))."-".time(), 'img/tenants/');

    if (!isset($data['dependent_id_4'])) {
      $errors['dependent_id_4'] = "Unable to upload ID for dependendent 4. Please try again";
    }
  }

  # -- Dependant Name 5
  if (exists('dependent_name_5')) {
    $data['dependent_name_5'] = assign('dependent_name_5','req','Please enter a valid dependant name 5');
  }

  # -- Dependant Occupation 5
  if (exists('dependent_occupation_5')) {
    $data['dependent_occupation_5'] = assign('dependent_occupation_5','req','Please enter a valid dependant occupation 5');
  }

  if (exists('dependent_name_5') && !exists('dependent_occupation_5')) {
    $errors['dependent_occupation_5'] = 'Please enter an occupation for dependant 5';
  }

  # -- Dependant Relationship 5
  if (exists('dependent_relationship_5')) {
    $data['dependent_relationship_5'] = assign('dependent_relationship_5','req','Please select a valid dependant relationship 5');
  }

  if (exists('dependent_name_5') && !exists('dependent_relationship_5')) {
    $errors['dependent_relationship_5'] = 'Please select a relationship for dependant 5';
  }

  # -- Dependant Age 5
  if (exists('dependent_age_5')) {
    $data['dependent_age_5'] = assign('dependent_age_5','req','Please enter a valid dependant age 5');
  }

  if (exists('dependent_name_5') && !exists('dependent_age_5')) {
    $errors['dependent_age_5'] = 'Please enter a valid age for dependant 5';
  }

  # -- Dependant ID
  $valid_dependent_data_5 = isset($data['dependent_name_5']) && isset($data['dependent_relationship_5']) && isset($data['dependent_age_5']);
  if (!isset($file_5) && $valid_dependent_data_5 && ($data['dependent_relationship_5'] == "Co-residents" || (int)$data['dependent_age_5'] >= 18)) {
    $file_5= assign('dependent_id_5','file','Please upload a valid file for dependant 5');
    $data['dependent_id_5'] = upload_file('dependent_id_5', strtolower(str_replace(' ', '-', $data['dependent_name_5']))."-".time(), 'img/tenants/');

    if (!isset($data['dependent_id_5'])) {
      $errors['dependent_id_5'] = "Unable to upload ID for dependendent 5. Please try again";
    }
  }


  # -- Have Persons with Special Needs
  if (exists('have_persons_with_special_needs')) {
    $have_persons_with_special_needs = assign('have_persons_with_special_needs','req','Please select a valid option');
    if (is_array($have_persons_with_special_needs)) {
      $data['have_persons_with_special_needs'] = $have_persons_with_special_needs[0];
    }
  }

  # -- Persons with Special Needs
  if (exists('persons_with_special_needs_details')) {
    $data['persons_with_special_needs_details'] = assign('persons_with_special_needs_details','minlen=3','Please enter a valid persons with special needs details');
  }

  # -- Pets
  if (exists('pets')) {
    $data['pets'] = assign('pets','req','Please enter a valid pet name');
  }


  $confirmation = assign('confirmation','req','You must agree to the Data Protection Statement');

  if (is_array($confirmation)) {
    $data['confirmation'] = $confirmation[0];
  }

	if (empty($errors)) { // If everything's OK...
    // Add property information
    $data['property_name'] = $property['name'];
    $data['property_address'] = $property['address'];
    $data['property_description'] = $property['description'];
    $name = $data['tenant_full_name'];



    // Email Information
    $subject = "[Tenant Application Form] $name";

    $username = MAILER_EMAIL; // your email address
    $password = MAILER_PASSWORD; // your email address password

    $from = MAILER_EMAIL;
    $to = OUR_EMAIL;
    $email = $data['personal_email'];

    $body = "<html><body>";
    foreach ($data as $key => $value) {
      $contains_link = $key == 'tenant_picture' || strpos($key, 'dependent_id_') !== false;
      if ($contains_link) {
        if ($key == 'tenant_picture') {
          $body .= "<img src='".BASE_URL."img/tenants/$value' alt='Tenant Picture' style='width:128px;'> <br />";
        } else {
          $body .= "<strong>".ucwords(str_replace('_', ' ', $key))."</strong>: ".BASE_URL."img/tenants/$value"."<br />";
        }
      } else {
        $body .= "<strong>".ucwords(str_replace('_', ' ', $key))."</strong>: ".$value."<br />";
      }
    }
    $body .= "</body></html>";

    $crlf = "\n";

    $text = '';
    $html = $body;

    if ($local) {
     echo "<div style='background: white;'>
        $body
      </div>";
    } else {
      $mime = new Mail_mime($crlf);
      $mime->setTXTBody($text);
      $mime->setHTMLBody($html);

      $headers = array('From' => $from, 'To' => $to, 'Subject' => $subject, 'Reply-To' => $email); // the email headers

      //do not ever try to call these lines in reverse order
      $body = $mime->get();
      $headers = $mime->headers($headers);
      $smtp = Mail::factory('smtp', array('host' =>'localhost', 'auth' => true, 'username' => $username, 'password' => $password, 'port' => '25')); // SMTP protocol with the username and password of an existing email account in your hosting account
      $mail = $smtp->send($to, $headers, $body); // sending the email
    }

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

<?php
$relationship_type = [
  '' => "Select Relationship Type",
  "Dependants" => "Dependants",
  "Co-residents" => "Co-residents",
]
  ?>

<?php include('includes/header2.inc.php'); ?>
<script>
function updateLandlordDetails(form) {
  var own_last_property = form['own_last_property[]'].value;
  if (own_last_property === 'Yes') {
    form.landlord_full_name.value = form.tenant_full_name.value;
    form.landlord_telephone.value = form.mobile.value;
    form.landlord_email.value = form.personal_email.value;
  }
}

function updateManagerDetails(form) {
  var self_employed = form['self_employed[]'].value;
  if (self_employed === 'Yes') {
    form.employment_manager_name.value = form.tenant_full_name.value;
    form.employment_manager_position.value = 'Self Employed';
    form.employment_manager_phone.value = form.mobile.value;
    form.employment_manager_email.value = form.personal_email.value;
  }
}

function previewFile() {
  var preview = document.querySelector('img.tenant_img');
  var file = document.querySelector('input[id=profile_image]').files[0];
  var reader = new FileReader();

  reader.onloadend = function() {

    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "img/tenants/tenant-avatar.png";
  }
}
</script>
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
              Thank you for your request to rent one of our properties. The process to secure the flat/house is as
              follows:
            </div>

            <ol>
              <li>A <strong>holding deposit</strong> of ₦50, 000 should be paid to Highrachy Investment and Technology
                Limited, at the time of application. This will enable us to take the property off the market and
                commence credit and reference checks. The holding deposit can be refunded should you fail these checks.
              </li>
              <li>After deposit, complete the below application and return to us as soon as possible to
                info@highrachy.com along with a photo ID such as International passport photo or driver’s license. If
                you are applying as a Non-Nigerian, we will need a passport and copies of residency visas as
                appropriate.</li>
              <li>Once the checks are completed to and approved by the landlord, we will proceed to lease signing.</li>
              <li>The amount of the rent (less the holding deposit of ₦50, 000) will then be due immediately and the
                first year’s rent is payable on or before the lease start date.</li>
            </ol>

            <p class="">Please also be aware that the rent due date will be the lease start date.</p>
          </div>

          <div id="contact" class="col-sm-12">

            <div id="message"></div>
            <form class="form-horizontal form-overwrite" method="post" enctype="multipart/form-data">
              <h3 class="mt-30 text-red">Property Details</h3>

              <label class="control-label">Property Name:</label>
              <p class="lead font-weight-bold"><?php echo $property['name'] ?></p>

              <label class="control-label">Address of Property:</label>
              <p class="lead font-weight-bold"><?php echo $property['address'] ?></p>

              <label class="control-label">Description:</label>
              <p class="lead font-weight-bold"><?php echo $property['description'] ?></p>

              <hr class="mt-30 mb-30" />

              <p class="lead mb-30">
                Please do not fill the information on behalf of another person. Applicants may not fraudulently present
                their information on behalf of another.
                Highrachy reserves the right to revoke a person's tenancy where the person resident on the property is
                not the original applicant.
              </p>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="tenant_full_name" class="control-label">Tenant's Full Name *</label>
                  <?php Text('tenant_full_name','','class="form-control" placeholder="Enter tenant`s full name"') ?>
                  <?php show_errors('tenant_full_name') ?>
                </div>
              </div>

              <p class="text-small mb-15 text-muted">
                Note that the individual whose information is filled herein will be responsible for making all payments
                (including rent, Service charges and levies). Kindly specify if the property will be occupied by
                multiple persons and specify the number and provide details of other occupants in the space provided
                below.
              </p>

              <div class="text-center mb-5">
                <img class="tenant_img avatar-img" src="img/tenants/tenant-avatar.png"><br />

                <div class="input-group-btn">
                  <label for="profile_image" class="btn btn-default">Upload Picture</label>
                  <?php show_errors('tenant_picture') ?>
                  <input id="profile_image" type="file" name="tenant_picture" onChange="previewFile()" accept="image/*"
                    style="visibility:hidden;" />
                </div>
              </div>

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
                    <small class="text-small">(for identity purposes only. Does not give access to
                      accounts)</small></label>
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
                                "Driver's License" => "Driver's License",
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
                  <label for="time_at_address" class="control-label">Time At Current Address (in Years and
                    Month)</label>
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
                  <?php
                    Select('month_of_birth',[
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
                    ],'','class="form-control"')
                  ?>
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
                  <small class="text-small">Please provide sufficient information as to the name, location, position
                    held and number of years spent at the organization </small>
                  <?php show_errors('previous_employment') ?>
                </div>
              </div>



              <h3 class="mt-60 text-red">Emergency Contact</h3>
              <small class="text-small">This can <strong>not</strong> be someone who is also resident in the property
                with you.</small>

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

              <!-- Landlord Information -->
              <h3 class="mt-60 text-red">Current/Previous Landlord</h3>

              <div class="checkbox mb-15">
                <label>
                  <?php CheckBox('own_last_property','Yes', false, 'onclick="updateLandlordDetails(this.form)"') ?>
                  Please
                  tick
                  this box if you owned the last property that
                  you lived at<br />
                  <small class="text-small">(Please provide us with a copy of your last mortgage statement or any other
                    document confirming ownership)</small>
                  <?php show_errors('own_last_property') ?>
                </label>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="landlord_full_name" class="control-label">Landlord Full Name *</label>
                  <?php Text('landlord_full_name','','class="form-control" placeholder="Enter landlord full name"') ?>
                  <?php show_errors('landlord_full_name') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="landlord_address" class="control-label">Landlord Address *</label>
                  <?php Textarea('landlord_address','','class="form-control" placeholder="Enter landlord address"') ?>
                  <?php show_errors('landlord_address') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="landlord_postcode" class="control-label">Landlord Postcode *</label>
                  <?php Text('landlord_postcode','','class="form-control" placeholder="Enter landlord postcode"') ?>
                  <?php show_errors('landlord_postcode') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label for="landlord_telephone" class="control-label">Landlord Telephone *</label>
                  <?php Text('landlord_telephone','','class="form-control" placeholder="Enter your landlord phone number"') ?>
                  <?php show_errors('landlord_telephone') ?>
                </div>
                <div class="col-sm-6">
                  <label for="landlord_email" class="control-label">Landlord Email *</label>
                  <?php Email('landlord_email','','class="form-control" placeholder="Enter your landlord email address"') ?>
                  <?php show_errors('landlord_email') ?>
                </div>
              </div>

              <div class="checkbox">
                <label>
                  <?php CheckBox('never_rented_before','Yes') ?> Please tick this box if you have never rented before.
                  Ensure you fill in the details on your last guardian
                  <br />
                  <small class="text-small">(Please provide us with proof of address in this case, e.g. utility bill,
                    bank statement, etc.) </small>
                  <?php show_errors('never_rented_before') ?>
                </label>
              </div>



              <!-- Employment Details -->
              <h3 class="mt-60 text-red">Employment Details</h3>

              <div class="checkbox mb-15">
                <label>
                  <?php CheckBox('self_employed','Yes', false,'onclick="updateManagerDetails(this.form)"') ?> Please
                  tick this box if you’re self-employed <br />
                  <small class="text-small">(Please provide us with your last 3 years’ tax returns or a letter from your
                    accountant, confirming your last 3 years of income)</small>
                  <?php show_errors('self_employed') ?>
                </label>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="employment_company_name" class="control-label">Company Name * </label>
                  <?php Text('employment_company_name','','class="form-control" placeholder="Enter the company name"') ?>
                  <?php show_errors('employment_company_name') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label for="employment_position_title" class="control-label">Position Title * </label>
                  <?php Text('employment_position_title','','class="form-control" placeholder="Enter your position title"') ?>
                  <?php show_errors('employment_position_title') ?>
                </div>
                <div class="col-sm-6">
                  <label for="employment_contract_type" class="control-label">Contract Type * </label>
                  <?php Select('employment_contract_type',
                              [
                                '' => "Select Contract Type",
                                "Contractor" => "Contractor",
                                "Consultant" => "Consultant",
                                "Freelancer" => "Freelancer",
                                "Full-Time Employee" => "Full-Time Employee",
                                "Part-Time Employee" => "Part-Time Employee",
                                "Self Employed" => "Self Employed",
                                "Temporary Employee" => "Temporary Employee",
                                "Temporary worker" => "Temporary worker",
                              ],'','class="form-control"') ?>
                  <?php show_errors('employment_contract_type') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="employment_company_address" class="control-label">Company Address * </label>
                  <?php Textarea('employment_company_address','','class="form-control" placeholder="Enter your employment company address"') ?>
                  <?php show_errors('employment_company_address') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="employment_postcode" class="control-label">Postcode *</label>
                  <?php Text('employment_postcode','','class="form-control" placeholder="Enter your postcode"') ?>
                  <?php show_errors('employment_postcode') ?>
                </div>
              </div>

              <div class="form-group">

                <div class="col-sm-6">
                  <label for="month_of_start_date" class="control-label">Start Date *</label>
                  <?php
                    Select('month_of_start_date',[
                      "" => 'Select Month *',
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
                    ],'','class="form-control"')
                  ?>
                  <?php show_errors('month_of_start_date') ?>
                </div>
                <div class="col-sm-6">
                  <label for="year_of_start_date" class="control-label">&nbsp;</label>
                  <?php
                    $year = array('' => 'Select Year *');
                    for ($i = 1990; $i <= 2020; $i++) {
                        $year[$i] = $i;
                    }
                    Select('year_of_start_date',$year, '','class="form-control"');
                    show_errors('year_of_start_date');
                  ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label for="employment_manager_name" class="control-label">Contract/Manager's Name *</label>
                  <?php Text('employment_manager_name','','class="form-control" placeholder="Enter your manager name"') ?>
                  <?php show_errors('employment_manager_name') ?>
                </div>
                <div class="col-sm-6">
                  <label for="employment_manager_position" class="control-label">Manager Position *</label>
                  <?php Text('employment_manager_position','','class="form-control" placeholder="Enter your position"') ?>
                  <?php show_errors('employment_manager_position') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-6">
                  <label for="employment_manager_email" class="control-label">Manager Email *</label>
                  <?php Email('employment_manager_email','','class="form-control" placeholder="Enter your managers email"') ?>
                  <?php show_errors('employment_manager_email') ?>
                </div>
                <div class="col-sm-6">
                  <label for="employment_manager_phone" class="control-label">Manager Telephone *</label>
                  <?php Text('employment_manager_phone','','class="form-control" placeholder="Enter your manager phone number"') ?>
                  <?php show_errors('employment_manager_phone') ?>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="more_details_on_employment" class="control-label">More Employment Details </label>
                  <small class="text-small">If this is a temporary contract, please provide more details regarding your
                    employment:</small>
                  <?php Textarea('more_details_on_employment','','class="form-control" placeholder="Enter employment details"') ?>
                  <?php show_errors('more_details_on_employment') ?>
                </div>
              </div>


              <div class="checkbox">
                <label>
                  <?php CheckBox('change_employer_before_tenancy_start_date','Yes') ?> Please tick this box if you will
                  change employer between now and the tenancy start date <br />
                  <small class="text-small">(Please provide us with your offer letter in this case.) </small>
                  <?php show_errors('change_employer_before_tenancy_start_date') ?>
                </label>
              </div>


              <!-- Dependants Details -->
              <h3 class="mt-60 text-red">Dependants/Co-residents</h3>

              <!-- Start Dependant 1 -->
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="dependent_name_1" class="control-label">Dependant Name 1</label>
                  <?php Text('dependent_name_1','','class="form-control" placeholder="Dependant Name 1"') ?>
                  <?php show_errors('dependent_name_1') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_age_1" class="control-label">Age (In Years)</label>
                  <?php
                    $year = array('' => 'Select Dependant Age 1');
                    for ($i = 0; $i <= 100; $i++) {
                        $year[$i] = $i;
                    }
                    Select('dependent_age_1',$year, '','class="form-control"');
                    show_errors('dependent_age_1');
                  ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_relationship_1" class="control-label">Relationship </label>
                  <?php Select('dependent_relationship_1', $relationship_type,'','class="form-control"') ?>
                  <?php show_errors('dependent_relationship_1') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_occupation_1" class="control-label">Occupation</label>
                  <?php Text('dependent_occupation_1','','class="form-control" placeholder="Dependant occupation 1"') ?>
                  <?php show_errors('dependent_occupation_1') ?>
                </div>
                <div class="col-sm-12">
                  <label for="dependent_id_1" class="control-label">Upload a valid Identification Card</label>
                  <input id="dependent_id_1" type="file" class="form-control" name="dependent_id_1" />
                  <small class="text-small">Please provide an ID for Co-residents and Dependants over 18 years
                    old.</small>
                  <?php show_errors('dependent_id_1') ?>
                </div>
              </div>
              <hr class="mt-30 mb-30">
              <!-- End Dependant 1 -->

              <!-- Start Dependant 2 -->
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="dependent_name_2" class="control-label">Dependant Name 2</label>
                  <?php Text('dependent_name_2','','class="form-control" placeholder="Dependant Name 2"') ?>
                  <?php show_errors('dependent_name_2') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_age_2" class="control-label">Age (In Years)</label>
                  <?php
                    $year = array('' => 'Select Dependant Age 2');
                    for ($i = 0; $i <= 100; $i++) {
                        $year[$i] = $i;
                    }
                    Select('dependent_age_2',$year, '','class="form-control"');
                    show_errors('dependent_age_2');
                  ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_relationship_2" class="control-label">Relationship </label>
                  <?php Select('dependent_relationship_2', $relationship_type,'','class="form-control"') ?>
                  <?php show_errors('dependent_relationship_2') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_occupation_2" class="control-label">Occupation</label>
                  <?php Text('dependent_occupation_2','','class="form-control" placeholder="Dependant occupation 2"') ?>
                  <?php show_errors('dependent_occupation_2') ?>
                </div>
                <div class="col-sm-12">
                  <label for="dependent_id_2" class="control-label">Upload a valid Identification Card</label>
                  <input id="dependent_id_2" type="file" class="form-control" name="dependent_id_2" />
                  <small class="text-small">Please provide an ID for Co-residents and Dependants over 18 years
                    old.</small>
                  <?php show_errors('dependent_id_2') ?>
                </div>
              </div>
              <hr class="mt-30 mb-30">
              <!-- End Dependant 2 -->

              <!-- Start Dependant 3 -->
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="dependent_name_3" class="control-label">Dependant Name 3</label>
                  <?php Text('dependent_name_3','','class="form-control" placeholder="Dependant Name 3"') ?>
                  <?php show_errors('dependent_name_3') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_age_3" class="control-label">Age (In Years)</label>
                  <?php
                    $year = array('' => 'Select Dependant Age 3');
                    for ($i = 0; $i <= 100; $i++) {
                        $year[$i] = $i;
                    }
                    Select('dependent_age_3',$year, '','class="form-control"');
                    show_errors('dependent_age_3');
                  ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_relationship_3" class="control-label">Relationship </label>
                  <?php Select('dependent_relationship_3', $relationship_type,'','class="form-control"') ?>
                  <?php show_errors('dependent_relationship_3') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_occupation_3" class="control-label">Occupation</label>
                  <?php Text('dependent_occupation_3','','class="form-control" placeholder="Dependant occupation 3"') ?>
                  <?php show_errors('dependent_occupation_3') ?>
                </div>
                <div class="col-sm-12">
                  <label for="dependent_id_3" class="control-label">Upload a valid Identification Card</label>
                  <input id="dependent_id_3" type="file" class="form-control" name="dependent_id_3" />
                  <small class="text-small">Please provide an ID for Co-residents and Dependants over 18 years
                    old.</small>
                  <?php show_errors('dependent_id_3') ?>
                </div>
              </div>
              <hr class="mt-30 mb-30">
              <!-- End Dependant 3 -->

              <!-- Start Dependant 4 -->
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="dependent_name_4" class="control-label">Dependant Name 4</label>
                  <?php Text('dependent_name_4','','class="form-control" placeholder="Dependant Name 4"') ?>
                  <?php show_errors('dependent_name_4') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_age_4" class="control-label">Age (In Years)</label>
                  <?php
                    $year = array('' => 'Select Dependant Age 4');
                    for ($i = 0; $i <= 100; $i++) {
                        $year[$i] = $i;
                    }
                    Select('dependent_age_4',$year, '','class="form-control"');
                    show_errors('dependent_age_4');
                  ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_relationship_4" class="control-label">Relationship </label>
                  <?php Select('dependent_relationship_4', $relationship_type,'','class="form-control"') ?>
                  <?php show_errors('dependent_relationship_4') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_occupation_4" class="control-label">Occupation</label>
                  <?php Text('dependent_occupation_4','','class="form-control" placeholder="Dependant occupation 4"') ?>
                  <?php show_errors('dependent_occupation_4') ?>
                </div>
                <div class="col-sm-12">
                  <label for="dependent_id_4" class="control-label">Upload a valid Identification Card</label>
                  <input id="dependent_id_4" type="file" class="form-control" name="dependent_id_4" />
                  <small class="text-small">Please provide an ID for Co-residents and Dependants over 18 years
                    old.</small>
                  <?php show_errors('dependent_id_4') ?>
                </div>
              </div>
              <hr class="mt-30 mb-30">
              <!-- End Dependant 4 -->

              <!-- Start Dependant 5 -->
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="dependent_name_5" class="control-label">Dependant Name 5</label>
                  <?php Text('dependent_name_5','','class="form-control" placeholder="Dependant Name 5"') ?>
                  <?php show_errors('dependent_name_5') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_age_5" class="control-label">Age (In Years)</label>
                  <?php
                    $year = array('' => 'Select Dependant Age 5');
                    for ($i = 0; $i <= 100; $i++) {
                        $year[$i] = $i;
                    }
                    Select('dependent_age_5',$year, '','class="form-control"');
                    show_errors('dependent_age_5');
                  ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_relationship_5" class="control-label">Relationship </label>
                  <?php Select('dependent_relationship_5', $relationship_type,'','class="form-control"') ?>
                  <?php show_errors('dependent_relationship_5') ?>
                </div>
                <div class="col-sm-6">
                  <label for="dependent_occupation_5" class="control-label">Occupation</label>
                  <?php Text('dependent_occupation_5','','class="form-control" placeholder="Dependant occupation 5"') ?>
                  <?php show_errors('dependent_occupation_5') ?>
                </div>
                <div class="col-sm-12">
                  <label for="dependent_id_5" class="control-label">Upload a valid Identification Card</label>
                  <input id="dependent_id_5" type="file" class="form-control" name="dependent_id_5" />
                  <small class="text-small">Please provide an ID for Co-residents and Dependants over 18 years
                    old.</small>
                  <?php show_errors('dependent_id_5') ?>
                </div>
              </div>
              <hr class="mt-30 mb-30">
              <!-- End Dependant 5 -->

              <div class="checkbox">
                <label>
                  <?php CheckBox('have_persons_with_special_needs','Yes') ?> Please tick this box if you have children
                  or persons with special needs living with you:
                  <?php show_errors('have_persons_with_special_needs') ?>
                </label>
              </div>

              <div class="form-group">
                <div class="col-sm-12">
                  <label for="persons_with_special_needs_details" class="control-label">If yes, please provide us with
                    necessary details </label>
                  <?php Textarea('persons_with_special_needs_details','','class="form-control" placeholder="More details on persons with special needs"') ?>
                  <?php show_errors('persons_with_special_needs_details') ?>
                </div>
              </div>



              <!-- Pets -->
              <h3 class="mt-60 text-red">Pets</h3>
              <small class="text-small mb-15">Please note that the landlord has to give written permission for you to
                keep a
                pet at the property and you must abide by the House Rules on keeping pet/s. Examples are cats, dogs,
                e.t.c </small>

              <div class="form-group">
                <div class="col-sm-12">
                  <?php Text('pets','','class="form-control" placeholder="List your pets"') ?>
                  <?php show_errors('pets') ?>
                </div>
              </div>

              <!-- Confirmation -->
              <h3 class="mt-60 text-red">Confirmation</h3>
              <div class="checkbox">
                <label>
                  <?php CheckBox('confirmation','Yes') ?> By submitting this form, I confirm that the information
                  provided on this Tenant Application Form is (to the best of my knowledge) accurate, complete and not
                  misleading and that I have read and agreed to the attached <a href="data-protection-statement.php"
                    target="_blank" class="text-primary">Data Protection Statement</a>.
                  <?php show_errors('confirmation') ?>
                </label>
              </div>


              <div class="mt-60">
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