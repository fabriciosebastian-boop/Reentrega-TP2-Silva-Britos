<?php
require_once 'app/models/equipos.model.php';
require_once 'app/views/equipos.view.php';

    class EquiposController {
        private $model;
        private $view;

        public function __construct() {
            $this->model = new EquiposModel();
            $this->view = new EquiposView();
            
        }

        public function showEquipos() {
            //obtengo los equipos de la DB
            $equipo = $this->model->getEquipos();

            //mando los equipos a la vista
            $this->view->showEquipos($equipo);
            
        }

        public function showEquipoId($id){
            //obtengo los equipos de la DB
            $equipo = $this->model->getEquipoById($id);
            
            //mando los equipos a la vista
            $this->view->showEquipoId($equipo);

        }

        public function addEquipo() {

            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
                return $this->view->showError('Falta completar el nombre');
            }
        
            if (!isset($_POST['puntos'])) {
                return $this->view->showError('Falta completar la puntos');
            }
    
            if (!isset($_POST['pj'])) {
                return $this->view->showError('Falta completar los partidos jugados');
            }
        
            if (!isset($_POST['pg'])) {
                return $this->view->showError('Falta completar los partidos ganados');
            }

            if (!isset($_POST['pe'])) {
                return $this->view->showError('Falta completar los partidos empatados');
            }

            if (!isset($_POST['pp'])) {
                return $this->view->showError('Falta completar los partidos perdidos');
            }



             
            $nombre = $_POST['nombre'];
            $puntos = $_POST['puntos'];
            $pj = $_POST['pj'];
            $pg = $_POST['pg'];
            $pe = $_POST['pe'];
            $pp = $_POST['pp'];
    
        
            $id = $this->model->insertEquipo($nombre, $puntos, $pj, $pg, $pe, $pp);
        
            // redirijo al home 
            header('Location: ' . BASE_URL. 'equipos');
    
        }

        public function editEquipo($id){

        $equipos = $this->model->getEquipoById($id);

        $this->view->showEditarEquipo($equipos);

    }

    public function updateEquipo(){
        if (!isset($_POST['id_equipo']) || empty($_POST['id_equipo'])) {
            return $this->view->showError('Falta completar el id_equipo');
        }

        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta completar el nombre');
        }

        if (!isset($_POST['puntos'])) {
            return $this->view->showError('Faltan completar los puntos');
        }

        if (!isset($_POST['pj'])) {
            return $this->view->showError('Faltan completar los partidos jugados');
        }

        if (!isset($_POST['pg'])) {
            return $this->view->showError('Faltan completar los partidos ganados');
        }

        if (!isset($_POST['pe'])) {
            return $this->view->showError('Faltan completar los partidos empatadaos');
        }
        if (!isset($_POST['pp'])) {
            return $this->view->showError('Faltan completar los partidos perdidos');
        }


        $id_equipo = $_POST['id_equipo'];
        $nombre = $_POST['nombre'];
        $puntos = $_POST['puntos'];
        $pj = $_POST['pj'];
        $pg = $_POST['pg'];
        $pe = $_POST['pe'];
        $pp = $_POST['pp'];


        $id = $this->model->updateEquipo($id_equipo, $nombre, $puntos,$pj, $pg, $pe, $pp);

        // redirijo al home 
        header('Location: ' . BASE_URL . 'equipos');
    }


    
    }