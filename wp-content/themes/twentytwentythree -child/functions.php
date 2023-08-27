<?

add_filter('show_admin_bar', '__return_false');

add_filter('wpcf7_autop_or_not', '__return_false'); // убрать br у формы заявки

remove_action('wp_head',          'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles',    'print_emoji_styles');
remove_action('admin_print_styles',    'print_emoji_styles');

remove_action('wp_head', 'wp_resource_hints', 2); //remove dns-prefetch
remove_action('wp_head', 'wp_generator'); // remove meta name="generator"
remove_action('wp_head', 'wlwmanifest_link'); //remove wlwmanifest
remove_action('wp_head', 'rsd_link'); //remove editURI
remove_action('wp_head', 'rest_output_link_wp_head', 10); //remove 'https://api.w.org/
remove_action('wp_head', 'wp_shortlink_wp_head', 10); //remove shortlink
remove_action('wp_head', 'wp_oembed_add_discovery_links'); //remove alternate
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);

add_theme_support('post-thumbnails', array('post', 'page', 'product'));

add_action('wp_enqueue_scripts', 'site_scripts');

function site_scripts()
{


	/*     wp_enqueue_style('style-custom', get_template_directory_uri() . '/assets/css/style.css', array(), '0.0.0.1'); */

	wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '0.0.0.0', true);
}

add_action('admin_enqueue_scripts', 'admin_scripts');
function admin_scripts()
{
	wp_enqueue_style('style-custom', get_stylesheet_directory_uri() . '/css/style.css', array(), '0.0.0.1');

	wp_enqueue_script('main-custom-js', get_stylesheet_directory_uri() . '/js/main-admin.js', array(), '0.0.0.0', true);
}

function art_woo_add_custom_fields()
{

	global $product, $post;

	echo '<div class="options_group">'; // Группировка полей.



	woocommerce_wp_text_input(
		[
			'id'                => '_product_image',
			'label'             => 'Загрузить картинку продукции',
			'desc_tip'          => 'true',
			'type'              => 'file',
			'custom_attributes'	=> [
				'accept' 		=>	'image/*',
				'onchange' 		=>	'readURL(this)'
			],

			'description'       => 'Введите здесь значение поля',
		]

	);
?>
	<img id="see_img" width="300" height="250">
	<?
	woocommerce_wp_text_input(
		[
			'id'                => '_delete_image',
			'label'             => 'Удалить картинку',
			'type'              => 'button',
			'value'             => 'Удалить',

		]

	);

	// поле с датой.
	woocommerce_wp_text_input(
		[
			'id'                => '_product_date',
			'label'             => 'Поле с датой',
			'description'       => 'Выбрите дату',
			'type'              => 'date',
		]
	);


	// Выбор значения.
	woocommerce_wp_select(
		[
			'id'      => '_product_type',
			'label'   => 'Выпадающий список',
			'options' => [
				'rare'   => 'rare',
				'frequent'   => 'frequent',
				'unusual' => 'unusual',
			],
		]
	);


	echo '</div>'; // Закрывающий тег Группировки полей

}



add_action('woocommerce_product_options_general_product_data', 'art_woo_add_custom_fields');



function art_woo_custom_fields_save($post_id)
{

	// Сохранение картинки (нет).

	$woocommerce_product_image = $_POST['_product_image'];
	if (!empty($woocommerce_product_image)) {
		update_post_meta($post_id, '_product_image', esc_attr($woocommerce_product_image));
	}


	//сохранение даты
	$woocommerce_product_date = $_POST['_product_date'];
	if (!empty($woocommerce_product_date)) {
		update_post_meta($post_id, '_product_date', esc_attr($woocommerce_product_date));
	}
	// Сохранение выпадающего списка.
	$woocommerce_product_type = $_POST['_product_type'];
	if (!empty($woocommerce_product_type)) {
		update_post_meta($post_id, '_product_type', esc_attr($woocommerce_product_type));
	}
}

add_action('woocommerce_process_product_meta', 'art_woo_custom_fields_save', 10);


add_action('wp_ajax_create_product', 'ajax_action_create_product');
add_action('wp_ajax_nopriv_create_product', 'ajax_action_create_product');

function ajax_action_create_product()
{
	$errors = [];

	$woocommerce_product_date = $_POST['product_date'];
	if (empty($woocommerce_product_date) || !isset($woocommerce_product_date)) {
		$errors['product_date'] = 'а поле то пустое';
	}


	$woocommerce_product_date = $_POST['title_prod'];
	if (empty($woocommerce_product_date) || !isset($woocommerce_product_date)) {
		$errors['title_prod'] = 'а поле то пустое';
	}


	$woocommerce_product_date = $_POST['product_type'];
	if (empty($woocommerce_product_date) || !isset($woocommerce_product_date)) {
		$errors['product_type'] = 'а поле то пустое!';
	}


	$woocommerce_product_date = $_POST['regular_price'];
	if (empty($woocommerce_product_date) || !isset($woocommerce_product_date)) {
		$errors['regular_price'] = 'а поле то пустое!';
	}


	/* $woocommerce_product_date = $_POST['sale_price'];
	if ( empty( $woocommerce_product_date ) || ! isset($woocommerce_product_date) ) {
		$errors['sale_price'] = 'а поле то пустое!';
	}
 */
	$woocommerce_product_date = $_POST['product_image'];
	if (empty($woocommerce_product_date) || !isset($woocommerce_product_date)) {
		$errors['product_image'] = 'а поле то пустое!';
	}

	if ($errors) {
		wp_send_json_error($errors);
	} else {


		$product = new WC_Product_Simple();

		$product->set_name($_POST['title_prod']);
		$product->set_regular_price($_POST['regular_price']);
		$product->set_sale_price($_POST['sale_price']);

		$product->save();
		/* var_dump($product->id); */
		update_post_meta($product->id, '_product_date', $_POST['product_date']);
		update_post_meta($product->id, '_product_type', $_POST['product_type']);
		/* update_post_meta($product->id, '_product_image', $_POST ['product_image'] ); */

		wp_send_json_success();
	}
}



function js_variables()
{
	$variables = array(
		'ajax_url' => admin_url('admin-ajax.php')
	);
	echo ('<script type="text/javascript">window.wp_data = ' .
		json_encode($variables) .
		';</script>'
	);
}

add_action('wp_head', 'js_variables');

add_action('woocommerce_before_add_to_cart_form', 'art_get_text_field_before_add_card');
function art_get_text_field_before_add_card()
{


	$product = wc_get_product();


	$product_date  = $product->get_meta('_product_date', true);
	

	if ($product_date) :
	?>
		<div class="text-field">
			<strong>Время создания продукта: </strong>
			<?= $product_date; ?>
		</div>
	<? endif;
}

add_action('woocommerce_after_add_to_cart_form', 'art_get_text_field_after_add_card');
function art_get_text_field_after_add_card()
{
	global $post;
	$product_type = get_post_meta($post->ID, '_product_type', true);
	$product_img = get_post_meta($post->ID, '_product_image', true);

	?>



	<div><strong>Тип товара:</strong> <?= $product_type; ?></div>
	<div><strong>Думал картинку можно так вылавливать,<br>
	 но видимо нужно через media_handle_upload,<br>
	 и задавть через id изображения при создании "$product->set_image_id( указываем Id картинки загруженной );"
	 ну хотябы вывел путь</strong> <?= $product_img; ?></div>



<?
}
add_action( 'woocommerce_after_shop_loop_item_title', 'artabr_add_field_before_price', 9 );
function artabr_add_field_before_price() {
	global $post;
	$product_type = get_post_meta($post->ID, '_product_type', true);
	$product_date = get_post_meta($post->ID, '_product_date', true);
	/* $product_img = get_post_meta($post->ID, '_product_image', true); */

	?>
	<div><strong>Тип товара:</strong> <?= $product_type; ?></div>
	<!-- <div>< ?= $product_img; ?></div> -->
	<div style="margin:20px 0;"><strong>дата создания:</strong><br><?= $product_date; ?></div>
	<?
}
