<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| constantes usadas en NutriSurvey
|--------------------------------------------------------------------------
*/
defined('ADMINISTRADOR')                OR define('ADMINISTRADOR', 'Administrador'); // Perfil Administrador
defined('FISCALIZADOR')                 OR define('FISCALIZADOR', 'Fiscalizador'); // Perfil Fiscalizador
defined('SUPERVISOR')                   OR define('SUPERVISOR', 'Supervisor'); // Perfil Supervisor
defined('ENCUESTADOR')                  OR define('ENCUESTADOR', 'Encuestador'); // Perfil Encuestador

defined('MYSQL_DATE_FORMAT')            OR define('MYSQL_DATE_FORMAT', '%Y-%m-%d %H:%i'); // Formato para insertat fechas en mySql
defined('VIEWS_DATE_FORMAT')            OR define('VIEWS_DATE_FORMAT', '%d/%m/%Y - %H:%i'); // Formato para mostrar fechas en vistas

defined('GRUPO_EXCLUSION')              OR define('GRUPO_EXCLUSION', 55); // Grupo de alimentos sin foto ni cálculo de porción

defined('TIPO_MEDIDA_ML')               OR define('TIPO_MEDIDA_ML', 0); // Tipo Me  dida ML
defined('TIPO_MEDIDA_GR')               OR define('TIPO_MEDIDA_GR', 1); // Tipo Medida GR

defined('RESPUESTA_SI')                 OR define('RESPUESTA_SI', 0);   // Respuesta SI
defined('RESPUESTA_NO')                 OR define('RESPUESTA_NO', -1);  // Respuesta NO

defined('TIPO_RESPUESTA_SIONO')         OR define('TIPO_RESPUESTA_SIONO', 1); // Tipo Respuesta Selección Si o No
defined('TIPO_RESPUESTA_CONSUMO')       OR define('TIPO_RESPUESTA_CONSUMO', 2); // Tipo Respuesta Ingreso Frecuencia de Consumo
defined('TIPO_RESPUESTA_IMAGEN')        OR define('TIPO_RESPUESTA_IMAGEN', 3); // Tipo Respuesta Selección Imágen
defined('TIPO_RESPUESTA_FRUTA')         OR define('TIPO_RESPUESTA_FRUTA', 4); // Tipo Respuesta Forma de consumir fruta
defined('TIPO_RESPUESTA_TAMANO')        OR define('TIPO_RESPUESTA_TAMANO', 5); // Tipo Respuesta Tamaño
defined('TIPO_RESPUESTA_MATERIAGRASA')  OR define('TIPO_RESPUESTA_MATERIAGRASA', 6); // Tipo Respuesta Materia grasa de la leche
defined('TIPO_RESPUESTA_TIPOLECHE')     OR define('TIPO_RESPUESTA_TIPOLECHE', 7); // Tipo Respuesta Tipo de leche
defined('TIPO_RESPUESTA_LACTOSA')       OR define('TIPO_RESPUESTA_LACTOSA', 8); // Tipo Respuesta Lactosa
defined('TIPO_RESPUESTA_TIPOYOGURT')    OR define('TIPO_RESPUESTA_TIPOYOGURT', 9); // Tipo Respuesta Tipo de yogurt
defined('TIPO_RESPUESTA_TIPOSEMILLAS')  OR define('TIPO_RESPUESTA_TIPOSEMILLAS', 10); // Tipo Respuesta Tipo de semillas
defined('TIPO_RESPUESTA_UMEDIDA')       OR define('TIPO_RESPUESTA_UMEDIDA', 11); // Tipo Respuesta Unidad de medida
defined('TIPO_RESPUESTA_TIPOGALLETAS')  OR define('TIPO_RESPUESTA_TIPOGALLETAS', 12); // Tipo Respuesta Tipo de galletas
defined('TIPO_RESPUESTA_CERELACNESTUM') OR define('TIPO_RESPUESTA_CERELACNESTUM', 13); // Tipo Respuesta Cerelac o Nestum
defined('TIPO_RESPUESTA_LACTEOS')       OR define('TIPO_RESPUESTA_LACTEOS', 14); // Tipo Respuesta Otros lácteos
defined('TIPO_RESPUESTA_MARCAPROD')     OR define('TIPO_RESPUESTA_MARCAPROD', 15); // Tipo Respuesta Marca del producto
defined('TIPO_RESPUESTA_INTERIORES')    OR define('TIPO_RESPUESTA_INTERIORES', 16); // Tipo Respuesta Tipo de interiores
defined('TIPO_RESPUESTA_CARNEOS')       OR define('TIPO_RESPUESTA_CARNEOS', 17); // Tipo Respuesta Productos cárneos
defined('TIPO_RESPUESTA_NOMBREPROD')    OR define('TIPO_RESPUESTA_NOMBREPROD', 18); // Tipo Respuesta Nombre del producto
defined('TIPO_RESPUESTA_TIEMPOCONSUMO') OR define('TIPO_RESPUESTA_TIEMPOCONSUMO', 19); // Tipo Respuesta Tiempo de consumo
defined('TIPO_RESPUESTA_MOTIVOCONSUMO') OR define('TIPO_RESPUESTA_MOTIVOCONSUMO', 20); // Tipo Respuesta Motivo de Consumo
defined('TIPO_RESPUESTA_ESPECIFICAR')   OR define('TIPO_RESPUESTA_ESPECIFICAR', 21); // Tipo Respuesta Especificar

defined('TIPO_RESPUESTA_ZONA')          OR define('TIPO_RESPUESTA_ZONA', 22); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_PIZCASAL')      OR define('TIPO_RESPUESTA_PIZCASAL', 23); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CUCHARAPALOSL') OR define('TIPO_RESPUESTA_CUCHARAPALOSL', 24); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_PTACUCHISAL')   OR define('TIPO_RESPUESTA_PTACUCHISAL', 25); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_SALEROINCLIN')  OR define('TIPO_RESPUESTA_SALEROINCLIN', 26); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_TAPALAPIZBIC')  OR define('TIPO_RESPUESTA_TAPALAPIZBIC', 27); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAAGUA')       OR define('TIPO_RESPUESTA_CDAAGUA', 28); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDASALMESA')    OR define('TIPO_RESPUESTA_CDASALMESA', 29); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAAZUCAR')     OR define('TIPO_RESPUESTA_CDAAZUCAR', 30); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAACEITE')     OR define('TIPO_RESPUESTA_CDAACEITE', 31); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDALECHEPVO')   OR define('TIPO_RESPUESTA_CDALECHEPVO', 32); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAHARINATT')   OR define('TIPO_RESPUESTA_CDAHARINATT', 33); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACHUCHOCA')   OR define('TIPO_RESPUESTA_CDACHUCHOCA', 34); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAAVENA')      OR define('TIPO_RESPUESTA_CDAAVENA', 35); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAHARNATRI')   OR define('TIPO_RESPUESTA_CDAHARNATRI', 36); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACAFEPLVO')   OR define('TIPO_RESPUESTA_CDACAFEPLVO', 37); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACAFEGRAN')   OR define('TIPO_RESPUESTA_CDACAFEGRAN', 38); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDASEMOLA')     OR define('TIPO_RESPUESTA_CDASEMOLA', 39); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAMAICENA')    OR define('TIPO_RESPUESTA_CDAMAICENA', 40); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACHUNO')      OR define('TIPO_RESPUESTA_CDACHUNO', 41); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDALECHPURF')   OR define('TIPO_RESPUESTA_CDALECHPURF', 42); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDABEBDALAC')   OR define('TIPO_RESPUESTA_CDABEBDALAC', 43); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACREMAADR')   OR define('TIPO_RESPUESTA_CDACREMAADR', 44); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACERELAC')    OR define('TIPO_RESPUESTA_CDACERELAC', 45); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDANESTUMTF')   OR define('TIPO_RESPUESTA_CDANESTUMTF', 46); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAMILO')       OR define('TIPO_RESPUESTA_CDAMILO', 47); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDACOLACAO')    OR define('TIPO_RESPUESTA_CDACOLACAO', 48); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAMANJAR')     OR define('TIPO_RESPUESTA_CDAMANJAR', 49); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAMIEL')       OR define('TIPO_RESPUESTA_CDAMIEL', 50); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDALECHECDS')   OR define('TIPO_RESPUESTA_CDALECHECDS', 51); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAMERMORA')    OR define('TIPO_RESPUESTA_CDAMERMORA', 52); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CDAMERDURZO')   OR define('TIPO_RESPUESTA_CDAMERDURZO', 53); // Tipo Respuesta Especificar

defined('TIPO_RESPUESTA_CUCHARADA')     OR define('TIPO_RESPUESTA_CUCHARADA', 54); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_TAZA')          OR define('TIPO_RESPUESTA_TAZA', 55); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_VASO')          OR define('TIPO_RESPUESTA_VASO', 56); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_COPA')          OR define('TIPO_RESPUESTA_COPA', 57); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_CUCHARON')      OR define('TIPO_RESPUESTA_CUCHARON', 58); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_DOSIFICADOR')   OR define('TIPO_RESPUESTA_DOSIFICADOR', 59); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_ISOTONICOS')    OR define('TIPO_RESPUESTA_ISOTONICOS', 60); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_BOTELLAS')      OR define('TIPO_RESPUESTA_BOTELLAS', 61); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_LATAS')         OR define('TIPO_RESPUESTA_LATAS', 62); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_JUGOS')         OR define('TIPO_RESPUESTA_JUGOS', 63); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_VASO_TCO')      OR define('TIPO_RESPUESTA_VASO_TCO', 64); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_VASO_PCO')      OR define('TIPO_RESPUESTA_VASO_PCO', 65); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_MINERALES')     OR define('TIPO_RESPUESTA_MINERALES', 66); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_YOGURT')        OR define('TIPO_RESPUESTA_YOGURT', 67); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_SHOTS')         OR define('TIPO_RESPUESTA_SHOTS', 68); // Tipo Respuesta Especificar
defined('TIPO_RESPUESTA_DIASALMES')     OR define('TIPO_RESPUESTA_DIASALMES', 69); // Tipo Respuesta Especificar

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', false);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code
