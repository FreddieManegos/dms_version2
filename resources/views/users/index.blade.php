{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profile</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-lg-8">
                    <div class="">
                        <form action="required-data.php" method="POST">
                            <table class="table table-bordered">
                                <tbody>
                                <tr class="active visible-sm visible-xs">
                                    <th>
                                        Update Form
                                        <span class="text-muted">(Status: <span class="text-success">Updated</span>)
</span>
                                    </th>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td width="30%" class="warning visible-md visible-lg">ID No.</td>
                                    <td>2015-0836</td>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td class="warning visible-md visible-lg">Fullname</td>
                                    <td>MA�EGOS, FREDDIE MAR ALAURA</td>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td class="warning visible-md visible-lg">Gender</td>
                                    <td>M</td>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td class="warning visible-md visible-lg">Birthday</td>
                                    <td>October 20, 1998</td>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td class="warning visible-md visible-lg">Religion</td>
                                    <td>Roman Catholic</td>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td class="warning visible-md visible-lg">Age</td>
                                    <td>21</td>
                                </tr>
                                <tr class="hidden-sm hidden-xs">
                                    <td class="warning visible-md visible-lg">City</td>
                                    <td>Iligan City</td>
                                </tr>
                                <tr>
                                    <td class="warning visible-md visible-lg">Zone/purok/street/barangay</td>
                                    <td>
                                        <label class="visible-sm visible-xs">Zone/purok/street/barangay</label>
                                        <input type="text" class="form-control" name="homeadd_street" value="Purok 5A, Tambo, Hinaplanon" required=""></td>
                                </tr>

                                <tr>
                                    <td class="warning hidden-sm hidden-xs"></td>
                                    <td><button type="submit" name="btnSave" class="btn btn-info">Update Record</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')


@stop
