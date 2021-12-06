<aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="{{ asset('Admin_assets/images/icon/logo-white.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{ asset('Admin_assets/images/icon/avatar-big-01.jpg')}}" alt="John Doe" />
                    </div>
                    <h4 class="name">john doe</h4>
                    <a href="#">Sign out</a>
                </div>
                <nav class="navbar-sidebar2 pb-3">
                    <ul class="list-unstyled navbar__list">
                        <li class="@yield('dashboard_select')">
                            <a class="js-arrow" href="{{route('admin.dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>

                        <li class="@yield('order_select')">
                            <a href="{{route('order')}}">
                                <i class="fas fa-list"></i>Order</a>
                        </li>
                        
                        <li class="@yield('category_select')">
                            <a href="{{route('category')}}">
                                <i class="fas fa-list"></i>Category</a>
                        </li>

                         <li class="@yield('brand_select')">
                            <a href="{{route('brand')}}">
                                <i class="fas fa-list"></i>Brand</a>
                        </li>
                        
                        <li class="@yield('cupon_select')">
                            <a href="{{route('cupon')}}">
                                <i class="fas fa-tag"></i>Cupon</a>
                        </li>

                        <li class="@yield('size_select')">
                            <a href="{{route('size')}}">
                                <i class="fas fa-tag"></i>Size</a>
                        </li>

                        <li class="@yield('tax_select')">
                            <a href="{{route('tax')}}">
                                <i class="fas fa-tag"></i>Tax</a>
                        </li>

                        <li class="@yield('color_select')">
                            <a href="{{route('color')}}">
                                <i class="fas fa-paint-brush"></i>Color</a>
                        </li>
                        
                        <li class="@yield('product_select')">
                            <a href="{{route('product')}}">
                                <i class="fas fa-paint-brush"></i>Product</a>
                        </li>

                        <li class="@yield('banner_select')">
                            <a href="{{route('banner')}}">
                                <i class="fas fa-image"></i>Banner</a>
                        </li>

                         <li class="@yield('customer_select')">
                            <a href="{{route('customer')}}">
                                <i class="fas fa-user"></i>Customer</a>
                        </li>

                         <li>
                           <h3 class="text-center text-white bg-primary p-1">Web Site Setting</h3>
                        </li>


                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="login.html">
                                        <i class="fas fa-sign-in-alt"></i>Login</a>
                                </li>
                                <li>
                                    <a href="register.html">
                                        <i class="fas fa-user"></i>Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">
                                        <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>