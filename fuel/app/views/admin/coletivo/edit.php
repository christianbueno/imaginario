<?php
    echo Form::open(array('action' => "admin/coletivo/editar/$coletivo->id", 'enctype' => 'multipart/form-data')); 

    echo View::forge('admin/coletivo/_form');

    echo Form::close();

?>
