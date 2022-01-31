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
                                    <li class="breadcrumb-item active">Email Template
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
        
        				<form id="form" action="/admin/update-email-temp" method="POST" enctype="multipart/form-data">
                    	{{ csrf_field() }}
                    	<input value="{{ $data['id'] }}" type="hidden" name="id" id="id">
                        <div class="form-body">
                              <h4 class="form-section"><i class="ft-user"></i> Email Template</h4>
                             <input type="hidden" name="id" value="{{$data['id']}}">
                              
                             <div class="form-group row">
                                <label class="col-md-3 label-control" for="projectinput9">Email Content</label>
                                <div class="col-md-9">
                                  <textarea id="content" rows="2" class="form-control tinymce" name="content"><?php echo $data['content']?> </textarea>
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
$('.email-temp').addClass('active');
</script>
@endsection