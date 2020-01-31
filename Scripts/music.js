var audio = new Audio('http://195.13.200.164:8000/listen.pl');
audio.volume = 0.1;

function fix(audio) {
    var thePromise = audio.play();

    if (thePromise != undefined) {

        thePromise.then(function(_) {

            audio.pause();
            audio.currentTime = 0;
        });
    }
    else {
      audio.play();
    }
}
$('.trigger').click(function() {
  if (audio.paused == false) {
      audio.pause();
      $('.fa-play').show();
      $('.fa-pause').hide();
      $('.music-card').removeClass('playing');
  } else {
      audio.play();
      $('.fa-pause').show();
      $('.fa-play').hide();
      $('.music-card').addClass('playing');
  }
});
