// Get the input and button elements from the HTML
const inputBox = document.getElementById("inputPlace");
const sendButton = document.getElementById("sendbox");
const messageBox = document.getElementById("messageBox");

// Add an event listener to the send button
sendButton.addEventListener("click", () => {
  // Get the text from the input box
  const messageText = inputBox.value;

  // Create a new <div> element to hold the message
  const messageElement = document.createElement("div");
  messageElement.innerText = messageText;

  // Set the border style of the message element
  messageElement.style.fontSize = "20px";
  messageElement.style.backgroundColor = "#D9D9D9";
  messageElement.style.borderRadius = "60px";
  messageElement.style.padding = "5px";
  messageElement.style.marginBottom = "10px";

  // Add the message element to the message box
  messageBox.prepend(messageElement);

  // Clear the input box
  inputBox.value = "";

  // Scroll the message box to the bottom
  messageBox.scrollTop = messageBox.scrollHeight;
});

// Style the message box to display its child elements in reverse order
messageBox.style.display = "flex";
messageBox.style.flexDirection = "column-reverse";
