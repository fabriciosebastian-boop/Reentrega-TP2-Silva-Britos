 # TPE - Trabajo Practico Especial WEB 2
 
 
 ## Integrantes

- Fabricio Britos   
- Kevin Silva

## Descripcion de proyecto :
Este proyecto esta enfocado en poder obtener, insertar , actualizar y eliminar tanto jugadores como equipos de las grandes ligas. 
El sitio incluye un sistema de autenticación que permite que solo los usuarios registrados puedan agregar, editar o eliminar jugadores y equipos. Si no se inicio sesion, no se muestran ni los jugadores ni los equipos.

## Funcionalidades Principales :
-Visualización de los jugadores, ordenadas por vistas.
-Vista detallada de cada jugador y equipo, incluyendo nombre, posicion, pie habil y nacionalidad (jugadores). Nombre del equipo, puntos pj, pg, pe, pp (equipos).
-Visualización y gestión de jugadores e equipos.
-CRUD de jugadores y equipos (solo para usuarios autenticados).
-Sistema de login y logout.


## Tablas

### La tabla `jugadores` contiene:
- `id_jugador`: clave primaria (autoincremental)
- `nombre`: nombre del jugador
- `posicion`: posicion del jugador
- `pie habil`: pie habil del jugador
- `nacionalidad`: nacionalidad del jugador
- `id_equipo`: clave foránea que referencia la tabla de artistas

### La tabla `equipos` contiene:
- `id_equipo`: clave primaria (autoincremental)
- `nombre`: nombre del equipo
- `puntos`: puntos del equipo
- `pj`: partidos jugados
- `pg`: partidos ganados
- `pe`: partidos empatados
- `pp`: partidos perdidos

### La tabla `users` contiene:
- `id`: clave primaria (autoincremental)
- `email`: nombre de usuario
- `password`: contraseña almacenada de forma segura (hash)


## Instalación

### Requisitos:
- Apache
- MySQL o MariaDB

### Pasos:
1. **Clonar el repositorio** en una carpeta dentro de `/xampp/htdocs/`, por ejemplo: `/xampp/htdocs/WEB2-TPE`.
   
2. **Configurar la base de datos**: crear una base de datos llamada `ligas`. Puedes importar el script que se encuentra en la carpeta con el nombre de `ligas_definitivo.sql`, que genera las tablas y relaciones necesarias.

3. Despliegue automático de tablas: si no has importado el script SQL previamente, al ejecutar por primera vez el proyecto, se crearán las tablas con datos iniciales de ejemplo.

## Usuarios:
- Usuario administrador:
  - username: webadmin
  - password: admin
 
## Caracteristicas tecnicas:
 
- Nuestra app esta desarrollada utilizando el patrón MVC.





    






