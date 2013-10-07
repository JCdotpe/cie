<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'conexion_A';
$active_record = TRUE;

		/*$db['conexion_A']['hostname'] = '192.168.203.178';// Desarrollo
		$db['conexion_A']['username'] = 'yechevarria';
		$db['conexion_A']['password'] = 'inei1209';*/

		 $db['conexion_A']['hostname'] = '192.168.201.43';// Yanawara
		 $db['conexion_A']['username'] = 'yechevarria';
		 $db['conexion_A']['password'] = 'inei2106';

		$db['conexion_A']['database'] = 'CIE2013';
		$db['conexion_A']['dbdriver'] = 'mssql';
		$db['conexion_A']['dbprefix'] = '';
		$db['conexion_A']['pconnect'] = TRUE;
		$db['conexion_A']['db_debug'] = TRUE;
		$db['conexion_A']['cache_on'] = FALSE;
		$db['conexion_A']['cachedir'] = '';
		$db['conexion_A']['char_set'] = 'utf8';
		//$db['conexion_A']['dbcollat'] = 'utf8_general_ci';
		$db['conexion_A']['dbcollat'] = 'utf8';
		$db['conexion_A']['swap_pre'] = '';
		$db['conexion_A']['autoinit'] = TRUE;
		$db['conexion_A']['stricton'] = FALSE;

		// Nuestra segunda base de datos:

		$db['conexion_B']['hostname'] = '192.168.201.43';// Yanawara
		$db['conexion_B']['username'] = 'yechevarria';
		$db['conexion_B']['password'] = 'inei2106';

		$db['conexion_B']['database'] = 'BDCIE2013_INFRAESTRUCTURA';
		$db['conexion_B']['dbdriver'] = 'mssql';
		$db['conexion_B']['dbprefix'] = '';
		$db['conexion_B']['pconnect'] = FALSE;
		$db['conexion_B']['db_debug'] = TRUE;
		$db['conexion_B']['cache_on'] = FALSE;
		$db['conexion_B']['cachedir'] = '';
		$db['conexion_B']['char_set'] = 'utf8';
		//$db['conexion_B']['dbcollat'] = 'utf8_general_ci';
		$db['conexion_B']['dbcollat'] = 'utf8';
		$db['conexion_B']['swap_pre'] = '';
		$db['conexion_B']['autoinit'] = FALSE;
		$db['conexion_B']['stricton'] = FALSE;
/* End of file database.php */
/* Location: ./application/config/database.php */