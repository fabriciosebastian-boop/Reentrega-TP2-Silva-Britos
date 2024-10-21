<?php       
require_once 'app/models/equipos.model.php';
require_once 'app/controllers/equipos.controller.php';



class EquiposView {

    public function showEquipos($equipo) {
        require_once './templates/layout/header.phtml';
        require_once './templates/form_equipos.phtml';

        echo '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Equipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Puntos</th>
                        <th scope="col">Pj</th>
                        <th scope="col">Pg</th>
                        <th scope="col">Pe</th>
                        <th scope="col">Pp</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>';
        foreach($equipo as $equipos){
            echo '<tr>
                        <td>' . $equipos -> id_equipo . '</td>
                        <td>' . $equipos -> nombre . '</td>
                        <td>' . $equipos -> puntos . '</td>
                        <td>' . $equipos -> pj . '</td>
                        <td>' . $equipos -> pg . '</td>
                        <td>' . $equipos-> pe . '</td>
                        <td>' . $equipos-> pp . '</td>
                        <td><a href="deleteEquipo/' . $equipos->id_equipo .' " type="button" class="btn btn-danger btn-sm ml-auto">Borrar</a> </td>
                        <td><a href="editEquipo/' . $equipos->id_equipo .' " type="button" class="btn btn-danger btn-sm ml-auto">Editar</a> </td>
                </tr>';
        }
        echo '</tbody>
            </table>';


    }

    public function showEquipoId($equipo){
        require_once 'templates/layout/header.phtml';
        
            echo '<table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#Equipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Puntos</th>
                        <th scope="col">Pj</th>
                        <th scope="col">Pg</th>
                        <th scope="col">Pe</th>
                        <th scope="col">Pp</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>' . $equipo -> id_equipo . '</td>
                        <td>' . $equipo -> nombre . '</td>
                        <td>' . $equipo -> puntos . '</td>
                        <td>' . $equipo -> pj . '</td>
                        <td>' . $equipo -> pg . '</td>
                        <td>' . $equipo-> pe . '</td>
                        <td>' . $equipo-> pp . '</td>
                    </tr>
                    </tbody>
              </table>';


               
    }

    public function showEditarEquipo($equipos){
        require_once 'templates/layout/header.phtml';
        require_once 'templates/form_editarEquipos.phtml';
        require_once 'templates/layout/footer.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }     
    
}