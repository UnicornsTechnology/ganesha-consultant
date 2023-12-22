@extends('layouts.web_admin_layout')
@section('title')
Member Details
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-lg-6 col-xl-9">
      <div class="card overflow-hidden">
        <div class="profile-cover bg-dark position-relative mb-4">
          <div class="user-profile-avatar shadow position-absolute top-50 start-0 translate-middle-x">
            @if($user->main_profile_pic != NULL)
            <img src="{{asset('uploads/profile/'. $user->main_profile_pic)}}" alt="..." height="210" width="200" class="img-thumbnail">
            @else
            <img src="{{asset('default-profile-pic.jpg')}}" alt="..." height="210" width="200" class="img-thumbnail">
            @endif
          </div>
        </div>
        <div class="card-body">
          <div class="mt-5 d-flex align-items-start justify-content-between">
            <div class="">
              <h3 class="mb-2"> {{$user->name}} </h3>
              <p class="mb-2"> {{$user->email}} </p>
              <p class="mb-1">{{$user->education}}</p>
              <p class="mb-1">
                {{$user->date_of_birth}} <!-- Display the original date of birth -->
                @if ($user->date_of_birth)
                    {{-- Use Carbon to calculate and display the age --}}
                    ({{ \Carbon\Carbon::parse($user->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }} Years Old)
                @else
                    (Date of birth not provided)
                @endif
            </p>
              {{-- //TODO :: age code --}}
              <p>{{$user->village}} {{$user->taluka}} {{$user->district}} {{$user->state}}</p>
             Gender : @if ($user->gender == 1)
                                            Male
                                        @else
                                            Female
                                        @endif
<br/>
                                       Marital Status :  @if ($user->marital_status == 1)
                                       Unmarried
                                   @elseif($user->marital_status == 2)
                                       Married
                                       @else 
                                       Divorced
                                   @endif
              <div class="">
                @foreach ($hobbies as $item)
                  <span class="badge rounded-pill bg-primary">{{ $item->hobby_name }}</span>
              @endforeach

              </div>
            </div>
            <div>
              <div class="">
                <a href="/uploads/profile/{{$user->sub_pic_1}}">
                  @if($user->sub_pic_1)
                      <img src="{{asset('uploads/profile/'. $user->sub_pic_1)}}" alt="..." height="50" width="50">
                  @endif
              </a>
              
              <a href="{{ $user->sub_pic_2 ? '/uploads/profile/' . $user->sub_pic_2 : '#' }}">
                  @if($user->sub_pic_2)
                      <img src="{{asset('uploads/profile/'. $user->sub_pic_2)}}" alt="..." height="50" width="50">
                  @endif
              </a>
              
              <a href="{{ $user->sub_pic_3 ? '/uploads/profile/' . $user->sub_pic_3 : '#' }}">
                  @if($user->sub_pic_3)
                      <img src="{{asset('uploads/profile/'. $user->sub_pic_3)}}" alt="..." height="50" width="50">
                  @endif
              </a>
              
              <a href="{{ $user->sub_pic_4 ? '/uploads/profile/' . $user->sub_pic_4 : '#' }}">
                  @if($user->sub_pic_4)
                      <img src="{{asset('uploads/profile/'. $user->sub_pic_4)}}" alt="..." height="50" width="50">
                  @endif
              </a>
              
              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="card">
            <div class="row">
              <div class="text-center">
              <h5 class="my-2">Caste & Community</h5>
                </div>
              <div class="col-4 mx-auto">
                <div class="card-body">
               <div class="mb-3">
                <p class="mb-1">Religion : {{$user->religion_name}}</p>
                
               </div>
               <div class="mb-3">
                <p class="mb-1">Caste : {{$user->caste_name}}</p>
                
               </div>
               <div class="mb-3">
                <p class="mb-1">Subcaste : {{$user->subcate_name}}</p>
               
               </div>
               <div class="mb-3">
                <p class="mb-1">Devak : {{$user->devak_name}}</p>
               
               </div>
              
              
               </div>
              </div>
              <div class="col-4 mx-auto">
                <div class="card-body">
                  <div class="mb-3">
                    <p class="mb-1">Nakshatra : {{$user->nakshatra_name}} </p>
                    
                   </div>
                   <div class="mb-4">
                    <p class="mb-1">Charan : {{$user->charan_name}} </p>
                   </div>
        
                   <div class="mb-3">
                    <p class="mb-1">Gan : {{$user->gan_name}}</p>
                   </div>
    
                  
               </div>
              </div>
              <div class="col-4 mx-auto">
                <div class="card-body">
                  <div class="mb-3">
                    <p class="mb-1">Raas : {{$user->raas_name}}</p>
                   </div>
    
                   <div class="mb-3">
                    <p class="mb-1">Nad : {{$user->nad_name}}</p>
                   </div>
                   <div class="mb-3">
                    <p class="mb-1">Varg & Kul Devak :  {{$user->varg_name}} - {{$user->kul_devak_name}}</p>
                   </div>
                  
               </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="text-center">
              <h5 class="my-2">Family Information...</h5>
                </div>
              <div class="col-4 mx-auto">
                <div class="card-body">
               <div class="mb-3">
                <p class="mb-1">Father Full Name : {{$user->father_full_name}}</p>
               </div>
               <div class="mb-3">
                <p class="mb-1">Father's Occupation' : {{$user->father_occupation}}</p>
               </div>
               <div class="mb-3">
                <p class="mb-1">Mother Full Name : {{$user->mother_full_name}}</p>
               </div>
               <div class="mb-3">
                <p class="mb-1">Mother's Occupation' : {{$user->mother_occupation}}</p>
               </div>
              
               </div>
              </div>
              <div class="col-4 mx-auto">
                <div class="card-body">
                  <div class="mb-3">
                    <p class="mb-1">Number Of Brothers : {{$user->brothers}} </p>
                    
                   </div>
                   <div class="mb-4">
                    <p class="mb-1">Number Of Sisters : {{$user->sisters}} </p>
                   </div>
        
                   <div class="mb-3">
                    <p class="mb-1">Mama : {{$user->mama}}</p>
                   </div>
    
                  
               </div>
              </div>
              <div class="col-4 mx-auto">
                <div class="card-body">
                  <div class="mb-3">
                    <p class="mb-1">Relatives : {{$user->relatives}}</p>
                   </div>
    
                   <div class="mb-3">
                    <p class="mb-1">Family Type : {{$user->family_type}}</p>
                   </div>
                   <div class="mb-3">
                    <p class="mb-1">Prperty Details :  {{$user->property_details}} </p>
                   </div>
                  
               </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="row">
              <div class="text-center">
              <h5 class="my-2">Education Details</h5>
                </div>
              <div class="col-12 mx-auto">
                <div class="card-body">
               <div class="mb-3">
                <p class="mb-1">Job Type : {{$user->job_type_name}}</p>
               </div>
               <div class="mb-3">
                <p class="mb-1">Company Name : {{$user->company_name}}</p>
               </div>
               <div class="mb-3">
                <p class="mb-1">Salary : {{$user->salary}}</p>
               </div>
               <div class="mb-3">
                <p class="mb-1">Education : {{$user->education}}</p>
               </div>
              
               </div>
            
              </div>
            </div>
          </div>
    </div>
    <div class="col-12 col-lg-4 col-xl-3">
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Documents</h5>
          <p class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i>Adhaar Card -
            @if($user->adhar == NULL)            
            <span class="badge bg-primary">Not Uploaded</span>
            @else
            <a href="/documents/{{ $user->adhar }}"><span class="badge bg-primary">View Adhaar</span></a> </p>
            @endif
          </p>

          <p class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i>PAN Card -
            @if($user->pan_card == NULL)            
            <span class="badge bg-primary">Not Uploaded</span>
            @else
            <a href="/documents/{{ $user->pan_card }}"><span class="badge bg-primary">View PAN Card</span></a> </p>
            @endif
          </p>

          <p class="mb-0"><i class="bi bi-geo-alt-fill me-2"></i>Driving License -
            @if($user->driving_license == NULL)            
            <span class="badge bg-primary">Not Uploaded</span>
            @else
            <a href="/documents/{{ $user->driving_license }}"><span class="badge bg-primary">View Driving License</span></a> </p>
            @endif
          </p>
        </div>
      </div>
      
      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Connect</h5>
           <p class=""><i class="bi bi-whatsapp me-2"></i> <a href="{{$user->whatsapp}}">WhatsApp</a> </p>
           <p class=""><i class="bi bi-facebook me-2"></i> <a href="{{$user->facebook}}">Facebook</a> </p>
           <p class=""><i class="bi bi-instagram me-2"></i> <a href="{{$user->instagram}}">Instagram</a> </p>
           <p class="mb-0"><i class="bi bi-youtube me-2"></i><a href="{{$user->youtube}}">Youtube</a></p>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Advance Bio</h5>
           <div class="mb-3">
            <p class="mb-1">Weight : {{$user->weight}}</p>
            
           </div>
           <div class="mb-3">
            <p class="mb-1">Height : {{$user->height}}</p>
           
           </div>
           <div class="mb-3">
            <p class="mb-1">Date Of Birth : {{$user->date_of_birth}}</p>
           
           </div>
           <div class="mb-3">
            <p class="mb-1">Birth Time : {{$user->birth_time}} </p>
            
           </div>
           <div class="mb-3">
            <p class="mb-1">Birth Place : {{$user->birth_place}} </p>
           </div>

           <div class="mb-3">
            <p class="mb-1">Mother Tongue : {{$user->mother_tongue_name}}</p>
           </div>

           <div class="mb-3">
            <p class="mb-1">Blood Group : {{$user->blood_group_name}}</p>
           </div>
           <div class="mb-3">
            <p class="mb-1">Color : {{$user->color_name}}</p>
           </div>
           <div class="mb-3">
            <p class="mb-1">Body Type : {{$user->body_type_name}}</p>
           </div>
           <div class="mb-3">
            <p class="mb-1">Is Handicapped ? : @if ($user->is_handicapped == "1") No
            @else
            Yes                
            @endif </p>
           </div>

        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <h5 class="mb-3">Habits & Hobbies</h5>
           <div class="mb-3">
            <p class="mb-1">Diet : @if ($user->diet == 1) Veg @else Non-Veg @endif</p>
            
           </div>
           <div class="mb-3">
            <p class="mb-1">Smoking Habits : @if ($user->smoking_habits == 1) No @else Yes @endif</p>
           
           </div>
           <div class="mb-3">
            <p class="mb-1">Drinking  Habits : @if ($user->drinking_habits == 1) No @else Yes @endif</p>
           
           </div>
        </div>
      </div>
      

    </div>
  </div>
@endsection
