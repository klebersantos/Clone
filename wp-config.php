<?php
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
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'ebit' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         '.gt 3HmAtSYKw3E$1yo#`.^qb9{%BuhaD=7@BFRORqYYu>#yb-7(A^#A&!:_<,r>' );
define( 'SECURE_AUTH_KEY',  '?`}2`qiyStcGg$:<Jg{$>_>0vSjZK#Zu8DaZ8JFaLDIramqB{8wF8IK_I,]+q77t' );
define( 'LOGGED_IN_KEY',    '&%Z%#xV7T&3eO4,<WNlm[iokFM5^v]fC]H0K90pp@E)2q<IM[jQCxXru6;HqJAFR' );
define( 'NONCE_KEY',        'Z:s<;B4f9{HK6dEn(1#*.~0=aKzO&NgJfnt,VuFel0Rx}![7IJ;r=^0;<V=z&}jU' );
define( 'AUTH_SALT',        '<ZYNWR$SjT(;?8rbPQN]Av%q:q}S7h#`9x~u$&-TF=O#.cS;x350QT?@tOKVppD}' );
define( 'SECURE_AUTH_SALT', 'NvN.^7K|C_kFG 0<;N7E)_81:5-|]!q|1pm2MsS19N`E) uJy]8p0(S(N]4d90JK' );
define( 'LOGGED_IN_SALT',   'HKpR.woMvG;DbEpkH0c@R[F#A:K#=BtA)q5uJBt@M*vI[S*67}}b(Dgn}6`a]9M|' );
define( 'NONCE_SALT',       ']$WNQ:t#]w<NeU87sNKw-~lBR=*K?{7a`OXkj!-Q$T&+cJDigm^3.TCAKP+n]G4<' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'eb_';

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
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
