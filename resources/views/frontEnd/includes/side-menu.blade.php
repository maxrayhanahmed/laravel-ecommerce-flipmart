     
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">

          @foreach($categories as $category)

            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$category->categoryName}}</a>
                 <ul class="dropdown-menu mega-menu">
                <li class="yamm-content">
                    <div class="">
                        <div class="col-sm-12 col-md-3">
                            <ul class="links list-unstyled"> 
                            @foreach($category->subCat as $subcategory)

                              <li><a href="{{route('category.page',$subcategory->id)}}">{{$subcategory->subcatName}}</a></li>
                              @endforeach
                             
                            </ul>
                        </div><!-- /.col -->
                        
                       
                    </div><!-- /.row -->
                </li><!-- /.yamm-content -->                    
              </ul><!-- /.dropdown-menu --> 
           </li><!-- /.menu-item -->

           @endforeach

          @foreach($subcategories as $subcategory)

            <li class="dropdown menu-item">
                <a href="{{route('category.page',$subcategory->id)}}" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>{{$subcategory->subcatName}}</a>
                 <!-- /.dropdown-menu --> 
            </li><!-- /.menu-item -->


            @endforeach

            

          
          
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->