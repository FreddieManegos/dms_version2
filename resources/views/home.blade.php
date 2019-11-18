{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border form-inline">
{{--            <div class="row">--}}
{{--                <div class="input-group" style="margin-left: 14px; margin-right: 14px;">--}}
{{--                    <input type="text" class="form-control" size="100" id="q" placeholder="Enter search keywords (e.g. 'special order juan dela cruz travel conference manila 2014') and press enter">--}}
{{--                    <span class="input-group-btn" id="btn-search"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="blockquote text-center">
                <h2 class="text-secondary"><strong>Good Morning, Freddie Mar</strong></h2>
                <h4><strong><em>DMS</em></strong> is a web-based document management platform built for utmost security as well</h4>
                <h4>as easy storage, management, and sharing of the IT Department's documents.</h4>
            </div>
            <hr>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-green-gradient"><i class="fa fa-newspaper"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"># Documents</span>
                            <span class="info-box-number">{{$num_docs}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua-gradient"><i class="fa fa-file"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Last 15 days</span>
                            <span class="info-box-number">{{$last_fifteen_num_doc}}</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow-gradient"><i class="fa fa-file"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Last 30 Days</span>
                            <span class="info-box-number">30</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('documents.create')}}"><button class="btn btn-success">+ Add File</button></a>
                    <br>
                    <br>
                    <p class="h4"><strong>Recently Added:</strong></p>
                    <table id="myTable" class="display table-bordered" >
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action</th>
                            <th>Uploader</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date Modified</th>
                            <th>Date Uploaded</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recently_added_docs as $document)
                        <tr>
                            <td>{{$document->file_name}}</td>
                            <td>
                                        <span><a href="{{route('documents.show', $document->id)}}" target="_blank"   title="Click to preview" class="previewer" data-title="">
                                                <i class="fa fa-eye" aria-hidden="true"></i> Preview</a>
                                        </span>&nbsp;
                                <span><a href="{{route('documents.download', $document->id)}}" title="Click to download" ><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                                        </span>&nbsp;
                                <span><a href="{{route('documents.revise', $document->id)}}" title="Revise" ><i class="fa fa-history" aria-hidden="true"></i> Revise</a>
                                        </span>
                            </td>
                            <td>{{$document->uploader->name}}</td>
                            <td>{{$document->type->type}}</td>
                            <td>{{$document->status}}</td>
                            <td>{{$document->updated_at->format('F j\\, Y h:i:s A')}}</td>
                            <td>{{$document->created_at->format('F j\\, Y h:i:s A')}}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <style type="text/css">
        #myTable_wrapper {
            background-color: white;
            padding:10px;
        }

        .info-box {
            box-shadow: 0 1px 4px 1px rgba(0,0,0,0.1);
        }
    </style>
@stop

@section('js')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        $('#myTable').DataTable(
            {
                "ordering": false,
                "info":     false,
                "dom": '<"top">rt<"bottom"i><"clear">'
            }
        );
    </script>
@stop
