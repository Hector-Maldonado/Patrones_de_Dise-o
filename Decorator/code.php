<?php

// Interfaz base para los personajes
interface Personaje {
    public function obtenerDescripcion(): string;
    public function obtenerPoder(): int;
}

// Implementación de un personaje
class Guerrero implements Personaje {
    public function obtenerDescripcion(): string {
        return "Guerrero";
    }

    public function obtenerPoder(): int {
        return 50;
    }
}

class Mago implements Personaje {
    public function obtenerDescripcion(): string {
        return "Mago";
    }

    public function obtenerPoder(): int {
        return 40;
    }
}

// Clase decoradora base
abstract class ArmaDecorador implements Personaje {
    protected Personaje $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion();
    }

    public function obtenerPoder(): int {
        return $this->personaje->obtenerPoder();
    }
}

// Decorador para una espada
class Espada extends ArmaDecorador {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . " con espada";
    }

    public function obtenerPoder(): int {
        return $this->personaje->obtenerPoder() + 30;
    }
}

// Decorador para un arco
class Arco extends ArmaDecorador {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . " con arco";
    }

    public function obtenerPoder(): int {
        return $this->personaje->obtenerPoder() + 20;
    }
}

// Ejemplo
$guerrero = new Guerrero();
echo $guerrero->obtenerDescripcion() . " con poder: " . $guerrero->obtenerPoder() . "\n";

// Añadir una espada al guerrero
$guerreroConEspada = new Espada($guerrero);
echo $guerreroConEspada->obtenerDescripcion() . " con poder: " . $guerreroConEspada->obtenerPoder() . "\n";

// Crear un mago y añadirle un arco
$mago = new Mago();
echo $mago->obtenerDescripcion() . " con poder: " . $mago->obtenerPoder() . "\n";

$magoConArco = new Arco($mago);
echo $magoConArco->obtenerDescripcion() . " con poder: " . $magoConArco->obtenerPoder() . "\n";
