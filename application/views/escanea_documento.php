<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escanear Documento</title>
    <script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode/dist/dbr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/dwt/dist/dwt.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
</head>
<body>
    <h1>Escanear Documento</h1>
    <button id="scanButton">Escanear Documento</button>
    <form id="uploadForm" action="<?php echo site_url('scan/upload'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="scannedPdf" id="scannedPdf">
        <button type="submit">Subir Documento</button>
    </form>

    <script>
        const { jsPDF } = window.jspdf;

        document.getElementById('scanButton').addEventListener('click', async function() {
            let scanner = new Dynamsoft.DWT.Scanner({
                width: 800,
                height: 600,
                onScanSuccess: function (blob) {
                    let reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        // Aquí agregamos cada imagen escaneada al PDF
                        scannedImages.push(reader.result);
                    };
                },
                onScanFailure: function (error) {
                    console.error('Error al escanear:', error);
                }
            });

            let scannedImages = [];
            await scanner.scan();

            // Crear un documento PDF usando jsPDF
            let pdf = new jsPDF();

            scannedImages.forEach((image, index) => {
                if (index > 0) pdf.addPage();
                pdf.addImage(image, 'PNG', 0, 0, 210, 297); // Ajusta las dimensiones según sea necesario
            });

            // Convertir el PDF a base64 y asignarlo al campo de formulario
            let pdfData = pdf.output('datauristring');
            document.getElementById('scannedPdf').value = pdfData;
        });
    </script>
</body>
</html>
