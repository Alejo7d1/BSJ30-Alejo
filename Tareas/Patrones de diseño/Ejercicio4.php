<?php
// Patron Strategy

// Interfaz Strategy
interface OutputStrategy {
    public function display($data);
}

// Estrategias concretas
class ConsoleOutput implements OutputStrategy {
    public function display($data) {
        echo "=== SALIDA POR CONSOLA ===<br>";
        print_r($data);
        echo "<br>";
    }
}

class JsonOutput implements OutputStrategy {
    public function display($data) {
        echo "=== SALIDA JSON ===<br>";
        echo json_encode($data, JSON_PRETTY_PRINT) . "<br>";
    }
}

class TextFileOutput implements OutputStrategy {
    private $filename;
    
    public function __construct($filename = 'output.txt') {
        $this->filename = $filename;
    }
    
    public function display($data) {
        $content = "=== SALIDA EN ARCHIVO TXT ===<br>";
        $content .= print_r($data, true) . "<br>";
        
        file_put_contents($this->filename, $content, FILE_APPEND);
        echo "Datos guardados en: " . $this->filename . "<br>";
    }
}

// Contexto que utiliza las estrategias
class MessageDisplayer {
    private $strategy;
    
    public function setOutputStrategy(OutputStrategy $strategy) {
        $this->strategy = $strategy;
    }
    
    public function displayMessage($data) {
        if ($this->strategy) {
            $this->strategy->display($data);
        } else {
            throw new Exception("Estrategia de salida no configurada");
        }
    }
}

// Uso
$data = [
    'mensaje' => 'Hola mundo',
    'timestamp' => date('Y-m-d H:i:s'),
    'usuario' => 'Juan Pérez',
    'nivel' => 'admin'
];

$displayer = new MessageDisplayer();

// Salida por consola
$displayer->setOutputStrategy(new ConsoleOutput());
$displayer->displayMessage($data);

// Salida JSON
$displayer->setOutputStrategy(new JsonOutput());
$displayer->displayMessage($data);

// Salida a archivo de texto
$displayer->setOutputStrategy(new TextFileOutput());
$displayer->displayMessage($data);

echo "<br>Todas las estrategias de salida ejecutadas correctamente.<br><br>";
?>