<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item"><a href=""><i class="la la-user"></i><span class="menu-title" data-i18n="nav.dash.main">Users</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.user.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.user.create')}}" data-i18n="nav.dash.ecommerce">Create User</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.user.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.user.index') }}" data-i18n="nav.dash.ecommerce">View User</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-building"></i><span class="menu-title" data-i18n="nav.dash.main">Company</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.company.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.company.create') }}" data-i18n="nav.dash.ecommerce">Create Company</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.company.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.company.index') }}" data-i18n="nav.dash.ecommerce">View Company</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-tasks"></i><span class="menu-title" data-i18n="nav.dash.main">Occupation</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.occupation.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.occupation.create') }}" data-i18n="nav.dash.ecommerce">Create Occupation</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.occupation.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.occupation.index') }}" data-i18n="nav.dash.ecommerce">View Occupation</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.suboccupation.index') || request()->routeIs('admin.suboccupation.create') ? 'active' : ''}}"><a href=""><i class="la la-tasks"></i><span class="menu-title" data-i18n="nav.dash.main">Sub Occupation</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.suboccupation.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.suboccupation.create')}}" data-i18n="nav.dash.ecommerce">Create Sub Occupation</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.suboccupation.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.suboccupation.index')}}" data-i18n="nav.dash.ecommerce">View Sub Occupation</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-graduation-cap"></i><span class="menu-title" data-i18n="nav.dash.main">Job</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.job.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.job.create')}}" data-i18n="nav.dash.ecommerce">Create Job</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.job.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.job.index')}}" data-i18n="nav.dash.ecommerce">View Job</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-bell"></i><span class="menu-title" data-i18n="nav.dash.main">Notifications</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin.user_email.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.user_email.create')}}" data-i18n="nav.dash.ecommerce">Send to User</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.user_email.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.user_email.index')}}" data-i18n="nav.dash.ecommerce">View User Notifications</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.company_email.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.company_email.create')}}" data-i18n="nav.dash.ecommerce">Send to Company</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.company_email.index') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.company_email.index')}}" data-i18n="nav.dash.ecommerce">View Company Notifications</a>
                    </li>
                    <li class="{{ request()->routeIs('admin.all_email.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin.all_email.create')}}" data-i18n="nav.dash.ecommerce">Send to All</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="fas fa-city"></i><span class="menu-title" data-i18n="nav.dash.main">Provinces</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin_provinces_create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_provinces_create')}}" data-i18n="nav.dash.ecommerce">Create Provinces</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_provinces_view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_provinces_view')}}" data-i18n="nav.dash.ecommerce">View Provinces</a>
                    </li>

                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="fas fa-city"></i><span class="menu-title" data-i18n="nav.dash.main">Cities</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin_cities_create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_cities_create')}}" data-i18n="nav.dash.ecommerce">Create city</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_cities_view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_cities_view')}}" data-i18n="nav.dash.ecommerce">View city</a>
                    </li>

                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="fas fa-industry"></i><span class="menu-title" data-i18n="nav.dash.main">Industry</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin_industry_create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_industry_create')}}" data-i18n="nav.dash.ecommerce">Create industry</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_industry_view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_industry_view')}}" data-i18n="nav.dash.ecommerce">View industry</a>
                    </li>

                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="fas fa-industry"></i><span class="menu-title" data-i18n="nav.dash.main">Salary</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('admin_salary_create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_salary_create')}}" data-i18n="nav.dash.ecommerce">Create Salary</a>
                    </li>
                    <li class="{{ request()->routeIs('admin_salary_view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('admin_salary_view')}}" data-i18n="nav.dash.ecommerce">View Salary</a>
                    </li>

                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="fas fa-industry"></i><span class="menu-title" data-i18n="nav.dash.main">FeedBack</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('user.feedback') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('user.feedback')}}" data-i18n="nav.dash.ecommerce"> User</a>
                    </li>
                    <li class="{{ request()->routeIs('company.feedback') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('company.feedback')}}" data-i18n="nav.dash.ecommerce">Company</a>
                    </li>

                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="fas fa-industry"></i><span class="menu-title" data-i18n="nav.dash.main">Scouit Mail</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('scouit-mail.view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('scouit-mail.view')}}" data-i18n="nav.dash.ecommerce"> Scouit Mail</a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('company.feedback') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('company.feedback')}}" data-i18n="nav.dash.ecommerce">Company</a>
                    </li> --}}
                </ul>

             </li>
             <li class="nav-item"><a href=""><i class="fas fa-industry"></i><span class="menu-title" data-i18n="nav.dash.main">ScouitMail-Package</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('scouitmail-package.create') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('scouitmail-package.create')}}" data-i18n="nav.dash.ecommerce"> Package-Create</a>
                    </li>
                    <li class="{{ request()->routeIs('scouitmail-package.view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('scouitmail-package.view')}}" data-i18n="nav.dash.ecommerce">View Package</a>
                    </li>
                </ul>

             </li>

             <li class="nav-item"><a href=""><i class="fas fa-industry"></i><span class="menu-title" data-i18n="nav.dash.main">Packages</span></a>
                <ul class="menu-content">
                    <li class="{{ request()->routeIs('package.view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('package.view')}}" data-i18n="nav.dash.ecommerce"> Package-Create</a>
                    </li>
                    <li class="{{ request()->routeIs('package.show') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('package.show')}}" data-i18n="nav.dash.ecommerce">View Package</a>
                    </li>
                    <li class="{{ request()->routeIs('order.view') ? 'active' : '' }}">
                        <a class="menu-item" href="{{ route('order.view')}}" data-i18n="nav.dash.ecommerce">view Orders</a>
                    </li>
                </ul>

             </li>


        </ul>
    </div>
</div>

<script src="https://kit.fontawesome.com/763be145fb.js" crossorigin="anonymous"></script>
