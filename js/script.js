
type="text/javascript">
window.addEventListener("scroll",function(){
  var header = document.querySelector("header");
  header.classList.toggle("abajo",window.scrollY>0);
})

// Inicialización de AOS (Animate On Scroll)
AOS.init({
  duration: 1000,
  once: true
});