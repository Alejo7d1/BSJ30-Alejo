<?php
// Patron Factory para creación de personajes
interface Character {
    public function attack();
    public function getSpeed();
}

class Skeleton implements Character {
    public function attack() {
        return "Esqueleto ataca con arco y flecha";
    }
    
    public function getSpeed() {
        return 5;
    }
    
    public function __toString() {
        return "Esqueleto - Velocidad: " . $this->getSpeed();
    }
}

class Zombi implements Character {
    public function attack() {
        return "Zombi ataca con mordida infectada";
    }
    
    public function getSpeed() {
        return 3;
    }
    
    public function __toString() {
        return "Zombi - Velocidad: " . $this->getSpeed();
    }
}

class CharacterFactory {
    public static function createCharacter($level) {
        switch (strtolower($level)) {
            case 'fácil':
            case 'facil':
            case 'easy':
                return new Skeleton();
            case 'difícil':
            case 'dificil':
            case 'hard':
                return new Zombi();
            default:
                throw new Exception("Nivel no válido");
        }
    }
}

// Uso
try {
    $easyCharacter = CharacterFactory::createCharacter('fácil');
    echo "Nivel fácil: " . $easyCharacter . "<br>";
    echo "Ataque: " . $easyCharacter->attack() . "<br><br>";
    
    $hardCharacter = CharacterFactory::createCharacter('difícil');
    echo "Nivel difícil: " . $hardCharacter . "<br>";
    echo "Ataque: " . $hardCharacter->attack() . "<br><br>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}
?>