// script.js
document.getElementById('send-btn').addEventListener('click', sendMessage);

function sendMessage() {
    const messageInput = document.getElementById('message-input');
    const message = messageInput.value.trim();
    if (message !== '') {
        const messagesContainer = document.getElementById('messages');
        const newMessage = document.createElement('div');
        newMessage.classList.add('message');
        newMessage.textContent = `Empleado 1: ${message}`;
        messagesContainer.appendChild(newMessage);
        messageInput.value = '';
        simulateReply();
    }
}

function simulateReply() {
    setTimeout(() => {
        const messagesContainer = document.getElementById('messages');
        const replyMessage = document.createElement('div');
        replyMessage.classList.add('message');
        replyMessage.textContent = `Empleado 2: Recibido`;
        messagesContainer.appendChild(replyMessage);
    }, 1000);
}
