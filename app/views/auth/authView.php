<?php
class AuthView {
    function mostrarLogin($error = null) {
        include './app/views/templates/header.phtml';
        include './app/views/auth/login.phtml';
        include './app/views/templates/footer.phtml';
    }
}
?>