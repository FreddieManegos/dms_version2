@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
    <style>
        .register-box {
            width: 600px;
        }

    </style>
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg text-center">{{ trans('adminlte::adminlte.register_message') }}</p>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="first_name">First Name:</label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('name') }}"
                                   placeholder="First Name">

                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('name') }}"
                                   placeholder="Last Name">

                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                   placeholder="{{ trans('adminlte::adminlte.email') }}">

                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control"
                                   placeholder="{{ trans('adminlte::adminlte.password') }}">

                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <label for="password_confirmation">Retype Password:</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                   placeholder="{{ trans('adminlte::adminlte.retype_password') }}">

                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion">Religion:</label>
                        <select name="religion" class="form-control" placeholder="Religion">
                            <option value="">-- Select --</option>
                            <option value="Roman Catholic" selected="">Roman Catholic</option>
                            <option value="Aglipayan">Aglipayan</option>
                            <option value="Alliance">Alliance</option>
                            <option value="Assembly of God">Assembly of God</option>
                            <option value="Baptist">Baptist</option>
                            <option value="Bible Baptist">Bible Baptist</option>
                            <option value="Church of Christ">Church of Christ</option>
                            <option value="Christian (non-denominational)">Christian (non-denominational)</option>
                            <option value="Evangelicals">Evangelicals</option>
                            <option value="Faith Tabernacle">Faith Tabernacle</option>
                            <option value="Iglesia Ni Cristo">Iglesia Ni Cristo</option>
                            <option value="Islam">Islam</option>
                            <option value="Jehovah's Witnesses">Jehovah's Witnesses</option>
                            <option value="Jesus is Lord">Jesus is Lord</option>
                            <option value="Latter-day Saints">Latter-day Saints</option>
                            <option value="Living Word">Living Word</option>
                            <option value="Lutheran">Lutheran</option>
                            <option value="Methodist">Methodist</option>
                            <option value="Mormons">Mormons</option>
                            <option value="Oneness">Oneness</option>
                            <option value="Open Heavens">Open Heavens</option>
                            <option value="Roman Catholic">Roman Catholic</option>
                            <option value="Protestant">Protestant</option>
                            <option value="Pentecostals">Pentecostals</option>
                            <option value="Rizalian">Rizalian</option>
                            <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                            <option value="United Church of Christ in the Philippines">United Church of Christ in the Philippines</option>
                            <option value="Other">Other...</option>
                        </select>
                    </div>
                    <div class="form-group">
{{--                        <input type="text" name="gender" class="form-control" value="{{ old('gender') }}" placeholder="Gender">--}}
                        <label for="gender">Gender:</label>
                        <select name="gender" id="" class="form-control">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="date" name="birthday" class="form-control" value="{{ old('city') }}" placeholder="Birthday">
                    </div>
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" name="city" class="form-control" value="{{ old('city') }}" placeholder="City">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" placeholder="Address">
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    {{ trans('adminlte::adminlte.register') }}
                </button>
            </div>

        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
