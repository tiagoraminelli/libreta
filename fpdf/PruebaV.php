<?php
require('fpdf.php');
require('../modelo/bd.php'); // Ajusta la ruta a donde está realmente tu archivo 'bd.php'
require('../modelo/alumno-materia.php'); // Ajusta la ruta a donde está realmente tu archivo 'alumno-materia.php');
require('../modelo/alumno.php'); // 

// Clase extendida para personalizar el PDF
class PDF extends FPDF
{
    private $background; // Propiedad para la imagen de fondo

    // Método para configurar la imagen de fondo
    function setBackground($img)
    {
        $this->background = $img;
    }

    // Encabezado del PDF
    function Header()
    {
        // Agregar imagen de fondo si está configurada
        if ($this->background) {
            $this->Image($this->background, 0, 0, $this->GetPageWidth(), $this->GetPageHeight());
        }
    
        // Configuración del encabezado con datos de la escuela
        $this->SetFont('Times', 'I', 14); 
        $this->SetTextColor(0, 0, 0); 

        // Título de la institución
        $this->SetXY(10, 15);
        $this->Cell(0, 10, 'Escuela Normal Superior N40 Mariano Moreno', 0, 1, 'L');

        // Información de contacto
        $this->SetFont('Arial', '', 12);
        $this->SetXY(10, 23);
        $this->Cell(0, 10, 'Direccion: J.M. Bullo 1402-C.P. 3070 ', 1, 1, 'L');
        $this->SetXY(10, 30);
        $this->Cell(0, 10, 'Teléfonos: 03408-422447    Correo: esc40mmoreno@yahoo.com.ar', 1, 1, 'L');

        // Línea divisoria
        $this->Ln(10);
        $this->Cell(0, 0, '', 'T');
        $this->Ln(5);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-30);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, 'Firma del Director: ___________________________', 0, 1, 'L');
        $this->Cell(0, 10, 'Firma del Coordinador: _______________________', 0, 0, 'L');
    }

    // Generar tabla con datos
    function TablaDatos($header, $data)
    {
        // Configuración de colores y estilos para la tabla
        $this->SetFillColor(245, 245, 245);
        $this->SetTextColor(0);
        $this->SetDrawColor(128, 128, 128);
        $this->SetLineWidth(.3);

        // Encabezados de la tabla
        $this->SetFont('Arial', 'B', 10);
        $columnWidths = array(40, 30, 20, 30); // Ajuste los anchos de las columnas según sea necesario

        foreach ($header as $index => $colName) {
            $this->Cell($columnWidths[$index], 7, utf8_decode($colName), 1, 0, 'C', true);
        }
        $this->Ln();

        // Datos de la tabla
        $this->SetFillColor(240, 240, 240); 
        $this->SetFont('Arial', '', 10);
        $fill = false; // Alternar color de fondo

        foreach ($data as $row) {
            $this->Cell($columnWidths[0], 6, utf8_decode($row['nombre']), 'LR', 0, 'L', $fill);
            $this->Cell($columnWidths[1], 6, utf8_decode($row['anioCursado']), 'LR', 0, 'L', $fill);
            $this->Cell($columnWidths[2], 6, utf8_decode($row['nota']), 'LR', 0, 'L', $fill);
            $this->Cell($columnWidths[3], 6, utf8_decode($row['estado_final']), 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill; // Alternar color de fondo para la siguiente fila
        }

        // Línea de cierre de tabla
        $this->Cell(array_sum($columnWidths), 0, '', 'T');
    }
}

// Datos para el encabezado de la tabla
$header = array('Nombre', 'Año Cursado', 'Nota', 'Estado Final');

// Instancia del modelo para obtener datos
$alumnoCarrera = new AlumnoCarrera();
$data = $alumnoCarrera->fetchAlumnosInscriptosAñoDni(2022, 43766375);

// Crear instancia del PDF y generar el documento
$pdf = new PDF();
$pdf->setBackground('C:\xampp\htdocs\libreta\public\FW3.jpg'); // Configurar la imagen de fondo
$pdf->AddPage();
$pdf->TablaDatos($header, $data);
$pdf->Output('I', 'Libreta.pdf');
?>
