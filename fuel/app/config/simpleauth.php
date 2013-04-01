<?php

return array(    
    'groups' => array(
        -1   => array('name' => 'Banned', 'roles' => array('banned')),
        0    => array('name' => 'Convidados', 'roles' => array()),
        1    => array('name' => 'Usuários', 'roles' => array('user')),
        50   => array('name' => 'Colaboradores', 'roles' => array('user', 'colaborator')),
        100  => array('name' => 'Administradores', 'roles' => array('user', 'colaborator', 'admin')),        
    ),
);