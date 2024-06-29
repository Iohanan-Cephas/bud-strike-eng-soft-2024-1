const minutesElement = document.querySelector("#minutes");
const expiredMessage = document.querySelector("#expired-message");
const main = document.querySelector("#container"); // Supondo que você tenha um elemento com id "container"
const totalTimeInSeconds = 30 * 60;

let remainingTimeInSeconds = totalTimeInSeconds - 1; // Começa em 29:59

function updateTimer() {
    const minutes = Math.floor(remainingTimeInSeconds / 60);
    const seconds = remainingTimeInSeconds % 60;

    const formattedSeconds = seconds < 10 ? `0${seconds}` : seconds;

    minutesElement.textContent = `${minutes}:${formattedSeconds}`;

    remainingTimeInSeconds--;

    if (remainingTimeInSeconds < 0) {
        clearInterval(timerInterval);
        document.body.style.backgroundColor = "#ffffff"; // Torna a tela branca
        expiredMessage.classList.add("show"); // Mostra a mensagem de expiração
        main.style.display = "none"; // Esconde o conteúdo principal
    }
}

// Chamando a função updateTimer imediatamente para exibir 29:59
updateTimer();

// Intervalo de atualização do timer a cada segundo
const timerInterval = setInterval(updateTimer, 1000);


setTimeout(()=> {
  window.location = "../paymentConfirmed/index.php"
}, 15000)