@extends('layouts.web_admin_layout')
@section('title')
    Bio Data
@endsection

@section('content')
<div style="max-width: 800px; margin: auto; overflow: hidden;">
    <div style="text-align: center; margin-bottom: 20px;">
        <button style="margin-top: 10px;" class="btn btn-success" id="printBioDataButton" onclick="printBioData()">Print Bio Data</button>
    </div>
    <div id="printableArea" style="border: 1px solid #ccc; border-radius: 5px; overflow: hidden; margin-bottom: 20px; position: relative;" class="d-none">
      <div style="border: 3px solid black">
        <center><h2>Bio Data</h2></center>
        <div style="width: 50%; float: left; box-sizing: border-box; padding: 10px;" >
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td> <b>Name :</b> </td>
                        <td>{{ $bioData->name }}</td>
                    </tr>
                    <tr>
                        <td> <b>Email :</b> </td>
                        <td>{{ $bioData->email }}</td>
                    </tr>
                    <tr>
                        <td> <b>Mobile :</b> </td>
                        <td>{{ $bioData->mobile }}</td>
                    </tr>
                    <tr>
                        <td> <b>State :</b> </td>
                        <td>{{ $bioData->state_name }}</td>
                    </tr>
                    <tr>
                        <td> <b>Pin Code :</b> </td>
                        <td>{{ $bioData->pin_code }}</td>
                    </tr>
                    <tr>
                        <td> <b>District :</b> </td>
                        <td>{{ $bioData->district }}</td>
                    </tr>
                    <tr>
                        <td> <b>Taluka :</b> </td>
                        <td>{{ $bioData->taluka }}</td>
                    </tr>
                    <tr>
                        <td> <b>Village :</b> </td>
                        <td>{{ $bioData->village }}</td>
                    </tr>
                    <tr>
                        <td> <b>City :</b> </td>
                        <td>{{ $bioData->city_name }}</td>
                    </tr>
                    <tr>
                        <td> <b>Date of Birth :</b> </td>
                        <td>{{ $bioData->date_of_birth }}</td>
                    </tr>
                    <tr>
                        <td> <b>Birth Time :</b> </td>
                        <td>{{ $bioData->birth_time }}</td>
                    </tr>
                    <tr>
                        <td> <b>Birth Place :</b> </td>
                        <td>{{ $bioData->birth_place }}</td>
                    </tr>
                    <tr>
                        <td> <b>Education :</b> </td>
                        <td>{{ $bioData->education }}</td>
                    </tr>
                    <tr>
                        <td> <b>Gender :</b> </td>
                        <td>@if ($bioData->gender == 1)
                            Male
                        @else
                            Female
                        @endif</td>
                    </tr>
                    <tr>
                        <td> <b>Marital Status :</b> </td>
                        <td> @if ($bioData->marital_status == 1)
                            Unmarried
                        @elseif($bioData->marital_status == 2)
                            Married
                            @else 
                            Divorced
                        @endif</td>
                    </tr>
                    <tr>
                        <td> <b>Height :</b> </td>
                        <td>{{ $bioData->height_count }}</td>
                    </tr>
                    <tr>
                        <td> <b>Weight :</b> </td>
                        <td>{{ $bioData->weight_count }}</td>
                    </tr>
                    <!-- Continue adding more rows for the left column -->
                </tbody>
            </table>
        </div>
        <div style="width: 50%; float: right; box-sizing: border-box; text-align: center;">
            @if($bioData->main_profile_pic)
                <img src="{{ asset('/uploads/profile/' . $bioData->main_profile_pic) }}" alt="" style="width: 300px; height: 300px;border:2px solid black">
            @else
                <img src="{{ asset('default-profile-pic.jpg') }}" alt="User Image" style="width: 200px; height: 300px; height: 200px; border:2px solid black">
            @endif
        </div>
        <div style="box-sizing: border-box; padding: 10px;">
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td> <b> Father's Full Name  :</b> </td>
                        <td>{{ $bioData->father_full_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Mother's Full Name  :</b> </td>
                        <td>{{ $bioData->mother_full_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Father's Occupation  :</b> </td>
                        <td>{{ $bioData->father_occupation }}</td>
                    </tr>
                    <tr>
                        <td> <b> Mother's Occupation  :</b> </td>
                        <td>{{ $bioData->mother_occupation }}</td>
                    </tr>
                    <tr>
                        <td> <b> Job Type  :</b> </td>
                        <td>{{ $bioData->job_type_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Age  :</b> </td>
                        <td>@if ($bioData->date_of_birth)
                            {{-- Use Carbon to calculate and display the age --}}
                                {{ \Carbon\Carbon::parse($bioData->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }} 
                        @else
                            (Date of birth not provided)
                        @endif
                    </td>
                    </tr>
                    <tr>
                        <td> <b> Mother Tongue  :</b> </td>
                        <td>{{ $bioData->mother_tongue_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Company Name  :</b> </td>
                        <td>{{ $bioData->company_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Salary  :</b> </td>
                        <td>{{ $bioData->salary }}</td>
                    </tr>
                    <tr>
                        <td> <b> Blood Group  :</b> </td>
                        <td>{{ $bioData->blood_group_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Color  :</b> </td>
                        <td>{{ $bioData->color_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Body Type  :</b> </td>
                        <td>{{ $bioData->body_type_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Caste  :</b> </td>
                        <td>{{ $bioData->caste_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Subcaste  :</b> </td>
                        <td>{{ $bioData->subcaste_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Religion  :</b> </td>
                        <td>{{ $bioData->religion_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Devak  :</b> </td>
                        <td>{{ $bioData->devak_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Nakshatra  :</b> </td>
                        <td>{{ $bioData->nakshatra_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Charan  :</b> </td>
                        <td>{{ $bioData->charan_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Gan  :</b> </td>
                        <td>{{ $bioData->gan_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Raas  :</b> </td>
                        <td>{{ $bioData->raas_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Nad  :</b> </td>
                        <td>{{ $bioData->nad_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Varg  :</b> </td>
                        <td>{{ $bioData->varg_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Kul Devak  :</b> </td>
                        <td>{{ $bioData->kul_devak_name }}</td>
                    </tr>
                    <tr>
                        <td> <b> Brothers  :</b> </td>
                        <td>{{ $bioData->brothers }}</td>
                    </tr>
                    <tr>
                        <td> <b> Sisters  :</b> </td>
                        <td>{{ $bioData->sisters }}</td>
                    </tr>
                    <!-- Continue adding more rows for the additional information -->
                </tbody>
            </table>
        </div>
      </div>
</div>

</div>

<script>

    function printBioData() {
        var printContents = document.getElementById("printableArea").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
@endsection
