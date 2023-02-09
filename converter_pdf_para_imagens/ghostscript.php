<?php
// $command = "gs.exe -sDEVICE=pngalpha -r300 -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dBATCH -dNOPAUSE -dSAFER -sOutputFile=output.png pdfs/teste.pdf";
// exec($command);

// $command = "gs.exe -sDEVICE=pngalpha -r300 -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dBATCH -dNOPAUSE -dSAFER -sOutputFile=output.png -dUseCropBox pdfs/boleto.pdf";
// exec($command);

// $command = "gs.exe -sDEVICE=pngalpha -r300 -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dBATCH -dNOPAUSE -dSAFER -sOutputFile=output.png -dPDFFitPage pdfs/boleto.pdf";
// exec($command);

// $command = "gs.exe -sDEVICE=pngalpha -r300 -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dBATCH -dNOPAUSE -dSAFER -sOutputFile=output%d.png pdfs/boleto.pdf";
// exec($command);

// $image = imagecreatefrompng('output.png');
// $white = imagecolorallocate($image, 255, 255, 255);
// imagefill($image, 0, 0, $white);
// imagepng($image, 'output.png');
// imagedestroy($image);


// Exemplo para converter PDF com várias páginas

// Use o Ghostscript para converter o PDF para imagens
$command = "gs.exe -sDEVICE=pngalpha -r300 -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dBATCH -dNOPAUSE -dSAFER -sOutputFile=output%d.png pdfs/Generetor.pdf";
exec($command);

// Obtenha o número de páginas do PDF, irá ler todos os arquivos da pasta que começa com output e adicionar fundo branco
$number_of_pages = count(glob("output*.png"));

// Adicione o fundo branco às imagens
for ($i = 1; $i <= $number_of_pages; $i++) {
    $image = imagecreatefrompng("output{$i}.png");
    $white = imagecolorallocate($image, 255, 255, 255);
    imagefill($image, 0, 0, $white);
    imagepng($image, "output{$i}.png");
    imagedestroy($image);
}

