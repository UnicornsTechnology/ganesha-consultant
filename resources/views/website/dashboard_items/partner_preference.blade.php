@extends('website.dashboard')
@section('items')
    <div class="card p-4">
        <div class="row">
            <div class="inn">
                <div class="rhs">
                    <div class="form-login">
                        <form method="POST" action="/users/profile/partner/update" enctype="multipart/form-data">
                            <!--PROFILE BIO-->
                            @csrf
                            <input type="hidden" name="partner_id" value="{{ $users->partner_id }}">
                            <div class="edit-pro-parti">
                                <div class="form-tit">
                                    @if (session('msg'))
                                        <div class="alert alert-success bg-success text-white">
                                            {{ session('msg') }}
                                        </div>
                                    @endif
                                    <h4>Basic Partner info</h4>
                                    <h1>Edit Partner Preference</h1>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-4">
                                        <label class="lb">Martial Status:</label>
                                        <select class="form-select chosen-select" name="marital_status"
                                            data-placeholder="Select your Gender">
                                            <option value="1"
                                                {{ $users->partner_martia_status == 1 ? 'selected' : '' }}>
                                                Unmarried
                                            </option>
                                            <option value="2"
                                                {{ $users->partner_martia_status == 2 ? 'selected' : '' }}>
                                                Married
                                            </option>
                                            <option value="3"
                                                {{ $users->partner_martia_status == 3 ? 'selected' : '' }}>
                                                Divorced
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">From Weight:</label>
                                        <select class="form-select chosen-select" name="from_weight"
                                            data-placeholder="Select your Weight">
                                            @foreach ($Weight as $item)
                                                <option value="{{ $item->weight_count }}"
                                                    {{ isset($users->partner_weight) && trim(explode(',', $users->partner_weight)[0]) == $item->weight_count ? 'selected' : '' }}>
                                                    {{ $item->weight_count }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">To Weight:</label>
                                        <select class="form-select chosen-select" name="to_weight"
                                            data-placeholder="Select your Weight">
                                            @foreach ($Weight as $item)
                                                <option value="{{ $item->weight_count }}"
                                                    {{ isset($users->partner_weight) && trim(explode(',', $users->partner_weight)[1]) == $item->weight_count ? 'selected' : '' }}>
                                                    {{ $item->weight_count }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-lg-4 form-group">
                                        <label class="lb">From Height:</label>
                                        <select class="form-select chosen-select" name="from_height"
                                            data-placeholder="Select your Height">
                                            @foreach ($height as $item)
                                                <option value="{{ $item->height_count }}"
                                                    {{ isset($users->partner_hight) && trim(explode(',', $users->partner_hight)[0]) == $item->height_count ? 'selected' : '' }}>
                                                    {{ $item->height_count }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">To Height:</label>
                                        <select class="form-select chosen-select" name="to_height"
                                            data-placeholder="Select your Height">
                                            @foreach ($height as $item)
                                                <option value="{{ $item->height_count }}"
                                                    {{ isset($users->partner_hight) && trim(explode(',', $users->partner_hight)[1]) == $item->height_count ? 'selected' : '' }}>
                                                    {{ $item->height_count }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label class="lb">State:</label>
                                        <select class="form-select chosen-select" name="state"
                                            data-placeholder="Select your State">
                                            @foreach ($state as $item)
                                                <option value="{{ $item->state_id }}"
                                                    {{ $users->partner_state == $item->state_id ? 'selected' : '' }}>
                                                    {{ $item->state_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">City:</label>
                                        <select class="form-select chosen-select" name="city[]"
                                            data-placeholder="Select your City" multiple>
                                            @foreach ($city as $item)
                                                <option value="{{ $item->city_id }}"
                                                    @if (in_array($item->city_id, explode(',', $users->partner_city))) selected @endif>
                                                    {{ $item->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Mother Tongue:</label>
                                        <select class="form-select chosen-select" name="mother_tongue[]"
                                            data-placeholder="Select your Mother Tongue" multiple>
                                            @foreach ($mother_tongue as $item)
                                                <option value="{{ $item->mother_tongue_id }}"
                                                    @if (in_array($item->mother_tongue_id, explode(',', $users->partner_mother_tongue))) selected @endif>
                                                    {{ $item->mother_tongue_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Job/Business Type:</label>
                                        <select class="form-select chosen-select" name="job_type[]"
                                            data-placeholder="Select your Job" multiple>
                                            @foreach ($job_type as $item)
                                                <option value="{{ $item->job_type_id }}"
                                                    @if (in_array($item->job_type_id, explode(',', $users->partner_job_type))) selected @endif>
                                                    {{ $item->job_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Salary ( In Months ):</label>
                                        <select class="form-select chosen-select" name="salary"
                                            data-placeholder="Select your Religion">
                                            <option value="[1000, 15000]"
                                                {{ explode(',', $users->partner_salary) == [1000, 15000] ? 'selected' : '' }}>
                                                1000 To
                                                15,000</option>
                                            <option value="[16000, 30000]"
                                                {{ explode(',', $users->partner_salary) == [16000, 30000] ? 'selected' : '' }}>
                                                16,000
                                                To
                                                30,000</option>
                                            <option value="[31000, 45000]"
                                                {{ explode(',', $users->partner_salary) == [31000, 45000] ? 'selected' : '' }}>
                                                31,000
                                                To
                                                45,000</option>
                                            <option value="[46000, 60000]"
                                                {{ explode(',', $users->partner_salary) == [46000, 60000] ? 'selected' : '' }}>
                                                46,000
                                                To
                                                60,000</option>
                                            <option value="[61000, 75000]"
                                                {{ explode(',', $users->partner_salary) == [61000, 75000] ? 'selected' : '' }}>
                                                61,000
                                                To
                                                75,000</option>
                                            <option value="[76000, 85000]"
                                                {{ explode(',', $users->partner_salary) == [76000, 85000] ? 'selected' : '' }}>
                                                76,000
                                                To
                                                85,000</option>
                                            <option value="[86000, 100000]"
                                                {{ explode(',', $users->partner_salary) == [86000, 100000] ? 'selected' : '' }}>
                                                86,000
                                                To 1,00,000</option>
                                            <option value="[100000, 115000]"
                                                {{ explode(',', $users->partner_salary) == [100000, 115000] ? 'selected' : '' }}>
                                                1,00,000 To 1,15,000</option>
                                            <option value="[116000, 130000]"
                                                {{ explode(',', $users->partner_salary) == [116000, 130000] ? 'selected' : '' }}>
                                                1,16,000 To 1,30,000</option>
                                            <option value="[131000, 145000]"
                                                {{ explode(',', $users->partner_salary) == [131000, 145000] ? 'selected' : '' }}>
                                                1,31,000 To 1,45,000</option>
                                            <option value="[146000, 160000]"
                                                {{ explode(',', $users->partner_salary) == [146000, 160000] ? 'selected' : '' }}>
                                                1,46,000 To 1,60,000</option>
                                            <option value="[161000, 175000]"
                                                {{ explode(',', $users->partner_salary) == [161000, 175000] ? 'selected' : '' }}>
                                                1,61,000 To 1,75,000</option>
                                            <option value="[176000, 185000]"
                                                {{ explode(',', $users->partner_salary) == [176000, 185000] ? 'selected' : '' }}>
                                                1,76,000 To 1,85,000</option>
                                            <option value="[186000, 200000]"
                                                {{ explode(',', $users->partner_salary) == [186000, 200000] ? 'selected' : '' }}>
                                                1,86,000 To 2,00,000</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Religion:</label>
                                        <select class="form-select chosen-select" name="religion"
                                            data-placeholder="Select your Religion">
                                            @foreach ($religion as $item)
                                                <option value="{{ $item->religion_id }}"
                                                    {{ $users->partner_religion == $item->religion_id ? 'selected' : '' }}>
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
                                                    {{ $users->partner_cast == $item->caste_id ? 'selected' : '' }}>
                                                    {{ $item->caste_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Color:</label>
                                        <select class="form-select chosen-select" name="color[]"
                                            data-placeholder="Select your Color" multiple>
                                            @foreach ($color as $item)
                                                <option value="{{ $item->color_id }}"
                                                    @if (in_array($item->color_id, explode(',', $users->partner_color))) selected @endif>
                                                    {{ $item->color_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Body Type:</label>
                                        <select class="form-select chosen-select" name="body_type[]"
                                            data-placeholder="Select your Body Type" multiple>
                                            @foreach ($body_type as $item)
                                                <option value="{{ $item->body_type_id }}"
                                                    @if (in_array($item->body_type_id, explode(',', $users->partner_body_type))) selected @endif>
                                                    {{ $item->body_type_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label class="lb">Is Handicapped ?:</label>
                                        <select class="form-select chosen-select" name="is_handicapped"
                                            data-placeholder="Is Handicapped ?">
                                            <option value="1"
                                                {{ $users->partner_is_handcapped == 1 ? 'selected' : '' }}>
                                                No
                                            </option>
                                            <option value="2"
                                                {{ $users->partner_is_handcapped == 2 ? 'selected' : '' }}>
                                                Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Family Type:</label>
                                        <select class="form-select chosen-select" name="family_type"
                                            data-placeholder="Select your Family Type">
                                            <option value="1"
                                                {{ $users->partner_family_type == 1 ? 'selected' : '' }}>Joint
                                            </option>
                                            <option value="2"
                                                {{ $users->partner_family_type == 2 ? 'selected' : '' }}>
                                                Neuclear
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Diet:</label>
                                        <select class="form-select chosen-select" name="diet"
                                            data-placeholder="Select your Diet">
                                            <option value="1" {{ $users->partner_diet == 1 ? 'selected' : '' }}>Veg
                                            </option>
                                            <option value="2" {{ $users->partner_diet == 2 ? 'selected' : '' }}>
                                                Non-Veg
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <!--PROFILE BIO-->
                            <div class="edit-pro-parti d-none">
                                <div class="form-tit">
                                    <h4>Interests details</h4>
                                    <h1>Habits & Hobbies</h1>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Smoking Habits:</label>
                                        <select class="form-select chosen-select" value="{{ $users->smoking_habits }}"
                                            data-placeholder="Select your Smoking Habits">
                                            <option value="1" {{ $users->diet == 1 ? 'selected' : '' }}>No</option>
                                            <option value="2" {{ $users->diet == 2 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <label class="lb">Drinking Habits:</label>
                                        <select class="form-select chosen-select" value="{{ $users->drinking_habits }}"
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
                                            <select class="chosen-select" data-placeholder="Select your Hobbies">
                                                <option value="1"
                                                    {{ $users->drinking_habits == 1 ? 'selected' : '' }}>
                                                    No
                                                </option>
                                                <option value="2"
                                                    {{ $users->drinking_habits == 2 ? 'selected' : '' }}>
                                                    Yes
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END PROFILE BIO-->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
