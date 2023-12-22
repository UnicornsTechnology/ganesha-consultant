@extends('layouts.back.master')
@section('title')
    Update Job | iStepUp Job Portal
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
                                <h3 class="card-title mt-1">Update Job Form </h3>

                                <a href="/dashboard/company/jobs" class="btn btn-info mx-3"><i class="fa fa-eye"
                                        aria-hidden="true"></i> View All Job</a>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <div class="card-body">
                                <form action="/company/jobs/update" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $jobpost->id }}">
                                    <div class="col-lg-12">
                                        <label>Job Title</label>

                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            <input type="text" value="{{ $jobpost->jtitle }}" class="form-control"
                                                placeholder="  Job Title" name="jtitle">
                                        </div>

                                    </div>
                                    <div class="col-lg-12 my-3">
                                        <label>Job Description</label>
                                        <div class="input-group mb-12">
                                            <textarea id="summernote" name="jobd">
                                                        {!! $jobpost->jdec !!}</textarea>

                                        </div>


                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <label>Country</label>
                                            <div class="">
                                                <div class="input-group-prepend d-flex">
                                                    <span class="input-group-text"><i class="far fa-flag"></i></span>

                                                    <select class="form-control" id="country_id" name="country_id">

                                                        <option value="{{ $jobpost->country }}" selected="selected">
                                                            {{ $jobpost->country }}</option>
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
                                        <div class="col-lg-4">
                                            <label>State</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-usps"></i></span>
                                                </div>
                                                <select name="state_id" id="state" class="form-control">
                                                    <option value="{{ $jobpost->state }}" selected="selected">
                                                        {{ $jobpost->state }}</option>
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
                                                    <input type="text" class="form-control" placeholder="select City"
                                                        name="city_id" value="{{ $jobpost->city }}">
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Category</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <select name="category" class="form-control" id="">
                                                    <option value="{{ $jobpost->category }}" selected>
                                                        {{ $jobpost->category }}</option>
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
                                                    type="number" value="{{ $jobpost->salaryf }}">
                                            </div>

                                        </div>

                                        <div class="col-lg-4">
                                            <label>Salary To</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-wpforms"></i></span>
                                                </div>
                                                <input class="form-control" id="salary_to" name="salary_to" type="number"
                                                    value="{{ $jobpost->salaryto }}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <label>Salary Period </label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fab fa-wpforms"></i></span>
                                                </div>
                                                <select class="form-control" id="salary_period_id"
                                                    name="salary_period_id">
                                                    <option value="{{ $jobpost->salaryper }}" selected="selected">
                                                        {{ $jobpost->salaryper }}
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
                                                    <span class="input-group-text"><i class="fas fa-chart-area"></i></span>
                                                </div>
                                                <select class="form-control" id="functional_area_id"
                                                    name="functional_area_id">
                                                    <option value="{{ $jobpost->farea }}" selected="selected">
                                                        {{ $jobpost->farea }}
                                                    </option>
                                                    <option value="1">Accountant</option>
                                                    <option value="2">Accounts, Finance &amp; Financial Services
                                                    </option>
                                                    <option value="3">Admin</option>
                                                    <option value="4">Admin Operation</option>
                                                    <option value="5">Administration</option>
                                                    <option value="6">Administration Clerical</option>
                                                    <option value="7">Advertising</option>
                                                    <option value="8">Advertising</option>
                                                    <option value="9">Advertisment</option>
                                                    <option value="10">Architects &amp; Construction</option>
                                                    <option value="11">Architecture</option>
                                                    <option value="12">Bank Operation</option>
                                                    <option value="13">Business Development</option>
                                                    <option value="14">Business Management</option>
                                                    <option value="15">Business Systems Analyst</option>
                                                    <option value="16">Clerical</option>
                                                    <option value="17">Client Services &amp; Customer Support
                                                    </option>
                                                    <option value="18">Computer Hardware</option>
                                                    <option value="19">Computer Networking</option>
                                                    <option value="20">Consultant</option>
                                                    <option value="21">Content Writer</option>
                                                    <option value="22">Corporate Affairs</option>
                                                    <option value="23">Creative Design</option>
                                                    <option value="24">Creative Writer</option>
                                                    <option value="25">Customer Support</option>
                                                    <option value="26">Data Entry</option>
                                                    <option value="27">Data Entry Operator</option>
                                                    <option value="28">Database Administration (DBA)</option>
                                                    <option value="29">Development</option>
                                                    <option value="30">Distribution &amp; Logistics</option>
                                                    <option value="31">Education &amp; Training</option>
                                                    <option value="32">Electronics Technician</option>
                                                    <option value="33">Engineering</option>
                                                    <option value="34">Engineering Construction</option>
                                                    <option value="35">Executive Management</option>
                                                    <option value="36">Executive Secretary</option>
                                                    <option value="37">Field Operations</option>
                                                    <option value="38">Front Desk Clerk</option>
                                                    <option value="39">Front Desk Officer</option>
                                                    <option value="40">Graphic Design</option>
                                                    <option value="41">Hardware</option>
                                                    <option value="42">Health &amp; Medicine</option>
                                                    <option value="43">Health &amp; Safety</option>
                                                    <option value="44">Health Care</option>
                                                    <option value="45">Health Related</option>
                                                    <option value="46">Hotel Management</option>
                                                    <option value="47">Hotel/Restaurant Management</option>
                                                    <option value="48">HR</option>
                                                    <option value="49">Human Resources</option>
                                                    <option value="50">Import &amp; Export</option>
                                                    <option value="51">Industrial Production</option>
                                                    <option value="52">Installation &amp; Repair</option>
                                                    <option value="53">Interior Designers &amp; Architects</option>
                                                    <option value="54">Intern</option>
                                                    <option value="55">Internship</option>
                                                    <option value="56">Investment Operations</option>
                                                    <option value="57">IT Security</option>
                                                    <option value="58">IT Systems Analyst</option>
                                                    <option value="59">Legal &amp; Corporate Affairs</option>
                                                    <option value="60">Legal Affairs</option>
                                                    <option value="61">Legal Research</option>
                                                    <option value="62">Logistics &amp; Warehousing</option>
                                                    <option value="63">Maintenance/Repair</option>
                                                    <option value="64">Management Consulting</option>
                                                    <option value="65">Management Information System (MIS)</option>
                                                    <option value="66">Managerial</option>
                                                    <option value="67">Manufacturing</option>
                                                    <option value="68">Manufacturing &amp; Operations</option>
                                                    <option value="69">Marketing</option>
                                                    <option value="70">Marketing</option>
                                                    <option value="71">Media - Print &amp; Electronic</option>
                                                    <option value="72">Media &amp; Advertising</option>
                                                    <option value="73">Medical</option>
                                                    <option value="74">Medicine</option>
                                                    <option value="75">Merchandising</option>
                                                    <option value="76">Merchandising &amp; Product Management
                                                    </option>
                                                    <option value="77">Monitoring &amp; Evaluation (M&amp;E)
                                                    </option>
                                                    <option value="78">Network Administration</option>
                                                    <option value="79">Network Operation</option>
                                                    <option value="80">Online Advertising</option>
                                                    <option value="81">Online Marketing</option>
                                                    <option value="82">Operations</option>
                                                    <option value="83">Planning</option>
                                                    <option value="84">Planning &amp; Development</option>
                                                    <option value="85">PR</option>
                                                    <option value="86">Print Media</option>
                                                    <option value="87">Printing</option>
                                                    <option value="88">Procurement</option>
                                                    <option value="89">Product Developer</option>
                                                    <option value="90">Product Development</option>
                                                    <option value="91">Product Development</option>
                                                    <option value="92">Product Management</option>
                                                    <option value="93">Production</option>
                                                    <option value="94">Production &amp; Quality Control</option>
                                                    <option value="95">Project Management</option>
                                                    <option value="96">Project Management Consultant</option>
                                                    <option value="97">Public Relations</option>
                                                    <option value="98">QA</option>
                                                    <option value="99">QC</option>
                                                    <option value="100">Qualitative Research</option>
                                                    <option value="101">Quality Assurance (QA)</option>
                                                    <option value="102">Quality Control</option>
                                                    <option value="103">Quality Inspection</option>
                                                    <option value="104">Recruiting</option>
                                                    <option value="105">Recruitment</option>
                                                    <option value="106">Repair &amp; Overhaul</option>
                                                    <option value="107">Research &amp; Development (R&amp;D)
                                                    </option>
                                                    <option value="108">Research &amp; Evaluation</option>
                                                    <option value="109">Research &amp; Fellowships</option>
                                                    <option value="110">Researcher</option>
                                                    <option value="111">Restaurant Management</option>
                                                    <option value="112">Retail</option>
                                                    <option value="113">Retail &amp; Wholesale</option>
                                                    <option value="114">Retail Buyer</option>
                                                    <option value="115">Retail Buying</option>
                                                    <option value="116">Retail Merchandising</option>
                                                    <option value="117">Safety &amp; Environment</option>
                                                    <option value="118">Sales</option>
                                                    <option value="119">Sales &amp; Business Development</option>
                                                    <option value="120">Sales Support</option>
                                                    <option value="121">Search Engine Optimization (SEO)</option>
                                                    <option value="122">Secretarial, Clerical &amp; Front Office
                                                    </option>
                                                    <option value="123">Security</option>
                                                    <option value="124">Security &amp; Environment</option>
                                                    <option value="125">Security Guard</option>
                                                    <option value="126">SEM</option>
                                                    <option value="127">SMO</option>
                                                    <option value="128">Software &amp; Web Development</option>
                                                    <option value="129">Software Engineer</option>
                                                    <option value="130">Software Testing</option>
                                                    <option value="131">Stores &amp; Warehousing</option>
                                                    <option value="132">Supply Chain</option>
                                                    <option value="133">Supply Chain Management</option>
                                                    <option value="134">Systems Analyst</option>
                                                    <option value="135">Teachers/Education, Training &amp;
                                                        Development</option>
                                                    <option value="136">Technical Writer</option>
                                                    <option value="137">Tele Sale Representative</option>
                                                    <option value="138">Telemarketing</option>
                                                    <option value="139">Training &amp; Development</option>
                                                    <option value="140">Transportation &amp; Warehousing</option>
                                                    <option value="141">TSR</option>
                                                    <option value="142">Typing</option>
                                                    <option value="143">Warehousing</option>
                                                    <option value="144">Web Developer</option>
                                                    <option value="145">Web Marketing</option>
                                                    <option value="146">Writer</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <label>Job Type</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                </div>
                                                <select class="form-control" id="job_type_id" name="job_type_id">
                                                    <option value="{{ $jobpost->jtype }}" selected="selected">
                                                        {{ $jobpost->jtype }}</option>
                                                    <option value="1">Contract</option>
                                                    <option value="2">Freelance</option>
                                                    <option value="3">Full Time/Permanent</option>
                                                    <option value="4">Internship</option>
                                                    <option value="5">Part Time</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-4">
                                            <label>Gender</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-neuter"></i></span>
                                                </div>
                                                <select class="form-control" id="gender_id" name="gender_id">
                                                    <option value="{{ $jobpost->gender }}" selected="selected">
                                                        {{ $jobpost->gender }}</option>
                                                    <option value="1">Female</option>
                                                    <option value="2">Male</option>
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
                                                        <option value="{{ $jobpost->rdegree }}" selected="selected">
                                                            {{ $jobpost->rdegree }}
                                                            Level</option>
                                                        <option value="1">Non-Matriculation</option>
                                                        <option value="2">Matriculation/O-Level</option>
                                                        <option value="3">Intermediate/A-Level</option>
                                                        <option value="4">Bachelors</option>
                                                        <option value="5">Masters</option>
                                                        <option value="6">MPhil/MS</option>
                                                        <option value="7">PHD/Doctorate</option>
                                                        <option value="8">Certification</option>
                                                        <option value="9">Diploma</option>
                                                        <option value="10">Short Course</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-lg-4">
                                            <label>Required job experience</label>
                                            <div class="">
                                                <div class="input-group-prepend d-flex">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    <select class="form-control" id="job_experience_id"
                                                        name="job_experience_id">
                                                        <option value="{{ $jobpost->rjobexp }}" selected="selected">
                                                            {{ $jobpost->rjobexp }}
                                                            experience</option>
                                                        <option value="11">Fresh</option>
                                                        <option value="12">Less Than 1 Year</option>
                                                        <option value="1">1 Year</option>
                                                        <option value="3">2 Year</option>
                                                        <option value="4">3 Year</option>
                                                        <option value="5">4 Year</option>
                                                        <option value="6">5 Year</option>
                                                        <option value="7">6 Year</option>
                                                        <option value="8">7 Year</option>
                                                        <option value="9">8 Year</option>
                                                        <option value="10">9 Year</option>
                                                        <option value="2">10 Year</option>
                                                    </select>
                                                </div>

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
                                                            type="radio" value="1"  @if ($jobpost->active === 1) checked @endif
                                                            ="&quot;checked&quot;"></span>
                                                    Active</div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="radio" id="uniform-not_active">
                                                    <span><input id="not_active" name="is_active" type="radio" value="0"  @if ($jobpost->active === 0) checked @endif>
                                                        In-Active</span>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">

                                        <div class="text-center d-flex mt-4 pt-2">
                                            <button type="submit" class="btn btn-primary">UPDATE</button>&nbsp;&nbsp;
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
