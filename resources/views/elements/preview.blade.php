<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Element Preview</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }
        .preview-container {
            padding: 1rem;
            min-height: 100px;
            display: flex;
            justify-content: center;
            width: 100%;
        }
        
        /* Make sure direct children take appropriate width but stay centered */
        .preview-container > * {
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="preview-container">
        @if(request()->query('t') && session()->has('preview_code'))
            {!! session('preview_code') !!}
        @else
            {!! $element->code !!}
        @endif
    </div>
    
    <script>
        // Report height to parent
        function reportHeight() {
            const height = document.body.scrollHeight;
            window.parent.postMessage({ height: height }, '*');
        }
        
        // Report on load
        window.addEventListener('load', function() {
            reportHeight();
            
            // Report again after images and other resources have loaded
            setTimeout(reportHeight, 100);
            setTimeout(reportHeight, 500);
        });
        
        // Watch for DOM changes and report new height
        const observer = new MutationObserver(function() {
            reportHeight();
        });
        
        // Start observing
        observer.observe(document.body, { 
            childList: true, 
            subtree: true, 
            attributes: true 
        });
        
        // Also report on resize
        window.addEventListener('resize', reportHeight);
    </script>
</body>
</html>