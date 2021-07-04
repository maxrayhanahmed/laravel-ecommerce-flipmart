<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">Category</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">

			@foreach($categories as $category)
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="#{{$loop->index}}" data-toggle="collapse" class="accordion-toggle collapsed">
	                  {{$category->categoryName}}
	                </a>
	            </div><!-- /.accordion-heading -->
	            <div class="accordion-body collapse" id="{{$loop->index}}" style="height: 0px;">
	                <div class="accordion-inner">
	                    <ul> @foreach($category->subCat as $subcategory)
	                        <li><a href="#">{{$subcategory->subcatName}}</a></li>
	                         @endforeach
	                       
	                    </ul>
	                </div><!-- /.accordion-inner -->
	            </div><!-- /.accordion-body -->
	        </div><!-- /.accordion-group -->
	        @endforeach

	       

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
