@extends('layouts.back.master')
@section('title')
    Create Candidate| istepup job-Portal
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
                                    <h3 class="card-title mt-1">Candidate Form </h3>

                                    <a href="/candidate/profile/show" class="btn btn-info mx-3"><i class="fa fa-eye"
                                            aria-hidden="true"></i> View All Candidate</a>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <div class="card-body">
                                    <form action="/candidate/create/{{$id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">

                                            <div class="col-lg-4">
                                                <input type="hidden" name="user_id" value="{{$id}}">
                                                <label> First Name</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="  First Name"
                                                        name="fname" value="{{ old('fname') }}">
                                                </div>
                                                @if ($errors->has('fname'))
                                                    <span class="text-danger">{{ $errors->first('fname') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">

                                                <label> Middle Name</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="  Middle Name"
                                                        name="mname" value="{{ old('mname') }}">
                                                </div>
                                                @if ($errors->has('mname'))
                                                    <span class="text-danger">{{ $errors->first('mname') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">

                                                <label> Last Name</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="  Last Name"
                                                        name="lname" value="{{ old('lname') }}">
                                                </div>
                                                @if ($errors->has('lname'))
                                                    <span class="text-danger">{{ $errors->first('lname') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Email</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Candidate Email"
                                                        name="email" value="{{ old('email') }}">
                                                </div>
                                                @if ($errors->has('Candidateemail'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('Candidateemail') }}</span>
                                                @endif
                                            </div>

                                            <!-- <div class="col-md-4">
                                                    <label>Password</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-lock"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder=" Password"
                                                            name="password" value="{{ old('password') }}">
                                                    </div>
                                                    @if ($errors->has('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div> -->



                                            <div class="col-md-4">
                                                <label>Phone </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-phone-alt"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="phone"
                                                        name="phone" value="{{ old('phone') }}">
                                                </div>
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Mobile </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-mobile-alt"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="mobile"
                                                        name="mobileno" value="{{ old('mobileno') }}">
                                                </div>
                                                @if ($errors->has('mobileno'))
                                                    <span class="text-danger">{{ $errors->first('mobileno') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Date Of Birth </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-calendar"></i></span>
                                                    </div>
                                                    <input type="date" class="form-control" placeholder="mobile"
                                                        name="bdate" value="{{ old('bdate') }}">
                                                </div>
                                                @if ($errors->has('bdate'))
                                                    <span class="text-danger">{{ $errors->first('bdate') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-md-4">
                                                <label>Gender</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-venus"></i></span>
                                                    </div>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option value="" selected="selected">Select
                                                        </option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>

                                                    </select>
                                                </div>
                                                @if ($errors->has('gender'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('ownershiptype') }}</span>
                                                @endif
                                            </div>



                                            <div class="col-md-4">
                                                <label>Martial Status</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-child"></i></span>
                                                    </div>
                                                    <select class="form-control" id="mstatus" name="mstatus">
                                                        <option value="" selected="selected">Select
                                                        </option>
                                                        <option value="Married">Married</option>
                                                        <option value="Unmarrid">Unmarrid</option>

                                                    </select>
                                                </div>
                                                @if ($errors->has('gender'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('ownershiptype') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-md-12">
                                                <label>Nationality</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-star-of-life"></i></span>
                                                    </div>
                                                    <select class="form-control" id="nationality" name="nationality">
                                                        <option value="" selected="selected">Select
                                                        </option>
                                                        <option value="Indian">Indian</option>
                                                        <option value="Foreign">Foreign</option>

                                                    </select>
                                                </div>
                                                @if ($errors->has('nationality'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('ownershiptype') }}</span>
                                                @endif
                                            </div>



                                            <div class="col-md-12">
                                                <label>Address</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-house-user"></i></span>
                                                    </div>
                                                    <textarea name="streetaddress" class="form-control" rows="3"
                                                        placeholder="Enter ..."></textarea>
                                                </div>
                                                @if ($errors->has('streetaddress'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('streetaddress') }}</span>
                                                @endif
                                            </div>



                                            {{-- <div class="col-md-4">
                                                <label>Facebook  </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="facebook address" name="facebook"
                                                        value="{{ old('facebookaddress') }}">
                                                </div>
                                                @if ($errors->has('facebookaddress'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('facebookaddress') }}</span>
                                                @endif
                                            </div> --}}


                                            {{-- <div class="col-md-4">
                                                <label>Pinterest</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="pinterest"
                                                        name="pinterest" value="{{ old('pinterest') }}">
                                                </div>
                                                @if ($errors->has('pinterest'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('pinterest') }}</span>
                                                @endif
                                            </div> --}}

                                            <div class="col-md-4">
                                                <label>Country</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-globe"></i></span>
                                                    </div>
                                                    <select class="form-control" id="country_id" name="country">
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
                                                        <option value="United States of
                                                                    America<">United States of
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
                                                @if ($errors->has('country'))
                                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>State</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-globe"></i></span>
                                                    </div>
                                                    <select name="state" id="state" class="form-control">
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

                                            <div class="col-md-4">
                                                <label>City</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-globe"></i></span>
                                                    </div>
                                                    <input type="text" name="city" id="" class="form-control">
                                                </div>
                                                @if ($errors->has('city'))
                                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>


                                            {{-- <div class="col-md-4">
                                                <label>Candidate CEO</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="  Candidate CEO"
                                                        name="ceo" value="{{ old('ceo') }}">
                                                </div>
                                                @if ($errors->has('Candidateceo'))
                                                    <span class="text-danger">{{ $errors->first('Candidateceo') }}</span>
                                                @endif
                                            </div> --}}



                                            <div class="col-md-6">
                                                <label>Industry</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-industry"></i></span>
                                                    </div>

                                                    <select class="form-control" id="industry_id" name="industry">
                                                        <option value="" selected="selected">Select Industry
                                                        </option>
                                                        <option value="Accounting/Taxation">Accounting/Taxation</option>
                                                        <option value="Advertising/PR">Advertising/PR</option>
                                                        <option value="Agriculture/Fertilizer/Pesticide">
                                                            Agriculture/Fertilizer/Pesticide</option>
                                                        <option value="Apparel/Clothing">Apparel/Clothing</option>
                                                        <option value="Architecture/Interior Design">Architecture/Interior
                                                            Design</option>
                                                        <option value="Arts / Entertainment">Arts / Entertainment</option>
                                                        <option value="AutoMobile">AutoMobile</option>
                                                        <option value="Aviation">Aviation</option>
                                                        <option value="Banking/Financial Services">Banking/Financial
                                                            Services</option>
                                                        <option value="BPO">BPO</option>
                                                        <option value="Broadcasting">Broadcasting</option>
                                                        <option value="Business Development">Business Development</option>
                                                        <option value="Call Center">Call Center</option>
                                                        <option value="Chemicals">Chemicals</option>
                                                        <option value="Construction/Cement/Metals">
                                                            Construction/Cement/Metals</option>
                                                        <option value="Consultants">Consultants</option>
                                                        <option value="Courier/Logistics">Courier/Logistics</option>
                                                        <option value="Distribution and Logistics">Distribution and
                                                            Logistics</option>
                                                        <option value="Education/Training">Education/Training</option>
                                                        <option value="Electronics">Electronics</option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Event Management">Event Management</option>
                                                        <option value="Fashion">Fashion</option>
                                                        <option value="Fast Moving Consumer Goods (FMCG)">Fast Moving
                                                            Consumer Goods (FMCG)</option>
                                                        <option value="Food &amp; Beverages">Food &amp; Beverages</option>
                                                        <option value="Gems &amp; Jewelery">Gems &amp; Jewelery</option>
                                                        <option value="Government">Government</option>
                                                        <option value="Health &amp; Fitness">Health &amp; Fitness</option>
                                                        <option value="Healthcare/Hospital/Medical">
                                                            Healthcare/Hospital/Medical</option>
                                                        <option value="Hospitality">Hospitality</option>
                                                        <option value="Hotel Management / Restaurants">Hotel Management /
                                                            Restaurants</option>
                                                        <option value="Importers/ Distributors/">Importers/
                                                            Distributors/Exporters
                                                        </option>
                                                        <option value="Information Technology">Information Technology
                                                        </option>
                                                        <option value="Insurance / Takaful">Insurance / Takaful</option>
                                                        <option value="Investments">Investments</option>
                                                        <option value="Law Firms/Legal">Law Firms/Legal</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Media/Communications">Media/Communications</option>
                                                        <option value="Mining/Oil &amp; Gas/Petroleum">Mining/Oil &amp;
                                                            Gas/Petroleum</option>
                                                        <option value="N.G.O./Social Services">N.G.O./Social Services
                                                        </option>
                                                        <option value="Packaging">Packaging</option>
                                                        <option value="Personal Care and Services">Personal Care and
                                                            Services</option>
                                                        <option value="Pharmaceuticals/Clinical Research">
                                                            Pharmaceuticals/Clinical Research</option>
                                                        <option value="Power/Energy">Power/Energy</option>
                                                        <option value="Project Management">Project Management</option>
                                                        <option value="Publishing/Printing">Publishing/Printing</option>
                                                        <option value="Real Estate/Property">Real Estate/Property</option>
                                                        <option value="Recruitment/Employment Firms">Recruitment/Employment
                                                            Firms</option>
                                                        <option value="Retail">Retail</option>
                                                        <option value="Security/Law Enforcement">Security/Law Enforcement
                                                        </option>
                                                        <option value="Services">Services</option>
                                                        <option value="Shipping/Marine">Shipping/Marine</option>
                                                        <option value="Telecommunication/ISP">Telecommunication/ISP</option>
                                                        <option value="Textiles/Garments">Textiles/Garments</option>
                                                        <option value="Tiles &amp; Ceramics">Tiles &amp; Ceramics</option>
                                                        <option value="Travel/Tourism/Transportation">
                                                            Travel/Tourism/Transportation</option>
                                                        <option value="Warehousing">Warehousing</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('industry'))
                                                    <span class="text-danger">{{ $errors->first('industry') }}</span>
                                                @endif
                                            </div>




                                            {{-- <div class="col-md-4">
                                                <label>Location</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="website"
                                                        name="location" value="{{ old('location') }}">
                                                </div>
                                                @if ($errors->has('location'))
                                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-md-4">
                                                <label>Google Maps</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                                    </div>

                                                    <input type="text" class="form-control" placeholder="map" <input
                                                        type="text" class="form-control" placeholder="website" name="map"
                                                        value="{{ old('map') }}">
                                                </div>
                                                @if ($errors->has('map'))
                                                    <span class="text-danger">{{ $errors->first('map') }}</span>
                                                @endif
                                            </div> --}}


                                            <div class="col-md-6">
                                                <label>Career Level</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-layer-group"></i></span>
                                                    </div>
                                                    <select class="form-control" id="no_of_offices" name="careerlevel">
                                                        <option value="" selected="selected">Career Level
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('noofoffices'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('noofoffices') }}</span>
                                                @endif
                                            </div>



                                            <div class="col-md-12">
                                                <label>Functional Area</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-clone"></i></span>
                                                    </div>
                                                    <select class="form-control" id="functional_area_id" name="farea">
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
                                                @if ($errors->has('Functional Area'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('Functional Area') }}</span>
                                                @endif
                                            </div>

                                            <!-- <div class="col-md-4">
                                                    <label> Current Salary</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                                        </div>
                                                        <select class="form-control" id="no_of_employees"
                                                            name="csalary">
                                                            <option value="" selected="selected">Current Salary
                                                                </option>
                                                            <option value="10000">10000</option>
                                                            <option value="15000">15000</option>
                                                            <option value="20000">20000</option>
                                                            <option value="101-200">101-200</option>
                                                            <option value="201-300">201-300</option>
                                                            <option value="301-600">301-600</option>
                                                            <option value="601-1000">601-1000</option>
                                                            <option value="1001-1500">1001-1500</option>
                                                            <option value="1501-2000">1501-2000</option>
                                                            <option value="2001-2500">2001-2500</option>
                                                            <option value="2501-3000">2501-3000</option>
                                                            <option value="3001-3500">3001-3500</option>
                                                            <option value="3501-4000">3501-4000</option>
                                                            <option value="4001-4500">4001-4500</option>
                                                            <option value="4501-5000">4501-5000</option>
                                                            <option value="5000+">5000+</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('no_of_employees'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('no_of_employees') }}</span>
                                                    @endif
                                                </div> -->

                                            <!-- <div class="col-md-4">
                                                    <label>Expected Salary</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                                                        </div>
                                                        <select class="form-control" id="established_in"
                                                            name="esalary">
                                                            <option value="" selected="selected">Expected Salary

                                                            </option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                         
                                                            
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('expected Salary
    '))
                                                        <span
                                                            class="text-danger">{{ $errors->first('expected Salary') }}</span>
                                                    @endif
                                                </div> -->




                                            <!-- <div class="col-12 mb-3">
                                                    <label>Job Experience</label>
                                                    <textarea id="summernote" name="experience"></textarea>
                                                    @if ($errors->has('experience'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('experience') }}</span>
                                                    @endif
                                                </div> -->

                                            <div class="col-12 mb-3">
                                                <label>Job Experience</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-venus"></i></span>
                                                    </div>
                                                    <select class="form-control" id="job_experience_id"
                                                        name="experience">
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
                                                @if ($errors->has('experience'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('experience') }}</span>
                                                @endif
                                            </div>


















                                            {{-- <div class="col-md-12">
                                                <label>Package</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                    </div>
                                                    <select class="form-control" id="Candidate_package_id"
                                                        name="Candidate_package_id">
                                                        <option value="" selected="selected">Select Package</option>
                                                        <option value="3">Basic, $9.99, Days:30, Listings:10
                                                        </option>
                                                        <option value="4">Premium, $19.99, Days:90, Listings:30
                                                        </option>
                                                        <option value="7">Free package, $0.00, Days:10, Listings:5
                                                        </option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('package'))
                                                    <span class="text-danger">{{ $errors->first('package') }}</span>
                                                @endif
                                            </div> --}}


                                            <!-- <div class="col-md-4">
                                                    <label>Twitter </label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="twitter"
                                                            name="phone" value="{{ old('twitter') }}">
                                                    </div>
                                                    @if ($errors->has('twitter'))
                                                        <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                                    @endif
                                                </div> -->

                                            <div class="col-md-6">
                                                <label>Linked In</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-linkedin"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control" placeholder="linkedin"
                                                        name="linkin" value="{{ old('linkin') }}">
                                                </div>
                                                @if ($errors->has('linkin'))
                                                    <span class="text-danger">{{ $errors->first('linkin') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label>Google +</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-google-plus-square"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control" placeholder="Google +"
                                                        name="google" value="{{ old('google') }}">
                                                </div>
                                                @if ($errors->has('google'))
                                                    <span class="text-danger">{{ $errors->first('google') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputFile">Candidate photo</label>
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile"
                                                        name="profile_photo">
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputFile"> Add  Candidate Resume</label>
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile" name="resume">
                                                </div>
                                            </div>





                                            <div class="col-lg-2">

                                                <div class="text-center d-flex mt-4 pt-2">
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
