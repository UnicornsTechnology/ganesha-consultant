@extends('layouts.back.master')
@section('title')
    Create Job | iStepUp Job Portal
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            @if (session('msg'))
                                <div class="alert alert-success">
                                    {{ session('msg') }}
                                </div>
                            @endif

                            <!-- Input addon -->
                            <div class="card ">

                                <div class="card-header text-right">
                                    <h3 class="card-title mt-1">Job Form </h3>

                                    <a href="/dashboard/company/jobs" class="btn btn-info mx-3"><i class="fa fa-plus"
                                            aria-hidden="true"></i> View All Job</a>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card --> 

                                <div class="card-body">
                                    <form action="/company/jobs/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Job Title</label>

                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-file-signature"></i></span>
                                                    <input type="text" class="form-control" placeholder="  Job Title"
                                                        name="jtitle" value="{{ old('jobtitle') }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12 my-3">
                                                <label>Job Description</label>
                                                <div class="input-group mb-12">
                                                    <textarea id="summernote" name="jobd"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <label>Country</label>
                                                <div class="">
                                                    <div class="input-group-prepend d-flex">
                                                        <span class="input-group-text"><i class="far fa-flag"></i></span>

                                                        <select class="form-control" id="country_id" name="country_id">
                                                            <option value="">Select Country</option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua And Barbuda">Antigua And Barbuda</option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas The">Bahamas The</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                            </option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British Indian
                                                                Ocean Territory</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African
                                                                Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands
                                                            </option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Republic Of The Congo">Republic Of The Congo
                                                            </option>
                                                            <option value="Democratic Republic Of The Congo">Democratic
                                                                Republic Of The Congo</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'Ivoire (Ivory Coast)">Cote D'Ivoire (Ivory
                                                                Coast)</option>
                                                            <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="East Timor">East Timor</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="External Territories of ">External Territories of
                                                                Australia
                                                            </option>
                                                            <option value="Falkland Islands">Falkland Islands</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji Islands">Fiji Islands</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern
                                                                Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia The">Gambia The</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey and Alderney">Guernsey and Alderney
                                                            </option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard and McDonald Islands">Heard and McDonald
                                                                Islands</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong S.A.R.">Hong Kong S.A.R.</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran">Iran</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea North">Korea North</option>
                                                            <option value="Korea South">Korea South</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Laos">Laos</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libya">Libya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macau S.A.R.">Macau S.A.R.</option>
                                                            <option value="Macedonia">Macedonia</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Man (Isle of)">Man (Isle of)</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia">Micronesia</option>
                                                            <option value="Moldova">Moldova</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles
                                                            </option>
                                                            <option value="Netherlands The">Netherlands The</option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana
                                                                Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory Occupied">Palestinian
                                                                Territory Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua new Guinea">Papua new Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn Island">Pitcairn Island</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russia">Russia</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts And Nevis">Saint Kitts And Nevis
                                                            </option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and
                                                                Miquelon</option>
                                                            <option value="Saint Vincent And The G">Saint Vincent And The
                                                                Grenadines
                                                            </option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe
                                                            </option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Smaller Territories of the UK">Smaller
                                                                Territories of the UK</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Georgia">South Georgia</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard And Jan Mayen Islands">Svalbard And Jan
                                                                Mayen Islands</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syria">Syria</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania">Tanzania</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad And Tobago">Trinidad And Tobago</option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks And Caicos Islands">Turks And Caicos
                                                                Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates
                                                            </option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="231">United States of
                                                                America</option>
                                                            <option value="United States Minor Outlyin">United States Minor
                                                                Outlying Islands
                                                            </option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Vatican City State (Holy See)">Vatican City State
                                                                (Holy See)</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Vietnam">Vietnam</option>
                                                            <option value="Virgin Islands (British)">Virgin Islands
                                                                (British)</option>
                                                            <option value="Virgin Islands (US)">Virgin Islands (US)</option>
                                                            <option value="Wallis And Futuna Islands">Wallis And Futuna
                                                                Islands</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Yugoslavia">Yugoslavia</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>State</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-usps"></i></span>
                                                    </div>
                                                    <select name="state_id" id="state" class="form-control">
                                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar
                                                            Islands</option>
                                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                        <option value="Assam">Assam</option>
                                                        <option value="Bihar">Bihar</option>
                                                        <option value="Chandigarh">Chandigarh</option>
                                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli
                                                        </option>
                                                        <option value="Daman and Diu">Daman and Diu</option>
                                                        <option value="Delhi">Delhi</option>
                                                        <option value="Lakshadweep">Lakshadweep</option>
                                                        <option value="Puducherry">Puducherry</option>
                                                        <option value="Goa">Goa</option>
                                                        <option value="Gujarat">Gujarat</option>
                                                        <option value="Haryana">Haryana</option>
                                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                        <option value="Jharkhand">Jharkhand</option>
                                                        <option value="Karnataka">Karnataka</option>
                                                        <option value="Kerala">Kerala</option>
                                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                        <option value="Maharashtra">Maharashtra</option>
                                                        <option value="Manipur">Manipur</option>
                                                        <option value="Meghalaya">Meghalaya</option>
                                                        <option value="Mizoram">Mizoram</option>
                                                        <option value="Nagaland">Nagaland</option>
                                                        <option value="Odisha">Odisha</option>
                                                        <option value="Punjab">Punjab</option>
                                                        <option value="Rajasthan">Rajasthan</option>
                                                        <option value="Sikkim">Sikkim</option>
                                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                                        <option value="Telangana">Telangana</option>
                                                        <option value="Tripura">Tripura</option>
                                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                        <option value="Uttarakhand">Uttarakhand</option>
                                                        <option value="West Bengal">West Bengal</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('state'))
                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-lg-4">
                                                <label>City</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <input placeholder="City" class="form-control" id="city_id"
                                                        name="city_id">

                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <label>Category</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-list-alt"></i></span>
                                                    </div>
                                                   <select name="category" id="" class="form-control">
                                                       <option value="Technology">Technology</option>
                                                       <option value="Government">Government</option>
                                                       <option value="Designing">Designing</option>
                                                       <option value="Accouting&Consultancy">Accouting & Consultancy</option>
                                                       <option value="Web&Software">Web & Software</option>
                                                       <option value="DateScience">Date Science</option>
                                                       <option value="Writing&Translations">Writing & Translations</option>
                                                       <option value="DigitalMarketing">Digital Marketing</option>
                                                       <option value="Sales&Marketing">Sales & Marketing</option>
                                                   </select>
                                                </div>
                                                @if ($errors->has('state'))
                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                <label>Salary Form </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-wpforms"></i></span>
                                                    </div>
                                                    <input class="form-control" id="salary_from" name="salary_from"
                                                        type="number">
                                                </div>

                                            </div>

                                            <div class="col-lg-4">
                                                <label>Salary To</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-wpforms"></i></span>
                                                    </div>
                                                    <input class="form-control" id="salary_to" name="salary_to"
                                                        type="number">
                                                </div>

                                            </div>


                                            <div class="col-lg-4">
                                                <label>Salary Period </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-wpforms"></i></span>
                                                    </div>
                                                    <select class="form-control" id="salary_period_id"
                                                        name="salary_period_id">
                                                        <option value="" selected="selected">Select Salary Period
                                                        </option>
                                                        <option value="3">Weekly</option>
                                                        <option value="1">Monthly</option>
                                                        <option value="2">Yearly</option>
                                                    </select>
                                                </div>

                                            </div>


                                            <div class="col-lg-4">
                                                <label>Functional Area</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-chart-area"></i></span>
                                                    </div>
                                                    <select class="form-control" id="functional_area_id"
                                                        name="functional_area_id">
                                                        <option value="" selected="selected">Select Functional Area
                                                        </option>
                                                        <option value="Accountant">Accountant</option>
                                                        <option value="Accounts, Finance Financial">Accounts, Finance
                                                            Financial Services
                                                        </option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Admin Operation">Admin Operation</option>
                                                        <option value="Administration">Administration</option>
                                                        <option value="Administration Clerical">Administration Clerical
                                                        </option>
                                                        <option value="Advertising">Advertising</option>
                                                        <option value="Advertising">Advertising</option>
                                                        <option value="Advertisment">Advertisment</option>
                                                        <option value="Architects Construction">Architects Construction
                                                        </option>
                                                        <option value="Architecture">Architecture</option>
                                                        <option value="Bank Operation">Bank Operation</option>
                                                        <option value="Business Development">Business Development</option>
                                                        <option value="Business Management">Business Management</option>
                                                        <option value="Business Systems Analyst">Business Systems Analyst
                                                        </option>
                                                        <option value="Clerical">Clerical</option>
                                                        <option value="Client Services Custome">Client Services Customer
                                                            Support
                                                        </option>
                                                        <option value="Computer Hardware">Computer Hardware</option>
                                                        <option value="Computer Networking">Computer Networking</option>
                                                        <option value="Consultant">Consultant</option>
                                                        <option value="Content Writer">Content Writer</option>
                                                        <option value="Corporate Affairs">Corporate Affairs</option>
                                                        <option value="Creative Design">Creative Design</option>
                                                        <option value="Creative Writer">Creative Writer</option>
                                                        <option value="Customer Support">Customer Support</option>
                                                        <option value="Data Entry">Data Entry</option>
                                                        <option value="Data Entry Operator">Data Entry Operator</option>
                                                        <option value="Database Administration (DBA)">Database
                                                            Administration (DBA)</option>
                                                        <option value="Development">Development</option>
                                                        <option value="Distribution Logistics">Distribution Logistics
                                                        </option>
                                                        <option value="Education Training">Education Training</option>
                                                        <option value="Electronics Technician">Electronics Technician
                                                        </option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Engineering Construction">Engineering Construction
                                                        </option>
                                                        <option value="Executive Management">Executive Management</option>
                                                        <option value="Executive Secretary">Executive Secretary</option>
                                                        <option value="Field Operations">Field Operations</option>
                                                        <option value="Front Desk Clerk">Front Desk Clerk</option>
                                                        <option value="Front Desk Officer">Front Desk Officer</option>
                                                        <option value="Graphic Design">Graphic Design</option>
                                                        <option value="Hardware">Hardware</option>
                                                        <option value="Health Medicine">Health Medicine</option>
                                                        <option value="Health Safety">Health Safety</option>
                                                        <option value="Health Care">Health Care</option>
                                                        <option value="Health Related">Health Related</option>
                                                        <option value="Hotel Management">Hotel Management</option>
                                                        <option value="Hotel/Restaurant Management">Hotel/Restaurant
                                                            Management</option>
                                                        <option value="HR">HR</option>
                                                        <option value="Human Resources">Human Resources</option>
                                                        <option value="Import Export">Import Export</option>
                                                        <option value="Industrial Production">Industrial Production</option>
                                                        <option value="Installation Repair">Installation Repair</option>
                                                        <option value="Interior Designers Architects">Interior Designers
                                                            Architects</option>
                                                        <option value="Intern">Intern</option>
                                                        <option value="Internship">Internship</option>
                                                        <option value="Investment Operations">Investment Operations</option>
                                                        <option value="IT Security">IT Security</option>
                                                        <option value="IT Systems Analyst">IT Systems Analyst</option>
                                                        <option value="Legal Corporate Affairs">Legal Corporate Affairs
                                                        </option>
                                                        <option value="Legal Affairs">Legal Affairs</option>
                                                        <option value="Legal Research">Legal Research</option>
                                                        <option value="Logistics Warehousing">Logistics Warehousing</option>
                                                        <option value="Maintenance/Repair">Maintenance/Repair</option>
                                                        <option value="Management Consulting">Management Consulting</option>
                                                        <option value="Management Information System (MIS)">Management
                                                            Information System (MIS)</option>
                                                        <option value="Managerial">Managerial</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Manufacturing Operations">Manufacturing Operations
                                                        </option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Marketing">Marketing</option>
                                                        <option value="Media - Print Electronic">Media - Print Electronic
                                                        </option>
                                                        <option value="Media Advertising">Media Advertising</option>
                                                        <option value="Medical">Medical</option>
                                                        <option value="Medicine">Medicine</option>
                                                        <option value="Merchandising">Merchandising</option>
                                                        <option value="Merchandising Product M">Merchandising Product
                                                            Management
                                                        </option>
                                                        <option value="Monitoring Evaluation ">Monitoring Evaluation
                                                            (M&amp;E)
                                                        </option>
                                                        <option value="Network Administration">Network Administration
                                                        </option>
                                                        <option value="Network Operation">Network Operation</option>
                                                        <option value="Online Advertising">Online Advertising</option>
                                                        <option value="Online Marketing">Online Marketing</option>
                                                        <option value="Operations">Operations</option>
                                                        <option value="Planning">Planning</option>
                                                        <option value="Planning Development">Planning Development</option>
                                                        <option value="PR">PR</option>
                                                        <option value="Print Media">Print Media</option>
                                                        <option value="Printing">Printing</option>
                                                        <option value="Procurement">Procurement</option>
                                                        <option value="Product Developer">Product Developer</option>
                                                        <option value="Product Development">Product Development</option>
                                                        <option value="Product Development">Product Development</option>
                                                        <option value="Product Management">Product Management</option>
                                                        <option value="Production">Production</option>
                                                        <option value="Production Quality Control">Production Quality
                                                            Control</option>
                                                        <option value="Project Management">Project Management</option>
                                                        <option value="Project Management Consultant">Project Management
                                                            Consultant</option>
                                                        <option value="Public Relations">Public Relations</option>
                                                        <option value="QA">QA</option>
                                                        <option value="QC">QC</option>
                                                        <option value="Qualitative Research">Qualitative Research</option>
                                                        <option value="Quality Assurance (QA)">Quality Assurance (QA)
                                                        </option>
                                                        <option value="Quality Control">Quality Control</option>
                                                        <option value="Quality Inspection">Quality Inspection</option>
                                                        <option value="Recruiting">Recruiting</option>
                                                        <option value="Recruitment">Recruitment</option>
                                                        <option value="Repair Overhaul">Repair Overhaul</option>
                                                        <option value="Research Development ">Research Development (R&amp;D)
                                                        </option>
                                                        <option value="Research Evaluation">Research Evaluation</option>
                                                        <option value="Research Fellowships">Research Fellowships</option>
                                                        <option value="Researcher">Researcher</option>
                                                        <option value="Restaurant Management">Restaurant Management</option>
                                                        <option value="Retail">Retail</option>
                                                        <option value="Retail Wholesale">Retail Wholesale</option>
                                                        <option value="Retail Buyer">Retail Buyer</option>
                                                        <option value="Retail Buying">Retail Buying</option>
                                                        <option value="Retail Merchandising">Retail Merchandising</option>
                                                        <option value="Safety Environment">Safety Environment</option>
                                                        <option value="Sales">Sales</option>
                                                        <option value="Sales Business Development">Sales Business
                                                            Development</option>
                                                        <option value="Sales Support">Sales Support</option>
                                                        <option value="Search Engine Optimization (SEO)">Search Engine
                                                            Optimization (SEO)</option>
                                                        <option value="Secretarial, Clerical Fro">Secretarial, Clerical
                                                            Front Office
                                                        </option>
                                                        <option value="Security">Security</option>
                                                        <option value="Security Environment">Security Environment</option>
                                                        <option value="Security Guard">Security Guard</option>
                                                        <option value="SEM">SEM</option>
                                                        <option value="SMO">SMO</option>
                                                        <option value="Software Web Development">Software Web Development
                                                        </option>
                                                        <option value="Software Engineer">Software Engineer</option>
                                                        <option value="Software Testing">Software Testing</option>
                                                        <option value="Stores Warehousing">Stores Warehousing</option>
                                                        <option value="Supply Chain">Supply Chain</option>
                                                        <option value="Supply Chain Management">Supply Chain Management
                                                        </option>
                                                        <option value="Systems Analyst">Systems Analyst</option>
                                                        <option value="Teachers/Education, Train">Teachers/Education,
                                                            Training &amp;
                                                            Development</option>
                                                        <option value="Technical Writer">Technical Writer</option>
                                                        <option value="Tele Sale Representative">Tele Sale Representative
                                                        </option>
                                                        <option value="Telemarketing">Telemarketing</option>
                                                        <option value="Training Development">Training Development</option>
                                                        <option value="Transportation Warehousing">Transportation
                                                            Warehousing</option>
                                                        <option value="TSR">TSR</option>
                                                        <option value="Typing">Typing</option>
                                                        <option value="Warehousing">Warehousing</option>
                                                        <option value="Web Developer">Web Developer</option>
                                                        <option value="Web Marketing">Web Marketing</option>
                                                        <option value="Writer">Writer</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <label>Job Type</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-building"></i></span>
                                                    </div>
                                                    <select class="form-control" id="job_type_id" name="job_type_id">
                                                        <option value="" selected="selected">Select Job Type</option>
                                                        <option value="Contract">Contract</option>
                                                        <option value="Freelance">Freelance</option>
                                                        <option value="Full Time/Permanent">Full Time/Permanent</option>
                                                        <option value="Internship">Internship</option>
                                                        <option value="Part Time">Part Time</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <label>Gender</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-neuter"></i></span>
                                                    </div>
                                                    <select class="form-control" id="gender_id" name="gender_id">
                                                        <option value="" selected="selected">No preference</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-lg-4">
                                                <label>Required Degree Level</label>
                                                <div class="">
                                                    <div class="input-group-prepend d-flex">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-graduation-cap"></i></span>
                                                        <select class="form-control" id="degree_level_id"
                                                            name="degree_level_id">
                                                            <option value="" selected="selected">Select Required Degree
                                                                Level</option>
                                                            <option value="Non-Matriculation">Non-Matriculation</option>
                                                            <option value="Matriculation/O-Level">Matriculation/O-Level
                                                            </option>
                                                            <option value="Intermediate/A-Level">Intermediate/A-Level
                                                            </option>
                                                            <option value="Bachelors">Bachelors</option>
                                                            <option value="Masters">Masters</option>
                                                            <option value="MPhil/MS">MPhil/MS</option>
                                                            <option value="PHD/Doctorate">PHD/Doctorate</option>
                                                            <option value="Certification">Certification</option>
                                                            <option value="Diploma">Diploma</option>
                                                            <option value="Short Course">Short Course</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <label>Required job experience</label>
                                                <div class="">
                                                    <div class="input-group-prepend d-flex">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-building"></i></span>
                                                        <select class="form-control" id="job_experience_id"
                                                            name="job_experience_id">
                                                            <option value="" selected="selected">Select Required job
                                                                experience</option>
                                                            <option value="Fresh">Fresh</option>
                                                            <option value="Less Than 1 Year">Less Than 1 Year</option>
                                                            <option value="1 Year">1 Year</option>
                                                            <option value="2 Year">2 Year</option>
                                                            <option value="3 Year">3 Year</option>
                                                            <option value="4 Year">4 Year</option>
                                                            <option value="5 Year">5 Year</option>
                                                            <option value="6 Year">6 Year</option>
                                                            <option value="7 Year">7 Year</option>
                                                            <option value="8 Year">8 Year</option>
                                                            <option value="9 Year">9 Year</option>
                                                            <option value="10 Year">10 Year</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <label for="is_active" class="bold">Is Active?</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                        <div class="radio" id="uniform-active"><span
                                                                class="checked"><input id="active" name="is_active"
                                                                    type="radio" value="1"
                                                                    checked="&quot;checked&quot;"></span> Active</div>

                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio" id="uniform-not_active">
                                                            <span><input id="not_active" name="is_active" type="radio"
                                                                    value="0"> In-Active</span>
                                                        </div>
                                                    </label>
                                                </div>

                                            </div>
                                        
                                            <div class="col-lg-12">

                                                <div class="text-center d-flex pt-2">
                                                    <button type="submit"
                                                        class="btn btn-primary">Submit</button>&nbsp;&nbsp;
                                                    <button type="reset" class="btn btn-success">Reset</button>
                                                </div>
                                            </div>

                                        </div>

                                    </form>

                                    <!-- /.row -->
                                </div>
                            </div>
                            <!--/.col (left) -->
                        </div>
                        <!-- /.row -->
                    </div>

                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
