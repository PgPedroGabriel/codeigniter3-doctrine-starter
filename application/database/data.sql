INSERT INTO `module` (`id`, `owner_id`, `name`, `controller`, `class`, `version`, `fontAwesomeClass`, `date_created`, `date_updated`, `status`, `adminUrl`, `sequence`) 
VALUES 
    (NULL, NULL, 'Página inicial', 'Main', 	     null,                    '1.0', 'home',  '2015-12-29 00:00:00', '2015-12-29 00:00:00', '1', 'index', '0')
   ,(NULL, NULL, 'Usuários',       'UserAdmin', '\\Entities\\UserAdmin',  '1.0', 'users', '2015-12-29 00:00:00', '2015-12-29 00:00:00', '1', 'user',  '1')
;