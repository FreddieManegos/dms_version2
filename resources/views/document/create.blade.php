{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create</h1>
@stop

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-bottom: 0px; background-color: #ECF0F5; padding: 0px;">
            <li class="breadcrumb-item"><a href="{{route('documents.index')}}">Documents</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>
    <form action="{{route('documents.store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" id="employee_id" name="employee_id" value="{{Auth::user()->id}}">
        <div class="col-md-4">
        <div class="row">
            <div class="form-group">
                <label for="filename">File Name: </label>
                <input type="text" name="filename" id="filename" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <label for="doctype">Document Type: </label>
                <select type="text" name="doctype" id="doctype" class="form-control">
                    <option value="" selected>--Choose Document Type--</option>
                    @foreach($doc_types as $doc_type)
                        <option value="{{$doc_type->id}}">{{$doc_type->type}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <label for="file">File:</label>
            <div class="input-group">
                <input type="file" name="file" id="file" class="form-control uploadjs" data-id="3" accept="application/pdf">
                <span class="input-group-btn" id="btn-search"><button class="btn btn-default" type="button"><i class="fa fa-eye"></i></button></span>
            </div>
        </div>
        <div class="row">
            <br>
            <button type="submit" class="btn btn-success form-control">Submit</button>
        </div>
    </div>
        <div class="col-md-8">
            <div class="row">
                <div class="preview" style="margin-left: 10px;">
                    <label for="preview-3_1">Preview:</label>
                    <img id="preview-3" alt="">
                    <embed id="preview-3_1" type="application/pdf" autoplay="false" style="width: 100%; height: 450px;">
                </div>
            </div>
            </div>
        </div>
    </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        #errorWrapper {
            display: none;
        }
        .glimmer {
            display: none;
        }
    </style>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/1.8.349/pdf.min.js"></script>
    <script>
        function readURL(input, id)
        {
            var mime= input.files[0].type;
            if (input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function (e)
                {
                    if(mime.split("/")[0]=="image")
                    {
                        $('#preview-'+id+'_1').attr('src', '');
                        $('#preview-'+id).attr('src', e.target.result);
                    }
                    else
                    {
                        $('#preview-'+id).attr('src', '');
                        $('#preview-'+id+'_1').attr('src', e.target.result);
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function()
        {
            $(".uploadjs").change(function()
            {
                var id = $(this).data('id')
                readURL(this, id);
            });
        })
    </script>
    <script> console.log('Hi!'); </script>
@stop
