document.querySelectorAll('[data-confirm]').forEach((element) => {
    element.addEventListener('click', (event) => {
        if (!confirm(element.dataset.confirm)) event.preventDefault();
    });
});

document.querySelectorAll('[data-qty]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = button.parentElement.querySelector('input');
        const next = Number(input.value) + Number(button.dataset.qty);
        input.value = Math.max(1, Math.min(Number(input.max || 99), next));
    });
});

const chatWidget = document.getElementById('chatWidget');
if (chatWidget) {
    const launcher = document.getElementById('chatLauncher');
    const closeButton = document.getElementById('chatClose');
    const messagesBox = document.getElementById('chatMessages');
    const profile = document.getElementById('chatProfile');
    const form = document.getElementById('chatForm');
    const input = document.getElementById('chatInput');
    const nameInput = document.getElementById('chatName');
    const emailInput = document.getElementById('chatEmail');
    const errorBox = document.getElementById('chatError');
    const unread = document.getElementById('chatUnread');
    let lastMessageId = 0;
    let hasConversation = false;
    let timer = null;

    const escapeHtml = (value) => {
        const div = document.createElement('div');
        div.textContent = value;
        return div.innerHTML;
    };

    const renderMessages = (messages, replace = true) => {
        if (replace) messagesBox.innerHTML = '';
        messages.forEach((message) => {
            const row = document.createElement('div');
            row.className = `chat-row ${message.sender}`;
            const label = message.sender === 'bot' ? 'Nexa Bot' : (message.sender === 'admin' ? 'Supporti' : 'Ju');
            row.innerHTML = `<div class="chat-bubble">${escapeHtml(message.message)}<small>${label} · ${escapeHtml(message.time)}</small></div>`;
            messagesBox.appendChild(row);
            lastMessageId = Math.max(lastMessageId, Number(message.id));
            if (!chatWidget.classList.contains('open') && message.sender === 'admin') unread.hidden = false;
        });
        if (!messages.length && replace) messagesBox.innerHTML = '<div class="chat-day">Përshëndetje! Si mund të të ndihmojmë?</div>';
        messagesBox.scrollTop = messagesBox.scrollHeight;
    };

    const loadMessages = async () => {
        try {
            const response = await fetch(`${chatWidget.dataset.fetchUrl}?after=${lastMessageId}`, {headers: {'Accept': 'application/json'}});
            const data = await response.json();
            if (!response.ok) throw new Error(data.error || 'Biseda nuk u ngarkua.');
            hasConversation = data.has_conversation;
            profile.classList.toggle('show', !hasConversation);
            renderMessages(data.messages, lastMessageId === 0);
            if (data.status === 'closed') errorBox.textContent = 'Biseda ishte mbyllur; mesazhi i ri do ta rihapë.';
        } catch (error) {
            errorBox.textContent = error.message;
        }
    };

    const openChat = () => {
        chatWidget.classList.add('open');
        unread.hidden = true;
        loadMessages();
        clearInterval(timer);
        timer = setInterval(loadMessages, 4000);
        setTimeout(() => input.focus(), 150);
    };

    const closeChat = () => {
        chatWidget.classList.remove('open');
        clearInterval(timer);
    };

    launcher.addEventListener('click', openChat);
    closeButton.addEventListener('click', closeChat);

    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        errorBox.textContent = '';
        const message = input.value.trim();
        if (!message) return;
        const button = form.querySelector('button');
        button.disabled = true;
        try {
            const body = new FormData();
            body.append('csrf', chatWidget.dataset.csrf);
            body.append('message', message);
            body.append('name', nameInput.value.trim());
            body.append('email', emailInput.value.trim());
            const response = await fetch(chatWidget.dataset.sendUrl, {method: 'POST', body, headers: {'Accept': 'application/json'}});
            const data = await response.json();
            if (!response.ok) throw new Error(data.error || 'Mesazhi nuk u dërgua.');
            input.value = '';
            hasConversation = true;
            profile.classList.remove('show');
            await loadMessages();
        } catch (error) {
            errorBox.textContent = error.message;
        } finally {
            button.disabled = false;
            input.focus();
        }
    });
}
