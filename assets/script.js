var arr = ['gruvbox', 'dracula', 'monokay', 'solarised-dark'];

var randomTheme = arr[Math.floor(Math.random() * arr.length)];

document.body.classList.add(randomTheme);




// Obtener el elemento select
const select = document.getElementById('theme');

// Agregar un listener para el evento change
select.addEventListener('change', (e) => {
  // Obtener el valor seleccionado
  const theme = e.target.value;

  // Remover los estilos anteriores
  document.body.classList.remove('gruvbox', 'dracula', 'monokay', 'solarised-dark');

  // Agregar los nuevos estilos
  document.body.classList.add(theme);
});

//panel
function togglePanel() {
  const panel = document.getElementById("panel");
  const more = document.querySelector(".more");
  const bvoid = document.querySelector(".void");
  if (panel.classList.contains("panelOpen")) {
    panel.classList.remove("panelOpen");
    bvoid.style.display = "none";
    more.innerText = "+";
  } else {
    panel.classList.add("panelOpen");
    bvoid.style.display = "block";
    more.innerText = "-";
  }
}
document.querySelector(".void").addEventListener('click', ()=> {
  togglePanel();
});

//nerdtree
const tree = document.querySelector('.tree');

const toggleTree = (e) => {
  const parentLi = e.target.parentNode;
  const childUl = parentLi.querySelector('ul');
  if (childUl) {
    childUl.hidden = !childUl.hidden;
  }
};
tree.addEventListener('click', toggleTree);