<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'foco' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'tXIBCmU>,2F)`m$( mohG;`J6,O9?iwnpmJ1k$r`=boZ/SsWI`a=1nk1pej0?]5$' );
define( 'SECURE_AUTH_KEY',  ':w@kTiHurtmjk~zz VdL`&(E|~ba60 J5cnq5r;EVq5>T-dw&2l~$6!cG:;stf{i' );
define( 'LOGGED_IN_KEY',    'jzyE/FNW)Nu 9spr/n>H#fag:dW6r8G*nbtnOEg-%Z `}cJZSEW9|Nk[m_t<f8,]' );
define( 'NONCE_KEY',        '$m{x/0z]q:I8]}acTYk^gB3MTWk_K`sR-Nsu|l {ExUgHcHy61<V:{m8/XxkAW]8' );
define( 'AUTH_SALT',        'DO+oXP.Mui[./i7-l,]N65BpOXFN>0+8y#UB#@lkR*T}&DWg=x%t;E*x3CN:l@:]' );
define( 'SECURE_AUTH_SALT', ']*,R5ui4[[w<?6Rx6bu7Yb{?+Wy}JlLfsIp}4>Ryl%(7Bhe*->P/,cRNffQLJv0>' );
define( 'LOGGED_IN_SALT',   'v07Ak?N&|Fehi^f}<t_^l2FCkQojq_E[/usBC|q1Gqf^Tl[G[^02%2k!XtAEGsn<' );
define( 'NONCE_SALT',       '=RPkf6{CDMA5WgU#]4t u|un];!0-noKAgK6aku62e{(ZAFmFpM1z<h:8lf;;=r9' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_DISPLAY', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
