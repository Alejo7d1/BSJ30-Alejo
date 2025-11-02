<?php
// Patron Adapter para compatibilidad entre versiones de Windows

// Interfaz antigua
interface Windows7File {
    public function openDoc();
    public function openXls();
    public function openPpt();
}

// Implementacion en windows 7
class Windows7FileHandler implements Windows7File {
    public function openDoc() {
        return "Abriendo documento .doc con Word 2007";
    }
    
    public function openXls() {
        return "Abriendo archivo .xls con Excel 2007";
    }
    
    public function openPpt() {
        return "Abriendo presentación .ppt con PowerPoint 2007";
    }
}

// Interfaz nueva 
interface Windows10File {
    public function openDocument();
    public function openSpreadsheet();
    public function openPresentation();
}

// Adapter que hace compatible Windows 7 con Windows 10
class Windows7To10Adapter implements Windows10File {
    private $windows7File;
    
    public function __construct(Windows7File $windows7File) {
        $this->windows7File = $windows7File;
    }
    
    public function openDocument() {
        return $this->windows7File->openDoc();
    }
    
    public function openSpreadsheet() {
        return $this->windows7File->openXls();
    }
    
    public function openPresentation() {
        return $this->windows7File->openPpt();
    }
}

// Implementación nativa de Windows 10
class Windows10FileHandler implements Windows10File {
    public function openDocument() {
        return "Abriendo documento .docx con Word 2019";
    }
    
    public function openSpreadsheet() {
        return "Abriendo archivo .xlsx con Excel 2019";
    }
    
    public function openPresentation() {
        return "Abriendo presentación .pptx con PowerPoint 2019";
    }
}

// Uso
$oldFileHandler = new Windows7FileHandler();
$adapter = new Windows7To10Adapter($oldFileHandler);
$newFileHandler = new Windows10FileHandler();

echo "Windows 10 abriendo archivos antiguos:<br>";
echo "- Documento: " . $adapter->openDocument() . "<br>";
echo "- Hoja de cálculo: " . $adapter->openSpreadsheet() . "<br>";
echo "- Presentación: " . $adapter->openPresentation() . "<br>";

echo "Windows 10 abriendo archivos nativos:<br>";
echo "- Documento: " . $newFileHandler->openDocument() . "<br>";
echo "- Hoja de cálculo: " . $newFileHandler->openSpreadsheet() . "<br>";
echo "- Presentación: " . $newFileHandler->openPresentation() . "<br><br>";

?>