

const btn = document.getElementById('btn')
const viewProfile = document.getElementById('view-prof') 
const quit = document.getElementById('quit')
const btnEdit = document.getElementById('edit')
const editSection = document.getElementById('show-edit')


btn.addEventListener('click',  function(){


viewProfile.classList.add('show');
    

});


quit.onclick = function(){

    viewProfile.classList.remove('show');
}


btnEdit.onclick=function(){

  editSection.classList.add('shoEdit')


}


