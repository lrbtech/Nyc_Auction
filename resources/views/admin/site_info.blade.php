 @section('css')
      <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">
 @endsection
 @extends('admin.layouts')
@section('body-section')
 <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Master</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Site Info
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
           
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
        
        				<form id="form" action="/admin/update-site-info" method="POST" enctype="multipart/form-data">
                    	{{ csrf_field() }}
                    	<input value="{{ $data['id'] }}" type="hidden" name="id" id="id">
                        <div class="form-body">
                              <h4 class="form-section"><i class="ft-user"></i> Site Info</h4>
                             <input type="hidden" name="id" value="{{$data['id']}}">
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Email 1</label>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" 
                                  name="email_1" value="{{$data['email_1']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput1">Email 2</label>
                                <div class="col-md-9">
                                  <input type="text" class="form-control" 
                                  name="email_2" value="{{$data['email_2']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">Mobile 1</label>
                                <div class="col-md-9">
                                  <input type="text" id="mobile_1" class="form-control" name="mobile_1" value="{{$data['mobile_1']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">Mobile 2</label>
                                <div class="col-md-9">
                                  <input type="text" id="mobile_2" class="form-control" name="mobile_2" value="{{$data['mobile_2']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">City</label>
                                <div class="col-md-9">
                                  <input type="text" id="city" class="form-control" name="city" value="{{$data['city']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control">State</label>
                                <div class="col-md-9">
                                  <input type="text" id="state" class="form-control" name="state" value="{{$data['state']}}">
                                </div>
                              </div>
                              
                              
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">Address</label>
                                <div class="col-md-9">
                                  <textarea id="address" rows="3" class="form-control" name="address">{{$data['address']}}</textarea>
                                </div>
                              </div>
                              
                              <div class="form-group row">
                                <label class="col-md-3 label-control">About Title</label>
                                <div class="col-md-9">
                                  <input type="text" id="about_title" class="form-control" name="about_title" value="{{$data['about_title']}}">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">About Info</label>
                                <div class="col-md-9">
                                  <textarea id="about_info" rows="2" class="form-control tinymce" name="about_info"><?php echo $data['about_info']?> </textarea>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Map Iframe</label>
                                <div class="col-md-9">
                                  <input type="text" id="map_iframe" class="form-control" name="map_iframe" value="{{$data['map_iframe']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Facebook Url</label>
                                <div class="col-md-9">
                                  <input type="text" id="facebook_url" class="form-control" name="facebook_url" value="{{$data['facebook_url']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Instagram Url</label>
                                <div class="col-md-9">
                                  <input type="text" id="instagram_url" class="form-control" name="instagram_url" value="{{$data['instagram_url']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Youtube Url</label>
                                <div class="col-md-9">
                                  <input type="text" id="youtube_url" class="form-control" name="youtube_url" value="{{$data['youtube_url']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Linkedin Url</label>
                                <div class="col-md-9">
                                  <input type="text" id="linkedin_url" class="form-control" name="linkedin_url" value="{{$data['linkedin_url']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Google Plus Url</label>
                                <div class="col-md-9">
                                  <input type="text" id="google_plus_url" class="form-control" name="google_plus_url" value="{{$data['google_plus_url']}}">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-md-3 label-control">Logo</label>
                                <div class="col-md-4">
                                  <input type="file" id="logo" class="form-control" name="logo" >
                                  <input type="hidden" id="logo1" class="form-control" name="logo1" value="{{$data['logo']}}">
                                </div>
                                <div class="col-md-5">
                                  <img style="max-height:100px;height:100px;" src="{{asset('upload_image/').'/'.$data['logo']}}">
                                </div>
                              </div>

                              

                            
                                  
                            </div>
                        
                        <hr>
                        <button class="btn btn-primary" type="submit">Save</button>
                        </form>

        						</div>
      
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
            
        </div>


@endsection
@section('js')
<script src="/app-assets/vendors/js/editors/tinymce/tinymce.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/editors/editor-tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$('.site-info').addClass('active');
</script>
@endsection