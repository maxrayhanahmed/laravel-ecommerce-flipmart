

<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">
    @foreach($subcategories2 as $subcategory)					
			<a class="item" title="{{$subcategory->subcatName}}" href="{{route('category.page',$subcategory->id)}}">{{$subcategory->subcatName}}</a>
      @endforeach
			
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->