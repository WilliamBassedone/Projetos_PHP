<?php
// $imagick = new \Imagick();
// print_r($imagick->getVersion());


// try {
//    $imagick = new \Imagick();
//    $imagick->readImage('C:\xampp\htdocs\pdfs\boleto.pdf');
//    echo "entro";
// } catch (Exception $e) {
//    echo $e->getMessage();
// }

// $pdf = 'C:\xampp\htdocs\pdfs\boleto.pdf';
// $imagick = new Imagick();
// $imagick->readImage($pdf);
// $imagick->setImageFormat('jpg');
// foreach ($imagick as $key => $image) {
//    $image->writeImage('imagem_' . $key . '.jpg');
// }

// Carrega o arquivo PDF
$pdf = new \Imagick();
$pdf->readImage('C:\xampp\htdocs\pdfs\boleto.pdf');

// Loop através das páginas do PDF
foreach ($pdf as $key => $page) {
    // Configura a resolução da imagem
    $page->setImageType(Imagick::IMGTYPE_GRAYSCALE);
    $page->setImageResolution(300, 300);
    $page->scaleImage(800, 0);
    $page->setOption('density', '300');
    $page->setOption('alpha', 'remove');
    $page->setOption('text-antialias', true);


    // Converte a página para JPG
    $page->setImageFormat('png');
    // Salva a imagem na pasta desejada
    $page->writeImage('C:\xampp\htdocs\pdfs\arquivo-' . $key . '.jpg');
}

// libera a memória usada pela biblioteca
$pdf->clear();
$pdf->destroy();
