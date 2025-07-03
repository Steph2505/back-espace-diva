@php
	$precision = mob_get_precision();
@endphp
@extends('layouts.app1')
@section('css')
    <link rel="stylesheet" href="{{ mob_asset('css/dashboard.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ mob_asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <style type="text/css">
        @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {

            .top_five_item td:nth-of-type(1):before {
                content: "N°";
            }

            .top_five_item td:nth-of-type(2):before {
                content: "Article";
            }

            .top_five_item td:nth-of-type(3):before {
                content: "{{__('sale.dashboard-quantity')}}";
            }
            .top_five_item td:nth-of-type(3):before {
                content: "{{__('sale.dashboard-amount')}} ({{defaultCurrency()}})";
            }
        }
        @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {

            .top_five_customer td:nth-of-type(1):before {
                content: "N°";
            }

            .top_five_customer td:nth-of-type(2):before {
                content: "{{__('sale.dashboard-customer')}}";
            }

            .top_five_customer td:nth-of-type(3):before {
                content: "{{__('sale.dashboard-phone')}}";
            }
            .top_five_customer td:nth-of-type(3):before {
                content: "{{__('sale.dashboard-amount')}} ({{defaultCurrency()}})";
            }
        }
        @media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px) {

            .top_five_order td:nth-of-type(1):before {
                content: "N°";
            }

            .top_five_order td:nth-of-type(2):before {
                content: "{{__('sale.dashboard-number-order')}}";
            }

            .top_five_order td:nth-of-type(3):before {
                content: "{{__('sale.invoice_print.attributes.buyer')}}";
            }

            .top_five_order td:nth-of-type(4):before {
                content: "{{__('sale.dashboard-status')}}";
            }
            .top_five_order td:nth-of-type(5):before {
                content: "{{__('sale.dashboard-amount')}} ({{defaultCurrency()}})";
            }
            .two-blocks{
                margin-top: 100px;
            }

            .left-button{
                padding-top: 10px;
            }

        }

        @media only screen and (min-width: 1000px) and (max-width: 1367px)  {
            .card{
                height: 230px !important;
            }

        }

        @media only screen and (max-width: 760px){
            .add_margin{margin-top:130px !important;}
        }
        
        .bg-white{
            background-color: white !important
        }

        .black-color{
            color: rgba(0, 0, 0, 1) !important;
        }

        .black-color-s{
            color:rgba(52, 52, 52, 1) !important;
        }

        .blue-color{
            color: rgba(56, 141, 194, 1) !important;
        }

        .text-center{
            text-align: center
        }

        .fs_16{
            font-size: 16px;
        }

        .fs_20{
            font-size: 20px
        }

        .fs_26{
            font-size: 26px;
        }

        .fs_18{
            font-size: 18px;
        }

        .fs_17{
            font-size: 17px;
        }

        .fs_13{
            font-size: 13px;
        }

        .fs_15{
            font-size: 15px !important;
        }

        .fw_500{
            font-weight: 500 !important;
        }

        .fw_400{
            font-weight: 400;
        }

        .fw_300{
            font-weight: 300;
        }

        .fw_400{
            font-weight: 400;
        }

        .f_inter{
            font-family: 'inter'
        }

        .fw_600{
            font-weight: 600;
        }

        .f_i{
            font-style: italic;
        }

        .m-0{
            margin: 0 0 5px 0!important;
        }

        .mb_5{
            margin-bottom: 5px;
        }

        .card [class*="card-header-"]{
            margin : 20px 20px 0 20px !important;
        }

        .p-relative{
            position: relative;
        }

        .right-22{
            right: 22px;
        }

        .right-65{
            right: 65px;
        }

        .p-absolue{
            position: absolute;
        }

        .icon-info{
            background: rgba(217, 217, 217, 1);
            left: 100%;
            top: -14px;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card{
            box-shadow: unset !important;
        }

        .card-icon{
            margin-top: -36px !important;
            box-shadow: unset !important;
        }

        /* .icon-info i{
            width: 6px !important;
            height: 22px !important;
        } */

        .triangle-vert {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 8.5px solid transparent;
            border-right: 8.5px solid transparent;
            border-bottom: 15px solid rgba(0, 166, 90, 1);
        }
        .triangle-gray {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 8.5px solid transparent;
            border-right: 8.5px solid transparent;
            border-bottom: 12px solid rgba(177, 177, 177, 1);
        }
        .triangle-red {
            display: inline-block;
            width: 0;
            height: 0;
            border-left: 8.5px solid transparent;
            border-right: 8.5px solid transparent;
            border-bottom: 12px solid rgba(253, 10, 10, 1);
            transform: rotate(180deg);
        }

        .d-flex{
            display: flex;
        }

        .justify-content-align{
            justify-content: center;
            align-items: center;
        }

        label{
            white-space: nowrap;
        }

        .border-b{
            border-bottom: 1px solid #e9ecf2;
        }

        .m-0-0-10{
            margin: 0 0 10px;
        }

        .p-15{
            padding: 15px;
        }
        .panel-body {
            padding: unset !important;
        }

        .panel{
            margin-bottom: unset !important;
        }
        .text-point::before {
            content: '•';
            color: black;
            margin-right: 5px;
        }
    </style>
@endsection
@section('title', __('messages.nav-dashboard'))
@include('sales.navbar')

@section('content')
	<section class="content-header" style="padding-bottom: 20px;">
		<ul class="breadcrumb nw" style="float: left;right:0;position: relative;top:-6px;">
			<li><a href="{{ Auth::user() ? route('home') : route('guest.welcome') }}"><i class="fa fa-home"></i></a></li>
			<li><a href="#">{{__('menu.sales')}}</a></li>
			<li>
				<a href="{{route('sales.dashboard')}}">
					{{ trans('menu.dashboard') }}
				</a>
			</li>
		</ul>
		<ol class="breadcrumb">
            <?php echo dateToDay(); ?>&nbsp;
		</ol>
	</section>
    <section class="two-blocks">
        <section class="">
            <div class="row left-button add_margin" style="margin-top:20px; margin-right:15px;">
                <a href="{{route('sales-home')}}" class="btn btn-primary" style="float:right; padding:10px 50px;">
                    {{__('stock.module-home')}}
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </section>
        <section class="bg-white" style="margin: 0 15px 0px 20px;">
            <section class="card-values" style="margin: 17px 31px;">
                <div class="content">
                    
                                <!-- tekou starts -->
                    @include('sales.sale-mobile-nav')
                    <!-- end tekou  -->
                    <div class="row">
                        <h1 class="fs_26 fw_400 f_inter">Tableau de bord</h1>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">add_shopping_cart</i>
                                    </div>
                                    <div class="icon-info p-absolue">
                                        <i class="fs_15 f_i fw_400 black-color" style="position: relative; left: -1px;">i</i>
                                    </div>
                                    
                                    <p class="card-category m-0 blue-color fs_16 fw_500 mb_5 p-relative right-22">
                                        Chiffre d’affaire du jour
                                    </p>
                                    <span class="card-title  m-0 black-color fs_20 fw_500 mb_5"> 3 000 xaf
                                    <span class="triangle-vert"></span>
                                    <span class="fw_300 fs_16"> 50% </span></span><br>
                                    <span class="card-category p-relative right-65 f_i black-color-1">26.06.2024</span>
                                </div>
                                <div class="card-footer">
                                    <div class="row stats" style="text-align: center; display: block; margin: auto; width: 100%">
                                        <div class="col-md-6 col-xs-6" style="text-align: center;">
                                            <span class="fw_400 fs_16 black-color-s">Mois</span>
                                            <br><span class="card-details-bottom fw_400 fs_16 black-color">15 000 xaf 
                                                <span class="triangle-red"></span>
                                                <span class="black-color-s">-50%</span></span><br>
                                            <span class="f_i fs_13 fw_400 black-color-s">01.06.24-30.06.24</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6" style="text-align: center;">
                                            <span class="fw_400 fs_16 black-color-s">Année</span>
                                            <br><span class="card-details-bottom fw_400 fs_16 black-color">15 000 xaf
                                            <span class="triangle-gray"></span>
                                            <span class="black-color-s">0%</span></span><br>
                                            <span class="f_i fs_13 fw_400 black-color-s">01.01.24-26.06.24</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">note</i>
                                    </div>
                                    <div class="icon-info p-absolue">
                                        <i class="fs_15 f_i fw_400 black-color" style="position: relative; left: -1px;">i</i>
                                    </div>
                                    
                                    <p class="card-category m-0 blue-color fs_16 fw_500 mb_5 p-relative right-22">
                                        Encaissement du jour
                                    </p>
                                    <span class="card-title  m-0 black-color fs_20 fw_500 mb_5"> 2 000 xaf
                                    <span class="triangle-vert"></span>
                                    <span class="fw_300 fs_16"> 50% </span></span><br>
                                    <span class="card-category p-relative right-65 f_i black-color-1">26.06.2024</span>
                                </div>
                                <div class="card-footer">
                                    <div class="row stats" style="text-align: center; display: block; margin: auto; width: 100%">
                                        <div class="col-md-6 col-xs-6" style="text-align: center;">
                                            <span class="fw_400 fs_16 black-color-s">Mois</span>
                                            <br><span class="card-details-bottom fw_400 fs_16 black-color">13 000 xaf 
                                                <span class="triangle-red"></span>
                                                <span class="black-color-s">-50%</span></span><br>
                                            <span class="f_i fs_13 fw_400 black-color-s">01.06.24-30.06.24</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6" style="text-align: center;">
                                            <span class="fw_400 fs_16 black-color-s">Année</span>
                                            <br><span class="card-details-bottom fw_400 fs_16 black-color">13 000 xaf
                                            <span class="triangle-gray"></span>
                                            <span class="black-color-s">0%</span></span><br>
                                            <span class="f_i fs_13 fw_400 black-color-s">01.01.24-26.06.24</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_copy</i>
                                    </div>
                                    <div class="icon-info p-absolue">
                                        <i class="fs_15 f_i fw_400 black-color" style="position: relative; left: -1px;">i</i>
                                    </div>
                                    
                                    <p class="card-category m-0 blue-color fs_16 fw_500 mb_5 p-relative right-22">
                                        Créances du jour
                                    </p>
                                    <span class="card-title  m-0 black-color fs_20 fw_500 mb_5"> 1 000 xaf
                                    <span class="triangle-vert"></span>
                                    <span class="fw_300 fs_16"> 50% </span></span><br>
                                    <span class="card-category p-relative right-65 f_i black-color-1">26.06.2024</span>
                                </div>
                                <div class="card-footer">
                                    <div class="row stats" style="text-align: center; display: block; margin: auto; width: 100%">
                                        <div class="col-md-6 col-xs-6" style="text-align: center;">
                                            <span class="fw_400 fs_16 black-color-s">Mois</span>
                                            <br><span class="card-details-bottom fw_400 fs_16 black-color">15 000 xaf 
                                                <span class="triangle-red"></span>
                                                <span class="black-color-s">-50%</span></span><br>
                                            <span class="f_i fs_13 fw_400 black-color-s">01.06.24-30.06.24</span>
                                        </div>
                                        <div class="col-md-6 col-xs-6" style="text-align: center;">
                                            <span class="fw_400 fs_16 black-color-s">Année</span>
                                            <br><span class="card-details-bottom fw_400 fs_16 black-color">15 000 xaf
                                            <span class="triangle-gray"></span>
                                            <span class="black-color-s">0%</span></span><br>
                                            <span class="f_i fs_13 fw_400 black-color-s">01.01.24-26.06.24</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Second section --}}
            <section class="card-marge" style="margin: 17px 46px;">
                <div class="content">
                    <div class="row" style="padding: 0 15px; border: 1px solid #e9ecf2;">
                        <div>
                            <div class="header">
                                <div>
                                    <div>
                                        <h3 class="fw_500 fs_18 black-color">Volume de vente & marges</h3>
                                    </div>
                                </div>
                                <div class="row border-b">
                                    <div>
                                        <div class="row" style="padding: 0 100px; margin-bottom : 15px;">
                                            <div class="col-md-4 col-sm-3">
                                                <div class="justify-content-align d-flex">
                                                    <label for="site">Site : </label>
                                                    <select class="form-control select2" name="site" id="site">
                                                        <option value="">-{{__('sale.report.standard.all-site')}}-</option>
                                                        @foreach($activeSites as $site)
                                                            <option value="{{isset($site->id)?$site->id:''}}">{{isset($site->label)?$site->label:''}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-3">
                                                <div class="justify-content-align d-flex">
                                                    <label for="">Clients :</label>
                                                    <select class="form-control select2" name="seller" id="customer">
                                                        <option value="">-{{__('sale.report.standard.all-saller')}}-</option>
                                                        @foreach($sellers as $key=>$seller)
                                                            <option value="{{$key}}">{{$seller}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-2">
                                                <div class='d-dash chart_4'>
                                                    <div class="row d-flex justify-content-align">
                                                        <label>Période </label>
                                                        <div class="col-sm-10 d-flex" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border:none; border-bottom: 1px solid #57bce4; width: 100%">
                        
                                                            <i class="fa fa-calendar"></i>&nbsp;
                                                            <span id="dateS" style="white-space:nowrap;"></span> <i class="fa fa-caret-down"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <input type="hidden" id="dateRangeStart" name="dateRangeStart">
                                                  <input type="hidden" id="dateRangeEnd" name="dateRangeEnd"> 
                                            </div>
                                            {{-- <div class="col-md-2 col-sm-2">
                                                <div class="{!! $errors->has('expedition_date') ? 'has-error' : '' !!}">
                                                    <label>{{ __('stock.dashboard-end-date')}} </label>
                                                    {!! Form::date('end_date', date('Y-m-t'), ['class' => 'form-control ',
                                                    'placeholder' => 'Entrer la date','id'=>'end_date']) !!}
                                                    {!! $errors->first('delivery_date', '<small class="help-block">:message</small>') !!}
                                                </div>
                                            </div> --}}
                                            {{-- <div class="col-md-2 col-sm-2" style="margin-top:24px;">
                                                <button type="submit" class="btn btn-success" id="bt-view" style="float: right;">{{__('button.view')}}</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default ">
                                {{-- <div class="panel-heading">
                                    
        
                                </div> --}}
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                                            <div class="row p-15" style="border-right: 1px solid #e9ecf2;">
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                    <div>
                                                        <div class="d-flex" style="gap:40px; margin-bottom : 20px;">
                                                            <span class="fw_500 fs_17 black-color">Marges</span>
                                                            <input type="checkbox" class="on-off " id="BUY_ATTACHEMENT_MANAGEMENT" name="BUY_ATTACHEMENT_MANAGEMENT" value="1" checked="">
                                                        </div>
                                                        <div class="d-flex" style="gap:40px; margin-bottom : 20px;">
                                                            <span class="fw_500 fs_17 black-color">Paiement</span>
                                                            <input type="checkbox" class="on-off " id="BUY_ATTACHEMENT_MANAGEMENT" name="BUY_ATTACHEMENT_MANAGEMENT" value="1" checked="">
                                                        </div>
                                                        <div class="d-flex">
                                                            <span class="fs_400 fs_16">Total paiement : 10 000 xaf</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
                                                    <div style="width: 100%; margin: auto;">
                                                        <canvas id="myChart"></canvas>
                                                    </div>
                                                </div>                          
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="row p-15">
                                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                                    <div>
                                                        <div>
                                                            <h1 class="fs_15 fw_600 black-color text-center m-0-0-10">15 000 FCFA</h1>
                                                            <p class="fs_15 fw_400 black-color-1 text-center">Total chiffre d’affaire (XAF)</p>
                                                            <hr style="margin: 20px; width:90%;">
                                                        </div>
                                                        <div class="d-flex" style="gap: 25px; background-color:rgba(203, 235, 255, 1); border-radius:10px; margin-bottom : 5px;">
                                                            <h6 class="fs_13 fw_500 black-color" style="margin-left:25px;">Espèces : </h6>
                                                            <h6 class="fs_13 fw_400 black-color-1">5 000 fcfa</h6>
                                                        </div>
                                                        <div class="d-flex" style="gap: 25px; background-color:rgba(253, 221, 200, 1); border-radius:10px; margin-bottom : 5px;">
                                                            <h6 class="fs_13 fw_500 black-color" style="margin-left:25px;">Virement : </h6>
                                                            <h6 class="fs_13 fw_400 black-color-1">10 000 fcfa</h6>
                                                        </div>
                                                        <div class="d-flex" style="gap: 25px; background-color:rgba(255, 170, 113, 1); border-radius:10px;">
                                                            <h6 class="fs_13 fw_500 black-color" style="margin-left:25px;">Mobile Money : </h6>
                                                            <h6 class="fs_13 fw_400 black-color-1">2 000 fcfa</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="card-marge" style="/*margin: 17px 46px;*/">
                <div class="content">
                    <div class="row" >
                        <div class="col-md-8" class="" style="padding-left: 46px;" >
                            <div style="padding: 0 15px; border: 1px solid #e9ecf2;">
                                <div class="header">
                                    <div>
                                        <div>
                                            <h3 class="fw_500 fs_18 black-color">Volumes ventes par catégories</h3>
                                        </div>
                                    </div>
                                    <div class="row border-b">
                                        <div>
                                            <div class="row" style="padding: 0 100px; margin-bottom: 15px;">
                                                <div class="col-md-6 col-sm-3">
                                                    <div class="justify-content-align d-flex">
                                                        <label for="site">Site : </label>
                                                        <select class="form-control select2" name="site" id="site">
                                                            <option value="">-{{__('sale.report.standard.all-site')}}-</option>
                                                            @foreach($activeSites as $site)
                                                                <option value="{{isset($site->id)?$site->id:''}}">{{isset($site->label)?$site->label:''}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-2">
                                                    <div class='d-dash chart_4'>
                                                        <div class="row d-flex justify-content-align">
                                                            <label>Période </label>
                                                          <div class="col-sm-10 d-flex" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border:none; border-bottom: 1px solid #57bce4; width: 100%">
                            
                                                              <i class="fa fa-calendar"></i>&nbsp;
                                                              <span id="dateS" style="white-space:nowrap;"></span> <i class="fa fa-caret-down"></i>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <input type="hidden" id="dateRangeStart" name="dateRangeStart">
                                                      <input type="hidden" id="dateRangeEnd" name="dateRangeEnd"> 
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    {{-- <div class="panel-heading">
                                        
            
                                    </div> --}}
                                    <div class="panel-body">
                                        <div class="row d-flex justify-content-align">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 d-flex justify-content-align">
                                                <div style="width: 100%; margin: auto;">
                                                    <canvas id="myPieChart"></canvas>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 d-flex justify-content-align">
                                                <div>
                                                    <div>
                                                        <h1 class="fs_15 fw_500 black-color m-0-0-10 text-point">Alimentation</h1>
                                                        <p class="fs_15 fw_500 black-color-1">Fournitures scolaires</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding-right: 46px;">
                            <div style="padding: 0 15px; border: 1px solid #e9ecf2;">
                                <div class="header">
                                    <div>
                                        <div>
                                            <h3 class="fw_500 fs_18 black-color">Factures</h3>
                                        </div>
                                    </div>
                                    <div class="row border-b">
                                        <div>
                                            <div class="row d-flex" style="gap: 50px;">
                                                <div class="col-md-6 col-sm-3">
                                                    <div class="justify-content-align d-flex">
                                                        <label for="site">Site : </label>
                                                        <select class="form-control select2" name="site" id="site">
                                                            <option value="">-{{__('sale.report.standard.all-site')}}-</option>
                                                            @foreach($activeSites as $site)
                                                                <option value="{{isset($site->id)?$site->id:''}}">{{isset($site->label)?$site->label:''}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-2">
                                                    <div class='d-dash chart_4'>
                                                        <div class="row d-flex justify-content-align">
                                                            <label>Période </label>
                                                            <div class="col-sm-10 d-flex" id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border:none; border-bottom: 1px solid #57bce4; width: 100%">
                            
                                                                <i class="fa fa-calendar"></i>&nbsp;
                                                                <span id="dateS" style="white-space:nowrap;"></span> <i class="fa fa-caret-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                      <input type="hidden" id="dateRangeStart" name="dateRangeStart">
                                                      <input type="hidden" id="dateRangeEnd" name="dateRangeEnd">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    {{-- <div class="panel-heading">
                                        
            
                                    </div> --}}
                                    <div class="panel-body">
                                        <div class="col-md-12 no-padding">
                                            <div class="row progress-labels">
                                                <div class="col-sm-6">
                                                    {{__('sale.dashboard-invoice-order')}}
                                                </div>
                                                <div class="col-sm-6" style="text-align: right;">
                                                    {{$commands['toBeBilled']}}/{{$commands['totalCount']}}
                                                </div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                @if($commands['totalCount']>0)
                                                    @if(($commands['toBeBilled']/$commands['totalCount'])*100<25)
                                                        <div data-percentage="0%" style="width: {{($commands['toBeBilled']/$commands['totalCount'])*100}}%;" class="progress-bar progress-bar-red" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($commands['toBeBilled']/$commands['totalCount'])*100>=25 && ($commands['toBeBilled']/$commands['totalCount'])*100<50 )
                                                        <div data-percentage="0%" style="width: {{($commands['toBeBilled']/$commands['totalCount'])*100}}%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($commands['toBeBilled']/$commands['totalCount'])*100>=50 && ($commands['toBeBilled']/$commands['totalCount'])*100<70 )
                                                        <div data-percentage="0%" style="width: {{($commands['toBeBilled']/$commands['totalCount'])*100}}%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($commands['toBeBilled']/$commands['totalCount'])*100>70)
                                                        <div data-percentage="0%" style="width: {{($commands['toBeBilled']/$commands['totalCount'])*100}}%;" class="progress-bar progress-bar-green" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @endif
                                                @else
                                                    <div data-percentage="0%" style="width: 0%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                @endif
                                            </div>
                                            <div class="row progress-labels">
                                                <div class="col-sm-6">
                                                    {{__('sale.dashboard-customer-asset')}}
                                                </div>
                                                <div class="col-sm-6" style="text-align: right;">
                                                    {{$salesAsset['openAssetCount']}}/{{$salesAsset['totalAssetCount']}}
                                                </div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                @if($salesAsset['totalAssetCount']>0)
                                                    @if(($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100<25)
                                                        <div data-percentage="0%" style="width: {{($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-red" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100>=25 && ($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100<50 )
                                                        <div data-percentage="0%" style="width: {{($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100>=50 && ($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100<70 )
                                                        <div data-percentage="0%" style="width: {{($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100>70)
                                                        <div data-percentage="0%" style="width: {{($salesAsset['openAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-green" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @endif
                                                @else
                                                    <div data-percentage="0%" style="width: 0%;" class="progress-bar progress-bar-green" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                @endif
                                            </div>
                                            <div class="row progress-labels">
                                                <div class="col-sm-6">
                                                    {{__('sale.dashboard-customer-asset-settled')}}
                                                </div>
                                                <div class="col-sm-6" style="text-align: right;">
                                                    {{$salesAsset['paidAssetCount']}}/{{$salesAsset['totalAssetCount']}}
                                                </div>
                                            </div>
                                            <div class="progress progress-striped active">
                                                @if($salesAsset['totalAssetCount']>0)
                                                    @if(($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100<25)
                                                        <div data-percentage="0%" style="width: {{($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-red" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100>=25 && ($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100<50 )
                                                        <div data-percentage="0%" style="width: {{($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100>=50 && ($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100<70 )
                                                        <div data-percentage="0%" style="width: {{($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @elseif(($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100>70)
                                                        <div data-percentage="0%" style="width: {{($salesAsset['paidAssetCount']/$salesAsset['totalAssetCount'])*100}}%;" class="progress-bar progress-bar-green" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                    @endif
                                                @else
                                                    <div data-percentage="0%" style="width: 0%;" class="progress-bar progress-bar-orange" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </section>
    </section>


    <!-- tekou starts -->
    @include('sales.sale-mobile-modal')
    <!-- end tekou  -->
@endsection

@section('select2JS')
    <script src="{{ mob_asset('js/select2.min.js') }}"></script>
    <script>
        $(".select2").select2({
            tags: false
        });
    </script>
    <script src="{{ mob_asset('js/Chart.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ mob_asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ mob_asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line', // Type de graphique : 'line', 'bar', 'pie', etc.
        data: {
            labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'], // Labels des abscisses
            datasets: [{
                label: 'Sample Data', // Légende du dataset
                data: [100, 1500, 3000, 4000, 5000, 6000, 5500, 4500, 3500, 2500, 1000], // Données pour chaque abscisse
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Couleur de fond
                borderColor: 'rgba(54, 162, 235, 1)', // Couleur de la ligne
                borderWidth: 2,
                fill: false // Pas de remplissage sous la ligne
            }]
        },
        options: {
            scales: {
                x: {
                    min: 0, // Début de l'échelle des abscisses
                    max: 10, // Fin de l'échelle des abscisses
                    title: {
                        display: true,
                        text: 'X-Axis (0-10)' // Titre de l'axe des abscisses
                    }
                },
                y: {
                    min: 0, // Début de l'échelle des ordonnées
                    max: 7000, // Fin de l'échelle des ordonnées
                    title: {
                        display: true,
                        text: 'Y-Axis (0-7000)' // Titre de l'axe des ordonnées
                    }
                }
            }
        }
    });

    </script>
    <script>
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: 'doughnut', // Type de graphique : 'pie' pour un diagramme circulaire
            data: {
                labels: ['Category 1', 'Category 2'], // Les catégories
                datasets: [{
                    label: 'My Dataset',
                    data: [65, 35], // Données pour chaque catégorie (65% et 35%)
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)', // Bleu pour la première catégorie
                        'rgba(255, 99, 132, 0.6)'  // Rouge pour la deuxième catégorie
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',  // Bordure bleue
                        'rgba(255, 99, 132, 1)'   // Bordure rouge
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Rend le graphique réactif (responsive)
                plugins: {
                    legend: {
                        //position: 'top', // Position de la légende (top, bottom, left, right)
                        display : false
                    },
                    tooltip: {
                        enabled: true // Active les tooltips au survol
                    }
                },
                cutout: '100%' //augmenter l'auverture du centre
            }
        });
    </script>
    
@endsection

@section('datePickerJS')
    <script src="{{ asset('js/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/locales/bootstrap-datetimepicker.'.App::getLocale().'.js') }}"></script>
    <script type="text/javascript">
        (function ($) {
            //Initialize Select2 Elements
            $('.select2').select2()
            /*//Date range picker
            $('#reservation').daterangepicker()*/
            //Date range picker with time picker
            $('#rangetime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY' })
            $('.datetimepicker').datetimepicker({
                "formatter": "js",
                "format": "dd-mm-yyyy",
                "weekStart": 0,
                "autoclose": true,
                "startView": 2,
                "minView": 2,//2 or 'month' for month view (the default)
                "maxView": 4,//4 or 'decade' for the 10-year overview. Useful for date-of-birth datetimepickers.
                "todayBtn": true,
                "todayHighlight": false,
                "keyboardNavigation": true,
                "language": "{{ App::getLocale() }}",
                "forceParse": true,
                "pickerPosition": "bottom-right",
                //"viewSelect": "month",
                "showMeridian": false,
                "initialDate": ""
            });
        }(jQuery));
    </script>
    <script>
        $(function (){
            $('#reset').click(function(e){
                e.preventDefault();
                var formular = $(this).closest('form');

                formular.find('input').not(':button, :submit, :reset, :hidden, :checkbox').val('');
                formular.find('input[type="checkbox"]').prop('checked', true);
                formular.find('select').find('option').prop('selected', false);
            });

            $('#closing_date_from').inputArcel();
            $('#closing_date_to').inputArcel();
            $('#opening_date_from').inputArcel();
            $('#opening_date_to').inputArcel();

        });
    </script>

<script type="text/javascript">
    $(function () {

      var initialStart = moment().startOf('month');
      var initialEnd = moment().endOf('month');
      var start = initialStart;
      var end = initialEnd;

      function cb(start, end) {
          $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
          // Mettre à jour les champs hidden
          $('#dateRangeStart').val(start.format('YYYY-MM-DD'));
          $('#dateRangeEnd').val(end.format('YYYY-MM-DD'));
          gcsMostRequestedServices(start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'));

      }

      $('#reportrange').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
              'Ce mois': [moment().startOf('month'), moment().endOf('month')],
              '1 Trimestre': [moment().month(0).startOf('month'), moment().month(2).endOf('month')],
              '1 Semestre': [moment().month(0).startOf('month'), moment().month(5).endOf('month')],
              'Année': [moment().startOf('year'), moment().endOf('year')]
          },
          locale: {
              "separator": " - ",
              "applyLabel": "Appliquer",
              "cancelLabel": "Annuler",
              "fromLabel": "Entre",
              "toLabel": "Et",
              "customRangeLabel": "Période personnalisée",
              "daysOfWeek": ['L', 'Ma', 'Me', 'J', 'V', 'S', 'D'],
              "monthNames": ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Jun','Jui', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
              "firstDay": 0
          }
      }, cb);

      cb(start, end);

      function cc(start, end) {
          $('#dateCanceled span#dateC').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
          gcsResourcesCanceled(start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'));

      }

      $('#dateCanceled').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
              'Ce mois': [moment().startOf('month'), moment().endOf('month')],
              '1 Trimestre': [moment().month(0).startOf('month'), moment().month(2).endOf('month')],
              '1 Semestre': [moment().month(0).startOf('month'), moment().month(5).endOf('month')],
              'Année': [moment().startOf('year'), moment().endOf('year')]
          },
          locale: {
              "separator": " - ",
              "applyLabel": "Appliquer",
              "cancelLabel": "Annuler",
              "fromLabel": "Entre",
              "toLabel": "Et",
              "customRangeLabel": "Période personnalisée",
              "daysOfWeek": ['L', 'Ma', 'Me', 'J', 'V', 'S', 'D'],
              "monthNames": ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Jun','Jui', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
              "firstDay": 0
          }
      }, cc);

      cc(start, end);


      function dE(start, end) {
          $('#dateEncaissement span#date').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
          let period = [start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY')];
          let resource = $("#resource_types").val();

          // gcsEncaissReservation(resource, period);
      }

      $('#dateEncaissement').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
              'Ce mois': [moment().startOf('month'), moment().endOf('month')],
              '1 Trimestre': [moment().month(0).startOf('month'), moment().month(2).endOf('month')],
              '1 Semestre': [moment().month(0).startOf('month'), moment().month(5).endOf('month')],
              'Année': [moment().startOf('year'), moment().endOf('year')]
          },
          locale: {
              "separator": " - ",
              "applyLabel": "Appliquer",
              "cancelLabel": "Annuler",
              "fromLabel": "Entre",
              "toLabel": "Et",
              "customRangeLabel": "Période personnalisée",
              "daysOfWeek": ['L', 'Ma', 'Me', 'J', 'V', 'S', 'D'],
              "monthNames": ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Jun','Jui', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
              "firstDay": 0
          }
      }, dE);

      // dE(start, end);


      function sR(start, end) {
          $('#dateStatusResource span#dateR').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
          let type = $("#type_resource").val();
          // let status = $("#status_resource").val();
          let status = 1;
          getStatusResource(type, status, start.format('DD-MM-YYYY'), end.format('DD-MM-YYYY'));
      }

      $('#dateStatusResource').daterangepicker({
          startDate: start,
          endDate: end,
          ranges: {
              'Ce mois': [moment().startOf('month'), moment().endOf('month')],
              '1 Trimestre': [moment().month(0).startOf('month'), moment().month(2).endOf('month')],
              '1 Semestre': [moment().month(0).startOf('month'), moment().month(5).endOf('month')],
              'Année': [moment().startOf('year'), moment().endOf('year')]
          },
          locale: {
              "separator": " - ",
              "applyLabel": "Appliquer",
              "cancelLabel": "Annuler",
              "fromLabel": "Entre",
              "toLabel": "Et",
              "customRangeLabel": "Période personnalisée",
              "daysOfWeek": ['L', 'Ma', 'Me', 'J', 'V', 'S', 'D'],
              "monthNames": ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Jun','Jui', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'],
              "firstDay": 0
          }
      }, sR);

      sR(start, end);

      // $("#status_resource").on("change", function(){
      //   var dateRange = $("#dateStatusResource span#dateR").text();
      //   var dates = dateRange.split(" - ");
      //   var startD = dates[0];
      //   var  endD = dates[1];
      //   let type = $("#type_resource").val();
      //   let status = $(this).val();

      //   getStatusResource(type, status, startD, endD);
      // });

      $("#type_resource").on("change", function(){
        var dateRange = $("#dateStatusResource span#dateR").text();
        var dates = dateRange.split(" - ");
        var startD = dates[0];
        var endD = dates[1];
        // let status = $("#status_resource").val();
        let status = 1;
        let type = $(this).val();

        getStatusResource(type, status, startD, endD);
      });


      $("#resource_types").on("change", function(){
        let resource = $(this).val();
        let period = $("#encaiss_period").val(); 

        gcsEncaissReservation(resource, period);
      });

      encaiss_period
      $("#encaiss_period").on("change", function(){
        let resource = $("#resource_types").val(); 
        let period = $(this).val();
        gcsEncaissReservation(resource, period);
      });

      gcsEncaissReservation( -1, "month");
      let myChart;
      // graphe des encaissements sur les # resources
      function gcsEncaissReservation(resource, period) {

        let chartConf = {
          type: 'line',
          data : {
            labels : [],
            datasets: [{
                label: 'Encaissement',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                fill: false,
                tension: 0.1,
                pointRadius: 5,
                pointHoverRadius: 7
            },]
          },
          options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                },
                xAxes: [],
                yAxes: [],
            },
          }
        }

        $("#gcs-encaiss-reservation-load").show();


      }
      
      // window.onload = function() {
      //     var dateRangeS = $("#reportrange span#dateS").text();
      //     var datesS = dateRangeS.split(" - ");
      //     var startDate = datesS[0];
      //     var endDate = datesS[1];

      //     gcsMostRequestedServices(startDate, endDate);
      //     gcsResourcesCanceled(startDate, endDate);
      // };
      
      function updateTable(data , table_id) {
          // Sélectionner le corps du tableau
          const tbody = document.querySelector(table_id);
          
          // Effacer les lignes existantes (si nécessaire)
          tbody.innerHTML = '';
          
          // Parcourir les données et ajouter des lignes au tableau
          data.forEach(service => {
              // Créer une nouvelle ligne
              const row = document.createElement('tr');
              
              // Créer les cellules pour le nom du service, le nombre de réservations et le pourcentage
              const nameCell = document.createElement('td');
              nameCell.textContent = service.name;
              row.appendChild(nameCell);
              
              const quantityCell = document.createElement('td');
              quantityCell.textContent = service.quantity;
              row.appendChild(quantityCell);
              
              const percentageCell = document.createElement('td');
              percentageCell.textContent = service.pourcen;
              row.appendChild(percentageCell);
              
              // Ajouter la ligne au corps du tableau
              tbody.appendChild(row);
          });
      }

      // SERVICES LES PLUS SOLLICITES
      function gcsMostRequestedServices(start, end){
        period = [start, end];
        const barColors = [
          "#F9D230",
          "#54C9F7",
        ];

        let chartDoughnutConf = {
          type: "doughnut",
          data: {
            labels: [],
            datasets: [{
              backgroundColor: barColors,
              data: []
            }]
          },
          options: {
            title: {
              display: false,
              // text: ""
            },
            cutoutPercentage: 80,
            legend: {
                labels: {
                    boxWidth: 4,
                    fontSize: 12 // Taille de police des labels de légende
                }
            },
            tooltips: {
                bodyFontSize: 12 // Taille de police des infobulles
            }
          }
        }

        $("#most-requested-service").show();



      }

      // RESOURCES ANNULES
      function gcsResourcesCanceled(start, end){
        period = [start, end];
        const barColors = [
          "#F9D230",
          "#54C9F7",
        ];

        let chartDoughnutConf = {
          type: "doughnut",
          data: {
            labels: [],
            datasets: [{
              backgroundColor: barColors,
              data: []
            }]
          },
          options: {
            title: {
              display: false,
              // text: ""
            },
            cutoutPercentage: 80,
            legend: {
                labels: {
                    boxWidth: 4,
                    fontSize: 12 // Taille de police des labels de légende
                }
            },
            tooltips: {
                bodyFontSize: 12 // Taille de police des infobulles
            }
          }
        }

        $("#gcs-resource-canceled").show();

       
      }

      // STATUT DES RESOURCES
      function getStatusResource(type, status, start, end){
        let period = [start, end];

        $("#gcs-status-resource").show();

       
      }
    });
  </script>
@endsection
