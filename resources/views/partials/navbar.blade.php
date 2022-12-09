<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="true">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        @if (Request::is('admin/article') ||
            Request::is('admin/report') ||
            Request::is('admin/dashboard') ||
            Request::is('admin/report/done'))
        @else
            <a href="{{ route('article.index') }}">
                <button type="button" class="btn capitalize font-medium text-2xl mr-6 text-gray-300"><i
                        class="fa fa-chevron-left"></i></button>
            </a>
        @endif
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="leading-normal text-sm">
                    <a class="opacity-50 text-slate-700" href="javascript:;">Home</a>
                </li>
                <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']"
                    aria-current="page">
                    @if (Request::is('admin/article'))
                        article
                    @elseif(Request::is('admin/article/create'))
                        create article
                    @elseif(Request::is('admin/dashboard'))
                        dashboard
                    @elseif(Request::is('admin/report'))
                        report
                    @elseif(Request::is('admin/report/done'))
                        report done
                    @else
                        edit article
                    @endif
                </li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">
                @if (Request::is('admin/article'))
                    article
                @elseif(Request::is('admin/article/create'))
                    create article
                @elseif(Request::is('admin/dashboard'))
                    dashboard
                @elseif(Request::is('admin/report'))
                    report
                @elseif(Request::is('admin/report/done'))
                    report done
                @else
                    edit article
                @endif
            </h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <!-- online builder btn  -->
                <!-- <li class="flex items-center">
            <a class="inline-block px-8 py-2 mb-0 mr-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro border-fuchsia-500 ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs text-fuchsia-500 hover:border-fuchsia-500 active:bg-fuchsia-500 active:hover:text-fuchsia-500 hover:text-fuchsia-500 tracking-tight-soft hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
          </li> -->
                <li class="flex items-center">
                    <div class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-slate-500">
                        <i class="fa fa-user sm:mr-1"></i>
                        <span class="hidden sm:inline capitalize">{{ Auth::user()->name }}</span>
                    </div>
                </li>
                <li class="flex items-center px-4">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="block px-0 py-2 font-semibold transition-all ease-nav-brand text-sm text-rose-900">
                        <i fixed-plugin-button-nav class="cursor-pointer fa fa-sign-out"></i>
                        <span class="hidden sm:inline capitalize">Sign Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- end Navbar -->
