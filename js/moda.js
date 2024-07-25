let modal = document.getElementById('bg-modal');
let flex = document.getElementById('flex');
let abrir = document.getElementById('abrir');
let cerrar = document.getElementById('cerrar');


abrir.addEventListener('click' , function() {
    modal.style.display='flex';
});




cerrar.addEventListener('click' , function() {
    modal.style.display='none';
});


window.addEventListener('click' , function(e) {
    console.log(e.target);
    if(e.target == modal){
    modal.style.display='none';
    }
    

});