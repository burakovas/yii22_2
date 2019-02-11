if (!window.Websocket) {
    alert("Your browser do not support sockets!!");

}

var webSocket =new WebSocket("ws://localhost:8081");

document.getElementById("chat_form")
    .addEventListener('submit', function (event) {
        var textMessage = this.message.value;
        webSocket.send(textMessage);
        return false;
    });

WebSocket.onmessage = function (event) {
    var data = event.data;
    var messageContainer = document.createElement('div');
    var textNode = document.createTextNode(data);
    messageContainer.appendChild(textNode);
    document.getElementById("root_chat")
        .appendChild(messageContainer);
};