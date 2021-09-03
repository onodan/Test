<?php
function site_scripts(){
    wp_dequeue('wp-block-library');

}
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once( 'includes/carbon-fields/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}

/*
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Theme Options' ) )
        ->add_fields( array(
            Field::make( 'text', 'crb_text', 'Text Field' ),
        ) );
}
*/

add_action( 'after_setup_theme', 'theme_support' );
function theme_support() {
	register_nav_menu( 'menu-main-header', 'Меню в шапке' );
    add_theme_support('post-thumbnails');
}

add_action( 'carbon_fields_register_fields', 'register_carbon_fields' );
function register_carbon_fields(){
    require_once( 'includes/carbon-fields-options/theme-options.php' );
    require_once( 'includes/carbon-fields-options/post-meta.php' );

}
add_action('init','create_global_variable');
function create_global_variable(){
    global $kak_doma;
    $kak_doma = [
        'phone' => carbon_get_theme_option( 'site-phone' ),
        'adress' => carbon_get_theme_option( 'site-adress' ),
        'map' => carbon_get_theme_option( 'site-map-coordinates' ),
        'instagram' => carbon_get_theme_option( 'site-instagram' ),

    ];
}



add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'product', [
		'labels' => [
			'name'               => 'Товары', // основное название для типа записи
			'singular_name'      => 'Товар', // название для одной записи этого типа
			'add_new'            => 'Добавить товар', // для добавления новой записи
			'add_new_item'       => 'Добавление товара', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование товара', // для редактирования типа записи
			'new_item'           => 'Новый товар', // текст новой записи
			'view_item'          => 'Смотреть товар', // для просмотра записи этого типа.
			'search_items'       => 'Искать товар', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'menu_name'          => 'Товары', // название меню
		],
		'menu_icon'           => 'dashicons-admin-tools',
        'public'              => true,
        'menu_position'       => 5,
		'supports'            => ['title', 'editor', 'thumbnail', 'excerpt' ], 
		'has_archive'         => false,
        'rewrite'             => ['slug' => 'products']
	] );

    register_taxonomy( 'products-categories', 'product', [
		'labels'         => [
			'name'                              => 'Категории товаров',
			'singular_name'                     => 'Категория товара',
			'search_items'                      => 'Искать категории',
			'popular_items'                     => 'Популярные категории',
			'all_items'                         => 'Все категории',
			'edit_item'                         => 'Изменить категорию',
			'update_item'                       => 'Обновить категорию',
            'add_new_item'                      => 'Добавить категорию',
			'new_item_name'                     => 'Новое название категории',
			'separate_items_with_commas'        => 'Отделить категории запятыми',
			'add_or_remove_items'               => 'Добавить или удалить категорию',
			'choose_from_most_used'             => 'Выбрать самую популярную категорию',
			'menu_name'                         => 'Категории ',
		],
		'hierarchical'          => true,
	] );
}
?>