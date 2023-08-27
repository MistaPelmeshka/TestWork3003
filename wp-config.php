<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'test2003' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'root' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', '' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3mP[j?/Ar%@&(EwvaA.WvPrP=omu_,Flpg^&aX;UHq:p/|I;(y%f;fw%(d;gIp;S' );
define( 'SECURE_AUTH_KEY',  'P80E7YE.+*&7lRklr.fxRlyf-zVdK6pFWnM9cbnNu-XJkA5r^PRyMWgA.lK}J#Ue' );
define( 'LOGGED_IN_KEY',    'kr{ry~u?<5na2X[bO<kC^mdc2[{)=Q)wYP 8lq:LAUp)`.Gv$I>V]UvkIv|SEZ:y' );
define( 'NONCE_KEY',        '/]X(a>u}[`.?X-y57%(c!bu~)]lbP,oT{4wip.)X2[N[`d_r%YJDFxn.Sr.np+xZ' );
define( 'AUTH_SALT',        'M5KMp0LYGX%w~qSGgBt/z@3;/y`?.LkU9/2GjlC1T48OX9^HuvIi,D4>OMlTLN&)' );
define( 'SECURE_AUTH_SALT', '7@aNb8jK[m9OZ.NZbuNeBoZqkhP:_NvA>vdXRlG>}c?;7b>lM^h0U.B&X9S!=,( ' );
define( 'LOGGED_IN_SALT',   'f4z$;8N{dPvyxqB0U5Y+@b*oJ<fhh9#-]3rUj0i {glsG<9ASB,7{!2A$T`,R+:y' );
define( 'NONCE_SALT',       'CSG|F)(_CGW:_jiWn*Er8CC7q|LBom}{G9[ScYI3@&k)_pc[xb@}B1v$3}>2#>dl' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
