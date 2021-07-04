	
<style type="text/css">
	.alert-box{
		margin-top: 10px;
	}
</style>
        @if(Session::get('success'))


		<div id="page-alert">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert-box">
                    <div class="alert alert-success"> sfkdssvmclx;
                        {{Session::get('success')}}
                    </div>
                </div>
            </div>
        </div>
      </div>
        @endif


		@if(Session::get('delete_success'))
		<div id="page-wrapper" style="min-height: 20px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert-box">
                    <div class="alert alert-danger">
                        {{Session::get('delete_success')}}
                    </div>
                </div>
            </div>
        </div>
      </div>


    	@endif
