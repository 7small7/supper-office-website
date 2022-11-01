<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin name
    |--------------------------------------------------------------------------
    |
    | This value is the name of laravel-admin, This setting is displayed on the
    | login page.
    |
    */
    'name'                      => env("APP_NAME"),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages. You can also set it as an image by using a
    | `img` tag, eg '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    'logo'                      => '<b>秋秋</b> 软件',

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin mini logo
    |--------------------------------------------------------------------------
    |
    | The logo of all admin pages when the sidebar menu is collapsed. You can
    | also set it as an image by using a `img` tag, eg
    | '<img src="http://logo-url" alt="Admin logo">'.
    |
    */
    'logo-mini'                 => '<b>秋</b>',

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin bootstrap setting
    |--------------------------------------------------------------------------
    |
    | This value is the path of laravel-admin bootstrap file.
    |
    */
    'bootstrap'                 => app_path('Admin/bootstrap.php'),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin route settings
    |--------------------------------------------------------------------------
    |
    | The routing configuration of the admin page, including the path prefix,
    | the controller namespace, and the default middleware. If you want to
    | access through the root path, just set the prefix to empty string.
    |
    */
    'route'                     => [

        'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),

        'namespace' => '',

        'middleware' => ['web', 'admin'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin install directory
    |--------------------------------------------------------------------------
    |
    | The installation directory of the controller and routing configuration
    | files of the administration page. The default is `app/Admin`, which must
    | be set before running `artisan admin::install` to take effect.
    |
    */
    'directory'                 => app_path('Admin'),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin html title
    |--------------------------------------------------------------------------
    |
    | Html title for all pages.
    |
    */
    'title'                     => env("APP_NAME"),

    /*
    |--------------------------------------------------------------------------
    | Access via `https`
    |--------------------------------------------------------------------------
    |
    | If your page is going to be accessed via https, set it to `true`.
    |
    */
    'https'                     => env('ADMIN_HTTPS', false),

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin auth setting
    |--------------------------------------------------------------------------
    |
    | Authentication settings for all admin pages. Include an authentication
    | guard and a user provider setting of authentication driver.
    |
    | You can specify a controller for `login` `logout` and other auth routes.
    |
    */
    'auth'                      => [

        'controller' => App\Admin\Controllers\AuthController::class,

        'guard' => 'admin',

        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers'   => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Encore\Admin\Auth\Database\Administrator::class,
            ],
        ],

        // Add "remember me" to login form
        'remember'    => true,

        // Redirect to the specified URI when user is not authorized.
        'redirect_to' => 'auth/login',

        // The URIs that should be excluded from authorization.
        'excepts'     => [
            'auth/login',
            'auth/logout',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin upload setting
    |--------------------------------------------------------------------------
    |
    | File system configuration for form upload files and images, including
    | disk and upload path.
    |
    */
    'upload'                    => [

        // Disk in `config/filesystem.php`.
        'disk' => 'qiniu',

        // Image and file upload path under the disk above.
//        'directory' => [
//            'image' => 'images',
//            'file'  => 'files',
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Laravel-admin database settings
    |--------------------------------------------------------------------------
    |
    | Here are database settings for laravel-admin builtin model & tables.
    |
    */
    'database'                  => [

        // Database connection for following tables.
        'connection'             => '',

        // User tables and model.
        'users_table'            => 'admin_users',
        'users_model'            => Encore\Admin\Auth\Database\Administrator::class,

        // Role table and model.
        'roles_table'            => 'admin_roles',
        'roles_model'            => Encore\Admin\Auth\Database\Role::class,

        // Permission table and model.
        'permissions_table'      => 'admin_permissions',
        'permissions_model'      => Encore\Admin\Auth\Database\Permission::class,

        // Menu table and model.
        'menu_table'             => 'admin_menu',
        'menu_model'             => Encore\Admin\Auth\Database\Menu::class,

        // Pivot table for table above.
        'operation_log_table'    => 'admin_operation_log',
        'user_permissions_table' => 'admin_user_permissions',
        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
    ],

    /*
    |--------------------------------------------------------------------------
    | User operation log setting
    |--------------------------------------------------------------------------
    |
    | By setting this option to open or close operation log in laravel-admin.
    |
    */
    'operation_log'             => [

        'enable'          => false,

        /*
         * Only logging allowed methods in the list
         */
        'allowed_methods' => ['GET', 'HEAD', 'POST', 'PUT', 'DELETE', 'CONNECT', 'OPTIONS', 'TRACE', 'PATCH'],

        /*
         * Routes that will not log to database.
         *
         * All method to path like: admin/auth/logs
         * or specific method to path like: get:admin/auth/logs.
         */
        'except'          => [
            env('ADMIN_ROUTE_PREFIX', 'admin') . '/auth/logs*',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Indicates whether to check route permission.
    |--------------------------------------------------------------------------
    */
    'check_route_permission'    => true,

    /*
    |--------------------------------------------------------------------------
    | Indicates whether to check menu roles.
    |--------------------------------------------------------------------------
    */
    'check_menu_roles'          => true,

    /*
    |--------------------------------------------------------------------------
    | User default avatar
    |--------------------------------------------------------------------------
    |
    | Set a default avatar for newly created users.
    |
    */
    'default_avatar'            => '/vendor/laravel-admin/AdminLTE/dist/img/user2-160x160.jpg',

    /*
    |--------------------------------------------------------------------------
    | Admin map field provider
    |--------------------------------------------------------------------------
    |
    | Supported: "tencent", "google", "yandex".
    |
    */
    'map_provider'              => 'google',

    /*
    |--------------------------------------------------------------------------
    | Application Skin
    |--------------------------------------------------------------------------
    |
    | This value is the skin of admin pages.
    | @see https://adminlte.io/docs/2.4/layout
    |
    | Supported:
    |    "skin-blue", "skin-blue-light", "skin-yellow", "skin-yellow-light",
    |    "skin-green", "skin-green-light", "skin-purple", "skin-purple-light",
    |    "skin-red", "skin-red-light", "skin-black", "skin-black-light".
    |
    */
    'skin'                      => env('ADMIN_SKIN', 'skin-blue-light'),

    /*
    |--------------------------------------------------------------------------
    | Application layout
    |--------------------------------------------------------------------------
    |
    | This value is the layout of admin pages.
    | @see https://adminlte.io/docs/2.4/layout
    |
    | Supported: "fixed", "layout-boxed", "layout-top-nav", "sidebar-collapse",
    | "sidebar-mini".
    |
    */
    'layout'                    => ['sidebar-mini', 'fixed'],

    /*
    |--------------------------------------------------------------------------
    | Login page background image
    |--------------------------------------------------------------------------
    |
    | This value is used to set the background image of login page.
    |
    */
    'login_background_image'    => '',

    /*
    |--------------------------------------------------------------------------
    | Show version at footer
    |--------------------------------------------------------------------------
    |
    | Whether to display the version number of laravel-admin at the footer of
    | each page
    |
    */
    'show_version'              => true,

    /*
    |--------------------------------------------------------------------------
    | Show environment at footer
    |--------------------------------------------------------------------------
    |
    | Whether to display the environment at the footer of each page
    |
    */
    'show_environment'          => true,

    /*
    |--------------------------------------------------------------------------
    | Menu bind to permission
    |--------------------------------------------------------------------------
    |
    | whether enable menu bind to a permission
    */
    'menu_bind_permission'      => true,

    /*
    |--------------------------------------------------------------------------
    | Enable default breadcrumb
    |--------------------------------------------------------------------------
    |
    | Whether enable default breadcrumb for every page content.
    */
    'enable_default_breadcrumb' => true,

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable assets minify
    |--------------------------------------------------------------------------
    */
    'minify_assets'             => [

        // Assets will not be minified.
        'excepts' => [

        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Enable/Disable sidebar menu search
    |--------------------------------------------------------------------------
    */
    'enable_menu_search'        => true,

    /*
    |--------------------------------------------------------------------------
    | Exclude route from generate menu command
    |--------------------------------------------------------------------------
    */
    'menu_exclude'              => [
        '_handle_selectable_',
        '_handle_renderable_',
    ],

    /*
    |--------------------------------------------------------------------------
    | Alert message that will displayed on top of the page.
    |--------------------------------------------------------------------------
    */
    'top_alert'                 => '',

    /*
    |--------------------------------------------------------------------------
    | The global Grid action display class.
    |--------------------------------------------------------------------------
    */
    'grid_action_class'         => \Encore\Admin\Grid\Displayers\DropdownActions::class,

    /*
    |--------------------------------------------------------------------------
    | Extension Directory
    |--------------------------------------------------------------------------
    |
    | When you use command `php artisan admin:extend` to generate extensions,
    | the extension files will be generated in this directory.
    */
    'extension_dir'             => app_path('Admin/Extensions'),

    /*
    |--------------------------------------------------------------------------
    | Settings for extensions.
    |--------------------------------------------------------------------------
    |
    | You can find all available extensions here
    | https://github.com/laravel-admin-extensions.
    |
    */
    'extensions'                => [
        "grid-lightbox"  => [
            "enable" => true
        ],
        'wang-editor-v5' => [
            'enable'  => true,
            'content' => [
                'placeholder' => '请输入内容...',
                'height'      => '600px',
                'width'       => '100%',
                'zIndex'      => 10000,
                // 图片上传相关设置
                'uploadImage' => [
                    // 上传接口
                    'server'           => env("app_url") . '/api/upload_img',
                    // 10M 以下插入 base64
                    //'base64LimitSize'=> 10 * 1024 * 1024,
                    // form-data fieldName ，默认值 'wangeditor-uploaded-image'
                    'fieldName'        => 'laravel-admin-file',
                    // 单个文件的最大体积限制，默认为 2M
                    'maxFileSize'      => 10 * 1024 * 1024, // 10M
                    // 最多可上传几个文件，默认为 100
                    'maxNumberOfFiles' => 10,
                    // 选择文件时的类型限制，默认为 ['image/*'] 。如不想限制，则设置为 []
                    'allowedFileTypes' => ['image/*'],

                    // 自定义上传参数，例如传递验证的 token 等。参数会被添加到 formData 中，一起上传到服务端。
                    'meta'             => [
                        'token'    => 'xxx',
                        'otherKey' => 'yyy'
                    ],
                    // 将 meta 拼接到 url 参数中，默认 false
                    'metaWithUrl'      => false,
                    // 自定义增加 http  header
                    'headers'          => [
                        'Accept'   => 'text/x-json',
                        'otherKey' => 'xxx'
                    ],
                    // 跨域是否传递 cookie ，默认为 false
                    'withCredentials'  => true,
                    // 超时时间，默认为 10 秒
                    'timeout'          => 5 * 1000, // 5 秒
                ],
                //  上传视频
//                'uploadVideo' => [
//                    // 上传入口api
//                    'server'           => env("app_url") . '/api/upload_img',
//                    // form-data fieldName ，默认值 'wangeditor-uploaded-video'
//                    'fieldName'        => 'laravel-admin-file',
//                    // 单个文件的最大体积限制，默认为 10M
//                    'maxFileSize'      => 100 * 1024 * 1024, // 50M
//                    // 最多可上传几个文件，默认为 5
//                    'maxNumberOfFiles' => 3,
//                    // 选择文件时的类型限制，默认为 ['video/*'] 。如不想限制，则设置为 []
//                    'allowedFileTypes' => ['video/*'],
//                    // 自定义上传参数，例如传递验证的 token 等。参数会被添加到 formData 中，一起上传到服务端。
//                    'meta'             => [
//                        'token'    => 'xxx',
//                        'otherKey' => 'yyy'
//                    ],
//                    // 将 meta 拼接到 url 参数中，默认 false
//                    'metaWithUrl'      => false,
//                    // 自定义增加 http  header
//                    'headers'          => [
//                        'Accept'   => 'text/x-json',
//                        'otherKey' => 'xxx'
//                    ],
//                    // 跨域是否传递 cookie ，默认为 false
//                    'withCredentials'  => true,
//                    // 超时时间，默认为 30 秒
//                    'timeout'          => 30 * 1000, // 15 秒
//                    // 视频不支持 base64 格式插入
//                ]
            ]
        ]
    ],
];
