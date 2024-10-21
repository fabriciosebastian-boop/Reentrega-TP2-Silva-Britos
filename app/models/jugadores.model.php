<?php   

class JugadoresModel {
    private $db;

    public function __construct() {
       $this->db = new PDO('mysql:host=localhost;dbname=ligas;charset=utf8', 'root', '');
    }
 
    public function getJugadores() {
        // 2. Ejecuto la consulta
        $query = $this->db->prepare('SELECT * FROM jugador');
        $query->execute();
    
        // 3. Obtengo los datos en un arreglo de objetos
        $jugadores = $query->fetchAll(PDO::FETCH_OBJ); 
    
        return $jugadores;
    }
 
    public function getJugadorById($id) {    
        $query = $this->db->prepare('SELECT * FROM jugador WHERE id_jugador = ?');
        $query->execute([$id]);   
    
        $jugador = $query->fetch(PDO::FETCH_OBJ);
    
        return $jugador;
    }
 
    public function insertJugador($id_equipo, $nombre, $posicion, $pie_habil, $nacionalidad) { 
        $query = $this->db->prepare('INSERT INTO jugador (id_jugador, id_equipo, nombre, posicion, pie_habil, nacionalidad) VALUES (NULL, ?, ?, ?, ?, ?)');
        $query->execute([$id_equipo, $nombre, $posicion, $pie_habil, $nacionalidad]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }
 
    public function eraseJugador($id) {
        $query = $this->db->prepare('DELETE FROM jugador WHERE id_jugador = ?');
        $query->execute([$id]);
    }

    public function updateJugador($id_equipo, $nombre, $posicion, $pie_habil, $nacionalidad, $id_jugador) {        
        $query = $this->db->prepare('UPDATE jugador SET id_equipo = ? , nombre = ? , posicion = ? , pie_habil = ? , nacionalidad = ? WHERE id_jugador = ?');
        $query->execute([$id_equipo, $nombre, $posicion, $pie_habil, $nacionalidad, $id_jugador]);
    }
}

    