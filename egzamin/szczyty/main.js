var nr = 1;
function podmiana(src, numer){
    var main = document.getElementById('main');
    main.src = src;
    nr = numer;
}

function previous(){
    var obecne = document.getElementById('main');
    nr -= 1;
    if (nr == 0) nr = 5;
    if (nr == 1) obecne.src = '1.jpg';
    if (nr == 2) obecne.src = '2.jpg';
    if (nr == 3) obecne.src = '3.jpg';
    if (nr == 4) obecne.src = '4.jpg';
    if (nr == 5) obecne.src = '5.jpg';
}

function next(){
    var obecne = document.getElementById('main');
    nr += 1;
    if (nr == 6) nr = 1;
    if (nr == 1) obecne.src = '1.jpg';
    if (nr == 2) obecne.src = '2.jpg';
    if (nr == 3) obecne.src = '3.jpg';
    if (nr == 4) obecne.src = '4.jpg';
    if (nr == 5) obecne.src = '5.jpg';
}