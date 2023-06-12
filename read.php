<?php
    include "logic.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Read PDF</title>
    <link rel="stylesheet" href="path/to/viewer.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
    <style>
        #pdf-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        canvas {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<div id="pdf-container"></div>
<div class="pdf-container">
    <div class="pdf-wrapper">
        <div class="pdf-toolbar">
            <div class="pdf-toolbar-left">
                <span class="pdf-toolbar-title">PDF Viewer</span>
            </div>
            <div class="pdf-toolbar-right">
                <button class="pdf-toolbar-button pdf-toolbar-button-prev">&lt;</button>
                <button class="pdf-toolbar-button pdf-toolbar-button-next">&gt;</button>
                <span class="pdf-toolbar-page">
                    <input type="text" class="pdf-toolbar-page-current">
                    /
                    <span class="pdf-toolbar-page-total"></span>
                </span>
                <button class="pdf-toolbar-button pdf-toolbar-button-zoomin">+</button>
                <button class="pdf-toolbar-button pdf-toolbar-button-zoomout">&ndash;</button>
                <button class="pdf-toolbar-button pdf-toolbar-button-zoom-reset">&times;</button>
            </div>
        </div>
        <div class="pdf-canvas"></div>
    </div>
</div>



<script>
    const url = '<?php echo $file_artikel; ?>';

    // Load PDF
    pdfjsLib.getDocument(url).promise.then(pdf =>  {
        var pages = [];
        for (var i = 1; i <= pdf.numPages; i++) {
            pages.push(i);
        }
        var combinedPromise = pages.map(function(page) {
            return pdf.getPage(page);
        });

        return Promise.all(combinedPromise);
    }).then(function(pages) {
        // Get viewport from first page
        const scale = 1.5;
        const viewport = pages[0].getViewport({ scale: scale });

        // Prepare canvas using PDF page dimensions
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;
        document.getElementById('pdf-container').appendChild(canvas);

        // render pages here
        pages.forEach(function(page) {
            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            page.render(renderContext);
        });
    }).catch(function(error) {
        console.log(error);
    });

</script>
</body>
</html>
