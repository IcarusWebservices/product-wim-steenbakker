const nav = document.querySelector('.navbar');
const parallaxImg = document.querySelectorAll('.img-parallax');
const galleryThumbnailBtn = document.querySelector('a.tab.grid');
const galleryJustifiedBtn = document.querySelector('a.tab.justified');
const galleryPhotoGrid = document.querySelector('.photo-grid-container');

// Galleries
const galleryImages = [].slice.call(document.querySelectorAll('.gallery .photo-grid-container > div > img'), 0);
const galleryGridItems = [].slice.call(document.querySelectorAll('.photo-grid-item'), 0);
const bodyOverlay = document.querySelector("#body-overlay");
const modal = document.querySelector(".photo-overlay");
const modalImg = document.getElementById("modal-photo");
const modalPagination = document.getElementById("modal-pagination");
const modalCloseSpan = document.getElementsByClassName("close-modal")[0];
var galleryModalVisible = false;
var currentPhotoIndex;

window.onscroll = () => {
    this.scrollY <= 50 ? nav.classList.remove('scroll') : nav.classList.add('scroll');
};

document.addEventListener('DOMContentLoaded', function () {
    if (window.scrollY >= 50) {
        nav.classList.add('scroll');
    }
});




galleryThumbnailBtn.addEventListener('click', () => {
    if (!galleryPhotoGrid.classList.contains('thumbnail-view')) {
        galleryPhotoGrid.classList.remove('justified-view');
        galleryPhotoGrid.classList.add('thumbnail-view');
        galleryGridItems.forEach((el) => {
            el.removeAttribute('style');
        });
        galleryThumbnailBtn.classList.add('active');
        galleryJustifiedBtn.classList.remove('active');
    }
});

galleryJustifiedBtn.addEventListener('click', () => {
    if (!galleryPhotoGrid.classList.contains('justified-view')) {
        galleryPhotoGrid.classList.remove('thumbnail-view');
        galleryPhotoGrid.classList.add('justified-view');
        resizeAllMasonryItems();
        galleryJustifiedBtn.classList.add('active');
        galleryThumbnailBtn.classList.remove('active');
    }
});



// ------------------------------
// Gallery
// ------------------------------
document.onkeydown = checkKey;

function checkKey(e) {

    e = e || window.event;

    // Up
    if (e.keyCode === 38) {}
    // Down
    else if (e.keyCode === 40) {}
    // Left
    else if (e.keyCode === 37) {
        if (galleryModalVisible) {

            if (currentPhotoIndex === 1) {
                currentPhotoIndex = galleryImages.length;
            } else {
                currentPhotoIndex--;
            }

            modalContentHandler(currentPhotoIndex);
        }
    }
    // Right
    else if (e.keyCode === 39) {
        if (galleryModalVisible) {

            if (currentPhotoIndex >= galleryImages.length) {
                currentPhotoIndex = 1;
            } else {
                currentPhotoIndex++;
            }

            modalContentHandler(currentPhotoIndex);
        }
    }
}

function modalHandler(e, index) {
    // Show modal content
    galleryModalVisible = true;
    currentPhotoIndex = galleryImages.indexOf(e.target.querySelector('img')) + 1;
    modal.style.display = "block";
    modalContentHandler();
}

function modalContentHandler(index) {
    // Change modal content
    console.log(currentPhotoIndex);
    modalImg.src = galleryImages[currentPhotoIndex - 1].src;
    modalPagination.innerHTML = currentPhotoIndex + "/" + galleryImages.length;
}

function closeModal() {
    galleryModalVisible = false;
    modal.style.display = "none";
}

function stopProp(e) {
    e.stopPropagation();
}

if (modalCloseSpan) {
    modalCloseSpan.onclick = function () { closeModal(); };
}


// Justified view sizes
function resizeMasonryItem(item) {
    var grid = document.getElementsByClassName('photo-grid-container')[0],
        rowGap = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-row-gap')),
        rowHeight = parseInt(window.getComputedStyle(grid).getPropertyValue('grid-auto-rows'));

    var rowSpan = Math.ceil((item.querySelector('.photo-grid-item > img').getBoundingClientRect().height + rowGap) / (rowHeight + rowGap) - 1);

    item.style.gridRowEnd = 'span ' + rowSpan;
}


function resizeAllMasonryItems() {
    var allItems = document.getElementsByClassName('photo-grid-item');

    for (var i = 0; i < allItems.length; i++) {
        resizeMasonryItem(allItems[i]);
    }
}

function waitForImages() {
    var allItems = document.getElementsByClassName('photo-grid-item');
    for (var i = 0; i < allItems.length; i++) {
        imagesLoaded(allItems[i], function (instance) {
            var item = instance.elements[0];
            resizeMasonryItem(item);
        });
    }
}


var masonryEvents = ['load', 'resize'];
masonryEvents.forEach(function (event) {
    window.addEventListener(event, resizeAllMasonryItems);
});

resizeAllMasonryItems();





// ------------------------------
// Parallax scrolling!
// ------------------------------
$('.img-parallax').each(function () {
    var img = $(this);
    var imgParent = $(this).parent();
    function parallaxTranslate() {
        var speed = img.data('speed');
        var imgY = imgParent.offset().top;
        var winY = $(this).scrollTop();
        var winH = $(this).height();
        var parentH = imgParent.innerHeight();

        var winBottom = winY + winH;

        if (winBottom > imgY && winY < imgY + parentH) {
            var imgBottom = ((winBottom - imgY) * speed);
            var imgTop = winH + parentH;
            var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));


            img.css({
                top: imgPercent + '%',
                transform: 'translate(-50%, -' + imgPercent + '%)'
            });
        }

    }
    $(document).ready(function () {
        parallaxTranslate();
    });
    $(document).on({
        scroll: function () {
            parallaxTranslate();
        }
    });
});


// Music Player
// Lists
var songs = [
    "https://jezz.tech/sites/tnm/content/audio/TNM_SeptemberJazz.mp3",
    "https://jezz.tech/sites/wim/assets/audio/PXJesse_Lost.mp3"
];

var artists = [
    "Wim Steenbakker",
    "Wim Steenbakker"
];

var titles = [
    "Demo 1",
    "Demo 2"
];


// Code
var sArea = $('#apSeekArea'),
    seekBar = $('#apFill'),
    insTime = $('#ins-time'),
    sHover = $('#apSeekHover'),
    tProgress = $('#apCurrentTime'),
    tTime = $('#apTrackLength'),
    trackTime = $('#apTrackTime'),
    autoplayButton = $('#autoplay'),
    muteButton = $('#mute'),
    muteIcon = $('#mute > i'),
    autoplay = true,
    isMuted = false,
    
    songArtist = $('#apSongArtist'),
    songTitle = $('#apSongTitle'),
    fillBar = $('#apFill'),
    currentIndex = 0,
    song,
    seekT,
    seekLoc,
    seekBarPos,
    cM,
    ctMinutes,
    ctSeconds,
    curMinutes,
    curSeconds,
    durMinutes,
    durSeconds,
    playProgress,
    bTime,
    nTime = 0,
    buffInterval = null,
    tFlag = false;

function selectSong(e) {
    currentIndex = e.target.dataset.value;
    updateSong();
}

function initSong() {
    song.src = songs[currentIndex];
    songArtist.text(artists[currentIndex]);
    songTitle.text(titles[currentIndex]);
}


function autoPlay() {
    autoplay = !autoplay;
    autoplayButton.toggleClass("active");
}

function playPause() {
    if (song.paused) {
        $("#play i").attr("class", "fas fa-pause fa-lg");
        song.play();
    } else {
        $("#play i").attr("class", "fas fa-play fa-lg");
        song.pause();
    }
}

function next() {
    currentIndex++;
    if (currentIndex > songs.length - 1) {
        currentIndex = 0;
    }
    updateSong();
}

function previous() {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = songs.length - 1;
    }
    updateSong();
}

function updateSong() {
    initSong();
    song.play();
    $("#play i").attr("class", "fas fa-pause fa-lg");
}

function mute() {
    isMuted = !isMuted;
    song.muted = isMuted;
    muteButton.toggleClass("active");
    if (isMuted) {
        muteIcon.addClass('fa-volume-mute').removeClass('fa-volume-up');
    } else {
        muteIcon.addClass('fa-volume-up').removeClass('fa-volume-mute');
    }
}

function updateCurrentTime() {
    var position = song.currentTime / song.duration;
    fillBar.width(position * 100 + "%");

    if (song.ended && !autoplay) {
        $("#play i").attr("class", "fas fa-play fa-lg");
    } else if (song.ended && autoplay) {
        next();
    }
}

initPlayer();
initSong();

song.addEventListener('timeupdate', updateCurrentTime);





function initPlayer() {

    song = new Audio();
    song.loop = false;

    sArea.mousemove(function (event) { showHover(event); });

    sArea.mouseout(hideHover);
    sArea.on('click', playFromClickedPos);
    $(song).on('timeupdate', updateCurrTime);
    setTimeout(function () {
        updateCurrTime();
        tProgress.fadeTo("fast", 1, function () { });
        tTime.fadeTo("fast", 1, function () { });
    }, 500);
}



// Time & Seekbar functions

function showHover(event) {
    seekBarPos = sArea.offset();
    seekT = event.clientX - seekBarPos.left;
    seekLoc = song.duration * (seekT / sArea.outerWidth());

    sHover.width(seekT);

    cM = seekLoc / 60;

    ctMinutes = Math.floor(cM);
    ctSeconds = Math.floor(seekLoc - ctMinutes * 60);

    if ((ctMinutes < 0) || (ctSeconds < 0))
        return;
    if ((ctMinutes < 0) || (ctSeconds < 0))
        return;

    if (ctMinutes < 10)
        ctMinutes = '0' + ctMinutes;
    if (ctSeconds < 10)
        ctSeconds = '0' + ctSeconds;

    if (isNaN(ctMinutes) || isNaN(ctSeconds))
        insTime.text('--:--');
    else
        insTime.text(ctMinutes + ':' + ctSeconds);

    insTime.css({ 'left': seekT, 'margin-left': '-21px' }).fadeIn(0);
}

function hideHover() {
    sHover.width(0);
    insTime.text('00:00').css({ 'left': '0px', 'margin-left': '0px' }).fadeOut(0);
}

function playFromClickedPos() {
    song.currentTime = seekLoc;
    seekBar.width(seekT);
    hideHover();
}


function updateCurrTime() {
    nTime = new Date();
    nTime = nTime.getTime();

    if (!tFlag) {
        tFlag = true;
        trackTime.addClass('active');
    }

    curMinutes = Math.floor(song.currentTime / 60);
    curSeconds = Math.floor(song.currentTime - curMinutes * 60);

    durMinutes = Math.floor(song.duration / 60);
    durSeconds = Math.floor(song.duration - durMinutes * 60);

    playProgress = (song.currentTime / song.duration) * 100;

    if (curMinutes < 10)
        curMinutes = '0' + curMinutes;
    if (curSeconds < 10)
        curSeconds = '0' + curSeconds;

    if (durMinutes < 10)
        durMinutes = '0' + durMinutes;
    if (durSeconds < 10)
        durSeconds = '0' + durSeconds;

    if (isNaN(curMinutes) || isNaN(curSeconds))
        tProgress.text('00:00');
    else
        tProgress.text(curMinutes + ':' + curSeconds);

    if (isNaN(durMinutes) || isNaN(durSeconds))
        tTime.text('00:00');
    else
        tTime.text(durMinutes + ':' + durSeconds);

    if (isNaN(curMinutes) || isNaN(curSeconds) || isNaN(durMinutes) || isNaN(durSeconds))
        trackTime.removeClass('active');
    else
        trackTime.addClass('active');


    seekBar.width(playProgress + '%');
}

