<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Site Logo & Name<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('logo-name')}}"> Add </a>
                    </li>
                    <li>
                        <a href="{{route('edit-logo-name')}}"> Edit </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Banner Ad<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-banner-ad')}}"> Add </a>
                    </li>
                    <li>
                        <a href="{{route('manage-banner-ad')}}"> Manage </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>GhoreyBoshe Family<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-family')}}"> Add </a>
                    </li>
                    <li>
                        <a href="{{route('manage-family')}}"> Manage </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Product Category<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-product-category')}}"> Add Category </a>
                    </li>
                    <li>
                        <a href="{{route('manage-product-category')}}"> Manage Category </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Product Subcategory<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-product-subcategory')}}"> Add Subcategory </a>
                    </li>
                    <li>
                        <a href="{{route('manage-product-subcategory')}}"> Manage Subcategory </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{route('manage-product-ad')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Product Detail</a>
            </li>
            <li>
                <a href="{{route('manage-property-ad')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Property Detail</a>
            </li>
            <li>
                <a href="{{route('manage-job-ad')}}"><i class="fa fa-bar-chart-o fa-fw"></i>Job Detail</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Top Ad Package<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-top-ad-package')}}"> Add Package </a>
                    </li>
                    <li>
                        <a href="{{route('manage-top-ad-package')}}"> Manage Package </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Country<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-country')}}"> Add Country </a>
                    </li>
                    <li>
                        <a href="{{route('manage-country')}}"> Manage Country </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Division<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-division')}}"> Add Division </a>
                    </li>
                    <li>
                        <a href="{{route('manage-division')}}"> Manage Division </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>District<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-district')}}"> Add District </a>
                    </li>
                    <li>
                        <a href="{{route('manage-district')}}"> Manage District </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Contact<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('add-contact')}}"> Add </a>
                    </li>
                    <li>
                        <a href="{{route('edit-contact')}}"> Edit </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Chat<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('all_chat')}}"> All Chat </a>
                    </li>
                    <li>
                        <a href="{{route('edit-contact')}}"> Edit </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Footer Menu<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('jana_ojana')}}">জানা অজানা</a>
                    </li>
                    <li>
                        <a href="{{route('ad_rules')}}">বিজ্ঞাপনের নিয়ম</a>
                    </li>
                    <li>
                        <a href="{{route('payment_information')}}">বিল সংক্রান্ত তথ্য</a>
                    </li>
                    <li>
                        <a href="{{route('customer_deal')}}">গ্রাহককে চুক্তি</a>
                    </li>
                    <li>
                        <a href="{{route('fast_sell')}}">সহজে দ্রুতগতিতে বিক্রি করুন</a>
                    </li>
                    <li>
                        <a href="{{route('admin_terms')}}">আপনার অর্ডারের নিয়মগুলি</a>
                    </li>
                    <li>
                        <a href="{{route('admin_delivery')}}">ডেলিভারি</a>
                    </li>
                    <li>
                        <a href="{{route('admin_membership')}}">আমাদের সদস্য</a>
                    </li>
                    <li>
                        <a href="{{route('admin_about_us')}}">আমাদের সম্পর্কে</a>
                    </li>
                    <li>
                        <a href="{{route('business_demand')}}">একটি ব্যবসা দাবি করুন</a>
                    </li>
                    <li>
                        <a href="{{route('secret_terms')}}">ব্যবহারকারী গোপনীয়তা</a>
                    </li>
                    <li>
                        <a href="{{route('ghoreyboshe_career')}}">স্থানীয় ঘরেবসে.কম ক্যারিয়ারের সুযোগ</a>
                    </li>
                </ul>
            </li>




            <li>
                <a href="{{route('new-user')}}"><i class="fa fa-bar-chart fa-fw"></i> Add User</a>
            </li>


        </ul>
    </div>
</div>