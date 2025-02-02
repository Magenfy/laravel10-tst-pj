<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">

        <!-- Application Logo -->
        <x-application-logo />

        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200" icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200" icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">{{ __('MENU') }}</li>
            <li>
                <a href="#" class="navItem {{ (request()->is('dashboard*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Dashboard') }}</span>
                    </span>
                </a>
            </li>
            <li class="sidebar-menu-title">{{ __('CATEGORIAS') }}</li>
            <li>
                <a href="{{ route('category.index') }}" class="navItem {{ (request()->is('category*')) ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>{{ __('Categorias') }}</span>
                    </span>
                </a>
            </li>

            <li class="{{ (request()->is('products*')) || (request()->is('products*')) ? 'active' : '' }}">
                <a href="#" class="navItem">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:shopping-bag"></iconify-icon>
                        <span>{{ __('Produtos') }}</span>
                    </span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('products.index') }}" class="navItem {{ (\Request::route()->getName() == 'products.index') ? 'active' : '' }}">{{ __('Listar Produtos') }}</a>
                    </li>
                    <li>
                        <a href="#" class="navItem {{ (\Request::route()->getName() == 'produtocontent.index') ? 'active' : '' }}">{{ __('Listar Produtos Api') }}
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- End: Sidebar -->