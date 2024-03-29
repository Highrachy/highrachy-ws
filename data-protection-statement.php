<?php
$title = "contact";
$script = false;
include('includes/config.inc.php');
require(DB);
require('functions/database.class.php');
$db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

?>
<?php include('includes/header2.inc.php'); ?>
</div>
<!--End of Top Container-->

<section>
  <div class="container data-protection-statement">
    <div id="content" class="row">
      <?php include('includes/breadcrumb2.inc.php'); ?>
      <div class="maincontent content-padding">

        <div class="row">
          <div class="col-sm-12">
            <h2>Data Protection Statement</h2>

            <div>
              Highrachy is committed to protecting the rights and freedoms of our tenants and Clients, and safely and
              securely processing your data in accordance with all of our legal obligations. We process both personal
              and sensitive data about our applicants, and other individuals for a variety of business purposes.
            </div>

            <p>
              In this Data Protection Statement when we refer to:
            </p>
            <ul>
              <li>“you”, we mean any person signing the attached Tenant Application Form (“the Form”), whether as the
                Tenant or as the Guarantor;</li>
              <li>the “Tenant” and to the “Guarantor” we mean the persons identified in the “Tenant details” and the
                “Guarantor details” sections of the Form respectively;</li>
              <li>“Landlord” means the person who is the owner of the Property;</li>
              <li>The “Property” means the property proposed to be rented/leased by the Tenant, details of which
                appear in the “Property details” section of the Form.</li>
            </ul>

            <p class="">This Data Protection Statement explains what personal information we may hold about you, the
              purposes for which your personal information may be used and details of third parties to whom your
              personal information may be disclosed.</p>


            <h4 class="mt-60 mb-15">What personal information about you do we have?</h4>
            <p>We have personal information about you which appears on the Form. In addition to information about you
              which appears on the form, we may also hold information about you which we have received from third
              parties, such as credit reference agencies, fraud prevention agencies and insurance reference agencies.
              We may also store copies of important documents such as your birth certificate, passport, utility bills,
              bank statement and driver’s license.</p>

            <p>We will ensure to take all reasonable steps to keep accurate and up to date any information which we hold
              about you. If, at any time, you discover that information which we hold about you is incorrect, you should
              contact us to have the information corrected.</p>


            <h4 class="mt-60 mb-15">For what purposes will your personal information be used?</h4>
            <p>Your personal information will be used in order that we may carry out various searches and checks on you
              forthe purposes of providing our Client with information which will assist them decide whether you are a
              suitabletenant or guarantor (as the case may be).</p>
            <p>Your personal information may also be used:</p>
            <ul>
              <li>for our own administrative and product /service development purposes;</li>
              <li>in order to enable us to arrange policies of insurance for the landlord / letting agent of the
                Property;</li>
              <li>for the prevention of fraud and money laundering;</li>
              <li>for debt recovery purposes;</li>
              <li>for direct marketing purposes;</li>
              <li>and to make judgments about your suitability to rent the Property and make recommendations about such
                matters to our Customer.</li>
            </ul>

            <h4 class="mt-60 mb-15">To whom will your personal information be disclosed?</h4>
            <p>Unless we have your prior consent, we shall not sell, rent, trade or share any personal information which
              we hold except that:</p>
            <ul>
              <li>we may disclose information which is held by us where required to do so by law or in connection with
                legal proceedings.</li>
              <li>we may disclose aggregate statistics to third parties which are made up from statistics in respect of
                individual persons, but these statistics will not include personally identifying information;</li>
              <li>we may disclose personal information to our legal, accounting, marketing or other professional
                advisers, our website hosts and our courier, postal or transport providers, and insurers (names and
                addresses only in the latter case);</li>
              <li>we may also disclose your personal information (including details about your financial history and
                credit worthiness) to the Landlord;</li>
              <li>we may also disclose your personal information to credit reference agencies and fraud prevention
                agencies;</li>
              <li>we may also disclose your personal information to insurers and/or insurance agents;</li>
              <li>and we may disclose your personal information to third parties (such as your existing and previous
                employers and your existing and previous landlords) for the purpose of such persons giving us a
                reference about you.</li>
            </ul>

            <h4 class="mt-60 mb-15">Other important information you should know
            </h4>
            <p>Where we have been supplied with details of third parties (such as your existing or previous employers,
              and your existing or previous landlords/letting agents), we may contact those third parties with a view to
              verifying any information which we have been provided about yourself.</p>
            <p>You hereby agree that we or our agents may search the databases of third party data providers such as
              credit reference agencies for the purposes described above.</p>
            <p>We may use your personal information to make credit decisions about you and/or to make judgments about
              your suitability to rent the Property (if you are the Tenant), or guarantee the obligations of the Tenant
              (if you are theGuarantor), and make recommendations about such matters to our Client. To make or assist in
              the making of such decisions and recommendations, we may use a process called credit scoring and/or other
              automated decision making processes. Your personal details will be passed to the Landlord, who may use
              that informationto make similar decisions and recommendations about you.</p>
            <p>As explained above, your personal details may be passed on to credit reference agencies. Such agencies
              may record the search and such information may be shared with credit grantors, insurers other persons
              making a search against you in future and be used for credit decisions and insurance decisions and fraud
              prevention.</p>
            <p>In the event of you defaulting on rental payments in terms of any lease or tenancy agreement which you
              may have with the landlord of the Property (or their agents) (if you are the Tenant), or in the event of
              you defaulting in your obligations to guarantee the obligations of the Tenant (if you are the Guarantor),
              such information maybe such information may be supplied to credit reference agencies and Insurance
              Reference Agencies.</p>
            <p>You are entitled in law to receive a copy of personal information or data about you which is held by us
              for a prescribed sum. We will also, on written request from you, amend any personal information which we
              hold about you. Where we amend the personal information which we hold about you, we will generally retain
              a copy of the previous version for our records.</p>
            <p>However, as noted above, we will not hold on to any personal information for any longer than is necessary
              for thepurposes noted above.
            </p>


            <h4 class="mt-60 mb-15">Fraud prevention agencies</h4>
            <p>If false, inaccurate or misleading information is provided and fraud is identified, Law enforcement
              agencies may access and use this information. We and other organizations may also access and use this
              information to prevent fraud and money laundering.</p>

          </div>
        </div>
</section>

<?php include('includes/footer2.inc.php'); ?>

</body>

</html>
