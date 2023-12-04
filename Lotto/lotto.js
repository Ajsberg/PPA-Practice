// Funkcja losująca liczby
function losuj() {
    // Pobranie wybranych liczb przez użytkownika
    var wybraneLiczby = [
        document.getElementById('num1').value,
        document.getElementById('num2').value,
        document.getElementById('num3').value,
        document.getElementById('num4').value,
        document.getElementById('num5').value,
        document.getElementById('num6').value
    ].map(Number); // Konwersja i zapisanie do tablicy pod postacią liczb (Number)

    // Sprawdzenie czy liczby są unikalne i jest ich 6
    if (new Set(wybraneLiczby).size !== wybraneLiczby.length) {
        alert('Musisz wprowadzić 6 UNIKALNYCH liczb');
        return;
    }

    // Wyświetlenie wybranych liczb
    document.getElementById('wybraneLiczby').innerText = wybraneLiczby.join(', ');

    // Losowanie 6 unikalnych liczb
    var wylosowaneLiczby = [];
    while (wylosowaneLiczby.length < 6) {
        var losowaLiczba = Math.floor(Math.random() * 49) + 1;
        if (wylosowaneLiczby.indexOf(losowaLiczba) === -1) { //Sprawdzenie czy wylosowana liczba nie została już wcześniej wylosowana
            wylosowaneLiczby.push(losowaLiczba); //Jeżeli wylosowana liczba nie została wcześniej wylosowana: dodanie liczby do tablicy wylosowaneLiczby
        }
    }

    // Wyświetlenie wylosowanych liczb
    document.getElementById('wylosowaneLiczby').innerText = wylosowaneLiczby.join(', ');

    // Wyszukanie pasujących liczb
    var pasujaceLiczby = wybraneLiczby.filter(liczba => wylosowaneLiczby.includes(liczba));

    // Wyświetlenie pasujących liczb
    if (pasujaceLiczby.length > 0){
        document.getElementById('pasujaceLiczby').innerText = pasujaceLiczby.join(', ');
    } else {
        document.getElementById('pasujaceLiczby').innerText = 'Brak, próbuj dalej :('
    }
    
}

//Autor: Kamil Mrowiec