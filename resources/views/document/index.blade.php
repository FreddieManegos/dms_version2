{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Documents</h1>

@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-bottom: 0px; background-color: #ECF0F5; padding: 0px;">
            <li class="breadcrumb-item active" aria-current="page">Documents</li>
        </ol>
    </nav>
    <br>
    <div class="box">
        <div class="box-header with-border form-inline">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control" size="100" id="q" placeholder="Enter search keywords (e.g. 'special order juan dela cruz travel conference manila 2014') and press enter">
                        <span class="input-group-btn" id="btn-search"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                    </div>
                    <a href="{{route('documents.create')}}"><button class="btn btn-success">+ Add File</button></a>
                    <br>
                    <br>
                    <span class="text-info">
                    <i class="fa fa-info-circle"></i> For better results, be specific in your search (i.e., use more keywords).
                    </span>
                    <br>
                    <br>
                    <table id="myTable" class="display table-bordered" >
                        {{--                        <a href="{{route('documents.create')}}"><button class="btn btn-success">+ Add File</button></a>--}}
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
                        @foreach($documents as $document)
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
    <style>
        input[type=search] {
            text-align: left !important;
        }
    </style>
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@stop

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>

        oTable =  $('#myTable').DataTable(
            {
                "ordering": false,
                "info":     true,
                "dom": '<"top"lp>rt<"bottom"li><"clear">'
            }
        );
        $('#q').keyup(function(){
            oTable.search($(this).val()).draw() ;
        })


    </script>
@stop
