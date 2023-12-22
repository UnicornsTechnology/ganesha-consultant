@extends('layouts.web_admin_layout')
@section('title')
    Member Details
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Member Edit </h5>
                    <div>
                        <a href="/admin/all-members" class="btn btn-sm btn-success">Members View</a>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="/admin/member/update" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <!-- Basic Information -->
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <h3>Basic Information</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                                        placeholder="Enter Name" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"
                                        placeholder="Enter Email" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{$user->mobile}}"
                                        placeholder="Enter Mobile Number" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" class="form-select single-select-field" data-placeholder="Choose anything">
                                        <option value="1" @if ($user->gender == "1") selected @endif
                                        >Male</option>
                                        <option value="2" @if ($user->gender == "2") selected @endif>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="maritalStatus">Marital Status</label>
                                    <select id="maritalStatus" class="form-select single-select-field" name="marital_status" >
                                        <option value="1" @if ($user->marital_status == "1") selected @endif>Unmarried</option>
                                        <option value="2" @if ($user->martial_status == "2") selected @endif>Married</option>
                                        <option value="3" @if ($user->martial_status == "3") selected @endif>Divorced</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="profileCreatedFor">Profile Created For</label>
                                    <select id="profileCreatedFor" class="form-select single-select-field" name="profile_created_for">
                                        <option value="1"@if ($user->profile_created_for == "1") selected @endif>Self</option>
                                        <option value="2"@if ($user->profile_created_for == "2") selected @endif>Son/Daughter</option>
                                        <option value="3"@if ($user->profile_created_for == "3") selected @endif>For Mother/Father</option>
                                    </select>
                                </div>
                            </div>

                        
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Enter Password" >
                                </div>
                            </div>

                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirmPassword" name="password_confirmation"
                                        placeholder="Confirm Password" >
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- Advance Bio -->
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <h3>Advance Bio</h3>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="weight">Weight</label>
                                    <select id="weight" name="weight" class="form-select single-select-field" >
                                            @foreach ($data['weight'] as $item)
                                                <option value="{{ $item->weight_id }}" @if ($item->weight_id == $user->weight) selected @endif>
                                                    {{ $item->weight_count }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="dateOfBirth">Date Of Birth</label>
                                    <input type="date" class="form-control" id="dateOfBirth" name="date_of_birth" value="{{$user->date_of_birth}}"
                                        placeholder="Enter DOB" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="birthTime">Birth Time</label>
                                    <input type="time" class="form-control" id="birthTime" name="birth_time" value="{{$user->birth_time}}"
                                        placeholder="Birth Time" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="birthPlace">Birth Place</label>
                                    <input type="text" class="form-control" id="birthPlace" name="birth_place" value="{{$user->birth_place}}"
                                        placeholder="Birth Place" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="height">Height</label>
                                    <select name="height" class="form-select single-select-field" >
                                        @foreach ($data['height'] as $item)
                                            <option value="{{$item->height_id}}" @if ($item->height_id == $user->height) selected @endif>{{$item->height_count}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select class="form-select single-select-field" name="state">
                                        @foreach ($data['states'] as $item)
                                            <option value="{{$item->state_id}}" @if ($item->state_id == $user->state) selected @endif>{{$item->state_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="">Dist</label>
                                    <input type="text" class="form-control" id="dist" name="district" value="{{$user->district}}"
                                        placeholder="District" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="">Taluka</label>
                                    <input type="text" class="form-control" id="taluka" name="taluka" value="{{$user->taluka}}"
                                        placeholder="Enter Taluka" required>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="village">Village</label>
                                    <input type="text" class="form-control" id="village" name="village" value="{{$user->village}}"
                                        placeholder="Enter Village" required>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <select class="form-select single-select-field"  name="city">
                                        @foreach ($data['city'] as $item)
                                        <option value="{{$item->city_id}}" @if ($item->city_id == $user->city) selected @endif>{{$item->city_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="pin_code">Pin Code</label>
                                    <input type="text" class="form-control" id="pin_code" name="pin_code" value="{{$user->pin_code}}"
                                        placeholder="Enter Pin Code" required>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="mother_tongue">Mother Tongue</label>
                                    <select class="form-select single-select-field"  name="mother_tongue">
                                        @foreach ($data['motherT'] as $item)
                                        <option value="{{$item->mother_tongue_id}}" @if ($item->mother_tongue_id == $user->mother_tongue) selected @endif>{{$item->mother_tongue_name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                              <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="main_profile_pic">Main Profile Pic</label> @if($user->main_profile_pic != NULL)
                                        <img src="{{asset('uploads/profile/'. $user->main_profile_pic)}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @else
                                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @endif
                                        <br />
                                        <input type="file" class="form-control" id="main_profile_pic" name="main_profile_pic" value="{{$user->main_profile_pic}}"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                            
                                    </div>
                                </div>
                          

                        </div>

                       <!-- Divider -->
                       <hr class="my-4">

                       <!-- Job &&&&& Education -->
                       <div class="row">
                           <div class="col-md-12 text-center mb-2">
                               <h3>Job & Education</h3>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6 mt-3">
                               <div class="form-group">
                                   <label for="job_type">Job/Business Type</label>
                                   <select class="form-select single-select-field"  name="job_type">
                                    @foreach ($data['jobType'] as $item)
                                    <option value="{{$item->job_type_id}}" @if ($item->job_type_id == $user->job_type) selected @endif>{{$item->job_type_name}}</option>
                                @endforeach
                                   </select>
                               </div>
                           </div>

                           <div class="col-md-6 mt-3">
                               <div class="form-group">
                                   <label for="company_name">Company Name</label>
                                   <input type="text" class="form-control" id="company_name" name="company_name" value="{{$user->company_name}}"
                                       placeholder="Enter Company Name">
                               </div>
                           </div>

                           <div class="col-md-6 mt-3">
                               <div class="form-group">
                                   <label for="salary">Salary ( In Months )</label>
                                   <input type="number" class="form-control" id="salary" name="salary" value="{{$user->salary}}"
                                       placeholder="Enter Salary">
                               </div>
                           </div>
                           <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="education">Education</label>
                                <input type="text" class="form-control" id="education" name="education" value="{{$user->education}}"
                                    placeholder="Enter Education">
                            </div>
                        </div>
                       </div>
                        <!-- Divider -->
                        <hr class="my-4">

                        <!-- Caste and Community Information -->
                        <div class="row">
                            <div class="col-md-12 text-center mb-2">
                                <h3>Caste and Community Information</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="religion">Religion</label>
                                    <select class="form-select single-select-field" name="religion" >
                                        @foreach ($data['religion'] as $item)
                                        <option value="{{$item->religion_id}}" @if ($item->religion_id == $user->religion) selected @endif>{{$item->religion_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="caste">Caste</label>
                                    <select class="form-select single-select-field"  name="caste" >
                                        @foreach ($data['caste'] as $item)
                                        <option value="{{$item->caste_id}}" @if ($item->caste_id == $user->caste) selected @endif>{{$item->caste_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="subcaste">Subcaste</label>
                                    <select class="form-select single-select-field" name="subcaste">
                                        @foreach ($data['subCaste'] as $item)
                                        <option value="{{$item->subcaste_id}}" 
                                            @if ($item->subcaste_id == $user->subcaste) selected @endif>{{$item->subcaste_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="devak">Devak</label>
                                        <select class="form-select single-select-field" name="devak" >
                                            @foreach ($data['devak'] as $item)
                                            <option value="{{$item->devak_id}}" @if ($item->devak_id == $user->devak) selected @endif>{{$item->devak_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="nakshatra">Nakshatra</label>
                                        <select class="form-select single-select-field" name="nakshatra" >
                                            @foreach ($data['nakshatra'] as $item)
                                        <option value="{{$item->nakshatra_id}}" @if ($item->nakshatra_id == $user->nakshatra) selected @endif>{{$item->nakshatra_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="charan">Charan</label>
                                        <select class="form-select single-select-field" name="charan" >
                                            @foreach ($data['charan'] as $item)
                                            <option value="{{$item->charan_id}}" @if ($item->charan_id == $user->charan) selected @endif>{{$item->charan_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="gan">Gan</label>
                                        <select class="form-select single-select-field" name="gan">
                                            @foreach ($data['gan'] as $item)
                                            <option value="{{$item->gan_id}}" @if ($item->gan_id == $user->gan) selected @endif>{{$item->gan_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="raas">Raas</label>
                                        <select class="form-select single-select-field" name="raas">
                                            @foreach ($data['raas'] as $item)
                                        <option value="{{$item->raas_id}}" @if ($item->raas_id == $user->raas) selected @endif>{{$item->raas_name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="nad">Nad</label>
                                        <select class="form-select single-select-field" name="nad">
                                            @foreach ($data['nad'] as $item)
                                            <option value="{{$item->nad_id}}" @if ($item->nad_id == $user->nad) selected @endif>{{$item->nad_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="varg">Varg</label>
                                        <select class="form-select single-select-field" name="varg">
                                            @foreach ($data['varg'] as $item)
                                            <option value="{{$item->varg_id}}" @if ($item->varg_id == $user->varg) selected @endif>{{$item->varg_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="kul_devak">Kul Devak</label>
                                        <select class="form-select single-select-field" name="kul_devak">
                                            @foreach ($data['kulDevak'] as $item)
                                            <option value="{{$item->kul_devak_id}}" @if ($item->kulDevak_id == $user->kulDevak) selected @endif>{{$item->kul_devak_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            <!-- Divider -->
                            <hr class="my-4">

                            <!-- Health and Physical Information -->
                            <div class="row">
                                <div class="col-md-12 text-center mb-2">
                                    <h3>Health and Physical Information</h3>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="blood_group">Blood Group</label>
                                        <select class="form-select single-select-field"  name="blood_group">
                                            @foreach ($data['bloodGroup'] as $item)
                                            <option value="{{$item->blood_group_id}}" @if ($item->blood_group_id == $user->blood_group) selected @endif>{{$item->blood_group_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="color">Color</label>
                                        <select class="form-select single-select-field" name="color">
                                            @foreach ($data['color'] as $item)
                                            <option value="{{$item->color_id}}" @if ($item->color_id == $user->color) selected @endif>{{$item->color_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="body_type">Body Type</label>
                                        <select class="form-select single-select-field"  name="body_type" >
                                            @foreach ($data['bodyType'] as $item)
                                            <option value="{{$item->body_type_id}}" @if ($item->body_type_id == $user->body_type) selected @endif>{{$item->body_type_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="physical_status">Is Handicapped ?</label>
                                        <select class="form-select single-select-field"  name="physical_status">
                                            <option value="1" @if ($item->physical_status == 1) selected @endif>No</option>
                                            <option value="2" @if ($item->physical_status == 2) selected @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <!-- Divider -->
                            <hr class="my-4">

                            <!-- Family Information -->
                            <div class="row">
                                <div class="col-md-12 text-center mb-2">
                                    <h3>Family Information</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="father_full_name">Father's Full Name</label>
                                        <input type="text" class="form-control" id="father_full_name"
                                            name="father_full_name" value="{{$user->father_full_name}}" placeholder="Enter Father's Full Name">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="father_occupation">Father's Occupation</label>
                                        <input type="text" class="form-control" id="father_occupation"
                                            name="father_occupation" value="{{$user->father_occupation}}" placeholder="Enter Father's Occupation">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="mother_full_name">Mother's Full Name</label>
                                        <input type="text" class="form-control" id="mother_full_name"
                                            name="mother_full_name" value="{{$user->mother_full_name}}" placeholder="Enter Mother's Full Name">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="mother_occupation">Mother's Occupation</label>
                                        <input type="text" class="form-control" id="mother_occupation"
                                            name="mother_occupation" value="{{$user->mother_occupation}}" placeholder="Enter Mother's Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="brothers">Number of Brothers</label>
                                        <input type="number" class="form-control" id="brothers" name="brothers" value="{{$user->brothers}}"
                                            placeholder="Enter Number of Brothers" min="0">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="sisters">Number of Sisters</label>
                                        <input type="number" class="form-control" id="sisters" name="sisters" value="{{$user->sisters}}"
                                            placeholder="Enter Number of Sisters" min="0">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="mama">Mama</label>
                                        <input type="text" class="form-control" id="mama" name="mama" value="{{$user->mama}}"
                                            placeholder="Full Name of Mama Shree">
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="reletives">Relatives</label>
                                        <input type="text" class="form-control" id="relatives" name="relatives" value="{{$user->relatives}}"
                                            placeholder="Enter Relatives">
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="family_type">Family Type</label>
                                        <select class="form-select single-select-field" name="family_type" >
                                            <option value="1" @if ($item->family_type == 1) selected @endif>Joint</option>
                                            <option value="2" @if ($item->family_type == 1) selected @endif>Neuclear</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="property_details">Property Details</label>
                                        <input type="text" class="form-control" id="property_details"
                                            name="property_details" value="{{$user->property_details}}" placeholder="Enter Property Details">
                                    </div>
                                </div>

                            </div>
                            <!-- Divider -->
                            <hr class="my-4">

                            <!-- Habits & Hobbies Information -->
                            <div class="row">
                                <div class="col-md-12 text-center mb-2">
                                    <h3>Habits & Hobbies</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="diet">Diet</label>
                                        <select class="form-select single-select-field" name="diet" >
                                            <option value="1" @if ($item->diet == 1) selected @endif>Veg</option>
                                            <option value="2" @if ($item->diet == 2) selected @endif>Non-Veg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="smoking_habits">Smoking Habits</label>
                                        <select class="form-select single-select-field"  name="smoking_habits">
                                            <option value="1" @if ($item->smoking_habits == 1) selected @endif>No</option>
                                            <option value="2" @if ($item->smoking_habits == 1) selected @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="drinking_habits">Drinking Habits</label>
                                        <select id="drinking_habits" class="form-select single-select-field" name="drinking_habits">
                                            <option value="1" @if ($item->drinking_habits == 1) selected @endif>No</option>
                                            <option value="2" @if ($item->drinking_habits == 1) selected @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="hobbies">Hobbies</label>
                                        <select class="form-select single-select-field" data-placeholder="Choose Hobbies" id="hobbies" name="hobbies[]" multiple>
                                            @foreach ($data['hobbies'] as $item)
                                                <option value="{{ $item->hobby_id }}" 
                                                    @if (in_array($item->hobby_id, explode(',', $user->hobbies))) selected @endif>
                                                    {{ $item->hobby_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                   
                                </div>

                                 <!-- Divider -->
                            <hr class="my-4">
          
                             <div class="row">
                                <div class="col-md-12 text-center mb-2">
                                    <h3>Social Media</h3>
                                </div>
                            </div>


                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{$user->facebook}}"
                                                placeholder="Enter Facebook URL">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="whatsapp">WhatsApp</label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$user->whatsapp}}"
                                                placeholder="Enter WhatsApp Number">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{$user->instagram}}"
                                                placeholder="Enter Instagram Handle">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label for="youtube">YouTube</label>
                                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{$user->youtube}}"
                                                placeholder="Enter YouTube Channel URL">
                                        </div>
                                    </div>
                                </div>

                                <!-- Divider -->
                                <hr class="my-4">

                                <div class="row">
                                    <div class="col-md-12 text-center mb-2">
                                        <h3>Documents Upload</h3>
                                    </div>
                                </div>


                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="adhar">Adhaar Card</label>
                                        <br />
                                        <input type="file" class="form-control" id="adhar" name="adhar" value="{{$user->adhar}}"
                                            accept=".jpg, .jpeg, .png, .pdf">

                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="pan_card">PAN Card</label>
                                        <br />
                                        <input type="file" class="form-control" id="pan_card" name="pan_card" value="{{$user->pan_card}}"
                                            accept=".jpg, .jpeg, .png, .pdf">

                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <div class="form-group">
                                        <label for="driving_license">Driving License</label>
                                        <br />
                                        <input type="file" class="form-control" id="driving_license"
                                            name="driving_license" value="{{$user->driving_license}}" accept=".jpg, .jpeg, .png, .pdf">

                                    </div>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="my-4">

                            <div class="row">
                                <div class="col-md-12 text-center mb-2">
                                    <h3>Image Upload</h3>
                                </div>
                            </div>
                            <!-- Main Image Upload -->
                            <div class="row">
                              
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="main_image1">Main Image 1</label>
                                        @if($user->sub_pic_1)
                                        <img src="{{asset('uploads/profile/'. $user->sub_pic_1)}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @else 
                                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @endif
                                        <br/>
                                        <br/>
                                        <input type="file" class="form-control" id="main_image1" name="sub_pic_1" value="{{$user->sub_pic_1}}"
                                            accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>

                                
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="main_image2">Main Image 2</label>
                                        @if($user->sub_pic_2)
                                        <img src="{{asset('uploads/profile/'. $user->sub_pic_2)}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @else 
                                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @endif
                                        <br/>
                                        <br/>
                                        <input type="file" class="form-control" id="main_image2" name="sub_pic_2" value="{{$user->sub_pic_2}}"
                                            accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="main_image3">Main Image 3</label>
                                        @if($user->sub_pic_3)
                                        <img src="{{asset('uploads/profile/'. $user->sub_pic_3)}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @else 
                                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @endif
                                        <br/>
                                        <br/>
                                        <input type="file" class="form-control" id="main_image3" name="sub_pic_3" value="{{$user->sub_pic_3}}"
                                            accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="main_image4">Main Image 4</label>
                                        @if($user->sub_pic_4)
                                        <img src="{{asset('uploads/profile/'. $user->sub_pic_4)}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @else 
                                        <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="50" width="50" class="img-thumbnail">
                                        @endif
                                        <br/>
                                        <br/>
                                        <input type="file" class="form-control" id="main_image4" name="sub_pic_4" value="{{$user->sub_pic_4}}"
                                            accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>


                            <!-- Submit Button -->
                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
