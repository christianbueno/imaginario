<?php
    echo Form::open(array('action' => "admin/evento/editar/$evento->id", 'enctype' => 'multipart/form-data')); 

    echo View::forge('admin/evento/_form');

    echo Form::close();

?>
