<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

// Get All Customers
$app->get('/api/estudiantes', function(Request $request, Response $response){
    $sql = "SELECT * FROM estudiantes";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $estudiantes = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($estudiantes);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Get Single Customer
$app->get('/api/estudiante/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "SELECT * FROM estudiantes WHERE id_est = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->query($sql);
        $estudiante = $stmt->fetch(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($estudiante);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Add Customer
$app->post('/api/estudiante/add', function(Request $request, Response $response){
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $correo = $request->getParam('correo');
    $telefono_est = $request->getParam('telefono_est');
    
   

    $sql = "INSERT INTO estudiantes (nombre,apellido,correo,telefono_est) VALUES
    (:nombre,:apellido,:correo,:telefono_est)";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':nombre',         $nombre);
        $stmt->bindParam(':apellido',       $apellido);
        $stmt->bindParam(':correo',         $correo);
        $stmt->bindParam(':telefono_est',   $telefono_est);
        
     

        $stmt->execute();

        echo '{"notice": {"text": "Estudiante Added"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Update Customer
$app->put('/api/estudiante/update/{id}', function(Request $request, Response $response){
    $id_est = $request->getAttribute('id');
    $nombre = $request->getParam('nombre');
    $apellido = $request->getParam('apellido');
    $correo = $request->getParam('correo');
    $telefono_est = $request->getParam('telefono_est');
  


    $sql = "UPDATE estudiantes SET
		nombre 	        = :nombre,
		apellido 	= :apellido,
                correo		= :correo,
                telefono_est	= :telefono_est,
                
              
			WHERE id_est = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':nombre',         $nombre);
        $stmt->bindParam(':apellido',       $apellido);
        $stmt->bindParam(':correo',         $correo);
        $stmt->bindParam(':telefono_est',   $telefono_est);
        
     

        $stmt->execute();

        echo '{"notice": {"text": "Estudiante Updated"}';

    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

// Delete Customer
$app->delete('/api/estudiante/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');

    $sql = "DELETE FROM estudiantes WHERE id_est = $id";

    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Estudiante Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
