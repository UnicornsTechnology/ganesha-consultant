@extends('layouts.back.master')
@section('title')
Send WhatsApp Messages
@endsection

@section('content')
<style>
    .floating-button{
        position: fixed;
        bottom: 10px;
        right: 10px;
        z-index: 9999;
    }
</style>
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
                    <div class="container-fluid">
                        @if (session('msg'))
                            <div class="alert alert-success">
                                {{ session('msg') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header py-2">
                                        <div class="d-flex bd-highlight mb-3">
                                            <div class="mr-auto p-2 bd-highlight">
                                                <h3>Send WhatsApp Messages</h3>
                                                <select name="" id="selectTemplateBox" class="form-control">
                                                    <option value="0">Select Template</option>
                                                    @foreach ($templates as $item)
                                                        <option class="options" data-template-name="{{$item->wt_template_name}}" data-image-url="{{$item->wt_image_url}}" data-file-name="{{$item->wt_file_name}}">{{$item->wt_template_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <a href="/admin/whatsapp/create-template" class="btn btn-success">Add New Template</a>
                                           
                                                {{-- @can('/admin/whatsapp-template/create') --}}
                                                <a href="/admin/whatsapp-template/create" class="btn btn-primary">Add WhatsApp Template</a>
                                                {{-- @endcan --}}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body overflow-auto">
                                        <table id="table_id" data-paging='false' class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Select All <input type="checkbox" name="all" value="0" onclick="selectAll(this)"> </th>
                                                    <th>Student Name</th>
                                                    <th>Mobile Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key => $item)
                                                    <tr>
                                                        <td>{{$key + 1}}</td>
                                                        <td><input type="checkbox" data-user-name="{{$item->improt_name}}" name="selectUser" value="{{$item->improt_number}}" onclick="selectedCount()" class="checkboxClass"></td>
                                                        <td>{{$item->pmprot_name}}</td>
                                                        <td>{{$item->improt_number}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                       <div class="pagination mx-auto">
                                       </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="floating-button">
                        <button class="btn btn-primary" onclick="sendMessages()"> (<span id="count">0</span>) Send Messages</button>
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>
        </div>

        <script>


            // SELECT ALL CONTACTS
            const selectAll = (value) =>{
                const inputFields = document.getElementsByClassName("checkboxClass")
                if(value.checked)
                {
                    // select all if the value is selected
                    for (let index = 0; index < inputFields.length; index++) {
                        const element = inputFields[index];
                        element.checked = true
                    }
                }
                else{
                    // uncheck all
                    for (let index = 0; index < inputFields.length; index++) {
                        const element = inputFields[index];
                        element.checked = false
                    }
                }
                selectedCount();
            }

            // SELECTED MESSAGES COUNT 
            const selectedCount = () =>{
                var count = 0;
                const selectedContacts = document.getElementsByClassName('checkboxClass');
                for (let index = 0; index < selectedContacts.length; index++) {
                    const element = selectedContacts[index];
                    if(element.checked)
                    {
                        count++;
                    }
                }
               document.getElementById("count").textContent = count
            }
            // SENDING MESSAGES THROUGH WHATSAPP API
            const sendMessages = async() => {
                const selectedContacts = document.getElementsByClassName('checkboxClass');
                if(selectTemplateBox.value == 0)
                {
                   return alert("Please select template !");
                }
                const options = document.getElementsByClassName('options');
                const selectedOption = options[selectTemplateBox.selectedIndex - 1];
                const templateName = selectedOption.getAttribute('data-template-name');                
                const imageURL = selectedOption.getAttribute('data-image-url');                
                const fileNameToBeSent = selectedOption.getAttribute('data-file-name');                
                const url = 'https://backend.aisensy.com/campaign/t1/api';
                const APIKEY = {{ env('WHATSAPP_API_KEY') }}
                for (let index = 0; index < selectedContacts.length; index++) {
                const element = selectedContacts[index];
                if(element.checked)
                {
              const payload = {
                "apiKey": APIKEY,
                "campaignName": templateName,
                "destination": `${element.value}`,
                "userName":element.getAttribute('data-user-name'),
                "media": {
                    "url": imageURL,
                    "filename": fileNameToBeSent
                }
            };
              let resp = await  fetch("https://backend.aisensy.com/campaign/t1/api",{
                    method: "POST",
                    headers : {
                        'Content-Type' : 'application/json',
                    },
                    body: JSON.stringify(payload)
                });
                console.log(resp);
         }
      }
             alert("Messages Sent !");
            }
        </script>

    </body>
@endsection
