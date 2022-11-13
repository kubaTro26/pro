<?php
define( 'WP_CACHE', true );
/**
 * Podstawowa konfiguracja WordPressa.
 *
 * Skrypt wp-config.php używa tego pliku podczas instalacji.
 * Nie musisz dokonywać konfiguracji przy pomocy przeglądarki internetowej,
 * możesz też skopiować ten plik, nazwać kopię "wp-config.php"
 * i wpisać wartości ręcznie.
 *
 * Ten plik zawiera konfigurację:
 *
 * * ustawień MySQL-a,
 * * tajnych kluczy,
 * * prefiksu nazw tabel w bazie danych,
 * * ABSPATH.
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Ustawienia MySQL-a - możesz uzyskać je od administratora Twojego serwera ** //
/** Nazwa bazy danych, której używać ma WordPress */
define('DB_NAME', 'server736453_krs-fr');

/** Nazwa użytkownika bazy danych MySQL */
define('DB_USER', 'server736453_krs-fr');

/** Hasło użytkownika bazy danych MySQL */
define('DB_PASSWORD', 's2DWf6SQB7CzE5cZ');

/** Nazwa hosta serwera MySQL */
define('DB_HOST', 'mariadb105.server736453.nazwa.pl');

/** Kodowanie bazy danych używane do stworzenia tabel w bazie danych. */
define('DB_CHARSET', 'utf8mb4');

/** Typ porównań w bazie danych. Nie zmieniaj tego ustawienia, jeśli masz jakieś wątpliwości. */
define('DB_COLLATE', '');

/**#@+
 * Unikatowe klucze uwierzytelniania i sole.
 *
 * Zmień każdy klucz tak, aby był inną, unikatową frazą!
 * Możesz wygenerować klucze przy pomocy {@link https://api.wordpress.org/secret-key/1.1/salt/ serwisu generującego tajne klucze witryny WordPress.org}
 * Klucze te mogą zostać zmienione w dowolnej chwili, aby uczynić nieważnymi wszelkie istniejące ciasteczka. Uczynienie tego zmusi wszystkich użytkowników do ponownego zalogowania się.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8!*#<)!Gp:Tu2LAgsN= W7pZER%bzMK+c ADJ3q6F`1>4sIDx5xuGSHFBy3l.;}i');
define('SECURE_AUTH_KEY',  'n=POhE@<|I%Kam@Mu8J_|=Niy)(OLp ]X8xz2 6aaFIp@C`J2Q`?&7XRA^1G1|X{');
define('LOGGED_IN_KEY',    'YQ60`?T,GU;]ovcfIlMp<2`+g5N)1lwCkS|Y>30MEx7sx@QrSY5~D$-;E@T;b$+y');
define('NONCE_KEY',        ' O+Wq}F+Be}9l]ZF$LTs/ +^D<>kiYet`Z$!^Ny>r]ENU/(v!fRR+|bj8R*SEYdK');
define('AUTH_SALT',        '*vCCkq(@GK9p*`-|%Q|droSb3gc8Jx|4M3|r2<V2akIK#g=&U(Ce--s-RP~] mcr');
define('SECURE_AUTH_SALT', 'G+7BO* +P<OD#O(+)f39`{Y<iy[e::!ZZBtehSpv`NJoqHeZGn~ec0J,h+G|}&j]');
define('LOGGED_IN_SALT',   '2!Oj*usf.Vu(xfD!MIH.}a!BB(Wx0cKAN,K$!Di$%SdeZ{hR0<E+>a8qXTF>B3^+');
define('NONCE_SALT',       'z@=%;%qW@G/bT#Ssb*$rWpk;/|z ^K5]vE~i|yQnwKL+hUN34BZ-!+Ch~>%T#1@X');

/**#@-*/

/**
 * Prefiks tabel WordPressa w bazie danych.
 *
 * Możesz posiadać kilka instalacji WordPressa w jednej bazie danych,
 * jeżeli nadasz każdej z nich unikalny prefiks.
 * Tylko cyfry, litery i znaki podkreślenia, proszę!
 */
$table_prefix  = 'krsen_';

/**
 * Dla programistów: tryb debugowania WordPressa.
 *
 * Zmień wartość tej stałej na true, aby włączyć wyświetlanie
 * ostrzeżeń podczas modyfikowania kodu WordPressa.
 * Wielce zalecane jest, aby twórcy wtyczek oraz motywów używali
 * WP_DEBUG podczas pracy nad nimi.
 *
 * Aby uzyskać informacje o innych stałych, które mogą zostać użyte
 * do debugowania, przejdź na stronę Kodeksu WordPressa.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To wszystko, zakończ edycję w tym miejscu! Miłego blogowania! */

/** Absolutna ścieżka do katalogu WordPressa. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Ustawia zmienne WordPressa i dołączane pliki. */
require_once(ABSPATH . 'wp-settings.php');
define('WP_MEMORY_LIMIT', '96M');
