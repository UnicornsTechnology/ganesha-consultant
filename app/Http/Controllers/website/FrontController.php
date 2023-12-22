<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Caste;
use App\Models\City;
use App\Models\Hobby;
use App\Models\ImageGallery;
use App\Models\Inqury;
use App\Models\JobType;
use App\Models\MotherTongue;
use App\Models\ProfileView;
use App\Models\Religion;
use App\Models\SuccessStory;
use App\Models\tbl_membership_plan;
use App\Models\tbl_price;
use App\Models\Team;
use App\Models\TrustedCouple;
use App\Models\User;
use App\Notifications\UserNotifications;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function home()
    {
        $tcouple = TrustedCouple::where('is_active', 'Active')->get();
        $scouple = SuccessStory::where('is_active', 'Active')->get();
        $team = Team::where('is_active', 'Active')->get();
        $gallery = ImageGallery::where('is_active', 'Active')->get();
        $city = City::all();
        $religion = Religion::all();
        return view("website/index", compact('tcouple', 'scouple', 'team', 'gallery', 'city', 'religion'));
    }

    public function about()
    {
        $team = Team::where('is_active', 'Active')->get();
        return view("website/about", compact('team'));
    }

    public function grooms(Request $request)
    {
        $ages = json_decode($request->age);
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
            ->where('id', '!=', Auth::id())
            ->where('user_status', "Activated")
            ->where('user_percentages', ">=", 50)
            ->where('gender', 1);
        // Check and apply additional filters
        if (request()->has('cast') && $request->cast != 1) {
            $members->where('users.caste', request('cast'));
        }

        if (request()->has('job_type') && $request->job_type != 1) {
            $members->where('users.job_type', request('job_type'));
        }

        if (request()->has('city') && $request->city != 1) {
            $members->where('users.city', request('city'));
        }

        if (request()->has('mother_tongue' && $request->mother_tongue != 1)) {
            $members->where('users.mother_tongue', request('mother_tongue'));
        }

        if ($request->marital_status) {
            $members->where('users.marital_status', request('marital_status'));
        }

        if (request()->has('religin') && $request->religin != 1) {
            $members->where('users.religion', request('religin'));
        }
        if (request()->has('age') && $request->age) {
            $members->whereBetween('age', [$ages[0], $ages[1]]);
        }
        $mother_tongue = MotherTongue::all();
        // Paginate the results
        $grooms = $members->paginate(10);
        $city = City::all();
        $religion = Religion::all();
        $job_type = JobType::all();
        $caste = Caste::all();
        return view("website/grooms", compact('grooms', 'mother_tongue', 'city', 'religion', 'job_type', 'caste'));
    }

    public function brides(Request $request)
    {
        $ages = json_decode($request->age);
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
            ->where('id', '!=', Auth::id())
            ->where('user_status', "Activated")
            ->where('user_percentages', ">=", 50)
            ->where('gender', 2);
        // Check and apply additional filters
        if (request()->has('cast') && $request->cast != 1) {
            $members->where('users.caste', request('cast'));
        }

        if (request()->has('job_type') && $request->job_type != 1) {
            $members->where('users.job_type', request('job_type'));
        }

        if (request()->has('city') && $request->city != 1) {
            $members->where('users.city', request('city'));
        }

        if (request()->has('mother_tongue' && $request->mother_tongue != 1)) {
            $members->where('users.mother_tongue', request('mother_tongue'));
        }

        if ($request->marital_status) {
            $members->where('users.marital_status', request('marital_status'));
        }

        if (request()->has('religin') && $request->religin != 1) {
            $members->where('users.religion', request('religin'));
        }
        if (request()->has('age') && $request->age) {
            $members->whereBetween('age', [$ages[0], $ages[1]]);
        }
        $mother_tongue = MotherTongue::all();
        // Paginate the results
        $grooms = $members->paginate(10);
        $city = City::all();
        $religion = Religion::all();
        $job_type = JobType::all();
        $caste = Caste::all();
        return view("website/brides", compact('grooms', 'mother_tongue', 'city', 'religion', 'job_type', 'caste'));
    }

    public function membership()
    {
        $data = tbl_membership_plan::where('plan_status', 'active')->get();
        $mainArray = [];

        foreach ($data as $key => $singleItem) {
            $singleItem->pricesList =  tbl_price::where('tbl_plan_id', $singleItem->membership_plan_id)->get();
            $mainArray[] = $singleItem;
        }
        // return $mainArray;
        return view("website/membership", compact('mainArray'));
    }

    public function contact()
    {
        return view("website/contact");
    }

    public function termsAndConditions()
    {
        return view("website/terms_conditions");
    }

    public function privacyPolicy()
    {
        return view("website/privacy_policy");
    }
    public function shippingPolicy()
    {
        return view("website/deilvery_page");
    }

    public function refundPolicy()
    {
        return view("website/refund_policy");
    }

    public  function login()
    {
        return view("website/login");
    }

    public function register()
    {
        return view("website/register");
    }

    public function details($id)
    {
        if (Auth::check() == false) {
            return redirect("/login");
        }
        $profile = ProfileView::query();
        $user = $profile->where('pv_viewer_id', Auth::id())->where('pv_profile_id', $id)->first();

        $viewdList = $profile->where('pv_viewer_id', Auth::id())->where('pv_profile_id', $id)->get();
        if (Auth::user()->view_profile_limit === 0 && !$viewdList->contains('pv_profile_id', $id)) {
            return redirect("/membership-plans");
        }
        $data = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'charans.charan_name', 'colors.color_name', 'gans.gan_name', 'devaks.devak_name', 'heights.height_count', 'hobbies.hobby_name', 'job_types.job_type_name', 'kul_devaks.kul_devak_name', 'mother_tongues.mother_tongue_name', 'nads.nad_name', 'nakshatras.nakshatra_name', 'raas.raas_name', 'religions.religion_name', 'vargs.varg_name', 'weights.weight_count', 'body_types.body_type_name')
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
            ->where('users.id', $id)
            ->first();
        $hobbies = Hobby::whereIn('hobby_id', explode(',', $data->hobbies))->get();

        if ($user) {
            $user->update([
                'pv_viewer_id' => Auth::id(),
                'pv_profile_id' => $id,
                'pv_viewing_count' => $user->pv_viewing_count + 1,
            ]);
        } else {
            $profile->create([
                'pv_viewer_id' => Auth::id(),
                'pv_profile_id' => $id,
                'pv_viewing_count' => 1,
            ]);
            auth()->user()->update([
                "view_profile_limit" => Auth::user()->view_profile_limit - 1
            ]);
        }



        $user = User::find($id);
        $user->notify(new UserNotifications([
            "message" => "Someone Viewed Your Profile",
            "action" => "users/profile-view",
            "type" => "PROFILE_VIEWED",
        ]));

        return view("website/profile_details", compact('data', 'hobbies'));
    }

    public function Inquriy(Request $request)
    {
        $table = new Inqury();
        $table->inquriy_name = $request->inquriy_name;
        $table->inquriy_email = $request->inquriy_email;
        $table->inquriy_phone = $request->inquriy_phone;
        $table->inquriy_massage = $request->inquriy_massage;
        $table->save();
        return redirect("/contact-us")->with("msg", 'Inquriy Send Successfully !!');
    }

    public function profileView()
    {
        $profileViews = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'colors.color_name', 'heights.height_count', 'job_types.job_type_name', 'mother_tongues.mother_tongue_name', 'religions.religion_name', 'profile_views.*')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('profile_views', 'users.id', '=', 'profile_views.pv_profile_id')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->where('pv_viewer_id', Auth::id())
            ->get();

        $profileViewedByOthers = User::select('users.*', 'tbl_state_masters.state_name', 'cities.city_name', 'blood_groups.blood_group_name', 'castes.caste_name', 'subcastes.subcaste_name', 'colors.color_name', 'heights.height_count', 'job_types.job_type_name', 'mother_tongues.mother_tongue_name', 'religions.religion_name', 'profile_views.*')
            ->leftJoin('cities', 'users.city', '=', 'cities.city_id')
            ->leftJoin('heights', 'users.height', '=', 'heights.height_id')
            ->leftJoin('mother_tongues', 'users.mother_tongue', '=', 'mother_tongues.mother_tongue_id')
            ->leftJoin('religions', 'users.religion', '=', 'religions.religion_id')
            ->leftJoin('weights', 'users.weight', '=', 'weights.weight_id')
            ->leftJoin('profile_views', 'users.id', '=', 'profile_views.pv_profile_id')
            ->leftJoin('tbl_state_masters', 'users.state', '=', 'tbl_state_masters.state_id')
            ->leftJoin('blood_groups', 'users.blood_group', '=', 'blood_groups.blood_group_id')
            ->leftJoin('castes', 'users.caste', '=', 'castes.caste_id')
            ->leftJoin('subcastes', 'users.subcaste', '=', 'subcastes.subcaste_id')
            ->leftJoin('colors', 'users.color', '=', 'colors.color_id')
            ->leftJoin('job_types', 'users.job_type', '=', 'job_types.job_type_id')
            ->where('pv_profile_id', Auth::id())
            ->get();
        return view("website/profile_views", compact('profileViews', 'profileViewedByOthers'));
    }
}
