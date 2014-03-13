<?php

$config = array
    (
    /**
     * Formulario
     */
    'user/add'
    => array(
        array('field' => 'name', 'label' => 'Nombre', 'rules' => 'required|is_string|trim|xss_clean'),
        array('field' => 'username', 'label' => 'Username', 'rules' => 'required|is_string|trim|xss_clean'),
        array('field' => 'email', 'label' => 'E-Mail', 'rules' => 'required|valid_email|trim|xss_clean'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required|trim|xss_clean'),
    ),

);