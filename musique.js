var player = document.getElementById('player');
var audio = document.createElement('audio');
var playPause = document.getElementById('play-pause');
var seekBar = document.getElementById('seek-bar');
var mute = document.getElementById('mute');
var volumeBar = document.getElementById('volume-bar');

// Charger un fichier audio
audio.src = 'vi.m4a';

// Mettre à jour la barre de progression quand la piste audio joue
audio.addEventListener('timeupdate', function() {
  var percentage = (audio.currentTime / audio.duration) * 100;
  seekBar.value = percentage;
});

// Mettre à jour la piste audio quand la barre de progression est modifiée
seekBar.addEventListener('change', function() {
  var time = audio.duration * (seekBar.value / 100);
  audio.currentTime = time;
});

// Mettre à jour le bouton de lecture/pause quand la piste audio joue ou est en pause
audio.addEventListener('play', function() {
  playPause.innerHTML = 'Pause';
});
audio.addEventListener('pause', function() {
  playPause.innerHTML = 'Play';
});

// Lire ou mettre en pause la piste audio en cliquant sur le bouton de lecture/pause
playPause.addEventListener('click', function() {
  if (audio.paused) {
    audio.play();
  } else {
    audio.pause();
  }
});

// Mettre en sourdine ou rétablir le volume de la piste audio en cliquant sur le bouton de sourdine
mute.addEventListener('click', function() {
  if (audio.muted) {
    audio.muted = false;
    mute.innerHTML = 'Mute';
  } else {
    audio.muted = true;
    mute.innerHTML = 'Unmute';
  }
});

// Mettre à jour le volume de la piste audio quand la barre de volume est modifiée
volumeBar.addEventListener('change', function() {
  audio.volume = volumeBar.value;
});