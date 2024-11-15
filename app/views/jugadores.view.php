<?php       
require_once 'app/models/jugadores.model.php';
require_once 'app/controllers/jugadores.controller.php';


class JugadoresView {
    private $user = null;

    public function __construct($user) {
        $this->user = $user;
    }

    public function showJugadores($jugadores, $equipos) {
        require_once './templates/layout/header.phtml';
        require_once './templates/form_jugadores.phtml';

        echo '<table class="table">
                <thead>
                <tr>
                    <th scope="col">#Equipo</th>
                    <th scope="col">#Jugador</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Posicion</th>
                    <th scope="col">Pie Habil</th>
                    <th scope="col">Nacionalidad</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    
                </tr>
                </thead>
            <tbody>';
        foreach($jugadores as $jugador){
            echo '<tr>
                    <td>' . $jugador -> id_equipo . '</td>
                    <td>' . $jugador -> id_jugador . '</td>
                    <td>' . $jugador -> nombre . '</td>
                    <td>' . $jugador -> posicion . '</td>
                    <td>' . $jugador -> pie_habil . '</td>
                    <td>' . $jugador -> nacionalidad . '</td>
                    <td>   <a href="deleteJugador/' . $jugador->id_jugador .' " type="button" class="btn btn-danger btn-sm ml-auto">Borrar</a> </td>
                    <td>   <a href="editJugador/' . $jugador->id_jugador .' " type="button" class="btn btn-danger btn-sm ml-auto">Editar</a> </td>
                </tr>';
            }
            echo '</tbody>
            </table>';

            require_once 'templates/layout/footer.phtml';
        

    }
    public function showJugadorId($jugador){
        require_once './templates/layout/header.phtml';
        echo '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Equipo</th>
                        <th scope="col">#Jugador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Posicion</th>
                        <th scope="col">Pie Habil</th>
                        <th scope="col">Nacionalidad</th>
                    </tr>  
                    </thead>
                    <tbody>
                    <tr>
                        <td>' . $jugador -> id_equipo . '</td>
                        <td>' . $jugador -> id_jugador . '</td>
                        <td>' . $jugador -> nombre . '</td>
                        <td>' . $jugador -> posicion . '</td>
                        <td>' . $jugador -> pie_habil . '</td>
                        <td>' . $jugador -> nacionalidad . '</td>
                    </tr>
                    </tbody>
              </table>';

              
            }

    public function showEditarJugador($jugador, $equipos){
        require_once './templates/layout/header.phtml';
        require_once './templates/form_editarJugador.phtml';
        require_once './templates/layout/footer.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }     
   
}

    