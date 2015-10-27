<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

define('SAVEQUERIES', true);

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'host4_sv039');

/** Имя пользователя MySQL */
define('DB_USER', 'host4_sv039');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'hlbllmac');

/** Имя сервера MySQL */
define('DB_HOST', 'host4.mysql');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'W[=f~+JtqW9ab+x)-b4Lt1JKf^=@>-]wngI>NyFOg`aFM_y^S-S&hm7VR<ahf S5');
define('SECURE_AUTH_KEY',  'M-X&;d}-9-2qR_9K_ Cz>NDu1jiT|-XnHZ<2|Y|iv8<3AyU_JIt*=yyV_t}#.]+H');
define('LOGGED_IN_KEY',    '^5]1TM7&$%|D}5tqvVkSj=:g*e8et}?u[~T $m8d5q6}yLT3bgqr$>$(J^/yhyjA');
define('NONCE_KEY',        '{g$ejZ|+AH{)q+NoGu;)by3x?+ATmizQ=;N#:bBvxz)YIHr<+k11tSsgM>P(S9B3');
define('AUTH_SALT',        '$E}<|F7`?@rS<_yB2d=_l0dN`*9n:UlXTLy_Jam|!xVe$k53a|wd6qv*/1 GA@gW');
define('SECURE_AUTH_SALT', 'mwy,C6`i103.:wNYW$|r)UK4M)>9k2EB_2P5q%%?U/]#XrV<E:+1^oA`#DBpJQ`:');
define('LOGGED_IN_SALT',   'u*1Vl%e.^~3YDBLR(`2sd77Q9bL|C3@|8U*X]A5/7`r-IZ1zJ3(`.tgBfA/0W$B]');
define('NONCE_SALT',       '9U8J+<M6xc+[!oNf| S9M@z s9oZ*kGicY+p Q|# )B76vv*8jYU/>a4%M(To^`M');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
