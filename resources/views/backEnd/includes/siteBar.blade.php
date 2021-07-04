

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-newspaper-o fa-fw"></i> Blog post<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.blog')}}"> Post </a>
                                </li>
                                 <li>
                                    <a href="{{route('admin.blog.manage')}}"> Post Manage</a>
                                </li>  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        

                        
                         <li>
                            <a href="#"><i class="fa fa-product-hunt fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.product.add')}}"> Product Add </a>
                                </li>
                                 <li>
                                    <a href="{{route('admin.product.manage')}}"> Product manage</a>
                                </li>  
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        
                        
                        

                        <li>
                            <a href="#"><i class="fa fa-sliders fa-fw"></i> Sliders <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{url('admin/home-slider')}}"> Home Slider </a>
                                </li>
                                   
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                        <li>
                            <a href="#"><i class="fa fa-bars fa-fw"></i> Menus || Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 
                                 <li>
                                    <a href="{{route('admin.category')}}"> Category</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.subcategory')}}"> Subcategory</a>
                                </li>  


                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                         <li>
                            <a href="#"><i class="fa fa-credit-card-alt fa-fw"></i> Payment Method <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.payment.method')}}"> Payment Method </a>
                                </li>
                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>




                        
                        <li>
                            <a href="#"><i class="fa fa-fighter-jet fa-fw"></i> Brands<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.brand')}}"> Brands </a>
                                </li>
                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        

                       
                        <li>
                            <a href="#"><i class="fa fa-first-order fa-fw"></i> Order <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.order.manage')}}"> Order </a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                       
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.users.manage')}}"> Users Manage </a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Admins <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.manage')}}"> Admins Manage </a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                       



                      
                        <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Site Informations <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.information.get')}}"> Informations </a>
                                </li>
                                

                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-cog fa-fw"></i> Settings <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                 <li>
                                    <a href="{{route('admin.home.setting')}}"> Home Settings </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.logo')}}"> Site Logo </a>
                                </li>


                                 
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

