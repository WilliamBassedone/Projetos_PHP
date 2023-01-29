<?php

// AUTOLOAD DO COMPOSER
require 'vendor/autoload.php';

// DEPENDÊNCIAS DO PROJETO
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// INSTÂNCIA PRINCIPAL DA PLANILHA
$spreadsheet = new Spreadsheet();

// OBTÉM A ABA ATIVA DENTRO DO ARQUIVO DO EXCEL
$sheet = $spreadsheet->getActiveSheet();

// DEFINE O CONTEÚDO DA CÉLULA
$sheet->setCellValue('A1', 'WILLIAM - XLSX COM PHP');

// ESTILOS DAA CELULA A1
$styles = [
      'font' => [
            'bold' => true,
            'color' => [
                  'rgb' => 'F00F00'
            ],
            'size' => 25,
            'name' => 'Cambria'
      ],

];

// DEFINE O ESTILO DA CELULA A1
$sheet->getStyle('A1')->applyFromArray($styles);

// VARIÁVEL CONTENDO O ARRAY DE DADOS DA PLANILHA
$cells = [
      ['ID', 'Nome', 'Valor'],
      [1, 'Monitor LG', 600.00],
      [2, 'Impressora EPSON', 900.00],
      [3, 'Notebook HP', 3500.00],
      [NULL, 'Total', '=SUM(C4:C6)'],
];

// DEFINE OS VALORES DENTRO DA PLANILHA UTILIZANDO ARRAY
$sheet->fromArray($cells, null, 'A3');

// ESTILOS DAA CELULA A1
$styles = [
      'font' => [
            'bold' => true,
      ],
];

// DEFINE O ESTILO DA CELULA A1
$sheet->getStyle('A3:C3')->applyFromArray($styles);

// ESCREVE O ARQUIVO NO DISCO COM O FORMATO XLSX
$writer = new Xlsx($spreadsheet);
$writer->save('relatorios/arquivo.xlsx');

// https://phpspreadsheet.readthedocs.io/en/latest/