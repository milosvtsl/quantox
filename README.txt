*** for setup localhost:
1. open *init.php* file in foleder *core* and type next in lines:
	'host' => 'localhost',
		'user' => 'your user name for DB',
		'password' => 'your password for DB',
		'db_name' => 'school' 
	'app_dir' => '/quantox/', if you have some other name of folder root type it

2. open *.htacces* file and type next in lines:
	RewriteBase /quantox/ , if you have some other name of folder root type it
