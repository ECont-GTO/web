const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');

let basket = { x: canvas.width / 2 - 20, y: canvas.height - 30, width: 40, height: 20 };
let rightPressed = false;
let leftPressed = false;
let trashItems = [];
let score = 0;

document.addEventListener("keydown", keyDownHandler, false);
document.addEventListener("keyup", keyUpHandler, false);

function keyDownHandler(e) {
    if (e.key == "Right" || e.key == "ArrowRight") {
        rightPressed = true;
    } else if (e.key == "Left" || e.key == "ArrowLeft") {
        leftPressed = true;
    }
}

function keyUpHandler(e) {
    if (e.key == "Right" || e.key == "ArrowRight") {
        rightPressed = false;
    } else if (e.key == "Left" || e.key == "ArrowLeft") {
        leftPressed = false;
    }
}

function drawBasket() {
    ctx.beginPath();
    ctx.rect(basket.x, basket.y, basket.width, basket.height);
    ctx.fillStyle = "#0095DD";
    ctx.fill();
    ctx.closePath();
}

function drawTrash() {
    for (let i = 0; i < trashItems.length; i++) {
        ctx.beginPath();
        ctx.rect(trashItems[i].x, trashItems[i].y, 10, 10);
        ctx.fillStyle = "#8B0000";
        ctx.fill();
        ctx.closePath();
        trashItems[i].y += 1;
        if (trashItems[i].y > canvas.height) {
            trashItems.splice(i, 1);
            i--;
        } else if (trashItems[i].y + 10 > basket.y && trashItems[i].x > basket.x && trashItems[i].x < basket.x + basket.width) {
            trashItems.splice(i, 1);
            score++;
            i--;
        }
    }
}

function spawnTrash() {
    let x = Math.random() * (canvas.width - 10);
    trashItems.push({ x: x, y: 0 });
}

function drawScore() {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#0095DD";
    ctx.fillText("Puntuación: " + score, 8, 20);
}

function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawBasket();
    drawTrash();
    drawScore();

    if (rightPressed && basket.x < canvas.width - basket.width) {
        basket.x += 5;
    } else if (leftPressed && basket.x > 0) {
        basket.x -= 5;
    }

    requestAnimationFrame(draw);
}

setInterval(spawnTrash, 1000);
draw();