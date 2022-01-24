<?php

$id = $_POST['id'];

require_once('class/dao.usuario.php');

$dao = DaoUsuario::getInstance()->Deletar($id);
