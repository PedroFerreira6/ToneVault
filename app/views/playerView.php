<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Player</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contain">
        <div class="holder">
            <div class="album"></div>
            <div class="mejs-player">
                <h1>Take Me Back (Until the End of Time Edit)</h1>
                <h2>Active Child</h2>
                <audio id="audioPlayer" controls>
                    <source src="https://furrowthebrow.github.io/demo/TakesMeBack.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
