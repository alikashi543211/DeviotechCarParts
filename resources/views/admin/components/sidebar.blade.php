<div class="logo"><a href="{{ route('admin.dashboard') }}" class="simple-text logo-normal"><img src="{{ asset(fixSetting()['dark_logo'] ?? '') }}" width="120" alt="Car Parts"></a></div>
<div class="sidebar-wrapper">
    <ul class="nav">

        <li class="nav-item @routeis('admin.dashboard') active @endrouteis">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.category*') active @endrouteis">
           <a class="nav-link" href="{{route('admin.category.list')}}" >
                 <i class="material-icons">category</i>
                <p>Category </p>
           </a>
        </li>

        <li class="nav-item @routeis('admin.subcategory*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.subcategory.list')}}" >
                <i class="material-icons">subject</i>
                <p>SubCategory </p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.seller*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.seller.list')}}" >
                <i class="material-icons">supervised_user_circle</i>
                <p> Sellers</p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.car_part_advertisement*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.car_part_advertisement.list')}}" >
                <i class="material-icons">electric_car</i>
                <p>Car Part Advertisements </p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.scrap_yard_advertisement*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.scrap_yard_advertisement.list')}}" >
                <i class="material-icons">commute</i>
                <p>Scrap Yard Advertisements </p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.plan*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.plan.list')}}" >
                <i class="material-icons">card_membership</i>
                <p>Admin Plans</p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.language.*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.language.list')}}" >
                <i class="material-icons">language</i>
                <p>Languages</p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.settings.index') active @endrouteis">
            <a class="nav-link" href="{{route('admin.settings.index')}}" >
                <i class="material-icons">settings</i>
                <p>Settings</p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.faq.list') active @endrouteis">
            <a class="nav-link" href="{{route('admin.faq.list')}}" >
                <i class="material-icons">fact_check</i>
                <p>Faqs</p>
            </a>
        </li>
        <li class="nav-item @routeis('admin.blogs.list') active @endrouteis">
            <a class="nav-link" href="{{route('admin.blogs.list')}}" >
                <i class="material-icons">format_bold</i>
                <p>Blogs</p>
            </a>
        </li>
        <li class="nav-item @routeis('admin.contact.list') active @endrouteis">
            <a class="nav-link" href="{{route('admin.contact.list')}}" >
                <i class="material-icons">account_box</i>
                <p>Contacts</p>
            </a>
        </li>
        <li class="nav-item @routeis('admin.testimonial.list') active @endrouteis">
            <a class="nav-link" href="{{route('admin.testimonial.list')}}" >
                <i class="material-icons">quiz</i>
                <p>Testimonials</p>
            </a>
        </li>
        <li class="nav-item @routeis('admin.profile*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.profile.index')}}" >
                <i class="material-icons">account_circle</i>
                <p>Profile</p>
            </a>
        </li>

        <li class="nav-item @routeis('admin.order*') active @endrouteis">
            <a class="nav-link" href="{{route('admin.order.index')}}" >
                <i class="material-icons">reorder</i>
                <p>Order</p>
            </a>
        </li>

    </ul>
</div>





