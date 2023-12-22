@extends('website.dashboard')
@section('items')
    <div class="card p-4">
        <div class="row">
            <div class="inn">
                <div class="rhs">
                    <div class="form-login">
                        <form method="POST" action="/users/profile/update" enctype="multipart/form-data">
                            <!--PROFILE BIO-->
                            @csrf
                            <input type="hidden" name="id" value="{{ $users->id }}">
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    @if (session('msg'))
                                        <div class="alert alert-success bg-success text-white">
                                            {{ session('msg') }}
                                        </div>
                                    @endif
                                    <h4>Basic info</h4>
                                    <h1>Edit my profile</h1>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Name:</label>
                                        <input type="text" class="form-control" placeholder="Enter your full name"
                                            name="name" value="{{ $users->name }}">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Gender:</label>
                                        <select class="form-select chosen-select" name="gender"
                                            data-placeholder="Select your Gender">
                                            <option value="1" {{ $users->gender == 1 ? 'selected' : '' }}>Male</option>
                                            <option value="2" {{ $users->gender == 2 ? 'selected' : '' }}>Female
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Martial Status:</label>
                                        <select class="form-select chosen-select" name="marital_status"
                                            data-placeholder="Select your Gender">
                                            <option value="1" {{ $users->marital_status == 1 ? 'selected' : '' }}>
                                                Unmarried
                                            </option>
                                            <option value="2" {{ $users->marital_status == 2 ? 'selected' : '' }}>
                                                Married
                                            </option>
                                            <option value="3" {{ $users->marital_status == 3 ? 'selected' : '' }}>
                                                Divorced
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label class="lb">Profile Created For:</label>
                                        <select class="form-select chosen-select" name="profile_created_by"
                                            data-placeholder="Select your Gender">
                                            <option value="1" {{ $users->profile_created_by == 1 ? 'selected' : '' }}>
                                                Self
                                            </option>
                                            <option value="2" {{ $users->profile_created_by == 1 ? 'selected' : '' }}>
                                                Son/Daughter</option>
                                            <option value="3" {{ $users->profile_created_by == 1 ? 'selected' : '' }}>
                                                Mother/Father</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Basic info</h4>
                                    <h1>Advanced bio</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Weight:</label>
                                        <select class="form-select chosen-select" name="weight"
                                            data-placeholder="Select your Weight">
                                            @foreach ($Weight as $item)
                                                <option value="{{ $item->weight_id }}"
                                                    {{ $users->weight == $item->weight_id ? 'selected' : '' }}>
                                                    {{ $item->weight_count }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Date of birth:</label>
                                        <input type="date" class="form-control" name="date_of_birth"
                                            value="{{ $users->date_of_birth }}" placeholder="Enter DOB">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Birth Time:</label>
                                        <input type="time" class="form-control" name="birth_time"
                                            value="{{ $users->birth_time }}" placeholder="Birth Time">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Birth Place:</label>
                                        <input type="text" class="form-control" name="birth_place"
                                            value="{{ $users->birth_place }}" placeholder="Birth Place">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Height:</label>
                                        <select class="form-select chosen-select" name="height"
                                            data-placeholder="Select your Height">
                                            @foreach ($height as $item)
                                                <option value="{{ $item->height_id }}"
                                                    {{ $users->height == $item->height_id ? 'selected' : '' }}>
                                                    {{ $item->height_count }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">State:</label>
                                        <select class="form-select chosen-select" name="state"
                                            data-placeholder="Select your State">
                                            @foreach ($state as $item)
                                                <option value="{{ $item->state_id }}"
                                                    {{ $users->state == $item->state_id ? 'selected' : '' }}>
                                                    {{ $item->state_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Dist:</label>
                                        <input type="text" class="form-control" name="district"
                                            value="{{ $users->district }}" placeholder="Enter District">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb">Taluka:</label>
                                        <input type="text" name="taluka" value="{{ $users->taluka }}"
                                            placeholder="Enter Taluka" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Village:</label>
                                        <input type="text" placeholder="Enter Village" name="village"
                                            value="{{ $users->village }}" class="form-control">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">City:</label>
                                        <select class="form-select chosen-select" name="city"
                                            data-placeholder="Select your City">
                                            @foreach ($city as $item)
                                                <option value="{{ $item->city_id }}"
                                                    {{ $users->city == $item->city_id ? 'selected' : '' }}>
                                                    {{ $item->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Pin Code:</label>
                                        <input type="text" class="form-control" name="pin_code"
                                            value="{{ $users->pin_code }}" placeholder="Enter Pin Code">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Mother Tongue:</label>
                                        <select class="form-select chosen-select" name="mother_tongue"
                                            data-placeholder="Select your Mother Tongue">
                                            @foreach ($mother_tongue as $item)
                                                <option value="{{ $item->mother_tongue_id }}"
                                                    {{ $users->mother_tongue == $item->mother_tongue_id ? 'selected' : '' }}>
                                                    {{ $item->mother_tongue_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb d-flex ">Main Profile Pic: <a
                                                href="{{ asset('/uploads/profile/' . $users->main_profile_pic) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/profile/' . $users->main_profile_pic) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" name="main_profile_pic" class="form-control lg"
                                            style="height: 49%" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Job details</h4>
                                    <h1>Job & Education</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Job/Business Type:</label>
                                        <select class="form-select chosen-select" name="job_type"
                                            data-placeholder="Select your Job">
                                            @foreach ($job_type as $item)
                                                <option value="{{ $item->job_type_id }}"
                                                    {{ $users->job_type == $item->job_type_id ? 'selected' : '' }}>
                                                    {{ $item->job_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Company name:</label>
                                        <input type="text" class="form-control" name="company_name"
                                            value="{{ $users->company_name }}" placeholder="Enter Company Name">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Salary ( In Months ):</label>
                                        <input type="number" class="form-control" name="salary"
                                            value="{{ $users->salary }}" placeholder="Enter Salary">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Education:</label>
                                        <input type="text" class="form-control" name="education"
                                            value="{{ $users->education }}" placeholder="Enter Education">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Religion details</h4>
                                    <h1>Caste and Community Information</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Religion:</label>
                                        <select class="form-select chosen-select" name="religion"
                                            data-placeholder="Select your Religion">
                                            @foreach ($religion as $item)
                                                <option value="{{ $item->religion_id }}"
                                                    {{ $users->religion == $item->religion_id ? 'selected' : '' }}>
                                                    {{ $item->religion_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Caste:</label>
                                        <select class="form-select chosen-select" name="caste"
                                            data-placeholder="Select your Caste">
                                            @foreach ($caste as $item)
                                                <option value="{{ $item->caste_id }}"
                                                    {{ $users->caste == $item->caste_id ? 'selected' : '' }}>
                                                    {{ $item->caste_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Subcaste:</label>
                                        <select class="form-select chosen-select" name="subcaste"
                                            data-placeholder="Select your Subcaste">
                                            @foreach ($subcaste as $item)
                                                <option value="{{ $item->subcaste_id }}"
                                                    {{ $users->subcaste == $item->subcaste_id ? 'selected' : '' }}>
                                                    {{ $item->subcaste_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Devak:</label>
                                        <select class="form-select chosen-select" name="devak"
                                            data-placeholder="Select your Devak">
                                            @foreach ($devak as $item)
                                                <option value="{{ $item->devak_id }}"
                                                    {{ $users->devak == $item->devak_id ? 'selected' : '' }}>
                                                    {{ $item->devak_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Nakshatra:</label>
                                        <select class="form-select chosen-select" name="nakshatra"
                                            data-placeholder="Select your Nakshatra">
                                            @foreach ($nakshatra as $item)
                                                <option value="{{ $item->nakshatra_id }}"
                                                    {{ $users->nakshatra == $item->nakshatra_id ? 'selected' : '' }}>
                                                    {{ $item->nakshatra_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Charan:</label>
                                        <select class="form-select chosen-select" name="charan"
                                            data-placeholder="Select your Charan">
                                            @foreach ($charan as $item)
                                                <option value="{{ $item->charan_id }}"
                                                    {{ $users->charan == $item->charan_id ? 'selected' : '' }}>
                                                    {{ $item->charan_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Gan:</label>
                                        <select class="form-select chosen-select" name="gan"
                                            data-placeholder="Select your Gan">
                                            @foreach ($gan as $item)
                                                <option value="{{ $item->gan_id }}"
                                                    {{ $users->gan == $item->gan_id ? 'selected' : '' }}>
                                                    {{ $item->gan_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Raas:</label>
                                        <select class="form-select chosen-select" name="raas"
                                            data-placeholder="Select your Raas">
                                            @foreach ($raas as $item)
                                                <option value="{{ $item->raas_id }}"
                                                    {{ $users->raas == $item->raas_id ? 'selected' : '' }}>
                                                    {{ $item->raas_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Nad:</label>
                                        <select class="form-select chosen-select" name="nad"
                                            data-placeholder="Select your Nad">
                                            @foreach ($nad as $item)
                                                <option value="{{ $item->nad_id }}"
                                                    {{ $users->nad == $item->nad_id ? 'selected' : '' }}>
                                                    {{ $item->nad_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Varg:</label>
                                        <select class="form-select chosen-select" name="varg"
                                            data-placeholder="Select your Varg">
                                            @foreach ($varg as $item)
                                                <option value="{{ $item->varg_id }}"
                                                    {{ $users->varg == $item->varg_id ? 'selected' : '' }}>
                                                    {{ $item->varg_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Kul Devak:</label>
                                        <select class="form-select chosen-select" name="kul_devak"
                                            data-placeholder="Select your Kul Devak">
                                            @foreach ($kul_devak as $item)
                                                <option value="{{ $item->kul_devak_id }}"
                                                    {{ $users->kul_devak == $item->kul_devak_id ? 'selected' : '' }}>
                                                    {{ $item->kul_devak_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Health details</h4>
                                    <h1>Physical Information</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Blood Group:</label>
                                        <select class="form-select chosen-select" name="blood_group"
                                            data-placeholder="Select your Blood Group">
                                            @foreach ($blood_group as $item)
                                                <option value="{{ $item->blood_group_id }}"
                                                    {{ $users->blood_group == $item->blood_group_id ? 'selected' : '' }}>
                                                    {{ $item->blood_group_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Color:</label>
                                        <select class="form-select chosen-select" name="color"
                                            data-placeholder="Select your Color">
                                            @foreach ($color as $item)
                                                <option value="{{ $item->color_id }}"
                                                    {{ $users->color == $item->color_id ? 'selected' : '' }}>
                                                    {{ $item->color_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Body Type:</label>
                                        <select class="form-select chosen-select" name="body_type"
                                            data-placeholder="Select your Body Type">
                                            @foreach ($body_type as $item)
                                                <option value="{{ $item->body_type_id }}"
                                                    {{ $users->body_type == $item->body_type_id ? 'selected' : '' }}>
                                                    {{ $item->body_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Is Handicapped ?:</label>
                                        <select class="form-select chosen-select" name="is_handicapped"
                                            data-placeholder="Is Handicapped ?">
                                            <option value="1" {{ $users->is_handicapped == 1 ? 'selected' : '' }}>
                                                No
                                            </option>
                                            <option value="2" {{ $users->is_handicapped == 2 ? 'selected' : '' }}>
                                                Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Relative details</h4>
                                    <h1>Family Information</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Father's Full Name:</label>
                                        <input type="text" class="form-control" name="father_full_name"
                                            value="{{ $users->father_full_name }}"
                                            placeholder="Enter Father's Full Name">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Father's Occupation</label>
                                        <input type="text" class="form-control" name="father_occupation"
                                            value="{{ $users->father_occupation }}"
                                            placeholder="Enter Father's Occupation">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Mother's Full Name:</label>
                                        <input type="text" class="form-control" name="mother_full_name"
                                            value="{{ $users->mother_full_name }}"
                                            placeholder="Enter Mother's Full Name">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Mother's Occupation:</label>
                                        <input type="text" class="form-control" name="mother_occupation"
                                            value="{{ $users->mother_occupation }}"
                                            placeholder="Enter Mother's Occupation">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Number of Brothers:</label>
                                        <input type="number" class="form-control" name="brothers"
                                            value="{{ $users->brothers }}" placeholder="Enter Number of Brothers"
                                            min="0">
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Number of Sisters:</label>
                                        <input type="number" class="form-control" name="sisters"
                                            value="{{ $users->sisters }}" placeholder="Enter Number of Sisters"
                                            min="0">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Mama:</label>
                                        <input type="text" class="form-control" name="mama"
                                            value="{{ $users->mama }}" placeholder="Full Name of Mama">
                                    </div>

                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Relatives:</label>
                                        <input type="text" class="form-control" name="relatives"
                                            value="{{ $users->relatives }}" placeholder="Enter Relatives">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Family Type:</label>
                                        <select class="form-select chosen-select" name="family_type"
                                            data-placeholder="Select your Family Type">
                                            <option value="1" {{ $users->family_type == 1 ? 'selected' : '' }}>Joint
                                            </option>
                                            <option value="2" {{ $users->family_type == 2 ? 'selected' : '' }}>
                                                Neuclear
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Property Details:</label>
                                        <input type="text" class="form-control" name="property_details"
                                            value="{{ $users->property_details }}" placeholder="Enter Property Details">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Interests details</h4>
                                    <h1>Habits & Hobbies</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Diet:</label>
                                        <select class="form-select chosen-select" name="diet"
                                            value="{{ $users->diet }}" data-placeholder="Select your Diet">
                                            <option value="1" {{ $users->diet == 1 ? 'selected' : '' }}>Veg</option>
                                            <option value="2" {{ $users->diet == 2 ? 'selected' : '' }}>Non-Veg
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Smoking Habits:</label>
                                        <select class="form-select chosen-select" name="smoking_habits"
                                            value="{{ $users->smoking_habits }}"
                                            data-placeholder="Select your Smoking Habits">
                                            <option value="1" {{ $users->diet == 1 ? 'selected' : '' }}>No</option>
                                            <option value="2" {{ $users->diet == 2 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Drinking Habits:</label>
                                        <select class="form-select chosen-select" name="drinking_habits"
                                            value="{{ $users->drinking_habits }}"
                                            data-placeholder="Select your Drinking Habits">
                                            <option value="1" {{ $users->drinking_habits == 1 ? 'selected' : '' }}>
                                                No
                                            </option>
                                            <option value="2" {{ $users->drinking_habits == 2 ? 'selected' : '' }}>
                                                Yes
                                            </option>
                                        </select>
                                    </div>
                                    <div class="chosenini col-lg-6">
                                        <div class="form-group">
                                            <label class="lb">Hobbies:</label>
                                            <select class="chosen-select" data-placeholder="Select your Hobbies"
                                                name="hobbies[]" multiple>
                                                @foreach ($hobbies as $item)
                                                    <option value="{{ $item->hobby_id }}"
                                                        @if (in_array($item->hobby_id, explode(',', $users->hobbies))) selected @endif>
                                                        {{ $item->hobby_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Media</h4>
                                    <h1>Social media</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">WhatsApp:</label>
                                        <input type="text" class="form-control" name="whatsapp"
                                            value="{{ $users->whatsapp }}" placeholder="Enter WhatsApp Number">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Facebook:</label>
                                        <input type="text" class="form-control" name="facebook"
                                            value="{{ $users->facebook }}" placeholder="Enter Facebook URL">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Instagram:</label>
                                        <input type="text" class="form-control" name="instagram"
                                            value="{{ $users->instagram }}" placeholder="Enter Instagram Handle">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Youtube:</label>
                                        <input type="text" class="form-control" name="youtube"
                                            value="{{ $users->youtube }}" placeholder="Enter YouTube Channel URL">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Upload</h4>
                                    <h1>Documents Upload</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 form-group">
                                        <label class="lb d-flex">Adhaar Card:<a
                                                href="{{ asset('/uploads/documents/' . $users->adhar) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/documents/' . $users->adhar) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="adhar" class="form-control"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb d-flex">PAN Card:<a
                                                href="{{ asset('/uploads/documents/' . $users->pan_card) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/documents/' . $users->pan_card) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="pan_card" class="form-control"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb d-flex">Driving License:<a
                                                href="{{ asset('/uploads/documents/' . $users->driving_license) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/documents/' . $users->driving_license) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="driving_license"
                                            class="form-control" accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    <h4>Sub Image</h4>
                                    <h1>Image Upload</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 form-group">
                                        <label class="lb d-flex">Main Image 1: <a
                                                href="{{ asset('/uploads/profile/' . $users->sub_pic_1) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/profile/' . $users->sub_pic_1) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="sub_pic_1" class="form-control"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb d-flex">Main Image 2: <a
                                                href="{{ asset('/uploads/profile/' . $users->sub_pic_2) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/profile/' . $users->sub_pic_2) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="sub_pic_2" class="form-control"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb d-flex">Main Image 3: <a
                                                href="{{ asset('/uploads/profile/' . $users->sub_pic_3) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/profile/' . $users->sub_pic_3) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="sub_pic_3" class="form-control"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label class="lb d-flex">Main Image 4: <a
                                                href="{{ asset('/uploads/profile/' . $users->sub_pic_4) }}"
                                                target="_blank" class="mx-2"><img
                                                    src="{{ asset('/uploads/profile/' . $users->sub_pic_4) }}"
                                                    width="30px" height="30px" alt="img"></a></label>
                                        <input type="file" style="height: 55%" name="sub_pic_4" class="form-control"
                                            accept=".jpg, .jpeg, .png, .pdf">
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
