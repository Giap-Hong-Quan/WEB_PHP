// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");


// // Get the <span> element that closes the modal
var close_modal = document.querySelector(".close")


// When the user clicks the button, open the modal 
btn.onclick = function(e) {
  e.preventDefault()
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
close_modal.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}