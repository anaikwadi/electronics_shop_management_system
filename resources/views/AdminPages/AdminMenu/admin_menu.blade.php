 <!--***** SIDE NAVBAR *****-->
 <nav class="side-navbar">
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ URL::asset('businessbox/admin/img/avatar-1.png') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h4">{{ Auth::User()->name }} </h1>
        </div>
    </div>
    <hr>
    <!-- Sidebar Navidation Menus-->
    <ul class="list-unstyled">
        <li class="active"> <a href="{{ URL::to('/dashboard') }}"><i class="fa fa-codepen"></i>Home</a></li>

        @role(['superadministrator','administrator'])
        <li><a href="#Videos" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Home Page </a>
            <ul id="Videos" class="collapse list-unstyled">
                <li><a href="{{route('video.index')}}"><i class="fa fa-video-camera"></i>Videos Section</a></li>
                <li><a href="{{route('about.index')}}"><i class="fa fa-info-circle"></i>About Section</a></li>
                <li><a href="{{route('admin_team.index')}}"><i class="fa fa-group"></i>Our Team Section</a></li>
                <li><a href="{{route('offers.index')}}"><i class="fa fa-gift"></i>Latest Offers</a></li>
                <li><a href="{{route('admin_testimonial.index')}}"><i class="fa fa-microphone"></i>Testimonials Section</a></li>
            </ul>
        </li>
        @endrole
        

        @role(['superadministrator','administrator'])
        <li> <a href="{{route('vendor.index')}}"><i class="fa fa-industry"></i>Vendor</a></li>
        @endrole

        @role(['superadministrator','administrator'])
        <li><a href="#MasterEntries" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-database"    ></i>Master Entries</a>
            <ul id="MasterEntries" class="collapse list-unstyled">
                <li><a href="{{route('master_entry.index')}}"><i class="fa fa-plus"></i>Company/Model Name</a></li>
                {{-- <li><a href="{{route('purchase.create')}}"><i class="fa fa-star"></i>Add Model Name</a></li> --}}
            </ul>
        </li>
        @endrole

        @role(['superadministrator','administrator'])
        <li><a href="#Purchase" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-shopping-cart"    ></i>Purchase System </a>
            <ul id="Purchase" class="collapse list-unstyled">
                <li><a href="{{route('purchase.index')}}"><i class="fa fa-cart-plus"></i>Add Purchase Items</a></li>
                <li><a href="{{route('purchase.create')}}"><i class="fa fa-download"></i>Purchase Report</a></li>
            </ul>
        </li>
        @endrole

        @role(['superadministrator','administrator'])
        <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-bar-chart"></i>Sale System </a>
            <ul id="sale" class="collapse list-unstyled">
                <li><a href="{{route('customer.index')}}"><i class="fa fa-user-plus"></i>Add/ Edit Customer</a></li>
                <li><a href="{{route('sale.index')}}"><i class="fa fa-credit-card"></i>Generate Bill</a></li> 
                <li><a href="{{route('sale.create')}}"><i class="fa fa-download"></i>Sale Report</a></li> 
            </ul>
        </li>
        @endrole

        @role(['superadministrator','administrator'])
        <li><a href="#quotation" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-envelope-o"></i>Quotation System </a>
            <ul id="quotation" class="collapse list-unstyled">
                <li><a href="{{route('quotation.index')}}"><i class="fa fa-envelope-o"></i>Generate Quotation</a></li> 
                <li><a href="{{route('quotation.create')}}"><i class="fa fa-download"></i>Quotation Report</a></li> 
            </ul>
        </li>
        @endrole

        @role(['superadministrator','administrator'])
        <li> <a href="{{route('daily_expenses.index')}}"> <i class="fa fa-money"></i>Daily Expenses  </a></li>        
        @endrole

        @role(['superadministrator','administrator'])
        <li><a href="#stock_available" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-file-pdf-o"></i>Reports </a>
            <ul id="stock_available" class="collapse list-unstyled">
                <li><a href="{{route('stock.index')}}"><i class="fa fa-check-square"></i>Available Stock</a></li>
                <li><a href="{{route('balance.index')}}"><i class="fa fa-history"></i>Balance Payment</a></li> 
                {{-- <li><a href="{{route('sale.create')}}"><i class="fa fa-download"></i>Sale Report</a></li>  --}}
            </ul>
        </li>
        @endrole

        @role(['superadministrator','administrator'])
        <li> <a href="{{route('contact.create')}}"> <i class="fa fa-address-book-o"></i> Contact Us Enquiries  </a></li>        
        @endrole

        @role(['superadministrator','administrator'])
        <li><a href="#Users" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-stack-overflow"></i>Users </a>
            <ul id="Users" class="collapse list-unstyled">
                <li><a href="{{route('users.index')}}"><i class="fa fa-user"></i>Users </a></li> 
                <li><a href="{{route('roles.index')}}"><i class="fa fa-shopping-cart"></i> Roles </a></li> 
                <li><a href="{{route('permission.index')}}"><i class="fa fa-thumbs-o-up"></i> Permission </a></li> 
            </ul>
        </li>
        @endrole

        @role(['superadministrator','administrator','user'])
        <li><a href="#Users_portal" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-stack-overflow"></i>Users Portal </a>
            <ul id="Users_portal" class="collapse list-unstyled">
                <li><a href="{{route('user_add_cart.index')}}"><i class="fa fa-cart-plus"></i>Cart </a></li> 
                <li><a href="{{route('user_testimonial.index')}}"><i class="fa fa-microphone"></i> Add Testimonial </a></li> 
                <li><a href="{{ URL::to('/my_summary/'.Auth::User()->id) }}"><i class="fa fa-credit-card"></i> Order Summary </a></li>
            </ul>
        </li>
        @endrole

        {{-- <li><a href="#apps" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Apps </a>
            <ul id="apps" class="collapse list-unstyled">
                <li><a href="calendar.html">Calendar</a></li> 
                <li><a href="email.html">Email</a></li> 
                <li><a href="media.html">Media</a></li> 
                <li><a href="invoice.html">Invoice</a></li> 
            </ul>
        </li>

        <li> <a href="maps.html"> <i class="fa fa-map-o"></i>Maps </a></li> --}}
</nav>