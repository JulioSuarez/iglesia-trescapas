<?php
include_once("capaNegocios.php");

try
{
    if (!empty($_POST))
    {
        $objetoNegocio=new capaNegocios($_POST["codigo"],$_POST["descripcion"] );
        if (isset($_POST["insertar"] ) )
        {
            $objetoNegocio->insertar();
        }
        if (isset($_POST["eliminar"] ) )
        {
            $objetoNegocio->eliminar();
        }
    }
}
catch(PDOException $ex)
{
    echo $ex->getMessage() ;
}
?>
<form action="capaInterfaz.php" method="post">

    <div> Codigo<input type="text" id="codigo" name="codigo" /></div>
    <div> Descripcion <input type="text" id="descripcion" name="descripcion" /></div>
    <div>
    <input type="submit" id="insertar" name="insertar" value="Insertar" />
    <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
    </div>
    
</form>
