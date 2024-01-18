<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => '',
    'title_postfix' => '| Sirem',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<h2> SIREM</h2>',
    'logo_img' => null,
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => '',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'true',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cog',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        [
            'type' => 'fullscreen-widget',
            'topnav_right' => true,
        ],
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
        [
            'text' => 'blog',
            'url' => 'admin/blog',
            'can' => 'manage-blog',
        ],
        [
            'text' => 'Dashboard',
            'url' => 'home',
            'icon' => 'fas fa-fw fa-home',
            'label_color' => 'primary',
        ],
        [
            'text' => 'Catalogos',
            'icon' => 'fas fa-solid fa-bars',
            'can' => 'cargos.index',
            'submenu' => [
                [
                    'text' => 'Cargo',
                    'route' => 'cargos.index',
                    'icon' => 'fas fa-solid fa-address-book',
                    'can' => 'cargos.index',
                ],
                [
                    'text' => 'Consanguiniedad',
                    'route' => 'consanguiniedades.index',
                    'icon' => 'fab fa-adn',
                    'can' => 'consanguiniedades.index',
                ],
                [
                    'text' => 'Asignaturas',
                    'route' => 'asignaturas.index',
                    'icon' => 'fas fa-solid fa-book',
                    'can' => 'asignaturas.index',
                ],
                [
                    'text' => 'Secciones',
                    'route' => 'seccion.index',
                    'icon' => 'fas fa-house-user',
                    'can' => 'seccion.index',
                ],
                [
                    'text' => 'Turnos',
                    'route' => 'turnos.index',
                    'icon' => 'fas fa-window-restore',
                    'can' => 'turnos.index',
                ],
                [
                    'text' => 'Cortes-Evaluativos',
                    'route' => 'cevaluativos.index',
                    'icon' => 'fas fa-solid fa-copyright',
                    'can' => 'cevaluativos.index',
                ],
                [
                    'text' => 'Grados',
                    'route' => 'grados.index',
                    'icon' => 'fas fa-solid fa-user-graduate',
                    'can' => 'cevaluativos.index',
                ],
                [
                    'text' => 'Nivel Academico',
                    'route' => 'nivelacademic.index',
                    'icon' => 'fas fa-graduation-cap',
                    'can' => 'nivelacademic.index',
                ],
                [
                    'text' => 'Profesion',
                    'route' => 'profession.index',
                    'icon' => 'fas fa-solid fa-user-tie',
                    'can' => 'profession.index',
                ],
                [
                    'text' => 'Tipo de Matricula',
                    'route' => 'tmatricula.index',
                    'icon' => 'fas fa-solid fa-file-signature',
                    'can' => 'tmatricula.index',
                ],
            ],
        ],
        [
            'text' => 'Registro',
            'icon' => 'fas fa-solid fa-layer-group',
            'can' => 'estudiantes.index',
            'submenu' => [
                [
                    'text' => 'Estudiantes',
                    'route' => 'estudiantes.index',
                    'icon' => 'fas fa-solid fa-user-graduate',
                    'can' => 'estudiantes.index',
                ],
                [
                    'text' => 'Tutores',
                    'route' => 'tutores.index',
                    'icon' => 'fas fa-user-friends',
                    'can' => 'tutores.index',
                ],
                [
                    'text' => 'Matriculas',
                    'route' => 'matriculas.index',
                    'icon' => 'fas fa-solid fa-briefcase',
                    'can' => 'matriculas.index',
                ],
                [
                    'text' => 'Reportes Matriculas',
                    'url' => '/reporte-matricula',
                    'icon' => 'fas fa-solid fa-clipboard-list',
                ],
                [
                    'text' => 'Reportes Estudiantes',
                    'url' => '/reporte-estudiantes',
                    'icon' => 'fas fa-solid fa-clipboard-list',
                ],
            ],
        ],
        [
            'text' => 'Academia',
            'icon' => 'fas fa-solid fa-school',
            'can' => 'asignaturadocente.index',
            'submenu' => [
 
                [
                    'text' => 'Organización Academica',
                    'route' => 'organizacionacademica.index',
                    'icon' => 'fas fa-sitemap',
                    'can' => 'organizacionacademica.index',
                ],
                [
                    'text' => 'Grupos',
                    'route' => 'grupos.index',
                    'icon' => 'fas fa-solid fa-users',
                    'can' => 'grupos.index',
                ],
                [
                    'text' => 'Reportes Academia',
                    'url' => '/reporte-academia',
                    'icon' => 'fas fa-solid fa-clipboard-list',
                ],
            ],
        ],
        [
            'text' => 'Recursos Humanos',
            'icon' => 'fas fa-solid fa-address-book',
            'can' => 'empleados.index',
            'submenu' => [
                [
                    'text' => 'Empleados',
                    'route' => 'empleados.index',
                    'icon' => 'fas fa-solid fa-layer-group',
                    'can' => 'empleados.index',
                ],

            ],
        ],

        [
            'text' => 'Calificaciones',
            'icon' => 'fas fa-solid fa-address-book',
            'submenu' => [
                [
                    'text' => 'Registro Calificaciones',
                    'route' => 'calificaciones.index',
                    'icon' => 'fas fa-solid fa-book',
                ],
                [
                    'text' => 'Reportes Calificaciones',
                    'url' => '/reporte-calificaciones',
                    'icon' => 'fas fa-solid fa-clipboard-list',
                ],
            ],
        ],

        ['header' => 'CONFIGURACION DE CUENTA'],
        [
            'text' => 'Usuarios',
            'route' => 'users.index',
            'icon' => 'fas fa-users fa-fw',
            'can' => 'admin/users.index',
        ],
        [
            'text' => 'Cambio de Contraseña',
            'url' => '/home',
            'icon' => 'fas fa-fw fa-lock',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' =>
                        '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' =>
                        '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' =>
                        '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' =>
                        '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' =>
                        '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' =>
                        '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' =>
                        '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' =>
                        '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
            'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
