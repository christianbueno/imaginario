<?php
    echo Form::open(array('action' => 'admin/evento/adicionar', 'enctype' => 'multipart/form-data')); 

    echo View::forge('admin/evento/_form');

    echo Form::close();

?>
