<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Element Preview</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        
        .preview-container {
            padding: 1rem;
            min-height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="preview-container">
        {!! $element->code !!}
    </div>
    
    <script>
        // Auto-resize iframe to fit content
        window.addEventListener('load', function() {
            // Small delay to make sure all assets are loaded
            setTimeout(() => {
                const height = document.body.scrollHeight;
                window.parent.postMessage({ height: height }, '*');
            }, 100);
        });
    </script>
</body>
</html>