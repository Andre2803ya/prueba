<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from tarea where codigo = ?;");
    $sentencia->execute([$codigo]);
    $tarea = $sentencia->fetch(PDO::FETCH_OBJ);
  
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    EDITAR TAREA:
                </div>
                <form class="p-1" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label"> </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $tarea->nombre; ?>">
                    </div>
                    
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $tarea->codigo; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>