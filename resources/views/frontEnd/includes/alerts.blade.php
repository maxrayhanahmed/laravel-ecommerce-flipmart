

	@if(Session::get('success'))
		<div class="container">
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
    	</div>
        @endif
