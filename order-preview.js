const messageInput = document.getElementById('textonsign');
const eventInput = document.getElementById('event');
const colorInput = document.getElementById('color');
const previewMessage = document.getElementById('preview-message');
const previewEvent = document.getElementById('preview-event');
const previewSign = document.getElementById('preview-sign');
const messageCount = document.getElementById('message-count');
const colorValue = document.getElementById('color-value');

function updatePreview() {
  previewMessage.textContent = messageInput.value.trim() || 'YOUR NEON WORDS';
  previewEvent.textContent = `${eventInput.value.trim() || 'YOUR OCCASION'} ↗`;
  previewSign.style.setProperty('--neon-color', colorInput.value);
  messageCount.textContent = messageInput.value.length;
  colorValue.textContent = colorInput.value.toUpperCase();
}

[messageInput, eventInput, colorInput].forEach((input) => input.addEventListener('input', updatePreview));
updatePreview();
