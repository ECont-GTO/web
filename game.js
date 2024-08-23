const words = ['contaminacion', 'residuos', 'reciclaje', 'plastico', 'aire', 'agua', 'sostenible', 'ecosistema', 'basura', 'econt', 'ecologico', 'arbol', 'suelo', 'lumminico'];
let chosenWord = words[Math.floor(Math.random() * words.length)];
let guessedWord = Array.from('_'.repeat(chosenWord.length));
let incorrectGuesses = 0;
const maxIncorrectGuesses = 6;

const wordContainer = document.getElementById('word-container');
const keyboard = document.getElementById('keyboard');

function displayWord() {
    wordContainer.innerHTML = guessedWord.join(' ');
}

function displayKeyboard() {
    const alphabet = 'abcdefghijklmnopqrstuvwxyz'.split('');

    alphabet.forEach(letter => {
        const key = document.createElement('div');
        key.classList.add('key');
        key.textContent = letter;
        key.addEventListener('click', () => checkLetter(letter));
        keyboard.appendChild(key);
    });
}

function checkLetter(letter) {
    if (guessedWord.includes(letter)) return;

    let letterFound = false;

    for (let i = 0; i < chosenWord.length; i++) {
        if (chosenWord[i] === letter) {
            guessedWord[i] = letter;
            letterFound = true;
        }
    }

    if (!letterFound) {
        incorrectGuesses++;
        if (incorrectGuesses >= maxIncorrectGuesses) {
            endGame(false);
        }
    }

    displayWord();
    checkWin();
}

function checkWin() {
    if (guessedWord.join('') === chosenWord) {
        endGame(true);
    }
}

function endGame(win) {
    const message = win ? '¡Ganaste!' : '¡Perdiste! La palabra era: ' + chosenWord.toUpperCase();
    alert(message);
    resetGame();
}

function resetGame() {
    chosenWord = words[Math.floor(Math.random() * words.length)];
    guessedWord = Array.from('_'.repeat(chosenWord.length));
    incorrectGuesses = 0;
    keyboard.innerHTML = '';
    displayWord();
    displayKeyboard();
}

displayWord();
displayKeyboard();