const fiPopup = document.getElementById("coPop");
const closeButton = document.querySelector('.clobut');
const payButton = document.querySelector('.paym');
const triggerDiv = document.querySelector('#trigger-div');

function openConpo() {
  fiPopup.classList.remove("con-popup");
  fiPopup.classList.add("con-popup");
}

closeButton.addEventListener('click', function() {
  fiPopup.style.display = 'none';
});

payButton.addEventListener('click', function() {
  // Add your payment code here
});

triggerDiv.addEventListener('click', function() {
  openConpo();
});
