<?php
class UsuarioModel {
    function getUser($usuario) {
        
        if ($usuario == 'webadmin') {
            return ['usuario' => 'webadmin', 'password' => password_hash('webadmin', PASSWORD_DEFAULT)];
        }
        return null;
    }
}