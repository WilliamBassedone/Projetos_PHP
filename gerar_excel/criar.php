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
$sheet->setCellValue('A1', 'William - XLSX COM PHP');

// CABEÇALHOS DA TABELA
$sheet->setCellValue('A3', 'ID');
$sheet->setCellValue('B3', 'Nome');
$sheet->setCellValue('C3', 'Valor');

// VALORES TABELA - PRIMEIRO LINHA
$sheet->setCellValue('A4', 1);
$sheet->setCellValue('B4', 'Monitor LG');
$sheet->setCellValue('C4', 600.00);

// VALORES TABELA - PRIMEIRO LINHA
$sheet->setCellValue('A5', 2);
$sheet->setCellValue('B5', 'Impressora EPSON');
$sheet->setCellValue('C5', 900.00);

// ESCREVE O ARQUIVO NO DISCO COM O FORMATO XLSX
$writer = new Xlsx($spreadsheet);
$writer->save('arquivo.xlsx');
