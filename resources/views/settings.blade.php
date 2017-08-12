@extends('layouts.new')

@section('content')
<div class="jumbotron" style="background-color: #F8F8F8; text-align: left; height: 160px">
    <div class="container">
        <h1><small>Settings</small></h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-borderless" style="width: 650px; height: 600px; border-radius: 0px;
                 position: absolute; top: 50px; right: 70px; background-color: #F5F5FF">
                <form enctype="multipart/form-data" action="{{ url('/settings') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="panel-body" style="position: absolute; left: 35px"> 
                        <br>
                        <h3>Gender</h3>
                        <ul class="list-inline">
                            <li>
                            <input list="gender" name="gender" placeholder="Gender" style="border: 0px; width: 200px; height: 45px; text-align: center">
                            <datalist id="gender">
                                <option value="Female"></option>
                                <option value="Male"></option>
                                <option value="Unknown"></option>
                            </datalist>
                            </li>
                        </ul>
                        <br>
                        <h3>Birthday</h3>
                        <ul class="list-inline">
                            <li>
                                <input list="months" name="months" style="border: 0px; height: 45px; text-align: center" placeholder="Month">
                                <datalist id="months">
                                    <option value="January"></option>
                                    <option value="February"></option>
                                    <option value="March"></option>
                                    <option value="April"></option>
                                    <option value="May"></option>
                                    <option value="June"></option>
                                    <option value="July"></option>
                                    <option value="August"></option>                                        
                                    <option value="September"></option>
                                    <option value="October"></option>
                                    <option value="November"></option>
                                    <option value="December"></option>
                                </datalist>
                            </li>
                            <li>
                                <input list="days" name="days" style="border: 0px; height: 45px; text-align: center" placeholder="Day">
                                <datalist id="days">
                                    @for ($i = 1; $i <= 31; ++$i)
                                        <option value="{{ $i }}"></option>
                                    @endfor
                                </datalist>
                            </li>
                            <li>
                                <input list="years" name="years" style="border: 0px; height: 45px; text-align: center" placeholder="Year">
                                <datalist id="years">
                                    @for ($i = 1918; $i < 2000; ++$i)
                                        <option value="{{ $i }}"></option>
                                    @endfor
                                </datalist>
                            </li>
                        </ul>
                        <br>
                        <h3>Location</h3>
                        <input list="location" name="province" placeholder="Province" style="border: 0px; width: 200px; height: 45px; text-align: center">
                        <datalist id="location">
                            <option value="上海"></option>
                            <option value="北京"></option>
                            <option value="重庆"></option>
                            <option value="四川"></option>
                            <option value="浙江"></option>
                            <option value="安徽"></option>
                            <option value="湖南"></option>
                            <option value="湖北"></option>
                            <option value="黑龙江"></option>
                            <option value="辽宁"></option>
                            <option value="山东"></option>
                            <option value="广西"></option>
                            <option value="贵州"></option>
                            <option value="山西"></option>
                            <option value="河南"></option>
                            <option value="河北"></option>
                            <option value="广东"></option>
                            <option value="吉林"></option>
                            <option value="云南"></option>
                            <option value="西藏"></option>
                            <option value="内蒙古"></option>
                            <option value="青海"></option>
                            <option value="新疆"></option>
                            <option value="福建"></option>
                            <option value="江苏"></option>
                            <option value="江西"></option>
                            <option value="陕西"></option>
                            <option value="天津"></option>
                            <option value="甘肃"></option>
                            <option value="海南"></option>
                            <option value="香港"></option>
                            <option value="澳门"></option>
                            <option value="台湾"></option>
                        </datalist>
                    </div>
                    <input type="submit" class="btn btn-lg btn-primary" style="position: absolute; right: 250px; bottom: 50px; width: 150px">
                </form>    
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection