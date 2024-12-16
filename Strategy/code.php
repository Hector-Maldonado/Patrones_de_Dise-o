<?php
//INTERFACE DE LA ESTRATEGIA
interface MensajeSalida
{
    public function mostrarMensaje($mensaje);
}

//Consola
class Consola implements MensajeSalida
{
    public function mostrarMensaje($mensaje)
    {
        echo $mensaje . PHP_EOL;
    }
}

//JSON
class JSON implements MensajeSalida
{
    public function mostrarMensaje($mensaje)
    {
        echo json_encode(["mensaje" => $mensaje]) . PHP_EOL;
    }
}

//ArchivoTXT
class ArchivoTXT implements MensajeSalida
{
    public function mostrarMensaje($mensaje)
    {
        file_put_contents("Strategy/mensaje.txt", $mensaje);
        echo "Mensaje escrito en mensaje.txt" . PHP_EOL;
    }
}

//CONTEXTO
class Contexto
{
    private $estrategia;

    // Constructor donde se define la estrategia inicial
    public function __construct(MensajeSalida $estrategia)
    {
        $this->estrategia = $estrategia;
    }

    // Metodo para cambiar la estrategia en cualquier momento
    public function establecerEstrategia(MensajeSalida $estrategia)
    {
        $this->estrategia = $estrategia;
    }

    // Metodo que delega la llamada a la estrategia para mostrar el mensaje
    public function mostrarMensaje($mensaje)
    {
        $this->estrategia->mostrarMensaje($mensaje);
    }
}

//USO DEL PATRON STRATEGY

// Crear las estrategias 
$consola = new Consola();
$json = new JSON();
$archivo = new ArchivoTXT();

// Crear el contexto con la estrategia inicial
$contexto = new Contexto($consola);
$contexto->mostrarMensaje("Holiwis este es un mensaje en consola");

// Cambiar la estrategia a JSON
$contexto->establecerEstrategia($json);
$contexto->mostrarMensaje("Holiwis este es un mensaje en formato JSON");

// Cambiar la estrategia a archivo TXT
$contexto->establecerEstrategia($archivo);
$contexto->mostrarMensaje("Holiwis este es un mensaje en archivo TXT");
