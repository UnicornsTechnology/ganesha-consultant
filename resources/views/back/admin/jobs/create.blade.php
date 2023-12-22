@extends('layouts.back.master')
@section('title')
    Create Job
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
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
                    <form action="/admin/job/store" method="post">
                        @csrf
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    @if (session('msg'))
                                        <div class="alert alert-success">
                                            {{ session('msg') }}
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="card-header text-right">
                                            <h3 class="card-title mt-1">Admin Create Job</h3>
                                            <a href="/admin/jobs/list" class="btn btn-success">View Job List</a>
                                        </div>

                                        <!-- /.card-header -->
                                        <div class="card-body overflow-auto">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-4 mt-3">
                                                        <label>Posting Date:</label>
                                                        <input type="date" class="form-control" name="posting_date"
                                                            required>
                                                    </div>
                                                    <div class="col-sm-4 mt-3">
                                                        <label>Company Name : <button class="badge badge-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#companyNameModal">+</button></label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <select name="company_id" id="companiesName"
                                                                    class="form-control" required>
                                                                    @foreach ($companiesName as $item)
                                                                        <option value="{{ $item->company_name_id }}">
                                                                            {{ $item->company_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="companyNameModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add New Company</h4>
                                                                        <button type="button" class="close"
                                                                            id="company_name_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text" placeholder="Company Name"
                                                                            class="form-control" id="company_name">
                                                                        <input type="file" class="form-control my-3"
                                                                            id="image">
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="uploadImage()">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-3">
                                                        <label>Job Title : <button class="badge badge-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#jobModal">+</button></label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <select name="job_title" id="jobTitles" class="form-control"
                                                                    required>
                                                                    @foreach ($jobTitles as $item)
                                                                        <option value="{{ $item->job_title_id }}">
                                                                            {{ $item->job_title_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="jobModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add New Job Title</h4>
                                                                        <button type="button" class="close"
                                                                            id="job_title_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text" placeholder="Job Title"
                                                                            class="form-control" id="job_title_name">
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="addData('job_title_name',document.getElementById('job_title_name').value,'/axios/admin/job-title/store','job_title_name','jobTitles')">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3 mt-3">
                                                        <label>Location : <button class="badge badge-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#locationModal">+</button></label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <select name="location_id" id="locations"
                                                                    class="form-control" required>
                                                                    @foreach ($locations as $item)
                                                                        <option value="{{ $item->location_id }}">
                                                                            {{ $item->location_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="locationModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add New Location</h4>
                                                                        <button type="button" class="close"
                                                                            id="location_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text" placeholder="Location Name"
                                                                            class="form-control" id="location_name">
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="addData('location_name',document.getElementById('location_name').value,'/axios/admin/location/store','location_name','locations')">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mt-3">
                                                        <label>Experience : <button class="badge badge-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#experienceModal">+</button></label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <select name="experience_id" id="experiences"
                                                                    class="form-control" required>
                                                                    @foreach ($experiences as $item)
                                                                        <option value="{{ $item->experiences_id }}">
                                                                            {{ $item->experiences_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="experienceModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add New Experience</h4>
                                                                        <button type="button" class="close"
                                                                            id="experience_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text"
                                                                            placeholder="Experience Name"
                                                                            class="form-control" id="experience_name">
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="addData('experience_name',document.getElementById('experience_name').value,'/axios/admin/experience/store','experience_name','experiences')">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mt-3">
                                                        <label>Skills : <button class="badge badge-primary" type="button"
                                                                data-toggle="modal"
                                                                data-target="#skillsModal">+</button></label>
                                                        <div class="form-group">
                                                            <select class="select2" multiple="multiple" name="skill_id[]"
                                                                id="skills__id" data-placeholder="Select Skills"
                                                                style="width: 100%;" required>
                                                                @foreach ($skills as $item)
                                                                    <option value="{{ $item->skill_id }}">
                                                                        {{ $item->skill_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="skillsModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add New Skill</h4>
                                                                        <button type="button" class="close"
                                                                            id="skill_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text" placeholder="Skill"
                                                                            class="form-control" id="skill_name">
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="addData('skill_name',document.getElementById('skill_name').value,'/axios/admin/skill/store','skill_name','skills__id')">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3 mt-3">
                                                        <label>Job Type : <button class="badge badge-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#job_typeM">+</button></label>
                                                        <div class="form-group">
                                                            <select class="form-control" name="job_type__" id="job_type"
                                                                required>
                                                                @foreach ($jobType as $item)
                                                                    <option value="{{ $item->job_type_id }}">
                                                                        {{ $item->job_type_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="job_typeM">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add Job Type</h4>
                                                                        <button type="button" class="close"
                                                                            id="job_type_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text" placeholder="Job Type"
                                                                            class="form-control" id="job_type_id">
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="addData('job_type',document.getElementById('job_type_id').value,'/axios/admin/job-type/store','job_type','job_type')">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-3">
                                                        <label>Education : <button class="badge badge-primary"
                                                                type="button" data-toggle="modal"
                                                                data-target="#educationModel">+</button></label>
                                                        <div class="form-group">
                                                            <div class="input-group">

                                                                <select class="select2" multiple="multiple"
                                                                    name="education_id[]" id="education__"
                                                                    data-placeholder="Select Education"
                                                                    style="width: 100%;" required>
                                                                    @foreach ($education as $item)
                                                                        <option value="{{ $item->education_id }}">
                                                                            {{ $item->education_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>


                                                            </div>
                                                        </div>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="educationModel">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Add New Education</h4>
                                                                        <button type="button" class="close"
                                                                            id="education_modal_close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <input type="text" placeholder="Education Name"
                                                                            class="form-control" id="education_name">
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary"
                                                                            onclick="addData('education_name',document.getElementById('education_name').value,'/axios/admin/education/store','education_name','education__')">Save</button>
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-3">
                                                        <label>Package : </label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="job_package"
                                                                    class="form-control" placeholder="Enter Package"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 mt-3">
                                                        <label>Expiry Date:</label>
                                                        <input type="date" class="form-control" name="expiry_date"
                                                            >
                                                    </div>
                                                    {{-- <div class="col-sm-4">
                                                        <label>Package and Payments:</label>
                                                        @foreach ($companiesName as $item)
                                                        @endforeach
                                                    </div> --}}
                                                    <div class="col-sm-12 mt-3">
                                                        <label>URL : </label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="job_url"
                                                                    class="form-control" placeholder="Enter URL"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <label>Job Description:</label>
                                                        <textarea id="summernote" name="job_description"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.container-fluid -->
                                        <div class="text-center mb-3">
                                            <button type="submit" class="btn btn-success">Create Job</button>
                                        </div>
                    </form>
                </section>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            async function uploadImage() {
                const name = document.getElementById("company_name").value
                const image = document.getElementById("image").files[0];
                const formData = new FormData();
                formData.append("image", image);
                formData.append("key", name);

                axios.post("/axios/admin/company/store", formData, {
                        headers: {
                            "Content-Type": "multipart/form-data"
                        }
                    })
                    .then(response => {
                        document.getElementById("companiesName").innerHTML = ``
                        response.data.data.forEach(element => {
                            document.getElementById("companiesName").innerHTML +=
                                `<option value='${element.company_name_id}'>${element.company_name}</option>`
                        });
                        Toastify({
                            text: "Company name added successfully",
                            close: true,
                            duration: 3000,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                    })
                    .catch(error => {
                        Toastify({
                            text: "Already exits !",
                            close: true,
                            duration: 3000,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();
                        console.log(error);
                    });
            }
            async function addData(key, value, route, idName, parentList) {
                try {
                    const name = document.getElementById(idName).value
                    document.getElementById(parentList).innerHTML = ``;
                    if (!value || value == "" || value == null) {
                        return alert("This field is required")
                    }
                    const response = await axios.post(route, {
                        key: value
                    });
                    document.getElementById(idName).value = "";
                    document.getElementById(parentList).innerHTML = ``
                    Toastify({
                        text: response.data.message,
                        close: true,
                        duration: 3000,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "linear-gradient(to right, #00b09b, #96c93d)",
                        },
                        onClick: function() {} // Callback after click
                    }).showToast();
                    switch (idName) {
                        case "company_name":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.company_name_id}'>${element.company_name}</option>`
                            });
                            document.getElementById("company_name_modal_close").click();
                            break;
                        case "job_title_name":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.job_title_id}'>${element.job_title_name}</option>`
                            });
                            document.getElementById("job_title_modal_close").click();

                            break;
                        case "location_name":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.location_id}'>${element.location_name}</option>`
                            });
                            document.getElementById("location_modal_close").click();

                            break;
                        case "experience_name":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.experiences_id}'>${element.experiences_name}</option>`
                            });
                            document.getElementById("experience_modal_close").click();

                            break;
                        case "skill_name":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.skill_id}'>${element.skill_name}</option>`
                            });
                            document.getElementById("skill_modal_close").click();

                            break;
                        case "education_name":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.education_id}'>${element.education_name}</option>`
                            });
                            document.getElementById("education_modal_close").click();

                            break;
                        case "job_type":
                            response.data.data.forEach(element => {
                                document.getElementById(parentList).innerHTML +=
                                    `<option value='${element.job_type_id}'>${element.job_type_name}</option>`
                            });
                            document.getElementById("job_type_modal_close").click();

                            break;

                        default:
                            break;
                    }

                } catch (error) {
                    Toastify({
                        text: "Already exists !",
                        duration: 3000,
                        close: true,
                        gravity: "top", // `top` or `bottom`
                        position: "right", // `left`, `center` or `right`
                        stopOnFocus: true, // Prevents dismissing of toast on hover
                        style: {
                            background: "orange",
                        },
                        onClick: function() {} // Callback after click
                    }).showToast();
                    console.log(error.response);
                }
            }
        </script>
    </body>
@endsection
