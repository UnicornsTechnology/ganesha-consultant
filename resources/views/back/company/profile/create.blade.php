@extends('layouts.back.master')
@section('title')
    Create Company | iStepUp Job Portal
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
                                    <h3 class="card-title mt-1">Company Form </h3>

                                    <a href="/company/profile/show" class="btn btn-info mx-3"><i class="fa fa-eye"
                                            aria-hidden="true"></i> View All Companies</a>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <div class="card-body">
                                    <form action="/company/profile/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputFile"> Add Company Logo</label>
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile" name="logo">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">

                                                <label> Company Name </label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="  Company Name"
                                                        name="name" value="{{ Auth::user()->name }}" readonly>
                                                </div>
                                               
                                            </div>

                                            <div class="col-md-4">
                                                <label>Company Email</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" placeholder="Company Email"
                                                        name="email" value="{{ old('email') }}">
                                                </div>
                                                @if ($errors->has('companyemail'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('companyemail') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Password</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder=" Password"
                                                        name="password" value="{{ old('password') }}">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>



                                            <div class="col-md-4">
                                                <label>Company CEO</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="  Company CEO"
                                                        name="ceo" value="{{ old('ceo') }}">
                                                </div>
                                                @if ($errors->has('companyceo'))
                                                    <span class="text-danger">{{ $errors->first('companyceo') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label>Industry</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-industry"></i></span>
                                                    </div>

                                                    <select class="form-control" id="industry_id" name="industry">
                                                        <option value="industry" selected="selected">Select Industry
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

                                            <div class="col-md-6">
                                                <label>Ownership Type</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-address-card"></i></span>
                                                    </div>
                                                    <select class="form-control" id="ownership_type_id" name="ownership">
                                                        <option value="" selected="selected"> Ownership type
                                                        </option>
                                                        <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                        <option value="Public">Public</option>
                                                        <option value="Private">Private</option>
                                                        <option value="Government">Government</option>
                                                        <option value="NGO">NGO</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('ownershiptype'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('ownershiptype') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-12 mb-3">
                                                <label>Company Details</label>
                                                <textarea id="summernote" name="company_details"></textarea>
                                                @if ($errors->has('companydetails'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('companydetails') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Location</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder=" SelectLocation"
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
                                                        <span class="input-group-text"><i class="fas fa-map-signs"></i></span>
                                                    </div>


                                                    <input type="text" class="form-control" placeholder="map" name="map"
                                                        value="{{ old('map') }}">
                                                </div>
                                                @if ($errors->has('map'))
                                                    <span class="text-danger">{{ $errors->first('map') }}</span>
                                                @endif
                                            </div>


                                            <div class="col-md-4">
                                                <label>No of Offices</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-laptop-house"></i></span>
                                                    </div>
                                                    <select class="form-control" id="no_of_offices" name="no_of_offices">
                                                        <option value="" selected="selected">Select num. of offices
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

                                            <div class="col-md-4">
                                                <label>Website</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="website"
                                                        name="website" value="{{ old('website') }}">
                                                </div>
                                                @if ($errors->has('website'))
                                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label> No of Employees</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fas fa-users"></i></span>
                                                    </div>
                                                    <select class="form-control" id="no_of_employees" name="employee">
                                                        <option value="" selected="selected">Select num. of
                                                            employees</option>
                                                        <option value="1-10">1-10</option>
                                                        <option value="11-50">11-50</option>
                                                        <option value="51-100">51-100</option>
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
                                                @if ($errors->has('no_of_employee'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('no_of_employee') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Established in</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-anchor"></i></span>
                                                    </div>
                                                    <select class="form-control" id="established_in"
                                                        name="established_in">
                                                        <option value="" selected="selected">Select Established In
                                                        </option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                        <option value="1996">1996</option>
                                                        <option value="1995">1995</option>
                                                        <option value="1994">1994</option>
                                                        <option value="1993">1993</option>
                                                        <option value="1992">1992</option>
                                                        <option value="1991">1991</option>
                                                        <option value="1990">1990</option>
                                                        <option value="1989">1989</option>
                                                        <option value="1988">1988</option>
                                                        <option value="1987">1987</option>
                                                        <option value="1986">1986</option>
                                                        <option value="1985">1985</option>
                                                        <option value="1984">1984</option>
                                                        <option value="1983">1983</option>
                                                        <option value="1982">1982</option>
                                                        <option value="1981">1981</option>
                                                        <option value="1980">1980</option>
                                                        <option value="1979">1979</option>
                                                        <option value="1978">1978</option>
                                                        <option value="1977">1977</option>
                                                        <option value="1976">1976</option>
                                                        <option value="1975">1975</option>
                                                        <option value="1974">1974</option>
                                                        <option value="1973">1973</option>
                                                        <option value="1972">1972</option>
                                                        <option value="1971">1971</option>
                                                        <option value="1970">1970</option>
                                                        <option value="1969">1969</option>
                                                        <option value="1968">1968</option>
                                                        <option value="1967">1967</option>
                                                        <option value="1966">1966</option>
                                                        <option value="1965">1965</option>
                                                        <option value="1964">1964</option>
                                                        <option value="1963">1963</option>
                                                        <option value="1962">1962</option>
                                                        <option value="1961">1961</option>
                                                        <option value="1960">1960</option>
                                                        <option value="1959">1959</option>
                                                        <option value="1958">1958</option>
                                                        <option value="1957">1957</option>
                                                        <option value="1956">1956</option>
                                                        <option value="1955">1955</option>
                                                        <option value="1954">1954</option>
                                                        <option value="1953">1953</option>
                                                        <option value="1952">1952</option>
                                                        <option value="1951">1951</option>
                                                        <option value="1950">1950</option>
                                                        <option value="1949">1949</option>
                                                        <option value="1948">1948</option>
                                                        <option value="1947">1947</option>
                                                        <option value="1946">1946</option>
                                                        <option value="1945">1945</option>
                                                        <option value="1944">1944</option>
                                                        <option value="1943">1943</option>
                                                        <option value="1942">1942</option>
                                                        <option value="1941">1941</option>
                                                        <option value="1940">1940</option>
                                                        <option value="1939">1939</option>
                                                        <option value="1938">1938</option>
                                                        <option value="1937">1937</option>
                                                        <option value="1936">1936</option>
                                                        <option value="1935">1935</option>
                                                        <option value="1934">1934</option>
                                                        <option value="1933">1933</option>
                                                        <option value="1932">1932</option>
                                                        <option value="1931">1931</option>
                                                        <option value="1930">1930</option>
                                                        <option value="1929">1929</option>
                                                        <option value="1928">1928</option>
                                                        <option value="1927">1927</option>
                                                        <option value="1926">1926</option>
                                                        <option value="1925">1925</option>
                                                        <option value="1924">1924</option>
                                                        <option value="1923">1923</option>
                                                        <option value="1922">1922</option>
                                                        <option value="1921">1921</option>
                                                        <option value="1920">1920</option>
                                                        <option value="1919">1919</option>
                                                        <option value="1918">1918</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('established'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('established') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Phone </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone-volume"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="phone"
                                                        name="phone" value="{{ old('phone') }}">
                                                </div>
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>mobile </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" placeholder="mobile"
                                                        name="mobile" value="{{ old('mobile') }}">
                                                </div>
                                                @if ($errors->has('mobile'))
                                                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                                @endif
                                            </div>







                                            <div class="col-md-4">
                                                <label>Facebook Address </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control"
                                                        placeholder="facebook address" name="facebook"
                                                        value="{{ old('facebookaddress') }}">
                                                </div>
                                                @if ($errors->has('facebookaddress'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('facebookaddress') }}</span>
                                                @endif
                                            </div>

                                            <!-- <div class="col-md-4">
                                                <label>Twitter </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control" placeholder="twitter"
                                                        name="twitter" value="{{ old('twitter') }}">
                                                </div>
                                                @if ($errors->has('twitter'))
                                                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                                @endif
                                            </div> -->

                                            <div class="col-md-4">
                                                <label>Linked In</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control" placeholder="linkedin"
                                                        name="linkedin" value="{{ old('linkedin') }}">
                                                </div>
                                                @if ($errors->has('linkedin'))
                                                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Google +</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-google-plus-g"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control" placeholder="Google +"
                                                        name="google" value="{{ old('google') }}">
                                                </div>
                                                @if ($errors->has('google'))
                                                    <span class="text-danger">{{ $errors->first('google') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Pinterest</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-pinterest"></i></span>
                                                    </div>
                                                    <input type="url" class="form-control" placeholder="pinterest"
                                                        name="pinterest" value="{{ old('pinterest') }}">
                                                </div>
                                                @if ($errors->has('pinterest'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('pinterest') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Country</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="fas fa-flag"></i></span>
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
                                                        <span class="input-group-text">
                                                        <i class="fab fa-usps"></i>
</span>
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

                                            <div class="col-md-4">
                                                <label>City</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                                    </div>
                                                    <input type="text" name="city" class="form-control"
                                                        placeholder=" city">
                                                </div>
                                                @if ($errors->has('city'))
                                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-12">
                                                <label>Package</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fab fa-usps"></i></span>
                                                    </div>
                                                    <select class="form-control" id="no_of_package" name="package">
                                                        <option value="" selected="selected">Select num. of packages
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
                                                @if ($errors->has('package'))
                                                    <span class="text-danger">{{ $errors->first('package') }}</span>
                                                @endif
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
