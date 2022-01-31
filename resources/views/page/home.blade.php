@extends('page.app')
@section('extra-css')

	<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/ion.rangeSlider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/ion.rangeSlider.skinFlat.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/js/plugin/magnific/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/js/plugin/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/js/plugin/slick/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/js/plugin/nice_select/nice-select.css')}}">
	<!----Revolution slider---->
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/js/plugin/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/style.css')}}">
@endsection
@section('content')
    <!------ Slider Start ------>
    <div class="impl_slider_wrapper">
        <div id="rev_slider_28_1_wrapper" class="rev_slider_wrapper fullscreen-container"
            data-alias="parallax-zoom-slices" data-source="gallery" style="background:#000000;padding:0px;">
            <div id="rev_slider_28_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                <ul>
                    @foreach($slider as $index => $slider1)
                    @if(($index % 2) == 0)
                    <li data-index="rs-66" data-transition="slotzoom-horizontal" data-slotamount="default"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default"
                        data-masterspeed="1000" data-thumb="" data-rotate="0" data-saveperformance="off"
                        data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                        data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-2800-layer-7"
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                            data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                            data-frames='[{"from":"opacity:0;","speed":500,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"speed":5000,"to":"opacity:0;","ease":"Power4.easeInOut"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5;background-color:rgba(0, 0, 0, 0.40);border-color:rgba(0, 0, 0, 0);border-width:0px;">
                        </div>
                        <!-- MAIN IMAGE -->
                        <img src="upload_image/{{$slider1->image}}" alt="" title="homedefault-bg1" width="1920"
                            height="1033" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                            class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->
                        <div id="rrzt_6" class="rev_row_zone rev_row_zone_top" style="z-index: 8;">

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption  " id="slide-66-layer-4" data-x="['left','left','left','left']"
                                data-hoffset="['100','100','100','100']" data-y="['top','top','top','top']"
                                data-voffset="['100','100','100','100']" data-width="none" data-height="none"
                                data-whitespace="nowrap" data-type="row" data-columnbreak="3"
                                data-responsive_offset="on"
                                data-frames='[{"delay":30,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]"
                                data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']"
                                data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"
                                style="z-index: 8; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: rgba(255, 255, 255, 1.00);">
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption  " id="slide-6-layer-5" data-x="['left','left','left','left']"
                                    data-hoffset="['100','100','100','100']" data-y="['top','top','top','top']"
                                    data-voffset="['100','100','100','100']" data-width="none" data-height="none"
                                    data-whitespace="nowrap" data-type="column" data-responsive_offset="on"
                                    data-frames='[{"delay":"+-20","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-columnwidth="50%" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                    style="z-index: 9; width: 100%;"> </div>

                                <!-- LAYER NR. 3 -->
                                <div class="tp-caption  " id="slide-6-layer-6" data-x="['left','left','left','left']"
                                    data-hoffset="['100','100','100','100']" data-y="['top','top','top','top']"
                                    data-voffset="['100','100','100','100']" data-width="none" data-height="none"
                                    data-whitespace="nowrap" data-type="column" data-responsive_offset="on"
                                    data-frames='[{"delay":"+-20","speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                                    data-columnwidth="50%" data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]"
                                    data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]"
                                    data-textAlign="['inherit','inherit','inherit','inherit']"
                                    data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                                    style="z-index: 10; width: 100%;"> </div>
                            </div>
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption   tp-resizeme  text-slider" id="slide-6-layer-1"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-80','-80','-70','-80']"
                            data-fontsize="['70','70','40','30']" data-lineheight="['100','100','40','30']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":30,"split":"chars","splitdelay":0.1,"speed":3000,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"y:[175%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 5; white-space: nowrap; font-size: 70px; line-height: 100px; font-weight: 700; color: rgba(255, 255, 255, 1.00);font-family: 'Raleway', sans-serif;text-transform:uppercase;">
                            {{$slider1->title}}</div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption   tp-resizeme  text-slider" id="slide-6-layer-2"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','-15','-25']"
                            data-fontsize="['24','24','24','20']" data-lineheight="['24','24','24','26']"
                            data-width="['none','none','none','310']" data-height="['none','none','none','54']"
                            data-whitespace="['nowrap','nowrap','nowrap','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":30,"speed":3500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"auto:auto;","ease":"nothing"}]'
                            data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6; white-space: nowrap; font-size: 26px; line-height: 26px; font-weight: 400; color: rgba(255, 255, 255, 1.00);font-family:Roboto;">
                            {{$slider1->description}}</div>

                        <!-- LAYER NR. 6 -->
                        <a class="tp-caption rev-btn  tp-resizeme" href="{{$slider1->url}}" target="_blank" id="slide-67-layer-7"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['80','80','50','40']"
                            data-width="250" data-height="none" data-whitespace="nowrap" data-type="button"
                            data-actions='' data-responsive_offset="on"
                            data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[50,50,50,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[50,50,50,0]"
                            style="cursor:pointer;text-decoration:none;z-index:19;;line-height:40px;"><span
                                class="impl_btn">GET STARTED </span></a>
                    </li>
                    @else
                    <!--slid2-->
                    <li data-index="rs-67" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                        data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="600"
                        data-thumb="../../assets/images/woman2-100x50.jpg" data-rotate="0" data-saveperformance="off"
                        data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5=""
                        data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description=""
                        data-slicey_shadow="0px 0px 0px 0px transparent">
                        <!-- MAIN IMAGE -->
                        <img src="upload_image/{{$slider1->image}}" alt="" data-bgposition="center center"
                            data-kenburns="on" data-duration="5000" data-ease="Power2.easeInOut" data-scalestart="100"
                            data-scaleend="150" data-rotatestart="0" data-rotateend="0" data-blurstart="20"
                            data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg"
                            data-no-retina>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-10"
                            data-x="['center','center','center','center']" data-hoffset="['151','228','224','117']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-212','-159','71','-222']"
                            data-width="['150','150','100','100']" data-height="['200','150','150','150']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="250"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":350,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3650","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 6;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-29"
                            data-x="['center','center','center','center']" data-hoffset="['339','-442','104','-159']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['2','165','-172','219']"
                            data-width="['250','250','150','150']" data-height="['150','150','100','100']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="250"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 7;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-12"
                            data-x="['center','center','center','center']" data-hoffset="['162','216','-239','193']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['195','245','6','146']"
                            data-width="['250','250','100','100']" data-height="150" data-whitespace="nowrap"
                            data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0"
                            data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":450,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3550","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 8;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-34"
                            data-x="['center','center','center','center']" data-hoffset="['-186','-119','273','-223']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['269','217','-121','69']"
                            data-width="['300','300','150','150']" data-height="['200','200','150','150']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="250"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3500","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 9;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-11"
                            data-x="['center','center','center','center']" data-hoffset="['-325','292','162','-34']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['3','55','-275','-174']"
                            data-width="150" data-height="['250','150','50','50']" data-whitespace="nowrap"
                            data-type="shape" data-slicey_offset="250" data-slicey_blurstart="0"
                            data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":550,"speed":1000,"frame":"0","from":"opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3450","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 10;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 7 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-27"
                            data-x="['center','center','center','center']" data-hoffset="['-429','523','-190','-306']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-327','173','181','480']"
                            data-width="['250','250','150','150']" data-height="['300','300','150','150']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="300"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":320,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3680","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 11;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 8 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-28"
                            data-x="['center','center','center','center']" data-hoffset="['422','-409','208','225']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-245','-72','294','-14']"
                            data-width="['300','300','150','150']" data-height="['250','250','100','100']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="300"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":360,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3640","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 12;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 9 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-30"
                            data-x="['center','center','center','center']" data-hoffset="['549','-445','28','58']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['236','400','316','287']"
                            data-width="['300','300','150','200']" data-height="['250','250','150','50']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="300"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":400,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3600","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 13;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 10 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-31"
                            data-x="['center','center','center','center']" data-hoffset="['-522','492','-151','262']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['339','-180','330','-141']"
                            data-width="['300','300','150','150']" data-height="['250','250','100','100']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="300"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":440,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3560","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 14;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 11 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-32"
                            data-x="['center','center','center','center']" data-hoffset="['-588','-375','-253','-207']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['72','-328','-172','-111']"
                            data-width="['300','300','150','150']" data-height="['200','200','150','150']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="300"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":480,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3520","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 15;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-33"
                            data-x="['center','center','center','center']" data-hoffset="['-37','73','-76','-100']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-401','-340','-293','-246']"
                            data-width="['450','400','250','250']" data-height="['100','100','50','50']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="250"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":310,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3690","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 16;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 13 -->
                        <div class="tp-caption tp-shape tp-shapewrapper tp-slicey  tp-resizeme" id="slide-67-layer-35"
                            data-x="['center','center','center','center']" data-hoffset="['186','38','116','17']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['363','402','190','395']"
                            data-width="['350','400','250','250']" data-height="['100','100','50','50']"
                            data-whitespace="nowrap" data-type="shape" data-slicey_offset="250"
                            data-slicey_blurstart="0" data-slicey_blurend="20" data-responsive_offset="on"
                            data-frames='[{"delay":340,"speed":1000,"frame":"0","from":"sX:1;sY:1;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"+3660","speed":300,"frame":"999","to":"opacity:0;fb:0;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 17;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 14 -->
                        <div class="tp-caption tp-shape tp-shapewrapper " id="slide-67-layer-1"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                            data-basealign="slide" data-responsive_offset="off" data-responsive="off"
                            data-frames='[{"delay":10,"speed":500,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":500,"frame":"999","to":"opacity:0;","ease":"Power4.easeOut"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 18;background-color:rgba(0, 0, 0, 0.5);"> </div>

                        <!-- LAYER NR. 15 -->
                        <div class="tp-caption   tp-resizeme" id="slide-67-layer-2"
                            data-x="['center','center','center','center']" data-hoffset="['1','1','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['-70','-70','-70','-70']"
                            data-fontsize="['70','70','30','26']" data-lineheight="['80','70','40','30']"
                            data-width="['none','none','481','360']" data-height="none"
                            data-whitespace="['nowrap','nowrap','normal','normal']" data-type="text"
                            data-responsive_offset="on"
                            data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="z-index: 19; white-space: nowrap; font-size: 70px; line-height: 80px; font-weight: 700; color: #ffffff; letter-spacing: 0px;font-family: 'Raleway', sans-serif;text-transform:uppercase;">      <?php echo html_entity_decode($slider1->title); ?></div>
                        <!-- LAYER NR. 17 -->
                        <a class="tp-caption rev-btn  tp-resizeme" href="{{$slider1->url}}" target="_blank" id="slide-67-layer-8"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['80','50','20','5']"
                            data-width="250" data-height="none" data-whitespace="nowrap" data-type="button"
                            data-actions='' data-responsive_offset="on"
                            data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"sX:0.9;sY:0.9;opacity:0;fb:20px;","to":"o:1;fb:0;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","to":"sX:0.9;sY:0.9;opacity:0;fb:20px;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                            data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[50,50,50,0]" data-paddingbottom="[0,0,0,0]"
                            data-paddingleft="[50,50,50,0]"
                            style="cursor:pointer;text-decoration: none;z-index:19;line-height:45px;"><span
                                class="impl_btn">GET STARTED </span></a>
                    </li>
                    @endif
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
<style type="text/css">
.select2-results{
    color: #000 !important;
}

.select2 {
    -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    border-radius: 5px;
    border: solid 1px #e8e8e8;
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 14px;
    font-weight: normal;
    height: 42px;
    line-height: 40px;
    outline: none;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
}


.select2-container--default .select2-selection--single {
     /*background-color: #fff; 
     border: 1px solid #aaa; 
     border-radius: 4px; */
     background-color: #fff; 
     border: none !important; 
     border-radius: none !important; 
     margin-top: 5px;
}
.select2-selection__arrow{
    margin-top: 5px;
}
.year_select{
    margin-top: -19px;
   
}

</style>
    <!------ Search Box Start ------>
    <div class="impl_searchbox_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_search_box custom_select">
                        <form enctype="multipart/form-data" method="POST" action="/home-search">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="impl_select_boxes">
                                    <select class="select2" name="brand" id="brand">
                                        <option>Select Brand</option>
                                        @foreach($brand as $brand1)
                                        <option value="{{$brand1->id}}">{{$brand1->name}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <select>
                                        <option>Select Status</option>
                                        <option value="b1">Status 1</option>
                                        <option value="b2">Status 2</option>
                                        <option value="b3">Status 3</option>
                                        <option value="b4">Status 4</option>
                                    </select> -->
                                    <select class="select2" name="model" id="model">
                                        <option>Select Model</option>
                                        @foreach($car as $car1)
                                        <option value="{{$car1->id}}">{{$car1->name}}</option>
                                        @endforeach
                                    </select>
                                    <select class="select2" name="from_year" id="from_year">
                                        <option value="">SELECT YEAR</option>
                                        <?php
                                        $d = date('Y');
                                        for ($x = 1980; $x <= $d; $x++) {
                                        ?>
                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>
                                    </select>
                                  <div class="year_select">TO</div>
                                    <select class="select2" name="to_year" id="to_year">
                                        <option value="">SELECT YEAR</option>
                                        <?php
                                        $d = date('Y');
                                        for ($x = 1980; $x <= $d; $x++) {
                                        ?>
                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="impl_search_btn">
                                    <button style="top: -30px;" type="submit" class="impl_btn">search vehicle</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------ Welcome Wrapper Start ------>
    <div class="impl_welcome_wrapper impl_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                    <div class="impl_welcome_img">
                        <img src="dist/images/welcome_img.png" alt="Welcome" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                    <div class="impl_welcome_text">
                        <h1>Welcome to NewYork Car Auction</h1>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Join New York Car Auction</a></h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in show">
                                    <div class="panel-body">
<ul>
    <li>Register today with auction</li>
    <li>Sign in through the link in the register</li>
    <li>Choose the membership type that’s right for you</li>
</ul>
<p>To start bidding and buying with New York car Auction, you must first join New York car Auction:<p>
<p>To register for our free basic membership. Simply full SIGNUP form. You may also register on the New York car Auction app. You will be sent a confirmation email containing your login information and password.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Add a Deposit</a></h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
<ul>
    <li>Make fund transfers</li>
    <li>Directly deposit to New York car Auctions bank account in your current location</li>
    <li>Make cash or cheque payments at any of New York Car offices</li>
</ul>
<p>Find more details about our payments options below:</p>
<ul>
    <li>Payment by Direct deposit/Local Bank Transfers</li>
    <li>Payment by cheque (Local currency Only)</li>
</ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Search Vehicles</a></h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        Your vehicle search experience has been improved. High quality photo browsing directly from the search results. On the go searches for vehicles made easy with New York car auction app. You can also search by year, make, model, location, VIN and lot number. Once the search is complete, refine your results by utilizing the appropriate filters as well. Open the photo modals for an enhanced view of the vehicles featuring high quality photo browsing.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Join Auctions</a></h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        After you’ve determined what vehicles you’d like to bid on. It’s time to submit preliminary bids or join some live auctions. You don’t need to be logged in to attend an auction, but you will need to sign in order to bid. Once you have done this, click on the Auctions tab to see a list of Today’s Auction. Where you can jump directly into live ongoing auction Upcoming auctions and the Auctions calendar. There are a handful of other entry points for auctions as well, including the New York homepage, member dashboard and individual locations. You’ll be directed to the Auction dashboard.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Place Bids</a></h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        New York car auction member can place preliminary bids, or pre-bids, on vehicles at any time up to one hour before the start of the live auction. When you pre-bid, you place an incremental value on the vehicle prior to the sale. With New York car patented online vehicle auction technology. Members experience the excitement of a live sale from the comfort of their home or office. On their computer or mobile devices. Bid from your computer to mobile devices by selecting from one of the automatic increment options or choosing your own bid, a monster Bid.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Pay and Pick Up</a></h4>
                                </div>
                                <div id="collapseSix" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>
                                        For arrange payment purchase should be paid for within three business days, including the sale day. Payment of buyer fees, virtual bidding fees and other fees, as applicable will be required as well. Once all fees are paid in full, you can pick up your purchases. Virtual auction bidders have five business days, including day of sale, to pick up their purchase before storage fees begin accruing.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Service and Video Wrapper Start ------>
    <div class="impl_service_wrapper">
        <div class="impl_service_car">
            <img src="dist/images/service_car.png" alt="" />
        </div>
        <div class="impl_service_video">
            <div class="impl_video_inner">
                <div class="impl_servdo_video">
                    <span class="impl_play_icon"><a class="impl-popup-youtube" href="https://www.youtube.com/watch?v=BqjuObIH1nY"><i class="fa fa-play" aria-hidden="true"></i></a></span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="impl_service_left">
                        <div class="impl_service_details">
                            <div class="impl_heading">
                                <h1>service</h1>
                            </div>
                            <div class="impl_timeline_wrapper">
                                <ul class="impl_timeline">
                                    <li>
                                        <div class="impl_tl_item">
                                            <h2>Auction</h2>
                                            <p>All New York car middle east auctions taking place on that particular day will be listed under today auction page where you can jump directly into live ongoing auctions upcoming auctions.</p>
                                            <span class="impl_tl_icon">
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="impl_tl_item impl_tl_item_rt">
                                            <h2>Find Vehicles</h2>
                                            <p>Under Today Auction page You will find auctions that will be happening later in the day and others that are current live auctions. Once the auction goes live, you can join the auction by simply clicking on the join Auction button..</p>
                                            <span class="impl_tl_icon">
                                                <i class="fa fa-usd" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="impl_tl_item">
                                            <h2>Live Auctions</h2>
                                            <p>The great thing about the Find Vehicles, saved searches and watchlists is that all of these tools are also available on the New York Car Auction app. So pic up on your ipad or jump on your mobile to login, search vehicles, add your favourite items to your watchlist and saved.</p>
                                            <span class="impl_tl_icon">
                                                <i class="fa fa-wrench" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Featured Cars Start ------>
    <div class="impl_featured_wrappar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Featured Cars</h1>
                    </div>
                </div>
                @foreach($vehicle as $index => $vehicle1)
                <div class="col-lg-4 col-md-6">
                    <div class="impl_fea_car_box">
                        <div class="impl_fea_car_img">
                            <img style="width: 350px;height: 200px;" src="{{asset('vehicle_image/').'/'.$vehicle1->image}}" alt="" class="img-fluid impl_frst_car_img" />
                            <!-- <img src="{{asset('vehicle_image/').'/'.$vehicle1->image}}" alt=""
                                class="img-fluid impl_hover_car_img" /> -->
                            <!-- <span class="impl_img_tag" title="compare"><i class="fa fa-exchange" aria-hidden="true"></i></span> -->
                        </div>
                        <div class="impl_fea_car_data">
                            <h2><a href="#" onclick="viewDetails({{$vehicle1->id}})">
                    @foreach($car as $car1)
                    @if($car1->id == $vehicle1->car_id)
                    {{$car1->name}}
                    @endif
                    @endforeach</a></h2>
                            <ul>
                                <li><span class="impl_fea_title">model</span>
                                    <span class="impl_fea_name">{{$vehicle1->vehicle_model}}</span></li>
                                <li><span class="impl_fea_title">Vehicle Status</span>
                                    <span class="impl_fea_name">{{$vehicle1->vehicle_status}}</span></li>
                                <li><span class="impl_fea_title">Color</span>
                                    <span class="impl_fea_name">{{$vehicle1->colour}}</span></li>
                            </ul>
                            <div class="impl_fea_btn">
                                <button class="impl_btn"><span class="impl_doller">AED {{$vehicle1->price}} </span><a href="#" onclick="viewDetails({{$vehicle1->id}})"><span class="impl_bnw">View Details</span></a></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </div>
    <!------ Need Help Section Start ------>
    <div class="impl_help_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="impl_help_data">
                        <h1>Need Help Finding Perfect Car ?</h1>
                        <p>Call Us Now</p>
                        <div class="impl_help_no"><span>(+1)202-202-012</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Latest Blog Section Start ------>
    <div class="impl_blog_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Latest Blogs</h1>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                @foreach($blog as $index => $blog1)
                    @if(($index % 2) == 0)
                    <div class="impl_blog_box">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="impl_post_img">
                                    <img src="/upload_image/{{$blog1->image}}" alt="" class="img-fluid" />
                                    <span class="impl_pst_date">
                                        16 sep
                                    </span>
                                    <div class="impl_pst_img_icon"><a href="#" class="fa fa-link"></a></div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="impl_post_data">
                                    <h2><a href="#">{{$blog1->title}}</a></h2>
                                    <p>{{$blog1->description}}</p>
                                    <div class="impl_pst_info">
                                        <div class="impl_pst_admin">
                                            <span><a href="#">{{$blog1->created_at}}</a></span>
                                        </div>
                                        <!-- <ul class="impl_pst_views">
                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 413</a></li>
                                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 251</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> 5</a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <!--Blog 2-->
                    <div class="impl_blog_box impl_blog_right">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 push-lg-8">
                                <div class="impl_post_img">
                                    <img src="/upload_image/{{$blog1->image}}" alt="" class="img-fluid" />
                                    <span class="impl_pst_date">
                                        16 sep
                                    </span>
                                    <div class="impl_pst_img_icon"><a href="#"><i class="fa fa-link"
                                                aria-hidden="true"></i></a></div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 pull-lg-4">
                                <div class="impl_post_data">
                                    <h2><a href="#">{{$blog1->title}} </a></h2>
                                    <p>{{$blog1->description}}</p>
                                    <div class="impl_pst_info">
                                        <div class="impl_pst_admin">
                                            <span><a href="#">{{$blog1->created_at}}</a></span>

                                        </div>
                                        <!-- <ul class="impl_pst_views">
                                            <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 413</a></li>
                                            <li><a href="#"><i class="fa fa-comments" aria-hidden="true"></i> 251</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i> 5</a>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>

<style type="text/css">
    .product_view .modal-dialog{max-width: 800px; width: 100%;}
    .pre-cost{text-decoration: line-through; color: #a5a5a5;}
    .space-ten{padding: 10px 0;}
</style>
<div class="modal fade product_view" id="popup_modal">
    <div class="modal-dialog">
        <div class="modal-content" id="view-details">
            
        </div>
    </div>
</div>    

@endsection
@section('extra-js')

<!--Main js file Style-->
    <script type="text/javascript" src="{{ asset('dist/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/popper.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/ion.rangeSlider.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/magnific/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/slick/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/nice_select/jquery.nice-select.min.js')}}"></script>
    <!----------Revolution slider start---------->
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/plugin/revolution/js/revolution.addon.slicey.min.js')}}"></script>
<!----------Revolution slider start---------->
<script type="text/javascript" src="{{ asset('dist/js/custom.js')}}"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    var dropdownselect2 = $(".select2");
    dropdownselect2.select2();
</script>
<script type="text/javascript">
function viewDetails(id)
{
    $.ajax({
    url : '/vehicle-quick-view/'+id,
    type: "GET",
    success: function(data)
    {
        $('#view-details').html(data);
        $('#popup_modal').modal('show');
    }
  });
}
</script>
@endsection
    