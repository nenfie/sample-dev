const tanah = document.querySelectorAll('.tanah');
const tikus = document.querySelectorAll('.tikus');
const papanSkor = document.querySelector('.papan-skor');
const pop = document.querySelector('#pop');

let tanahSebelumnya;
let selesai;
let skor;

function randomTanah(tanah) {
    const t = Math.floor(Math.random() * tanah.length);
    const tRandom = tanah[t];
    if (tRandom == tanahSebelumnya) {
        randomTanah(tanah);
    }
    tanahSebelumnya = tRandom;
    return tRandom;
}

function randomWaktu(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}

function munculkanTikus() {
    const tRandom = randomTanah(tanah);
    const wRandom = randomWaktu(300, 1000);
    tRandom.classList.add('muncul');

    setTimeout(() => {
        tRandom.classList.remove('muncul');
        if (!selesai) {
            munculkanTikus();
        } else {
            alert('Thankyou for playing')
        }
    }, wRandom);
}

function mulai() {
    selesai = false;
    skor = 0;
    papanSkor.textContent = 0;
    munculkanTikus();
    setTimeout(() => {
        selesai = true;
    }, 10000);
}

function pukul() {
    skor++;
    // this.style.transition = "TOP 0s";
    this.parentNode.classList.remove('muncul');
    papanSkor.textContent = skor;
    pop.play();
}

tikus.forEach(t => {
    t.addEventListener('click', pukul);
});