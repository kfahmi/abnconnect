@extends('layouts.app') 

@section('page-title')
    {!! Lang::get('titles.pages.dashboard') !!}
@endsection



@section('breadcrumbs')
{{Breadcrumbs::render('home')}}
@endsection


@section('content')
<!-- .row -->
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <div class="row">
                <div class="col-lg-3 col-md-6 m-b-15 text-center"> <small>Queue</small>
                    <h2><i class="ti-arrow-up text-success"></i> 1064</h2>
                    <div id="sparklinedash"></div>
                </div>
                <div class="col-lg-3 col-md-6 m-b-15 text-center"> <small>Total SMS</small>
                    <h2><i class="ti-arrow-up text-warning"></i> 5064</h2>
                    <div id="sparklinedash2"></div>
                </div>
                <div class="col-lg-3 col-md-6 m-b-15 text-center"> <small>TPS</small>
                    <h2><i class="ti-arrow-up text-info"></i> 664</h2>
                    <div id="sparklinedash3"></div>
                </div>
                <div class="col-lg-3 col-md-6 m-b-15 text-center"> <small>SMS FAILED</small>
                    <h2><i class="ti-arrow-down text-danger"></i> 50%</h2>
                    <div id="sparklinedash4"></div>
                </div>
            </div>
            <ul class="list-inline text-center m-t-40">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #444b4c;"></i>Customer A</h5>
                </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Customer B</h5>
                </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #808f8f;"></i>Customer C</h5>
                </li>
            </ul>
            <div id="morris-area-chart" style="height: 340px;"></div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- .row -->
<div class="row">
    <div class="col-lg-6 col-sm-12 col-xs-12">
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">FAILED SMS</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-people text-info"></i></li>
                        <li class="text-right"><span class="counter">23</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Total SMS</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-folder text-purple"></i></li>
                        <li class="text-right"><span class="counter">169</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">TPS</h3>
                    <ul class="list-inline two-part">
                        <li><i class="icon-folder-alt text-danger"></i></li>
                        <li class="text-right"><span class="">311</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Queue</h3>
                    <ul class="list-inline two-part">
                        <li><i class="ti-wallet text-success"></i></li>
                        <li class="text-right"><span class="">117</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-12 col-xs-12">
        <div class="news-slide m-b-15">
            <div class="vcarousel slide">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active item">
                        <div class="overlaybg"><img src="{{url('elite/plugins/images/news/slide1.jpg')}}" /></div>
                        <div class="news-content"><span class="label label-danger label-rounded">Primary</span>
                            <h2>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2> <a href="#">Read More</a></div>
                    </div>
                    <div class="item">
                        <div class="overlaybg"><img src="{{url('elite/plugins/images/news/slide1.jpg')}}" /></div>
                        <div class="news-content"><span class="label label-primary label-rounded">Primary</span>
                            <h2>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2> <a href="#">Read More</a></div>
                    </div>
                    <div class="item">
                        <div class="overlaybg"><img src="{{url('elite/plugins/images/news/slide1.jpg')}}" /></div>
                        <div class="news-content"><span class="label label-success label-rounded">Primary</span>
                            <h2>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h2> <a href="#">Read More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- .row -->
<div class="row">
    <div class="col-md-6 col-lg-9 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">SALES ANALYTICS</h3>
            <ul class="list-inline text-center">
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i>Site A View</h5>
                </li>
                <li>
                    <h5><i class="fa fa-circle m-r-5" style="color: #fdc006;"></i>Site B View</h5>
                </li>
            </ul>
            <div id="morris-area-chart2" style="height: 370px;"></div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Total Sites Visit</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                            <h1 class="text-warning">$678</h1>
                            <p class="text-muted">APRIL 2017</p> <b>(150 Sales)</b> </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div id="sales1" class="text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Sales Difference</h3>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                            <h1 class="text-info">$447</h1>
                            <p class="text-muted">APRIL 2017</p> <b>(150 Sales)</b> </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div id="sales2" class="text-center"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- .right-sidebar -->
<div class="right-sidebar">
    <div class="slimscrollright">
        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
        <div class="r-panel-body">
            <ul>
                <li><b>Layout Options</b></li>
                <li>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox1" type="checkbox" class="fxhdr">
                        <label for="checkbox1"> Fix Header </label>
                    </div>
                </li>
                <li>
                    <div class="checkbox checkbox-warning">
                        <input id="checkbox2" type="checkbox" class="fxsdr">
                        <label for="checkbox2"> Fix Sidebar </label>
                    </div>
                </li>
                <li>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox4" type="checkbox" class="open-close">
                        <label for="checkbox4"> Toggle Sidebar </label>
                    </div>
                </li>
            </ul>
            <ul id="themecolors" class="m-t-20">
                <li><b>With Light sidebar</b></li>
                <li><a href="javascript:void(0)" theme="default" class="default-theme">1</a></li>
                <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                <li><a href="javascript:void(0)" theme="blue" class="blue-theme working">4</a></li>
                <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                <li><b>With Dark sidebar</b></li>
                <br/>
                <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
            </ul>
            <ul class="m-t-20 chatonline">
                <li><b>Chat option</b></li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/varun.jpg')}}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/genu.jpg')}}" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/ritesh.jpg')}}" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/arijit.jpg')}}" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/govinda.jpg')}}" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/hritik.jpg')}}" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/john.jpg')}}" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                </li>
                <li>
                    <a href="javascript:void(0)"><img src="{{url('elite/plugins/images/users/pawandeep.jpg')}}" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /.right-sidebar -->
@endsection


@section('script-page')
 <!--Counter js -->
    <script src="{{asset('elite/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{asset('elite/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
    
<!--Morris JavaScript -->
    <script src="{{asset('elite/plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('elite/plugins/bower_components/morrisjs/morris.js')}}"></script>
    <script src="{{asset('elite/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('elite/assets/js/dashboard3.js')}}"></script>



@endsection