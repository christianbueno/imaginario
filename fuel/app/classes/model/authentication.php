<?php 

class Model_Authentication extends \Orm\Model 
{
    protected static $_belongs_to = array('user');
    protected static $_table_name = 'authentications';
}