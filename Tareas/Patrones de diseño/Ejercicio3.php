<?php
// Interfaz base del personaje
interface GameCharacter {
    public function getDescription();
    public function getAttackPower();
}

// Personajes
class Warrior implements GameCharacter {
    public function getDescription() {
        return "Guerrero";
    }
    
    public function getAttackPower() {
        return 10;
    }
}

class Mage implements GameCharacter {
    public function getDescription() {
        return "Mago";
    }
    
    public function getAttackPower() {
        return 8;
    }
}

// Decorator abstracto
abstract class WeaponDecorator implements GameCharacter {
    protected $character;
    
    public function __construct(GameCharacter $character) {
        $this->character = $character;
    }
    
    abstract public function getDescription();
    abstract public function getAttackPower();
}

// Decorators concretos para diferentes armas
class SwordDecorator extends WeaponDecorator {
    public function getDescription() {
        return $this->character->getDescription() . " con Espada";
    }
    
    public function getAttackPower() {
        return $this->character->getAttackPower() + 15;
    }
}

class StaffDecorator extends WeaponDecorator {
    public function getDescription() {
        return $this->character->getDescription() . " con Bastón Mágico";
    }
    
    public function getAttackPower() {
        return $this->character->getAttackPower() + 12;
    }
}

class BowDecorator extends WeaponDecorator {
    public function getDescription() {
        return $this->character->getDescription() . " con Arco";
    }
    
    public function getAttackPower() {
        return $this->character->getAttackPower() + 10;
    }
}

// Uso
// Crear personajes base
$warrior = new Warrior();
$mage = new Mage();

echo "Personajes base:<br>";
echo "- " . $warrior->getDescription() . " - Poder: " . $warrior->getAttackPower() . "<br>";
echo "- " . $mage->getDescription() . " - Poder: " . $mage->getAttackPower() . "<br>";

// Añadir armas usando decorators
$warriorWithSword = new SwordDecorator($warrior);
$mageWithStaff = new StaffDecorator($mage);
$warriorWithBow = new BowDecorator($warrior);

echo "Personajes con armas:<br>";
echo "- " . $warriorWithSword->getDescription() . " - Poder: " . $warriorWithSword->getAttackPower() . "<br>";
echo "- " . $mageWithStaff->getDescription() . " - Poder: " . $mageWithStaff->getAttackPower() . "<br>";
echo "- " . $warriorWithBow->getDescription() . " - Poder: " . $warriorWithBow->getAttackPower() . "<br>";

// Combinación múltiple de decorators
$superWarrior = new SwordDecorator(new BowDecorator($warrior));
echo "Personaje con múltiples armas:<br>";
echo "- " . $superWarrior->getDescription() . " - Poder: " . $superWarrior->getAttackPower() . "<br><br>";
?>