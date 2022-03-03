//Select element function
const selectElement = function(element) {
    return document.querySelector(element);
};

let menuToggler = selectElement('.menu-toggle');
let body = selectElement('body');

menuToggler.addEventListener('click', function() {
    body.classList.toggle('open');
});

// Scroll reveal
window.sr = ScrollReveal();

sr.reveal('.animate-left', {
    origin: 'left',
    duration: 1000,
    distance: '25rem',
    delay: 300
});

sr.reveal('.animate-right', {
    origin: 'right',
    duration: 1000,
    distance: '25rem',
    delay: 600
});

sr.reveal('.animate-top', {
    origin: 'top',
    duration: 1000,
    distance: '25rem',
    delay: 600
});

sr.reveal('.animate-bottom', {
    origin: 'bottom',
    duration: 1000,
    distance: '25rem',
    delay: 600
});

/* Music
======================================*/
var playlist = [{
        "song": "Back to your Love",
        "album": "Back to your love EP",
        "artist": "Dee Cypher",
        "artwork": "images/vinyl.png",
        "mp3": "audio/Dee Cypher  Back To Your Love.mp3"
    },
    {
        "song": "Feel The Vibe",
        "album": "Back to your Love EP ",
        "artist": "Dee Cypher",
        "artwork": "images/vinyl.png",
        "mp3": "audio/Dee Cypher  Feel The Vybe.mp3"
    },
    {
        "song": "Oh No",
        "album": "Back to your Love EP",
        "artist": "Dee Cypher",
        "artwork": "images/vinyl.png",
        "mp3": "audio/Dee Cypher -Oh No.mp3"
    },

    {
        "song": "I Can Feel it",
        "album": "Back to your Love EP",
        "artist": "Dee Cypher",
        "artwork": "images/vinyl.png",
        "mp3": "audio/Dee Cypher I Can Feel It.mp3"
    }
];

/* General Load / Variables
======================================*/
var rot = 0;
var duration;
var playPercent;
var rotate_timer;
var armrot = -45;
var bufferPercent;
var currentSong = 0;
var arm_rotate_timer;
var arm = document.getElementById("arm");
var next = document.getElementById("next");
var song = document.getElementById("song");
var timer = document.getElementById("timer");
var music = document.getElementById("music");
var album = document.getElementById("album");
var artist = document.getElementById("artist");
var volume = document.getElementById("volume");
var playButton = document.getElementById("play");
var timeline = document.getElementById("slider");
var playhead = document.getElementById("elapsed");
var previous = document.getElementById("previous");
var pauseButton = document.getElementById("pause");
var bufferhead = document.getElementById("buffered");
var artwork = document.getElementsByClassName("artwork")[0];
var timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
var visablevolume = document.getElementsByClassName("volume")[0];

music.addEventListener("ended", _next, false);
music.addEventListener("timeupdate", timeUpdate, false);
music.addEventListener("progress", bufferUpdate, false);
load();

/* Functions
======================================*/
function load() {
    pauseButton.style.visibility = "hidden";
    song.innerHTML = playlist[currentSong]['song'];
    song.title = playlist[currentSong]['song'];
    album.innerHTML = playlist[currentSong]['album'];
    album.title = playlist[currentSong]['album'];
    artist.innerHTML = playlist[currentSong]['artist'];
    artist.title = playlist[currentSong]['artist'];
    artwork.setAttribute("style", "background:url(https://i.imgur.com/3idGgyU.png), url('" + playlist[currentSong]['artwork'] + "') center no-repeat;");
    music.innerHTML = '<source src="' + playlist[currentSong]['mp3'] + '" type="audio/mp3">';
    music.load();
}

function reset() {
    rotate_reset = setInterval(function() {
        Rotate();
        if (rot == 0) {
            clearTimeout(rotate_reset);
        }
    }, 1);
    fireEvent(pauseButton, 'click');
    armrot = -45;
    playhead.style.width = "0px";
    bufferhead.style.width = "0px";
    timer.innerHTML = "0:00";
    music.innerHTML = "";
    currentSong = 0; // set to first song, to stay on last song: currentSong = playlist.length - 1;
    song.innerHTML = playlist[currentSong]['song'];
    song.title = playlist[currentSong]['song'];
    album.innerHTML = playlist[currentSong]['album'];
    album.title = playlist[currentSong]['album'];
    artist.innerHTML = playlist[currentSong]['artist'];
    artist.title = playlist[currentSong]['artist'];
    artwork.setAttribute("style", "background:url(images/vinyl.png), url('" + playlist[currentSong]['artwork'] + "') center no-repeat;");
    music.innerHTML = '<source src="' + playlist[currentSong]['mp3'] + '" type="audio/mp3">';
    music.load();
}

function formatSecondsAsTime(secs, format) {
    var hr = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hr * 3600)) / 60);
    var sec = Math.floor(secs - (hr * 3600) - (min * 60));
    if (sec < 10) {
        sec = "0" + sec;
    }
    return min + ':' + sec;
}

function timeUpdate() {
    bufferUpdate();
    playPercent = timelineWidth * (music.currentTime / duration);
    playhead.style.width = playPercent + "px";
    timer.innerHTML = formatSecondsAsTime(music.currentTime.toString());
}

function bufferUpdate() {
    bufferPercent = timelineWidth * (music.buffered.end(0) / duration);
    bufferhead.style.width = bufferPercent + "px";
}

function Rotate() {
    if (rot == 361) {
        artwork.style.transform = 'rotate(0deg)';
        rot = 0;
    } else {
        artwork.style.transform = 'rotate(' + rot + 'deg)';
        rot++;
    }
}

function RotateArm() {
    if (armrot > -12) {
        arm.style.transform = 'rotate(-38deg)';
        armrot = -45;
    } else {
        arm.style.transform = 'rotate(' + armrot + 'deg)';
        armrot = armrot + (26 / duration);
    }
}

function fireEvent(el, etype) {
    if (el.fireEvent) {
        el.fireEvent('on' + etype);
    } else {
        var evObj = document.createEvent('Events');
        evObj.initEvent(etype, true, false);
        el.dispatchEvent(evObj);
    }
}

function _next() {
    if (currentSong == playlist.length - 1) {
        reset();
    } else {
        fireEvent(next, 'click');
    }
}
playButton.onclick = function() {
    music.play();
}
pauseButton.onclick = function() {
    music.pause();
}
music.addEventListener("play", function() {
    playButton.style.visibility = "hidden";
    pause.style.visibility = "visible";
    rotate_timer = setInterval(function() {
        if (!music.paused && !music.ended && 0 < music.currentTime) {
            Rotate();
        }
    }, 10);
    if (armrot != -45) {
        arm.setAttribute("style", "transition: transform 800ms;");
        arm.style.transform = 'rotate(' + armrot + 'deg)';
    }
    arm_rotate_timer = setInterval(function() {
        if (!music.paused && !music.ended && 0 < music.currentTime) {
            if (armrot == -45) {
                arm.setAttribute("style", "transition: transform 800ms;");
                arm.style.transform = 'rotate(-38deg)';
                armrot = -38;
            }
            if (arm.style.transition != "") {
                setTimeout(function() {
                    arm.style.transition = "";
                }, 1000);
            }
            RotateArm();
        }
    }, 1000);
}, false);
music.addEventListener("pause", function() {
    arm.setAttribute("style", "transition: transform 800ms;");
    arm.style.transform = 'rotate(-45deg)';
    playButton.style.visibility = "visible";
    pause.style.visibility = "hidden";
    clearTimeout(rotate_timer);
    clearTimeout(arm_rotate_timer);
}, false);
next.onclick = function() {
    arm.setAttribute("style", "transition: transform 800ms;");
    arm.style.transform = 'rotate(-45deg)';
    clearTimeout(rotate_timer);
    clearTimeout(arm_rotate_timer);
    playhead.style.width = "0px";
    bufferhead.style.width = "0px";
    timer.innerHTML = "0:00";
    music.innerHTML = "";
    arm.style.transform = 'rotate(-45deg)';
    armrot = -45;
    if ((currentSong + 1) == playlist.length) {
        currentSong = 0;
        music.innerHTML = '<source src="' + playlist[currentSong]['mp3'] + '" type="audio/mp3">';
    } else {
        currentSong++;
        music.innerHTML = '<source src="' + playlist[currentSong]['mp3'] + '" type="audio/mp3">';
    }
    song.innerHTML = playlist[currentSong]['song'];
    song.title = playlist[currentSong]['song'];
    album.innerHTML = playlist[currentSong]['album'];
    album.title = playlist[currentSong]['album'];
    artist.innerHTML = playlist[currentSong]['artist'];
    artist.title = playlist[currentSong]['artist'];
    artwork.setAttribute("style", "transform: rotate(" + rot + "deg); background:url(https://i.imgur.com/3idGgyU.png), url('" + playlist[currentSong]['artwork'] + "') center no-repeat;");
    music.load();
    duration = music.duration;
    music.play();
}
previous.onclick = function() {
    arm.setAttribute("style", "transition: transform 800ms;");
    arm.style.transform = 'rotate(-45deg)';
    clearTimeout(rotate_timer);
    clearTimeout(arm_rotate_timer);
    playhead.style.width = "0px";
    bufferhead.style.width = "0px";
    timer.innerHTML = "0:00";
    music.innerHTML = "";
    arm.style.transform = 'rotate(-45deg)';
    armrot = -45;
    if ((currentSong - 1) == -1) {
        currentSong = playlist.length - 1;
        music.innerHTML = '<source src="' + playlist[currentSong]['mp3'] + '" type="audio/mp3">';
    } else {
        currentSong--;
        music.innerHTML = '<source src="' + playlist[currentSong]['mp3'] + '" type="audio/mp3">';
    }
    song.innerHTML = playlist[currentSong]['song'];
    song.title = playlist[currentSong]['song'];
    album.innerHTML = playlist[currentSong]['album'];
    album.title = playlist[currentSong]['album'];
    artist.innerHTML = playlist[currentSong]['artist'];
    artist.title = playlist[currentSong]['artist'];
    artwork.setAttribute("style", "transform: rotate(" + rot + "deg); background:url(https://i.imgur.com/3idGgyU.png), url('" + playlist[currentSong]['artwork'] + "') center no-repeat;");
    music.load();
    duration = music.duration;
    music.play();
}
volume.oninput = function() {
    music.volume = volume.value;
    visablevolume.style.width = (80 - 11) * volume.value + "px";
}
music.addEventListener("canplay", function() {
    duration = music.duration;
}, false);


// cookies //


// Modal Soundcloud //


// Modal Soundcloud //

// Get DOM Elements
const modal = document.querySelector('#my-modal-soundcloud');
const modalBtn = document.querySelector('#modal-btn-soundcloud');
const closeBtn = document.querySelector('.close');

// Events
modalBtn.addEventListener('click', openModal);
closeBtn.addEventListener('click', closeModal);
window.addEventListener('click', outsideClick);

// Open
function openModal() {
    modal.style.display = 'block';
}

// Close
function closeModal() {
    modal.style.display = 'none';
}

// Close If Outside Click
function outsideClick(e) {
    if (e.target == modal) {
        modal.style.display = 'none';
    }
}

// Modal Vinyl //

// Get DOM Elements
const modal2 = document.querySelector('#my-modal-player');
const modalBtn2 = document.querySelector('#modal-btn-player');
const closeBtn2 = document.querySelector('.close-player');

// Events
modalBtn2.addEventListener('click', openModal2);
closeBtn2.addEventListener('click', closeModal2);
window.addEventListener('click', outsideClick2);

// Open
function openModal2() {
    modal2.style.display = 'block';
}

// Close
function closeModal2() {
    modal2.style.display = 'none';
}

// Close If Outside Click
function outsideClick2(e) {
    if (e.target == modal) {
        modal2.style.display = 'none';
    }
}

// Modal Pre-Order //

// Get DOM Elements
const modal3 = document.querySelector('#my-modal-order');
const modalBtn3 = document.querySelector('#modal-btn-order');
const closeBtn3 = document.querySelector('.close-order');

// Events
modalBtn3.addEventListener('click', openModal3);
closeBtn3.addEventListener('click', closeModal3);
window.addEventListener('click', outsideClick3);

// Open
function openModal3() {
    modal3.style.display = 'block';
}

// Close
function closeModal3() {
    modal3.style.display = 'none';
}

// Close If Outside Click
function outsideClick3(e) {
    if (e.target == modal) {
        modal3.style.display = 'none';
    }
}




// Cookie Banner //