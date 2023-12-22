<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\BloodGroup;
use App\Models\BodyType;
use App\Models\Caste;
use App\Models\Charan;
use App\Models\City;
use App\Models\Color;
use App\Models\Devak;
use App\Models\Gan;
use App\Models\Height;
use App\Models\Hobby;
use App\Models\JobType;
use App\Models\KulDevak;
use App\Models\MotherTongue;
use App\Models\Nad;
use App\Models\Nakshatra;
use App\Models\PartnerPreference;
use App\Models\Raas;
use App\Models\Religion;
use App\Models\Subcaste;
use App\Models\tbl_interest;
use App\Models\tbl_price;
use App\Models\tbl_purchase_plan;
use App\Models\tbl_state_master;
use App\Models\User;
use App\Models\Varg;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast;

class AuthControllerUser extends Controller
{
    public function dashboards()
    {
        $user = Auth::user();
        $fillableFields = [
            'name', 'email', 'state', 'pin_code', 'district', 'taluka', 'village', 'city',
            'date_of_birth', 'birth_time', 'birth_place', 'education', 'gender', 'marital_status',
            'height', 'weight', 'father_full_name', 'mother_full_name', 'father_occupation',
            'mother_occupation', 'job_type', 'age', 'mother_tongue', 'company_name', 'salary',
            'subcaste', 'blood_group', 'color', 'body_type', 'caste', 'religion', 'devak',
            'nakshatra', 'charan', 'gan', 'raas', 'nad', 'varg', 'kul_devak', 'mama', 'main_profile_pic', 'sub_pic_1', 'sub_pic_2', 'sub_pic_3', 'sub_pic_4',
            'relatives', 'diet', 'smoking_habits', 'family_type', 'drinking_habits',
            'property_details', 'profile_created_by', 'adhar', 'pan_card', 'driving_license',
            'is_handicapped', 'hobbies', 'facebook', 'whatsapp', 'instagram', 'youtube',
        ];
        $filledFieldsCount = 0;
        foreach ($fillableFields as $field) {
            if (!empty($user->$field)) {
                $filledFieldsCount++;
            }
        }
        $totalFields = count($fillableFields);
        $percentage = ($filledFieldsCount / $totalFields) * 100;
        // plan details
        $plans = tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
            ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
            ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name')
            ->where('tbl_purchase_plans.tbl_user_id', Auth::id())
            ->latest('tbl_prices.created_at')
            ->first();

        $users = [];
        $sender = tbl_interest::where('interest_sender_id', Auth::id())->where('interest_status', 'accept')->get();
        $receiver = tbl_interest::where('interest_receiver_id', Auth::id())->where('interest_status', 'accept')->get();
        foreach ($sender as $interest) {
            if ($interest->interest_receiver_id != Auth::id()) {
                $users[] = $interest->interest_receiver_id;
            } else if ($interest->interest_sender_id != Auth::id()) {
                $users[] = $interest->interest_sender_id;
            }
        }
        foreach ($receiver as $interest) {
            if ($interest->interest_sender_id != Auth::id()) {
                $users[] = $interest->interest_sender_id;
            } else if ($interest->interest_receiver_id != Auth::id()) {
                $users[] = $interest->interest_receiver_id;
            }
        }
        $users = array_unique($users);
        $list = User::whereIn('id', $users)->latest('created_at')->limit(4)->get();
        return view("website/dashboard_items/index", compact("percentage", "plans", 'list'));
    }

    public function ChatList()
    {
        $users = [];
        $sender = tbl_interest::where('interest_sender_id', Auth::id())->where('interest_status', 'accept')->get();
        $receiver = tbl_interest::where('interest_receiver_id', Auth::id())->where('interest_status', 'accept')->get();
        foreach ($sender as $interest) {
            if ($interest->interest_receiver_id != Auth::id()) {
                $users[] = $interest->interest_receiver_id;
            } else if ($interest->interest_sender_id != Auth::id()) {
                $users[] = $interest->interest_sender_id;
            }
        }
        foreach ($receiver as $interest) {
            if ($interest->interest_sender_id != Auth::id()) {
                $users[] = $interest->interest_sender_id;
            } else if ($interest->interest_receiver_id != Auth::id()) {
                $users[] = $interest->interest_receiver_id;
            }
        }
        $users = array_unique($users);
        $list = User::whereIn('id', $users)->latest('created_at')->get();

        return view("website/dashboard_items/chatlist", compact('list'));
    }

    public function Interests()
    {
        $pending = User::select('users.*', 'tbl_interests.*', 'tbl_state_masters.state_name', 'cities.city_name', 'castes.caste_name', 'colors.color_name', 'heights.height_count', 'job_types.job_type_name', 'religions.religion_name', 'tbl_interests.created_at as date_time')
            ->leftJoin('tbl_interests', 'users.id', '=', 'tbl_interests.interest_sender_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->where('tbl_interests.interest_status', 'request')
            ->where('tbl_interests.interest_receiver_id', Auth::id())
            ->get();

        $accept = User::select('users.*', 'tbl_interests.*', 'tbl_state_masters.state_name', 'cities.city_name', 'castes.caste_name', 'colors.color_name', 'heights.height_count', 'job_types.job_type_name', 'religions.religion_name')
            ->leftJoin('tbl_interests', 'users.id', '=', 'tbl_interests.interest_sender_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->where('tbl_interests.interest_status', 'accept')
            ->where('tbl_interests.interest_receiver_id', Auth::id())
            ->get();

        $reject =  User::select('users.*', 'tbl_interests.*', 'tbl_state_masters.state_name', 'cities.city_name', 'castes.caste_name', 'colors.color_name', 'heights.height_count', 'job_types.job_type_name', 'religions.religion_name')
            ->leftJoin('tbl_interests', 'users.id', '=', 'tbl_interests.interest_sender_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->where('tbl_interests.interest_status', 'deny')
            ->where('tbl_interests.interest_receiver_id', Auth::id())
            ->get();
        return view("website/dashboard_items/interests", compact('pending', 'accept', 'reject'));
    }

    public function Plan()
    {
        $data = tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
            ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
            ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name')
            ->where('tbl_purchase_plans.tbl_user_id', Auth::id())
            ->latest('tbl_prices.created_at')
            ->get();
        return view("website/dashboard_items/plan", compact('data'));
    }
    public function ProfileEdit()
    {
        $users = Auth::user();
        $Weight = Weight::all();
        $height = Height::all();
        $state = tbl_state_master::all();
        $city = City::all();
        $mother_tongue = MotherTongue::all();
        $job_type = JobType::all();
        $religion = Religion::all();
        $caste = Caste::all();
        $subcaste = Subcaste::all();
        $devak = Devak::all();
        $nakshatra = Nakshatra::all();
        $charan = Charan::all();
        $gan = Gan::all();
        $raas = Raas::all();
        $nad = Nad::all();
        $varg = Varg::all();
        $kul_devak = KulDevak::all();
        $blood_group = BloodGroup::all();
        $body_type = BodyType::all();
        $color = Color::all();
        $hobbies = Hobby::all();
        return view("website/dashboard_items/edit_profile", compact("users", "hobbies", "body_type", "color", "blood_group", "kul_devak", "varg", "nad", "raas", "gan", "charan", "devak", "nakshatra", "subcaste", "caste", "religion", "job_type", "mother_tongue", "city", "Weight", "height", "state"));
    }

    public function ProfileUpdate(Request $request)
    {
        // return $request;
        // PROFILE PRESENTAGES
        $user = Auth::user();
        $fillableFields = [
            'name', 'email', 'state', 'pin_code', 'district', 'taluka', 'village', 'city',
            'date_of_birth', 'birth_time', 'birth_place', 'education', 'gender', 'marital_status',
            'height', 'weight', 'father_full_name', 'mother_full_name', 'father_occupation',
            'mother_occupation', 'job_type', 'age', 'mother_tongue', 'company_name', 'salary',
            'subcaste', 'blood_group', 'color', 'body_type', 'caste', 'religion', 'devak',
            'nakshatra', 'charan', 'gan', 'raas', 'nad', 'varg', 'kul_devak',
            'mama', 'main_profile_pic', 'sub_pic_1', 'sub_pic_2', 'sub_pic_3', 'sub_pic_4',
            'relatives', 'diet', 'smoking_habits', 'family_type', 'drinking_habits',
            'property_details', 'profile_created_by', 'adhar', 'pan_card', 'driving_license',
            'is_handicapped', 'hobbies', 'facebook', 'whatsapp', 'instagram', 'youtube',
        ];
        $filledFieldsCount = 0;
        foreach ($fillableFields as $field) {
            if (!empty($user->$field)) {
                $filledFieldsCount++;
            }
        }
        $totalFields = count($fillableFields);
        $percentage = ($filledFieldsCount / $totalFields) * 100;
        // END PRODILE PRESENTAGES CODE

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->marital_status = $request->marital_status;
        $user->user_percentages = $percentage;
        $user->profile_created_by = $request->profile_created_by;

        // Update file (profile_image)
        if ($request->main_profile_pic) {
            $file = $request->main_profile_pic;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/profile", $fileName);
            $user->main_profile_pic = $fileName;
        }
        if ($request->sub_pic_1) {
            $file = $request->sub_pic_1;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/profile", $fileName);
            $user->sub_pic_1 = $fileName;
        }
        if ($request->sub_pic_2) {
            $file = $request->sub_pic_2;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/profile", $fileName);
            $user->sub_pic_2 = $fileName;
        }
        if ($request->sub_pic_3) {
            $file = $request->sub_pic_3;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/profile", $fileName);
            $user->sub_pic_3 = $fileName;
        }
        if ($request->sub_pic_4) {
            $file = $request->sub_pic_4;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/profile", $fileName);
            $user->sub_pic_4 = $fileName;
        }
        // Update file (Document img)
        if ($request->driving_license) {
            $file = $request->driving_license;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/documents", $fileName);
            $user->driving_license = $fileName;
        }
        if ($request->pan_card) {
            $file = $request->pan_card;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/documents", $fileName);
            $user->pan_card = $fileName;
        }
        if ($request->adhar) {
            $file = $request->adhar;
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . "." . $extension;
            $file->move("uploads/documents", $fileName);
            $user->adhar = $fileName;
        }
        // Update other fields
        $user->weight = $request->weight;
        $user->date_of_birth = $request->date_of_birth;
        $user->age =  \Carbon\Carbon::parse($request->date_of_birth)->diffInYears(\Carbon\Carbon::now());

        $user->birth_time = $request->birth_time;
        $user->birth_place = $request->birth_place;
        $user->height = $request->height;
        $user->state = $request->state;
        $user->district = $request->district;
        $user->taluka = $request->taluka;
        $user->village = $request->village;
        $user->city = $request->city;
        $user->pin_code = $request->pin_code;
        $user->mother_tongue = $request->mother_tongue;
        $user->job_type = $request->job_type;
        $user->company_name = $request->company_name;
        $user->salary = $request->salary;
        $user->education = $request->education;
        $user->religion = $request->religion;
        $user->caste = $request->caste;
        $user->subcaste = $request->subcaste;
        $user->devak = $request->devak;
        $user->nakshatra = $request->nakshatra;
        $user->charan = $request->charan;
        $user->gan = $request->gan;
        $user->raas = $request->raas;
        $user->nad = $request->nad;
        $user->varg = $request->varg;
        $user->kul_devak = $request->kul_devak;
        $user->blood_group = $request->blood_group;
        $user->color = $request->color;
        $user->body_type = $request->body_type;
        $user->is_handicapped = $request->is_handicapped;
        $user->father_full_name = $request->father_full_name;
        $user->father_occupation = $request->father_occupation;
        $user->mother_full_name = $request->mother_full_name;
        $user->mother_occupation = $request->mother_occupation;
        $user->brothers = $request->brothers;
        $user->sisters = $request->sisters;
        $user->mama = $request->mama;
        $user->relatives = $request->relatives;
        $user->family_type = $request->family_type;
        $user->property_details = $request->property_details;
        $user->diet = $request->diet;
        $user->smoking_habits = $request->smoking_habits;
        $user->drinking_habits = $request->drinking_habits;
        // Hobbies as an array
        if ($request->hobbies) {
            $user->hobbies = implode(', ', $request->hobbies);
        }
        $user->whatsapp = $request->whatsapp;
        $user->facebook = $request->facebook;
        $user->instagram = $request->instagram;
        $user->youtube = $request->youtube;
        $user->save();

        return redirect()->back()->with("msg", "Profile Update Successfully !!");
    }

    public function PartnerPreference()
    {
        $users = PartnerPreference::where("tbl_users_id", Auth::id())->first();
        if (!isset($users)) {
            $table = new PartnerPreference();
            $table->tbl_users_id = Auth::id();
            $table->save();
            return redirect('/users/profile/partner/preference');
        }
        $Weight = Weight::all();
        $height = Height::all();
        $state = tbl_state_master::all();
        $city = City::all();
        $mother_tongue = MotherTongue::all();
        $job_type = JobType::all();
        $religion = Religion::all();
        $caste = Caste::all();
        $body_type = BodyType::all();
        $color = Color::all();
        return view("website/dashboard_items/partner_preference", compact('users', 'Weight', 'height', 'state', "city", 'mother_tongue', 'job_type', 'religion', 'caste', 'body_type', 'color'));
    }

    public function PartnerPreferenceUpdate(Request $request)
    {
        $p_salary = Json_decode($request->salary);
        $user = PartnerPreference::find($request->partner_id);
        $user->partner_martia_status = $request->marital_status;
        $user->partner_weight = implode(', ', [$request->from_weight, $request->to_weight]);
        $user->partner_hight = implode(', ', [$request->from_height, $request->to_height]);
        $user->partner_state = $request->state;
        $user->partner_city = implode(', ', $request->city);
        $user->partner_mother_tongue = implode(', ', $request->mother_tongue);
        $user->partner_job_type = implode(', ', $request->job_type);
        $user->partner_religion = $request->religion;
        $user->partner_cast = $request->caste;
        $user->partner_color = implode(', ', $request->color);
        $user->partner_body_type = implode(', ', $request->body_type);
        $user->partner_is_handcapped = $request->is_handicapped;
        $user->partner_family_type = $request->family_type;
        $user->partner_diet = $request->diet;
        $user->partner_salary = implode(', ', $p_salary);
        $user->save();
        return redirect()->back()->with('msg', "Partner Preference Update Successfully !!");
    }

    public function PasswordUpdate()
    {
        $users = Auth::user();
        return view('website/dashboard_items/update_password', compact('users'));
    }

    public function CheckAndUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'mobile' => 'required|numeric|unique:users,mobile,' . Auth::id(),
        ]);
        if ($request->mobile != Auth::user()->mobile) {
            $object = Json_encode([
                'new_password' => request()->new_password,
                'mobile' => request()->mobile,
                'email' => request()->email,
            ]);
            $otp = mt_rand(100000, 999999);
            $user = User::find(Auth::id());
            $user->otp = $otp;
            $user->save();
            return redirect('/users/update/otp/verify/' . $object);
        } else if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('msg', "Password Update Successfully !!");
        } else {
            return redirect()->back()->with('msgs', "Invaild Old Password !!");;
        }
    }
    public function page_otp($object)
    {
        return view('website/dashboard_items/verfy_otp', compact('object'));
    }
    public function OTP_Number_update(Request $request)
    {
        if (Auth::user()->otp == $request->otp) {
            $data = Json_decode($request->old_value);
            $user = User::find(Auth::id());
            if ($data->new_password != "") {
                $user->password = Hash::make($data->new_password);
            }
            $user->email = $data->email;
            $user->mobile = $data->mobile;
            $user->save();
            if ($data->new_password != "") {
                return redirect('/users/login')->with('msg', "Password Update Successfully !!");
            } else {
                return redirect('/users/update/password')->with('msg', "Moblie Number Update Successfully !!");
            }
        } else {
            return redirect()->back()->with('msgs', "Invaild Old OTP !!");;
        }
    }

    public function purchasePlan(Request $request)
    {
        $getplan = tbl_price::find($request->pan_id);
        $durationInMonths = $getplan->month;
        $startDate = now();
        $endDate = $startDate->copy()->addMonths($durationInMonths);
        $formattedStartDate = $startDate->format('d-m-y');
        $formattedEndDate = $endDate->format('d-m-y');

        // STORE USER TABLE LIMIT PROFILE VIEW
        $user = User::find(Auth::id());
        $user->view_profile_limit = $user->view_profile_limit + $getplan->view_profile;
        $user->save();

        // Save the purchase plan
        $table = new tbl_purchase_plan();
        $table->tbl_price_plan_id = $request->pan_id;
        $table->tbl_user_id = Auth::id();
        $table->plan_start_date = $formattedStartDate;
        $table->plan_end_date = $formattedEndDate;
        $table->save();

        return redirect('/users/plan')->with('msg', 'Plan Purchase Successfully !!');
    }
    // +++++++++++++++++++++++++++++ WRITE API FORM REGISTER USER ++++++++++++++++++++++++++++++++

    public function allPanGet($id)
    {
        return tbl_price::where('tbl_plan_id', $id)->where('price_status', 'active')->get();
    }

    public function allPanGets($id)
    {
        return tbl_price::find($id);
    }

    public function OTP()
    {
        return $otp = mt_rand(100000, 999999);
    }

    public function Register_user(Request $request)
    {
        $users = new User();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->mobile = $request->phone;
        $users->gender = $request->gender;
        $users->marital_status = $request->martisal_status;
        $users->profile_created_by = $request->profile_created;
        $users->save();

        return response()->json(['status' => 'success']);
    }
}
