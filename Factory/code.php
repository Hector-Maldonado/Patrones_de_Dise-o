<?php 

// Clase abstracta para los personajes
abstract class Personaje {
    // Método abstracto que cada personaje debe implementar
    abstract public function atacar();
}

// Clase Esqueleto
class Esqueleto extends Personaje {
    public function atacar() {
        return "Esqueleto ataca con golpes.";
    }
}

// Clase Zombi
class Zombi extends Personaje {
    public function atacar() {
        return "Zombi ataca con mordiscos.";
    }
}

// Clase PersonajeFactory
class PersonajeFactory {
    public static function crearPersonaje(string $nivel): Personaje {
        if ($nivel === 'facil') {
            return new Esqueleto();
        } elseif ($nivel === 'dificil') {
            return new Zombi();
        } else {
            throw new Exception("Nivel no válido.");
        }
    }
}

// Uso del programa
try {
    // Cambia a 'facil' o 'dificil'
    $nivel = 'dificil'; 
    $personaje = PersonajeFactory::crearPersonaje($nivel);
    echo $personaje->atacar();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>