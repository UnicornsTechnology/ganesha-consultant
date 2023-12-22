@extends('layouts.back.master')
@section('title')
WhatsApp Template For List
@endsection

@section('content')
<style>
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
                                                <h3>WhatsApp Template List</h3>
                                            </div>
                                            <div class="p-2 bd-highlight">
                                                <a href="/admin/whatsapp/create-template" class="btn btn-primary">Add New Template</a>
                                               
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card-body overflow-auto">
                                        <table id="table_id" data-paging='false' class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Sr.No</th>
                                                    <th>WA Template Name</th>
                                                    <th>WA Image URL</th>
                                                    <th>WA Language</th>
                                                    <th>WA File Name</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($whatsAppTemplates as $key=>$item)
                                                <tr class="text-center">
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item->wt_template_name}}</td>
                                                    <td> <a href="{{$item->wt_image_url}}">{{Str::limit($item->wt_image_url,50)}}</a> </td>
                                                    <td>{{$item->wt_template_language}}</td>
                                                    <td>{{$item->wt_file_name}}</td>
                                                    {{-- <td class="text-center">
                                                        @can('/admin/whatsapp-template/edit/{id}')
                                                        <a href="/admin/whatsapp-template/edit/{{ $item->wt_id }}"
                                                            class="btn btn-primary btn-sm"><i
                                                                class=" fas fa-edit"></i></a>
                                                                @endcan
                                                                {{-- @can('/admin/whatsapp-template/move-to-trash/{id}') --}}
                                                        {{-- <a href="/admin/whatsapp-template/move-to-trash/{{ $item->wt_id }}"
                                                                    class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you really want to move it to trash ?')">
                                                          <i class="fas fa-trash"></i> </a>      --}}
                                                          {{-- @endcan  --}}
                                                    {{-- </td> --}}
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                       <div class="pagination mx-auto">
                                      {!! $whatsAppTemplates->appends(Request::all())->links() !!}
                                       </div>
                                    </div>
                                    </div>
                                    <hr>
                                    {{-- <h1 class="text-center">Trashed WhatsApp Templates</h1>
                                    <div class="card-body overflow-auto">
                                        <table id="table_id" data-paging='false' class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Sr.No</th>
                                                    <th>WA Template Name</th>
                                                    <th>WA Image URL</th>
                                                    <th>WA Language</th>
                                                    <th>WA File Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($whatsAppTemplatesTrashed as $key=>$item)
                                                <tr class="text-center">
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$item->wt_template_name}}</td>
                                                    <td> 
                                                        <a href="{{$item->wt_image_url}}">{{Str::limit($item->wt_image_url,50)}}</a>
                                                     </td>
                                                    <td>{{$item->wt_template_language}}</td>
                                                    <td>{{$item->wt_file_name}}</td>
                                                    <td class="text-center">
                                                        @can('/admin/whatsapp-template/edit/{id}')
                                                        <a href="/admin/whatsapp-template/edit/{{ $item->wt_id }}"
                                                            class="btn btn-primary btn-sm"><i
                                                                class=" fas fa-edit"></i></a>
                                                        @endcan
                                                        @can('/admin/whatsapp-template/restore-from-trash/{id}')
                                                        <a href="/admin/whatsapp-template/restore-from-trash/{{ $item->wt_id }}"
                                                                    class="btn btn-danger btn-sm">
                                                          <i class="fas fa-sync"></i> </a>      
                                                        @endcan

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                       <div class="pagination mx-auto">
                                      {!! $whatsAppTemplates->appends(Request::all())->links() !!}
                                       </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
            </div>
        </div>

    </body>
@endsection
