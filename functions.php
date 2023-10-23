<?php
define('THEME_DIR', get_template_directory_uri());
require_once "include/utm_cookie.php";
require_once "include/cf7_to_amo.php";
require_once "include/enqueue.php";
require_once "include/register_post_type.php";
require_once "include/kama_breadcrumbs.php";
//require_once "include/breadcrumbs.php";
add_theme_support('title-tag');
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_action('after_setup_theme', 'theme_register_nav_menu');


add_action('init', 'pw24_post_type_rewrite');
add_action('pre_get_posts', 'pw24_add_post_type_to_get_posts_request');
mb_internal_encoding("UTF-8");
function mb_ucfirst($text)
{
    return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
}

function pw24_post_type_rewrite()
{
    global $wp_rewrite;

    // в данном случае тип записи - printhouse_services
    $wp_rewrite->add_rewrite_tag("%printhouse_services%", '([^/]+)', "printhouse_services=");
    $wp_rewrite->add_permastruct('printhouse_services', '%printhouse_services%');
}

function pw24_add_post_type_to_get_posts_request($query)
{

    if (is_admin() || !$query->is_main_query())
        return; // не основной запрос

    // не запрос с name параметром (как у постоянной страницы)
    if (!isset($query->query['page']) || empty($query->query['name']) || count($query->query) != 2)
        return;

    // добавляем 'printhouse_services'
    $query->set('post_type', ['post', 'page', 'printhouse_services']);
}

function theme_register_nav_menu()
{
    register_nav_menu('main_nav', 'Навигация по сайту');
    register_nav_menu('production', 'Продукция');
    register_nav_menu('production_outer', 'Продукция (внешнее)');
    register_nav_menu('inner-menu', 'Внутреннее меню');
    register_nav_menu('mobile_menu', 'Мобильное меню');
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Общие настройки',
        'menu_title' => 'Общие настройки',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_themes',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Контакты',
        'menu_title' => 'Контакты',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Доставка (общий блок)',
        'menu_title' => 'Доставка',
        'parent_slug' => 'theme-general-settings',
    ));

}

function isMobile()
{
    return preg_match('/(Mobile|Android|Tablet|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis', $_SERVER["HTTP_USER_AGENT"]);
}

function getWhatsappLink($number)
{
    if (isMobile()) {
        $link = 'whatsapp://send?phone=' . $number;
    } else {
        $link = 'https://web.whatsapp.com/send/?phone=' . $number;
    }

    return $link;
}

add_filter('wpcf7_autop_or_not', '__return_false');


/* Remove editor from posts */
function remove_editor()
{
    remove_post_type_support('post', 'editor');
}

add_action('admin_init', 'remove_editor');

/* Remove srcset from wysiwig img */

add_filter('wp_calculate_image_srcset_meta', '__return_null');
add_filter('wp_calculate_image_sizes', '__return_false', 99);
remove_filter('the_content', 'wp_make_content_images_responsive');


function remove_editor2()
{
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'tpl-secondary.php':
                // the below removes 'editor' support for 'pages'
                // if you want to remove for posts or custom post types as well
                // add this line for posts:
                // remove_post_type_support('post', 'editor');
                // add this line for custom post types and replace
                // custom-post-type-name with the name of post type:
                // remove_post_type_support('custom-post-type-name', 'editor');
                remove_post_type_support('page', 'editor');
                break;
            default :
                // Don't remove any other template.
                break;
        }
    }
}

add_action('init', 'remove_editor2');

add_filter('wpcf7_form_hidden_fields', 'utm_func', 1, 10);
function utm_func($fields)
{
    $keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'yclid', 'utm_referrer', 'roistat', 'referrer', 'openstat_service', 'openstat_campaign', 'openstat_ad', 'openstat_source', 'from', 'gclientid', 'gclientid', '_ym_uid', '_ym_counter', 'gclid', 'fbclid');

    foreach ($keys as $row) {
        if ($_GET[$row]) {
            $fields[$row] = $_GET[$row];
        } elseif ($_COOKIE[$row]) {
            $fields[$row] = $_COOKIE[$row];
        } else {
            $fields[$row] = "";
        }
    }
    return $fields;
}

# Отключение провайдера карт сайтов: пользователи и таксономии
add_filter('wp_sitemaps_add_provider', 'kama_remove_sitemap_provider', 10, 2);

function kama_remove_sitemap_provider($provider, $name)
{

    $remove_providers = ['users', 'taxonomies'];

    // отключаем архивы пользователей
    if (in_array($name, $remove_providers)) {
        return false;
    }

    return $provider;
}

# Удалим тип записи из карты сайта
add_filter('wp_sitemaps_post_types', 'wpkama_remove_sitemaps_post_types');

function wpkama_remove_sitemaps_post_types($post_types)
{

    unset($post_types['post']);
    unset($post_types['projects']);
    unset($post_types['gratitude']);
    unset($post_types['equipment']);
    unset($post_types['portfolio']);

    return $post_types;
}

// добавляет новую крон задачу
add_action('admin_head', 'my_activation');
function my_activation()
{
    if (!wp_next_scheduled('my_daily_event')) {
        wp_schedule_event(time(), 'daily', 'my_daily_event');
    }
}

// добавляем функцию к указанному хуку
add_action('my_daily_event', 'cron_update_amo_token');
function cron_update_amo_token()
{
    update_amo_token();
}

/**
 * Start output buffer before wpseo head.
 */
function my_pre_wpseo_head()
{
    ob_start();
}

add_action('wp_head', 'my_pre_wpseo_head', -PHP_INT_MAX);

/**
 * Modify and output wpseo head.
 */
function my_post_wpseo_head()
{
    $head = ob_get_clean();
    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    echo str_replace(['<title>', '<meta name="description" ', '<meta name="keywords" '], ['<title itemprop="name">', '<meta name="description" itemprop="description" ', '<meta name="keywords" itemprop="keywords" '], $head);
}

add_action('wpseo_head', 'my_post_wpseo_head', PHP_INT_MAX);


function my_sitemap_exclude_post_type($excluded, $post_type)
{
    $excludedPostTypes = array('action', 'gratitude', 'portfolio', 'projects');
    if (in_array($post_type, $excludedPostTypes))
        return true;
    return false;
}

add_filter('wpseo_sitemap_exclude_post_type', 'my_sitemap_exclude_post_type', 10, 2);


// Редактор может редактировать только вакансии
function mypo_parse_query_useronly($wp_query)
{
    if (strpos($_SERVER['REQUEST_URI'], '/wp-admin/edit.php') !== false) {
        if (!current_user_can('activate_plugins')) {
            add_action('views_edit-post', 'child_remove_some_post_views');
            global $current_user;
            $wp_query->set('author', $current_user->id);
        }
    }
}

add_filter('parse_query', 'mypo_parse_query_useronly');

/**
 * Remove All, Published and Trashed posts views.
 *
 * Requires WP 3.1+.
 * @param array $views
 * @return array
 */
function child_remove_some_post_views($views)
{
    unset($views['all']);
    unset($views['publish']);
    unset($views['trash']);
    unset($views['draft']);
    unset($views['pending']);
    return $views;
}

add_action("admin_menu", "remove_menus");
function remove_menus()
{

    global $current_user;

    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);


    if ($user_role == 'editor') {
        remove_menu_page("index.php");                # Консоль
        remove_menu_page("edit.php");                 # Записи
        remove_menu_page("edit.php?post_type=projects");                 # Записи
        remove_menu_page("edit.php?post_type=portfolio");                 # Записи
        remove_menu_page("edit.php?post_type=equipment");                 # Записи
        remove_menu_page("edit.php?post_type=news");                 # Записи
        remove_menu_page("edit.php?post_type=gratitude");                 # Записи
        remove_menu_page("edit.php?post_type=action");                 # Записи
        remove_menu_page("edit.php?post_type=service");                 # Записи
        remove_menu_page("edit.php?post_type=printhouse_services");                 # Записи
        remove_menu_page("wpseo_workouts");                 # Записи
        remove_menu_page("wpcf7");                 # Записи
        remove_menu_page("profile");                 # Записи
        remove_menu_page("acf-options");                 # Записи
        remove_menu_page("edit-comments.php");        # Комментарии
        remove_menu_page("upload.php");               # Медиафайлы
        remove_menu_page("themes.php");               # Внешний вид
        remove_menu_page("plugins.php");              # Плагины
        remove_menu_page("users.php");                # Пользователи
        remove_menu_page("tools.php");                # Инструменты
        remove_menu_page("options-general.php");      # Параметры
        remove_menu_page("edit.php?post_type=acf-field-group"); # ACF
        remove_menu_page( 'edit.php?post_type=acf' );

        echo '<style type="text/css">#toplevel_page_theme-general-settings{display:none;}</style>';
    }
}