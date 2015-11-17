<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'plandc');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'plandc');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'lj20727lj');

/** nome do host do MySQL */
define('DB_HOST', 'mysql02.plandc.hospedagemdesites.ws');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#bs(c|a)P4xL*_<EA+ s)dw~Q}xpwB<H_=s6T8]$xsE=*nf|Sxp9)$YyGqSZSuFz');
define('SECURE_AUTH_KEY',  '^VXB[e|E#Q]ACqEJD47w3]cJ[Sw@cQ&EuFQM{kTb+H^7T=#_G~fq||6eO|b%fdsV');
define('LOGGED_IN_KEY',    'v?3gMIZ0}} V]f[cW.|qEb{TJu,QJsUQ+z]/TTAMe_iiJxz1$Umvt2:z`[dclM$Y');
define('NONCE_KEY',        'B]uv=P0mzKBG%SL9CPP2Lt !4:![<Z].DW{.eT%?e-^poy}nYvVJ_048k`&>NZQf');
define('AUTH_SALT',        'KD0wpD+bFXOj<+83~SCI$v[cknX]0Pg RZVW-^zWmaP&(ol=05dyqD|ZG8A3+EIJ');
define('SECURE_AUTH_SALT', '8pm%UtEuTa 2Zc7Yr2N)Ax=L-`dh {ZLfQ*[4*k3X2=oW v,[<%e${!(,XC|Oe`e');
define('LOGGED_IN_SALT',   '1Za<sLsc+Y-saUqLM$&Jxa.;vM(QvsSvP|z~-N6[McJ# ?j2wL _l;,&Vim6au;%');
define('NONCE_SALT',       '^f^P,(Yt>Y:yF$QA6c?nW[Dr#T^5#}*>t2zE@Cl+J-z-n/ySq098xwI@>l]B(%Eh');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');

