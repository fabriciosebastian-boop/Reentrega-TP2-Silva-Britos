<?php
require_once 'libs/response.php';
require_once 'app/models/jugadores.model.php';
require_once 'app/controllers/jugadores.controller.php';
require_once 'app/models/equipos.model.php';
require_once 'app/controllers/equipos.controller.php';
require_once 'app/middlewares/session.auth.middleware.php';
require_once 'app/middlewares/verify.auth.middleware.php';
require_once 'app/controllers/auth.controller.php';


define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$res = new Response();

//lee la accion 
$action = 'showLogin'; // accion por defecto si no se envia nada
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}   


// Tabla de ruteo con MVC

$params = explode('/', $action);

switch ($params[0]) {
    case 'showLogin':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
    case 'jugadores':
        sessionAuthMiddleware($res);
        if (isset($params[1])) {
            $controller = new JugadoresController($res);
            $controller->showJugadorId($params[1]);
        } else {
            $controller = new JugadoresController($res);
            $controller->showJugadores();
        }
        break;
    case 'equipos':
        if (isset($params[1])) {
            $controller = new EquiposController();
            $controller->showEquipoId($params[1]);
        } else {
            $controller = new EquiposController();
            $controller->showEquipos();
        }
        break;
    case 'addJugador':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new JugadoresController($res);
        $controller->addJugador();
    case 'editJugador':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new JugadoresController($res);
        $controller->editJugador($params[1]);
        break;
    case 'updateJugador':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new JugadoresController($res);
        $controller->updateJugador();
        break;
    case 'deleteJugador':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new JugadoresController($res);
        $controller->deleteJugador($params[1]);
        break;
    case 'addEquipo':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new EquiposController($res);
        $controller->addEquipo();
    case 'editEquipo':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new EquiposController($res);
        $controller->editEquipo($params[1]);
        break;
    case 'updateEquipo':
        sessionAuthMiddleware($res); // Setea $res->user si existe session
        verifyAuthMiddleware($res); // Verifica que el usuario esté logueado o redirige a login
        $controller = new EquiposController($res);
        $controller->updateEquipo();
        break;
    default:
        echo ("404 not found(error)");
        break;
}
