<?php

namespace App\Http\Controllers\admin;

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
use App\Models\Raas;
use App\Models\Religion;
use App\Models\Subcaste;
use App\Models\tbl_purchase_plan;
use App\Models\tbl_state_master;
use App\Models\User;
use App\Models\Varg;
use App\Models\Weight;
use App\Notifications\UserNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminMemberController extends Controller
{
    public function index()
    {
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];
        $members = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->where('user_type', 'user')->paginate(10);
        return view('admin/members/index', compact('members', 'data'));
    }

    public function grooms()
    {
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];
        $members = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->where('user_type', 'user')
            ->where('gender', '1')
            ->paginate(10);

        return view('admin/members/grooms', compact('members', 'data'));
    }

    public function brides()
    {
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];

        $members = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->where('user_type', 'user')
            ->where('gender', '2')
            ->paginate(10);

        return view('admin/members/brides', compact('members', 'data'));
    }

    public function create()
    {
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];

        return view("admin/members/create", compact('data'));
    }

    public function store(Request $request)
    {
        $hobbies = implode(',', $request->input('hobbies'));

        // Validation
        // $request->validate([
        //     'email' => 'required|email|unique:users',
        //     'mobile' => 'required|numeric|unique:users',
        //     'main_profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'sub_pic_1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'sub_pic_2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'sub_pic_3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'sub_pic_4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'adhar' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
        //     'driving_license' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
        // ]);

        // Upload images
        $mainProfilePicPath = $this->uploadProfilePics($request, 'main_profile_pic');
        $subPic1Path = $this->uploadProfilePics($request, 'sub_pic_1');
        $subPic2Path = $this->uploadProfilePics($request, 'sub_pic_2');
        $subPic3Path = $this->uploadProfilePics($request, 'sub_pic_3');
        $subPic4Path = $this->uploadProfilePics($request, 'sub_pic_4');

        // Upload Aadhaar Card and Driving License
        $adharPath = $this->uploadFiles($request, 'adhar');
        $drivingLicensePath = $this->uploadFiles($request, 'driving_license');
        $panCardPath = $this->uploadFiles($request, 'pan_card');

        // Create user
        $user =  User::create(array_merge(
            $request->except(['main_profile_pic', 'sub_pic_1', 'sub_pic_2', 'sub_pic_3', 'sub_pic_4', 'adhar', 'driving_license', 'hobbies']),
            [
                'main_profile_pic' => $mainProfilePicPath,
                'sub_pic_1' => $subPic1Path,
                'sub_pic_2' => $subPic2Path,
                'sub_pic_3' => $subPic3Path,
                'sub_pic_4' => $subPic4Path,
                'adhar' => $adharPath,
                'driving_license' => $drivingLicensePath,
                'pan_card' => $panCardPath,
                'hobbies' => $hobbies, // Assign the string value to the hobbies field
            ]
        ));

        $admin = User::find(1);
        $admin->notify(new UserNotifications([
            "message" => "New User Registered",
            "action" => "admin/member/show/" . $user->id,
            "type" => "USER_REGISTERED",
        ]));
        return redirect("/admin/all-members")->with("msg", "New member created successfully !");
    }

    public function update(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,' . $request->id,
            'mobile' => 'required|numeric|unique:users,mobile,' . $request->id,
            'main_profile_pic' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'nullable|min:8|confirmed',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Process hobbies
        if ($request->input('hobbies')) {
            $hobbies = implode(',', $request->input('hobbies'));
        } else {
            $hobbies = null;
        }

        // Update member
        $member = User::findOrFail($request->id);

        // Update password if it's present in the request
        if ($request->filled('password')) {
            $member->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Upload profile pictures
        $mainProfilePicPath = $this->uploadProfilePics($request, 'main_profile_pic');
        $subPic1Path = $this->uploadProfilePics($request, 'sub_pic_1');
        $subPic2Path = $this->uploadProfilePics($request, 'sub_pic_2');
        $subPic3Path = $this->uploadProfilePics($request, 'sub_pic_3');
        $subPic4Path = $this->uploadProfilePics($request, 'sub_pic_4');

        // Upload Aadhaar Card and Driving License
        $adharPath = $this->uploadFiles($request, 'adhar');
        $drivingLicensePath = $this->uploadFiles($request, 'driving_license');
        $panCardPath = $this->uploadFiles($request, 'pan_card');

        // Update the member with merged data
        $member->update(array_merge(
            $request->except(['main_profile_pic', 'sub_pic_1', 'sub_pic_2', 'sub_pic_3', 'sub_pic_4', 'adhar', 'driving_license', 'hobbies', 'password']),
            [
                'main_profile_pic' => $mainProfilePicPath,
                'sub_pic_1' => $subPic1Path ?? $member->sub_pic_1,
                'sub_pic_2' => $subPic2Path ?? $member->sub_pic_2,
                'sub_pic_3' => $subPic3Path ?? $member->sub_pic_3,
                'sub_pic_4' => $subPic4Path ?? $member->sub_pic_4,
                'adhar' => $adharPath ?? $member->adhar,
                'driving_license' => $drivingLicensePath ?? $member->driving_license,
                'pan_card' => $panCardPath ?? $member->pan_card,
                'hobbies' => $hobbies,
            ]
        ));

        // Redirect or do something else
        return redirect("/admin/all-members")->with("msg", "Member has been updated !");
    }

    protected function uploadProfilePics($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "image_{$name}.{$extension}";

            $file->move(public_path('uploads/profile'), $fileName);
            return $fileName;
        }
        return null;
    }

    protected function uploadFiles($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $timestamp = now()->timestamp;
            $extension = $file->getClientOriginalExtension();
            $name = $timestamp * rand(10, 100000);
            $fileName = "doc_{$name}.{$extension}";

            $file->move(public_path('uploads/documents'), $fileName);
            return $fileName;
        }
        return null;
    }

    public function show($id)
    {
        $user = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->findOrFail($id);

        $hobbies = Hobby::whereIn('hobby_id', explode(',', $user->hobbies))->get();
        return view('admin/members/show', compact('user', 'hobbies'));
    }

    public function edit($id)
    {
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];
        $user = User::findOrFail($id);
        return view("admin/members/edit", compact('user', 'data'));
    }
    public function activation($id)
    {
        $user = User::findOrFail($id);
        if ($user->user_status == "Activated") {
            $user->user_status = "Deactivated";
        } else {
            $user->user_status = "Activated";
        }
        $user->save();
        return redirect()->back()->with('msg', 'Member is now ' . $user->user_status);
    }
    public function lock($id)
    {
        $user = User::findOrFail($id);
        if ($user->lock_status == "Locked") {
            $user->lock_status = "Unlocked";
        } else {
            $user->lock_status = "Locked";
        }
        $user->save();
        return redirect()->back()->with('msg', 'Member is now ' . $user->lock_status);
    }

    public function filter(Request $request)
    {
        $members = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->where('user_type', 'user');
        // Check and apply additional filters
        if (request()->has('caste') && $request->caste != 1) {
            $members->where('users.caste', request('caste'));
        }

        if (request()->has('job_type') && $request->job_type != 1) {
            $members->where('users.job_type', request('job_type'));
        }

        if (request()->has('city') && $request->city != 1) {
            $members->where('users.city', request('city'));
        }

        if (request()->has('gender')) {
            $members->where('users.gender', request('gender'));
        }

        if (request()->has('activation')) {
            $members->where('users.user_status', request('activation'));
        }

        if (request()->has('lock')) {
            $members->where('users.lock_status', request('lock'));
        }

        // Paginate the results
        $members = $members->paginate(10);
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];
        return view('admin/members/index', compact('members', 'data'));
    }

    public function matchMaking()
    {
        $data = [
            'states' => tbl_state_master::all(),
            'city' => City::all(),
            'bloodGroup' => BloodGroup::all(),
            'caste' => Caste::all(),
            'subCaste' => Subcaste::all(),
            'charan' => Charan::all(),
            'color' => Color::all(),
            'gan' => Gan::all(),
            'devak' => Devak::all(),
            'height' => Height::all(),
            'hobbies' => Hobby::all(),
            'jobType' => JobType::all(),
            'kulDevak' => KulDevak::all(),
            'motherT' => MotherTongue::all(),
            'nad' => Nad::all(),
            'nakshatra' => Nakshatra::all(),
            'raas' => Raas::all(),
            'religion' => Religion::all(),
            'varg' => Varg::all(),
            'weight' => Weight::all(),
            'bodyType' => BodyType::all()
        ];
        $users = User::where('user_type', 'user')->get();
        $membersss = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->where('user_type', 'user')
            ->get();
        $newList = [];
        $matches = [];
        foreach ($membersss as $key => $member) {
            foreach ($users as $key => $user) {
                if ($member->id == $user->id) {
                    continue;
                }
                if ($member->gender == $user->gender) {
                    continue;
                }
                if (
                    $member->caste === $user->caste ||
                    $member->subcaste === $user->subcaste ||
                    $member->city === $user->city ||
                    $member->mother_tongue === $user->mother_tongue ||
                    $member->job_type === $user->job_type ||
                    // $member->charan === $user->charan ||
                    // $member->gan === $user->gan ||
                    // $member->devak === $user->devak ||
                    // $member->kul_devak === $user->kul_devak ||
                    // $member->nad !== $user->nad ||
                    // $member->nakshatra === $user->nakshatra ||
                    // $member->raas === $user->raas ||
                    $member->religion === $user->religion
                    // $member->varg === $user->varg
                ) {
                    $matches[] = $user->name;
                }
            }
            $newList[] = [
                "currentMember" => $member,
                "matches" => $matches,
            ];
            $matches = [];
        }
        $perPage = 10;
        $currentPage = request()->get('page', 1); // Get the current page from the request
        $members = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage($currentPage);
        $members = new \Illuminate\Pagination\LengthAwarePaginator(
            $newList,
            count($newList),
            $perPage,
            $currentPage
        );

        return view('admin/match_making/index', compact('members', 'data'));
    }

    public function matchesFound($id)
    {
        $user =  User::findOrFail($id);
        $membersss = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->where('user_type', 'user')
            ->get();
        $newList = [];
        $matches = [];
        foreach ($membersss as $member) {
            $matches = [];
            if ($member->id == $user->id) {
                continue;
            }
            if ($member->gender == $user->gender) {
                continue;
            }
            if ($member->caste === $user->caste) {
                $matches[] = "Caste";
            }
            if ($member->subcaste === $user->subcaste) {
                $matches[] = "Subcaste";
            }
            if ($member->city === $user->city) {
                $matches[] = "City";
            }
            if ($member->business_type === $user->business_type) {
                $matches[] = "Business - Job Type";
            }

            if ($member->religion === $user->religion) {
                $matches[] = "Religion";
            }
            $newList[] = [
                "currentMember" => $member,
                "matches" => $matches,
            ];
            $matches = [];
        }
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $members = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage($currentPage);
        $members = new \Illuminate\Pagination\LengthAwarePaginator(
            $newList,
            count($newList),
            $perPage,
            $currentPage
        );
        return view('admin/match_making/found_matches', compact('members', 'user'));
    }

    public function purchasedPlans($id)
    {
        $purchasedPlans = tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
            ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
            ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
            ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
            ->latest('tbl_prices.created_at')
            ->where('tbl_user_id', $id)->get();
        return view("admin/members/purchased_plans", compact('purchasedPlans'));
    }

    public function plansPurchasedList()
    {
        $data = tbl_purchase_plan::join('tbl_prices', 'tbl_purchase_plans.tbl_price_plan_id', 'tbl_prices.price_plan_id')
            ->join('users', 'users.id', 'tbl_purchase_plans.tbl_user_id')
            ->join('tbl_membership_plans', 'tbl_membership_plans.membership_plan_id', 'tbl_prices.tbl_plan_id')
            ->select('tbl_prices.price', 'tbl_purchase_plans.plan_start_date', 'tbl_prices.month', 'tbl_purchase_plans.plan_end_date', 'tbl_membership_plans.plan_name', 'users.*')
            ->latest('tbl_prices.created_at')
            ->get();
        return view("admin/membership_plan/purchased_plans", compact('data'));
    }

    public function biodata($id)
    {
        $bioData = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('charans', 'users.charan', '=', 'charans.charan_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('gans', 'users.gan', '=', 'gans.gan_id')
            ->leftJoin('devaks', 'users.devak', '=', 'devaks.devak_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('hobbies', 'users.hobbies', '=', 'hobbies.hobby_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->leftJoin('kul_devaks', 'users.kul_devak', '=', 'kul_devaks.kul_devak_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('nads', 'users.nad', '=', 'nads.nad_id')
            ->leftJoin('nakshatras', 'users.nakshatra', '=', 'nakshatras.nakshatra_id')
            ->leftJoin('raas', 'users.raas', '=', 'raas.raas_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('vargs', 'users.varg', '=', 'vargs.varg_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('body_types', 'users.body_type', '=', 'body_types.body_type_id')
            ->findOrFail($id);
        return view('admin/members/bio_data', compact('bioData'));
    }
}
