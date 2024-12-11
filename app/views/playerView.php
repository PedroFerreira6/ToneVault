<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <style>
        /* Reset padrão */
        body, h1, p, button {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        /* Estilo do player */
        .music-player {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 300px;
        }

        /* Imagem do álbum */
        .album-art img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        /* Título e artista */
        .song-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .artist-name {
            font-size: 1.2em;
            color: #ddd;
            margin-bottom: 20px;
        }

        /* Controles do áudio */
        .audio-player {
            width: 100%;
            margin-bottom: 15px;
            outline: none;
        }

        /* Botões */
        .controls {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn {
            background: #ffffff;
            color: #1e3c72;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background: #ddd;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="music-player">
        <div class="album-art">
            <img src="https://www.billboard.com/wp-content/uploads/media/tyler-the-creator-igor-album-art-2019-billboard-embed.jpg?w=600" alt="Album Cover">
        </div>
        <h1 class="song-title">EARFQUAKE</h1>
        <p class="artist-name">Taylor The Criador</p>
        <audio controls class="audio-player">
            <source src="https://www.scarybeatz.com/wp-content/uploads/2024/09/Tyler_The_Creator_-_Earfquake_ScaryBeatz.com.mp3?_=1" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        <div class="controls">
            <button class="btn btn-prev">⏮️</button>
            <button class="btn btn-play">▶️</button>
            <button class="btn btn-next">⏭️</button>
        </div>
    </div>
    <script>
        const audioPlayer = document.querySelector('.audio-player');
        const playButton = document.querySelector('.btn-play');

        playButton.addEventListener('click', () => {
            if (audioPlayer.paused) {
                audioPlayer.play();
                playButton.textContent = '⏸️';
            } else {
                audioPlayer.pause();
                playButton.textContent = '▶️';
            }
        });
    </script>
</body>
</html>
