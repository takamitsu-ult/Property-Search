// game.js

const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');

let playerX = 50;
let playerY = canvas.height - 150;
const playerWidth = 60;
const playerHeight = 180;
const playerSpeed = 40;

const balls = [];

function gameLoop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // 鉄球の更新と描画
    for (let i = 0; i < balls.length; i++) {
        const ball = balls[i];
        ball.y += ball.speed;
        ctx.fillStyle = '#F00';
        ctx.fillRect(ball.x, ball.y, ball.size, ball.size);

        // プレイヤーとの当たり判定
        if (
            playerX < ball.x + ball.size &&
            playerX + playerWidth > ball.x &&
            playerY + playerHeight > ball.y &&
            playerY + playerHeight < ball.y + ball.size // ボールの下辺のみに当たり判定
        ) {
            showReloadButton();
            return;
        }
    }

    // プレイヤーの描画
    ctx.fillStyle = '#00F';
    ctx.fillRect(playerX, playerY, playerWidth, playerHeight);

    // 新しい鉄球をランダムに生成
    if (Math.random() < 0.02) {
        balls.push({
            x: Math.random() * (canvas.width - 60),
            y: 0,
            size: 60,
            speed: Math.random() * 5 + 2
        });
    }

    requestAnimationFrame(gameLoop);
}

function showReloadButton() {
    const reloadButton = document.createElement('button');
    reloadButton.innerText = 'リロード';
    reloadButton.addEventListener('click', () => {
        location.reload();
    });
    document.body.appendChild(reloadButton);
}

window.addEventListener('keydown', (e) => {
    switch (e.key) {
        case 'a':
            if (playerX - playerSpeed > 0) {
                playerX -= playerSpeed;
            }
            break;
        case 'd':
            if (playerX + playerWidth + playerSpeed < canvas.width) {
                playerX += playerSpeed;
            }
            break;
    }
});

gameLoop();
