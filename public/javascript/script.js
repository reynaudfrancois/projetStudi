/*var nav = document.querySelector("nav");
nav.style.position = "relative";
nav.style.width = "100%";

document.getElementById("title").style.display = "none";
document.getElementById("blog").style.display = "none";*/

var n = 10;

var images = new Array(n);
var i, j;
for (i = 0; i < images.length; i++) {
    j = "/public/images/imagesOfSlider/" + i.toString() + ".JPG";
    images[i] = j;
}

var i = 0;

var tableTitlesImages = ["Titre1", "Titre 2", "Titre 3", "Titre 4", "Titre 5"];
tableTitlesImages.push("Titre1", "Titre 2", "Titre 3", "Titre 4", "Titre 5");

var titleImage = document.getElementById("titleImage");
titleImage.innerHTML = tableTitlesImages[0];

var counterImage = document.getElementById("counterImage");
var counterDenominator = "/" + n;
var initCounter = 1 + counterDenominator;
counterImage.innerHTML = initCounter;

var before = document.getElementById("before");
var next = document.getElementById("next");

function nextImg() {
    if (i < images.length - 1) {
        i++;
    } else {
        i = 0;
    }
    beforeNext();
}

function beforeImg() {
    if (i > 0) {
        i--;
    } else {
        i = n - 1;
    }
    beforeNext();
}

function beforeNext() {
    document.slide.src = images[i];
    counterImage.innerHTML = (i + 1) + counterDenominator;
    titleImage.innerHTML = tableTitlesImages[i];
}

before.addEventListener("click", beforeImg);
next.addEventListener("click", nextImg);