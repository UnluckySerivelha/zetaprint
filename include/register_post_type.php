<?php
add_action( 'init', 'register_post_types' );

function register_post_types(){

    register_post_type( 'service', [
        'label'  => null,
        'labels' => [
            'name'               => 'Продукция', // основное название для типа записи
            'singular_name'      => 'Продукция', // название для одной записи этого типа
            'add_new'            => 'Добавить продукцию', // для добавления новой записи
            'add_new_item'       => 'Добавление продукции', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование продукции', // для редактирования типа записи
            'new_item'           => 'Новая продукция', // текст новой записи
            'view_item'          => 'Смотреть продукцию', // для просмотра записи этого типа.
            'search_items'       => 'Искать продукцию', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Продукция', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -6,
        'menu_icon'           => 'dashicons-calendar',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'action', [
        'label'  => null,
        'labels' => [
            'name'               => 'Акции и скидки', // основное название для типа записи
            'singular_name'      => 'Акция', // название для одной записи этого типа
            'add_new'            => 'Добавить акцию', // для добавления новой записи
            'add_new_item'       => 'Добавление акции', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование акции', // для редактирования типа записи
            'new_item'           => 'Новая акция', // текст новой записи
            'view_item'          => 'Смотреть акцию', // для просмотра записи этого типа.
            'search_items'       => 'Искать акции', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Акции', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -5,
        'menu_icon'           => 'dashicons-megaphone',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'gratitude', [
        'label'  => null,
        'labels' => [
            'name'               => 'Благодарности', // основное название для типа записи
            'singular_name'      => 'Благодарность', // название для одной записи этого типа
            'add_new'            => 'Добавить благодарность', // для добавления новой записи
            'add_new_item'       => 'Добавление благодарности', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование благодарности', // для редактирования типа записи
            'new_item'           => 'Новая благодарность', // текст новой записи
            'view_item'          => 'Смотреть благодарность', // для просмотра записи этого типа.
            'search_items'       => 'Искать благодарности', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Благодарности', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -4,
        'menu_icon'           => 'dashicons-format-aside',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'news', [
        'label'  => null,
        'labels' => [
            'name'               => 'Новости', // основное название для типа записи
            'singular_name'      => 'Новость', // название для одной записи этого типа
            'add_new'            => 'Добавить новость', // для добавления новой записи
            'add_new_item'       => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование новости', // для редактирования типа записи
            'new_item'           => 'Новая новость', // текст новой записи
            'view_item'          => 'Смотреть новость', // для просмотра записи этого типа.
            'search_items'       => 'Искать новости', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Новости', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -3,
        'menu_icon'           => 'dashicons-archive',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'equipment', [
        'label'  => null,
        'labels' => [
            'name'               => 'Оборудование', // основное название для типа записи
            'singular_name'      => 'Оборудование', // название для одной записи этого типа
            'add_new'            => 'Добавить оборудование', // для добавления новой записи
            'add_new_item'       => 'Добавление оборудования', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование оборудование', // для редактирования типа записи
            'new_item'           => 'Новое оборудование', // текст новой записи
            'view_item'          => 'Смотреть оборудование', // для просмотра записи этого типа.
            'search_items'       => 'Искать оборудование', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Оборудование', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
         'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -2,
        'menu_icon'           => 'dashicons-printer',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'  => array( 'equipement_category' ),
//        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

    register_post_type( 'portfolio', [
        'label'  => null,
        'labels' => [
            'name'               => 'Портфолио', // основное название для типа записи
            'singular_name'      => 'Портфолио', // название для одной записи этого типа
            'add_new'            => 'Добавить работу в портфолио', // для добавления новой записи
            'add_new_item'       => 'Добавление работы в портфолио', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование работы в портфолио', // для редактирования типа записи
            'new_item'           => 'Новая работа в портфолио', // текст новой записи
            'view_item'          => 'Смотреть работу в портфолио', // для просмотра записи этого типа.
            'search_items'       => 'Искать работы в портфолио', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Портфолио', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -1,
        'menu_icon'           => 'dashicons-images-alt',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'  => array( 'portfolio_category' ),
//        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'printhouse_services', [
        'label'  => null,
        'labels' => [
            'name'               => 'Услуги', // основное название для типа записи
            'singular_name'      => 'Услуги', // название для одной записи этого типа
            'add_new'            => 'Добавить услугу', // для добавления новой записи
            'add_new_item'       => 'Добавление услуги', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование услуги', // для редактирования типа записи
            'new_item'           => 'Новая услуга', // текст новой записи
            'view_item'          => 'Смотреть услугу', // для просмотра записи этого типа.
            'search_items'       => 'Искать услуги', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Услуги', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -1,
        'menu_icon'           => 'dashicons-images-alt',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'  => array(),
//        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
    register_post_type( 'projects', [
        'label'  => null,
        'labels' => [
            'name'               => 'Проекты', // основное название для типа записи
            'singular_name'      => 'Проекты', // название для одной записи этого типа
            'add_new'            => 'Добавить проект', // для добавления новой записи
            'add_new_item'       => 'Добавление проекта', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
            'new_item'           => 'Новый проект', // текст новой записи
            'view_item'          => 'Смотреть проект', // для просмотра записи этого типа.
            'search_items'       => 'Искать проекты', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Проекты', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        'show_in_nav_menus'   => true, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => -1,
        'menu_icon'           => 'dashicons-images-alt',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'  => array(),
//        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
    ] );

}


//хук в init action и вызов create_book_taxonomies когда хук сработает
add_action( 'init', 'create_equipment_categories_taxonomy', 0 );
add_action( 'init', 'create_portfolio_categories_taxonomy', 0 );
add_action( 'init', 'create_projects_categories_taxonomy', 0 );

//задаем название для произвольной таксономии Topics для ваших записей

function create_equipment_categories_taxonomy() {

// Добавляем новую таксономию, делаем ее иерархической вроде рубрик
// также задаем перевод для интерфейса

    $labels = array(
        'name' => _x( 'Категории оборудования', 'taxonomy general name' ),
        'singular_name' => _x( 'Категория оборудования', 'taxonomy singular name' ),
        'search_items' =>  __( 'Искать категории оборудования' ),
        'all_items' => __( 'Все категории оборудования' ),
        'parent_item' => __( 'Родительская категория оборудования' ),
        'parent_item_colon' => __( 'Родительская категория оборудования:' ),
        'edit_item' => __( 'Редактировать категорию оборудования' ),
        'update_item' => __( 'Обновить категорию оборудования' ),
        'add_new_item' => __( 'Добавить новую категорию оборудования' ),
        'new_item_name' => __( 'Имя новой категории оборудования' ),
        'menu_name' => __( 'Категории оборудования' ),
    );

// Теперь регистрируем таксономию

    register_taxonomy('equipement_category',array('equipment'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'equipement_category' ),
    ));

}

function create_portfolio_categories_taxonomy() {

// Добавляем новую таксономию, делаем ее иерархической вроде рубрик
// также задаем перевод для интерфейса

    $labels = array(
        'name' => _x( 'Категории портфолио', 'taxonomy general name' ),
        'singular_name' => _x( 'Категория портфолио', 'taxonomy singular name' ),
        'search_items' =>  __( 'Искать категории портфолио' ),
        'all_items' => __( 'Все категории портфолио' ),
        'parent_item' => __( 'Родительская категория портфолио' ),
        'parent_item_colon' => __( 'Родительская категория портфолио:' ),
        'edit_item' => __( 'Редактировать категорию портфолио' ),
        'update_item' => __( 'Обновить категорию портфолио' ),
        'add_new_item' => __( 'Добавить новую категорию портфолио' ),
        'new_item_name' => __( 'Имя новой категории портфолио' ),
        'menu_name' => __( 'Категории портфолио' ),
    );

// Теперь регистрируем таксономию

    register_taxonomy('portfolio_category',array('portfolio'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio_category' ),
    ));

}
function create_projects_categories_taxonomy() {

// Добавляем новую таксономию, делаем ее иерархической вроде рубрик
// также задаем перевод для интерфейса

    $labels = array(
        'name' => _x( 'Категории проектов', 'taxonomy general name' ),
        'singular_name' => _x( 'Категория проектов', 'taxonomy singular name' ),
        'search_items' =>  __( 'Искать категории проектов' ),
        'all_items' => __( 'Все категории проектов' ),
        'parent_item' => __( 'Родительская категория проектов' ),
        'parent_item_colon' => __( 'Родительская категория проектов:' ),
        'edit_item' => __( 'Редактировать категорию проектов' ),
        'update_item' => __( 'Обновить категорию проектов' ),
        'add_new_item' => __( 'Добавить новую категорию проектов' ),
        'new_item_name' => __( 'Имя новой категории проектов' ),
        'menu_name' => __( 'Категории проектов' ),
    );

// Теперь регистрируем таксономию

    register_taxonomy('projects_category',array('projects'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'projects_category' ),
    ));

}