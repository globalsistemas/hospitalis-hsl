
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

const dropdownContent = document.querySelector('.dropdown-content');

dropdownContent.addEventListener('click', function(event) {
  // Impede que o clique suba para a página e feche o menu
  event.stopPropagation();
});
