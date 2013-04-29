<?php
    echo Form::open(array('action' => 'admin/config/editar', 'enctype' => 'multipart/form-data')); 
    $data['order'] = $order;
    echo View::forge('admin/config/_form', $data);

    echo Form::close();

?>
