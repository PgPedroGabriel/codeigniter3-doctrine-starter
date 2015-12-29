INSERT INTO `module` (`id`, `owner_id`, `name`, `class`, `version`, `date_created`, `date_updated`, `status`, `adminUrl`, `sequence`) 
VALUES 
    (NULL, NULL, '<i class="fa fa-home"></i> Página inicial', null,                    '1.0', '2015-12-29 00:00:00', '2015-12-29 00:00:00', '1', 'index', '0')
   ,(NULL, NULL, '<i class="fa fa-users"></i> Usuários',      '\\Entities\\UserAdmin', '1.0', '2015-12-29 00:00:00', '2015-12-29 00:00:00', '1', 'user',  '1')
;