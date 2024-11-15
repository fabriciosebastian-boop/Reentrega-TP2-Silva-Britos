<?php
require_once 'app/models/jugadores.model.php';
require_once 'app/views/jugadores.view.php';

    class JugadoresController {
        private $model;
        private $view;
        private $equiposModel;

        public function __construct($res) {
            $this->model = new JugadoresModel();
            $this->view = new JugadoresView($res->user);
            $this->equiposModel = new EquiposModel();

            
        }

        public function showJugadores() {
            //obtengo los jugadores de la DB
            $jugador = $this->model->getJugadores();

             //pedimos los equipos desde aca
             $equipos = $this->equiposModel->getEquipos(); 

            //mando los jugadores a la vista
            $this->view->showJugadores($jugador, $equipos);
        }

        public function showJugadorId($id){
             
             $jugador = $this->model->getJugadorById($id);

             $this->view->showJugadorId($jugador);

        }
        
        public function addJugador() {

            if (!isset($_POST['id_equipo']) || empty($_POST['id_equipo'])) {  // verificamos dato de entrada
                return $this->view->showError('Falta completar el id_equipo');
            }

            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
                return $this->view->showError('Falta completar el nombre');
            }
        
            if (!isset($_POST['posicion']) || empty($_POST['posicion'])) {
                return $this->view->showError('Falta completar la posicion');
            }

            if (!isset($_POST['pie_habil']) || empty($_POST['pie_habil'])) {
                return $this->view->showError('Falta completar el pie habil');
            }
        
            if (!isset($_POST['nacionalidad']) || empty($_POST['nacionalidad'])) {
                return $this->view->showError('Falta completar la nacionalidad');
            }
            
            $id_equipo = $_POST['id_equipo']; 
            $nombre = $_POST['nombre'];
            $posicion = $_POST['posicion'];
            $pie_habil = $_POST['pie_habil'];
            $nacionalidad = $_POST['nacionalidad'];

        
            $id = $this->model->insertJugador($id_equipo, $nombre, $posicion, $pie_habil, $nacionalidad,);
        
            // redirijo al home 
            header('Location: ' . BASE_URL. 'jugadores');
    
    }
    public function editJugador($id){

        $jugador = $this->model->getJugadorById($id);

        $equipos = $this->equiposModel->getEquipos();

        $this->view->showEditarJugador($jugador, $equipos);
    }

    public function updateJugador()
    {
        if (!isset($_POST['id_jugador']) || empty($_POST['id_jugador'])) {
            return $this->view->showError('Falta completar el id_jugador');
        }
        if (!isset($_POST['id_equipo']) || empty($_POST['id_equipo'])) {
            return $this->view->showError('Falta completar el id_equipo');
        }

        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta completar el nombre');
        }

        if (!isset($_POST['posicion']) || empty($_POST['posicion'])) {
            return $this->view->showError('Falta completar la posicion');
        }

        if (!isset($_POST['pie_habil']) || empty($_POST['pie_habil'])) {
            return $this->view->showError('Falta completar el pie habil');
        }

        if (!isset($_POST['nacionalidad']) || empty($_POST['nacionalidad'])) {
            return $this->view->showError('Falta completar la nacionalidad');
        }

        $id_jugador = $_POST['id_jugador'];
        $id_equipo = $_POST['id_equipo'];
        $nombre = $_POST['nombre'];
        $posicion = $_POST['posicion'];
        $pie_habil = $_POST['pie_habil'];
        $nacionalidad = $_POST['nacionalidad'];


        $id = $this->model->updateJugador($id_equipo, $nombre, $posicion, $pie_habil, $nacionalidad, $id_jugador);

        // redirijo al home 
        header('Location: ' . BASE_URL . 'jugadores');
    }

    public function deleteJugador($id) {
        $jugador = $this->model->getJugadorById($id);

        if (!$jugador) {
            return $this->view->showError("No existe el jugador con el id=$id");
        }

        $this->model->eraseJugador($id);

        header('Location: ' . BASE_URL. 'jugadores');
    }

}