<?php
require __DIR__ . '/../vendor/autoload.php'; // Autoloader Composer

use Fpdf\Fpdf;

// Contoh data siswa (ini biasanya diambil dari database)
$siswa = [
    '12345678' => ['nama' => 'Ahmad Zain', 'kelas' => '12 IPA 1'],
    '87654321' => ['nama' => 'Nurul Aisyah', 'kelas' => '12 IPA 2'],
];

// Ambil NISN dari parameter URL
$nisn = isset($_GET['u']) ? $_GET['u'] : null;

// Cek apakah NISN ada dalam data siswa
if (!$nisn || !isset($siswa[$nisn])) {
    die('Siswa tidak ditemukan.');
}

// Data siswa
$data = $siswa[$nisn];

// Buat file PDF
$pdf = new Fpdf();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Bukti Pendaftaran Siswa Online', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'NISN:', 0, 0);
$pdf->Cell(100, 10, $nisn, 0, 1);

$pdf->Cell(50, 10, 'Nama:', 0, 0);
$pdf->Cell(100, 10, $data['nama'], 0, 1);

$pdf->Cell(50, 10, 'Kelas:', 0, 0);
$pdf->Cell(100, 10, $data['kelas'], 0, 1);

$pdf->Ln(10);
$pdf->Cell(0, 10, 'Status: Lulus', 0, 1);

// Output file PDF
$pdf->Output('D', 'Bukti_Pendaftaran_' . $nisn . '.pdf');
