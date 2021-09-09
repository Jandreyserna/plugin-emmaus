<?php

class Fkm  
{
    public function __construct() {
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();

        // Adding Text element with font customized inline...
        $section->addText(
            '"Flikimax, '
                . 'and is never the result of selfishness." '
                . '(Napoleon Hill)',
            array('name' => 'Tahoma', 'size' => 10)
        );

        // Saving the document as OOXML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');




        $objWriter->save(ABSPATH . "Flikimax.docx");
    }
}


function crearWord()
{
    new Fkm();
}


crearWord();