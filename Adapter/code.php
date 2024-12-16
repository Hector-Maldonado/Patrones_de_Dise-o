<?php

// Interfaz de Windows 10 para abrir archivos
interface Documento {
    public function abrir();
}

// Clase que representa archivos de Word de versiones antiguas (2007)
class Word2007 {
    public function abrirWord2007() {
        return "Abriendo documento de Word 2007.";
    }
}

// Clase que representa archivos de Excel de versiones antiguas (2010)
class Excel2010 {
    public function abrirExcel2010() {
        return "Abriendo documento de Excel 2010.";
    }
}

// Adapter para adaptar los documentos antiguos al formato de Windows 10
class WordAdapter implements Documento {
    private $word2007;

    public function __construct(Word2007 $word2007) {
        $this->word2007 = $word2007;
    }

    public function abrir() {
        return $this->word2007->abrirWord2007();
    }
}

class ExcelAdapter implements Documento {
    private $excel2010;

    public function __construct(Excel2010 $excel2010) {
        $this->excel2010 = $excel2010;
    }

    public function abrir() {
        return $this->excel2010->abrirExcel2010();
    }
}

//Windows 10 utiliza la interfaz Documento
function abrirDocumento(Documento $documento) {
    echo $documento->abrir() . "\n";
}

// Creacion de documentos antiguos
$word2007 = new Word2007();
$excel2010 = new Excel2010();

// Adaptadores para Windows 10
$wordAdapter = new WordAdapter($word2007);
$excelAdapter = new ExcelAdapter($excel2010);

// Windows 10 abre los documentos a traves de los adaptadores
abrirDocumento($wordAdapter); 
abrirDocumento($excelAdapter);

?>