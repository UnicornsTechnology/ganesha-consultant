@extends('layouts.back.master')
@section('title')
    Update Company profile | iStepUp Job Portal
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
                                    <h3 class="card-title mt-1">Company update Form </h3>

                                    <!-- <a href="/dashboard/admin/company" class="btn btn-success mx-3"><i
                                            class="fa fa-eye" aria-hidden="true"></i> View All company</a> -->
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <div class="card-body">
                                    <form action="/company/profile/update" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $company[0]->id }}">

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="exampleInputFile"> Add Company Logo</label>
                                                <div class="mb-3">
                                                    <input class="form-control" value="{{ $company[0]->logo }}" type="file"
                                                        id="formFile" name="logo">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">

                                                <label> Company Name</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    </div>
                                                    <input type="text" value="{{ $company[0]->name }}" class="form-control"
                                                        placeholder="Company Name" name="name"
                                                        >
                                                </div>
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label>Company Email</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                                    </div>
                                                    <input type="email" value="{{ $company[0]->email }}"
                                                        class="form-control" placeholder="Company Email" name="email"
                                                        >
                                                </div>
                                                @if ($errors->has('companyemail'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('companyemail') }}</span>
                                                @endif
                                            </div>
                                            <!-- 
                                                    <div class="col-md-4">
                                                        <label>Password</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                                            </div>
                                                            <input type="text" value="{{ $company[0]->password }}"  class="form-control" placeholder=" Password" name="password" >
                                                        </div>
                                                        @if ($errors->has('password'))
                                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div> -->



                                            <div class="col-md-4">
                                                <label>Company CEO</label>

                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-street-view"></i></span>
                                                    </div>
                                                    <input type="text" value="{{ $company[0]->ceo }}" class="form-control"
                                                        placeholder="  Company CEO" name="ceo" >
                                                </div>
                                                @if ($errors->has('companyceo'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('companyceo') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label>Industry</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-industry"></i></span>
                                                    </div>
                                                    <select class="form-control" id="industry_id" name="industry_id">
                                                        <option value="{{ $company[0]->industry }}" selected="selected">
                                                            {{ $company[0]->industry }}
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
                                                @if ($errors->has('industry_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('industry_id') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-6">
                                                <label>Ownership Type</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-address-card"></i></span>
                                                    </div>
                                                    <select class="form-control" id="ownership_type_id"
                                                        name="ownership_type_id">
                                                        <option value="{{ $company[0]->ownership }}" selected>
                                                            {{ $company[0]->ownership }}
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
                                                <textarea id="summernote"
                                                    name="company_details"> {{ $company[0]->company_details }}</textarea>
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
                                                    <input type="text" value="{{ $company[0]->location }}"
                                                        class="form-control" placeholder="location" name="location"
                                                        >
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

                                                    <input type="text" value="{{ $company[0]->map }}" class="form-control" name="map"
                                                        placeholder="map"  >
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
                                                        <option value="{{ $company[0]->officies }}" selected>
                                                            {{ $company[0]->officies }}
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
                                                    <input type="text" value="{{ $company[0]->website }}"
                                                        class="form-control" placeholder="website" name="website"
                                                        >
                                                </div>
                                                @if ($errors->has('website'))
                                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                                @endif
                                            </div>

                                            <div class="col-md-4">
                                                <label> No of Employees</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                    </div>
                                                    <select class="form-control" id="no_of_employees"
                                                        name="no_of_employees">
                                                        <option value="{{ $company[0]->employee }}" selected>
                                                            {{ $company[0]->employee }}
                                                        </option>
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
                                                @if ($errors->has('no_of_employees'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('no_of_employees') }}</span>
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
                                                        <option value="{{ $company[0]->years }}" selected>
                                                            {{ $company[0]->years }}
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
                                                    <input type="number" value="{{ $company[0]->phone }}"
                                                        class="form-control" placeholder="phone" name="phone"
                                                        >
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
                                                    <input type="number" value="{{ $company[0]->mobaile }}"
                                                        class="form-control" placeholder="mobile" name="mobile"
                                                        >
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
                                                    <input type="url" value="{{ $company[0]->facebook }}"
                                                        class="form-control" placeholder="facebook address"
                                                        name="facebook" >
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
                                                                <span class="input-group-text">@</span>
                                                            </div>
                                                            <input type="text"  value="{{ $company[0]->facebook }}" class="form-control" placeholder="twitter" name="phone" >
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
                                                    <input type="url" value="{{ $company[0]->linkin }}"
                                                        class="form-control" placeholder="linkedin" name="linkedin"
                                                        >
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
                                                    <input type="url" value="{{ $company[0]->google }}"
                                                        class="form-control" placeholder="Google +" name="google"
                                                        >
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
                                                    <input type="url" value="{{ $company[0]->printerst }}"
                                                        class="form-control" placeholder="pinterest" name="pinterest"
                                                        >
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
                                                        <span class="input-group-text"><i class="fas fa-flag"></i></span>
                                                    </div>
                                                    <select class="form-control" id="country_id" name="country_id">
                                                        <option value="{{ $company[0]->country }}" selected>
                                                            {{ $company[0]->country }}</option>
                                                        <option value="1">Afghanistan</option>
                                                        <option value="2">Albania</option>
                                                        <option value="3">Algeria</option>
                                                        <option value="4">American Samoa</option>
                                                        <option value="5">Andorra</option>
                                                        <option value="6">Angola</option>
                                                        <option value="7">Anguilla</option>
                                                        <option value="8">Antarctica</option>
                                                        <option value="9">Antigua And Barbuda</option>
                                                        <option value="10">Argentina</option>
                                                        <option value="11">Armenia</option>
                                                        <option value="12">Aruba</option>
                                                        <option value="13">Australia</option>
                                                        <option value="14">Austria</option>
                                                        <option value="15">Azerbaijan</option>
                                                        <option value="16">Bahamas The</option>
                                                        <option value="17">Bahrain</option>
                                                        <option value="18">Bangladesh</option>
                                                        <option value="19">Barbados</option>
                                                        <option value="20">Belarus</option>
                                                        <option value="21">Belgium</option>
                                                        <option value="22">Belize</option>
                                                        <option value="23">Benin</option>
                                                        <option value="24">Bermuda</option>
                                                        <option value="25">Bhutan</option>
                                                        <option value="26">Bolivia</option>
                                                        <option value="27">Bosnia and Herzegovina</option>
                                                        <option value="28">Botswana</option>
                                                        <option value="29">Bouvet Island</option>
                                                        <option value="30">Brazil</option>
                                                        <option value="31">British Indian Ocean Territory</option>
                                                        <option value="32">Brunei</option>
                                                        <option value="33">Bulgaria</option>
                                                        <option value="34">Burkina Faso</option>
                                                        <option value="35">Burundi</option>
                                                        <option value="36">Cambodia</option>
                                                        <option value="37">Cameroon</option>
                                                        <option value="38">Canada</option>
                                                        <option value="39">Cape Verde</option>
                                                        <option value="40">Cayman Islands</option>
                                                        <option value="41">Central African Republic</option>
                                                        <option value="42">Chad</option>
                                                        <option value="43">Chile</option>
                                                        <option value="44">China</option>
                                                        <option value="45">Christmas Island</option>
                                                        <option value="46">Cocos (Keeling) Islands</option>
                                                        <option value="47">Colombia</option>
                                                        <option value="48">Comoros</option>
                                                        <option value="49">Republic Of The Congo</option>
                                                        <option value="50">Democratic Republic Of The Congo</option>
                                                        <option value="51">Cook Islands</option>
                                                        <option value="52">Costa Rica</option>
                                                        <option value="53">Cote D'Ivoire (Ivory Coast)</option>
                                                        <option value="54">Croatia (Hrvatska)</option>
                                                        <option value="55">Cuba</option>
                                                        <option value="56">Cyprus</option>
                                                        <option value="57">Czech Republic</option>
                                                        <option value="58">Denmark</option>
                                                        <option value="59">Djibouti</option>
                                                        <option value="60">Dominica</option>
                                                        <option value="61">Dominican Republic</option>
                                                        <option value="62">East Timor</option>
                                                        <option value="63">Ecuador</option>
                                                        <option value="64">Egypt</option>
                                                        <option value="65">El Salvador</option>
                                                        <option value="66">Equatorial Guinea</option>
                                                        <option value="67">Eritrea</option>
                                                        <option value="68">Estonia</option>
                                                        <option value="69">Ethiopia</option>
                                                        <option value="70">External Territories of Australia
                                                        </option>
                                                        <option value="71">Falkland Islands</option>
                                                        <option value="72">Faroe Islands</option>
                                                        <option value="73">Fiji Islands</option>
                                                        <option value="74">Finland</option>
                                                        <option value="75">France</option>
                                                        <option value="76">French Guiana</option>
                                                        <option value="77">French Polynesia</option>
                                                        <option value="78">French Southern Territories</option>
                                                        <option value="79">Gabon</option>
                                                        <option value="80">Gambia The</option>
                                                        <option value="81">Georgia</option>
                                                        <option value="82">Germany</option>
                                                        <option value="83">Ghana</option>
                                                        <option value="84">Gibraltar</option>
                                                        <option value="85">Greece</option>
                                                        <option value="86">Greenland</option>
                                                        <option value="87">Grenada</option>
                                                        <option value="88">Guadeloupe</option>
                                                        <option value="89">Guam</option>
                                                        <option value="90">Guatemala</option>
                                                        <option value="91">Guernsey and Alderney</option>
                                                        <option value="92">Guinea</option>
                                                        <option value="93">Guinea-Bissau</option>
                                                        <option value="94">Guyana</option>
                                                        <option value="95">Haiti</option>
                                                        <option value="96">Heard and McDonald Islands</option>
                                                        <option value="97">Honduras</option>
                                                        <option value="98">Hong Kong S.A.R.</option>
                                                        <option value="99">Hungary</option>
                                                        <option value="100">Iceland</option>
                                                        <option value="101">India</option>
                                                        <option value="102">Indonesia</option>
                                                        <option value="103">Iran</option>
                                                        <option value="104">Iraq</option>
                                                        <option value="105">Ireland</option>
                                                        <option value="106">Israel</option>
                                                        <option value="107">Italy</option>
                                                        <option value="108">Jamaica</option>
                                                        <option value="109">Japan</option>
                                                        <option value="110">Jersey</option>
                                                        <option value="111">Jordan</option>
                                                        <option value="112">Kazakhstan</option>
                                                        <option value="113">Kenya</option>
                                                        <option value="114">Kiribati</option>
                                                        <option value="115">Korea North</option>
                                                        <option value="116">Korea South</option>
                                                        <option value="117">Kuwait</option>
                                                        <option value="118">Kyrgyzstan</option>
                                                        <option value="119">Laos</option>
                                                        <option value="120">Latvia</option>
                                                        <option value="121">Lebanon</option>
                                                        <option value="122">Lesotho</option>
                                                        <option value="123">Liberia</option>
                                                        <option value="124">Libya</option>
                                                        <option value="125">Liechtenstein</option>
                                                        <option value="126">Lithuania</option>
                                                        <option value="127">Luxembourg</option>
                                                        <option value="128">Macau S.A.R.</option>
                                                        <option value="129">Macedonia</option>
                                                        <option value="130">Madagascar</option>
                                                        <option value="131">Malawi</option>
                                                        <option value="132">Malaysia</option>
                                                        <option value="133">Maldives</option>
                                                        <option value="134">Mali</option>
                                                        <option value="135">Malta</option>
                                                        <option value="136">Man (Isle of)</option>
                                                        <option value="137">Marshall Islands</option>
                                                        <option value="138">Martinique</option>
                                                        <option value="139">Mauritania</option>
                                                        <option value="140">Mauritius</option>
                                                        <option value="141">Mayotte</option>
                                                        <option value="142">Mexico</option>
                                                        <option value="143">Micronesia</option>
                                                        <option value="144">Moldova</option>
                                                        <option value="145">Monaco</option>
                                                        <option value="146">Mongolia</option>
                                                        <option value="147">Montserrat</option>
                                                        <option value="148">Morocco</option>
                                                        <option value="149">Mozambique</option>
                                                        <option value="150">Myanmar</option>
                                                        <option value="151">Namibia</option>
                                                        <option value="152">Nauru</option>
                                                        <option value="153">Nepal</option>
                                                        <option value="154">Netherlands Antilles</option>
                                                        <option value="155">Netherlands The</option>
                                                        <option value="156">New Caledonia</option>
                                                        <option value="157">New Zealand</option>
                                                        <option value="158">Nicaragua</option>
                                                        <option value="159">Niger</option>
                                                        <option value="160">Nigeria</option>
                                                        <option value="161">Niue</option>
                                                        <option value="162">Norfolk Island</option>
                                                        <option value="163">Northern Mariana Islands</option>
                                                        <option value="164">Norway</option>
                                                        <option value="165">Oman</option>
                                                        <option value="166">Pakistan</option>
                                                        <option value="167">Palau</option>
                                                        <option value="168">Palestinian Territory Occupied</option>
                                                        <option value="169">Panama</option>
                                                        <option value="170">Papua new Guinea</option>
                                                        <option value="171">Paraguay</option>
                                                        <option value="172">Peru</option>
                                                        <option value="173">Philippines</option>
                                                        <option value="174">Pitcairn Island</option>
                                                        <option value="175">Poland</option>
                                                        <option value="176">Portugal</option>
                                                        <option value="177">Puerto Rico</option>
                                                        <option value="178">Qatar</option>
                                                        <option value="179">Reunion</option>
                                                        <option value="180">Romania</option>
                                                        <option value="181">Russia</option>
                                                        <option value="182">Rwanda</option>
                                                        <option value="183">Saint Helena</option>
                                                        <option value="184">Saint Kitts And Nevis</option>
                                                        <option value="185">Saint Lucia</option>
                                                        <option value="186">Saint Pierre and Miquelon</option>
                                                        <option value="187">Saint Vincent And The Grenadines
                                                        </option>
                                                        <option value="188">Samoa</option>
                                                        <option value="189">San Marino</option>
                                                        <option value="190">Sao Tome and Principe</option>
                                                        <option value="191">Saudi Arabia</option>
                                                        <option value="192">Senegal</option>
                                                        <option value="193">Serbia</option>
                                                        <option value="194">Seychelles</option>
                                                        <option value="195">Sierra Leone</option>
                                                        <option value="196">Singapore</option>
                                                        <option value="197">Slovakia</option>
                                                        <option value="198">Slovenia</option>
                                                        <option value="199">Smaller Territories of the UK</option>
                                                        <option value="200">Solomon Islands</option>
                                                        <option value="201">Somalia</option>
                                                        <option value="202">South Africa</option>
                                                        <option value="203">South Georgia</option>
                                                        <option value="204">South Sudan</option>
                                                        <option value="205">Spain</option>
                                                        <option value="206">Sri Lanka</option>
                                                        <option value="207">Sudan</option>
                                                        <option value="208">Suriname</option>
                                                        <option value="209">Svalbard And Jan Mayen Islands</option>
                                                        <option value="210">Swaziland</option>
                                                        <option value="211">Sweden</option>
                                                        <option value="212">Switzerland</option>
                                                        <option value="213">Syria</option>
                                                        <option value="214">Taiwan</option>
                                                        <option value="215">Tajikistan</option>
                                                        <option value="216">Tanzania</option>
                                                        <option value="217">Thailand</option>
                                                        <option value="218">Togo</option>
                                                        <option value="219">Tokelau</option>
                                                        <option value="220">Tonga</option>
                                                        <option value="221">Trinidad And Tobago</option>
                                                        <option value="222">Tunisia</option>
                                                        <option value="223">Turkey</option>
                                                        <option value="224">Turkmenistan</option>
                                                        <option value="225">Turks And Caicos Islands</option>
                                                        <option value="226">Tuvalu</option>
                                                        <option value="227">Uganda</option>
                                                        <option value="228">Ukraine</option>
                                                        <option value="229">United Arab Emirates</option>
                                                        <option value="230">United Kingdom</option>
                                                        <option value="231" selected="selected">United States of
                                                            America</option>
                                                        <option value="232">United States Minor Outlying Islands
                                                        </option>
                                                        <option value="233">Uruguay</option>
                                                        <option value="234">Uzbekistan</option>
                                                        <option value="235">Vanuatu</option>
                                                        <option value="236">Vatican City State (Holy See)</option>
                                                        <option value="237">Venezuela</option>
                                                        <option value="238">Vietnam</option>
                                                        <option value="239">Virgin Islands (British)</option>
                                                        <option value="240">Virgin Islands (US)</option>
                                                        <option value="241">Wallis And Futuna Islands</option>
                                                        <option value="242">Western Sahara</option>
                                                        <option value="243">Yemen</option>
                                                        <option value="244">Yugoslavia</option>
                                                        <option value="245">Zambia</option>
                                                        <option value="246">Zimbabwe</option>
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
                                                        <span class="input-group-text"><i class="fab fa-usps"></i></span>
                                                    </div>
                                                    <select name="state_id" id="state" class="form-control">
                                                        <option value="{{ $company[0]->state }}" selected>
                                                            {{ $company[0]->state }}</option>
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
                                                    <input type="text" value="{{ $company[0]->city }}" name="city_id"
                                                        class="form-control">

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
                                                    <select class="form-control" id="no_of_package"
                                                        name="company_package_id">
                                                        <option value="{{ $company[0]->package }}" selected>
                                                            {{ $company[0]->package }}
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

                                            <div class="col-12">

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
                                                <hr />
                                            </div>
                                            <!-- <div class="col-md-4">
                                                <div class="form-group ">
                                                    <label for="is_featured" class="bold">Is
                                                        Featured?</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline">
                                                            <div class="radio" id="uniform-featured">
                                                                <span><input id="featured" name="is_featured" type="radio"
                                                                        value="1"></span> Featured
                                                            </div>

                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio" id="uniform-not_featured">
                                                                <span class="checked"><input id="not_featured"
                                                                        name="is_featured" type="radio" value="0"
                                                                        checked="&quot;checked&quot;"></span> Not Featured
                                                            </div>

                                                        </label>
                                                    </div>
                                                </div> -->

                                                <div class="col-lg-2">

                                                    <div class="text-center d-flex mt-4 pt-2">
                                                        <button type="submit"
                                                            class="btn btn-primary">UPDATE</button>&nbsp;&nbsp;
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
