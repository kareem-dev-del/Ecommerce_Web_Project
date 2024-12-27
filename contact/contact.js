// Navbar 
// close nav bar
const nav = document.getElementById('nav');
const container = document.getElementById('container')
//bars of nav bar
const overlay = document.getElementById('overlay')
//body
const body = document.body 


// icon  nav bar
const bars = document.getElementById('bars').addEventListener('click', _ => {  
    nav.classList.add('active')
    nav.classList.remove('hide') 
    overlay.style.cssText = ` display: block;`
    body.style.overflow = 'hidden' /*ده بيخليه ثابت ومتعرفش تتحكم غير في هو بس */

});

// close icon nav bar
const close = document.getElementById('close').addEventListener('click', _ => {
    nav.classList.add('hide')
    overlay.style.cssText = ` display: none;`
    body.style.overflow = 'auto'

});

//onclick overlay
 overlay.onclick = function () {
    nav.classList.add('hide')
    overlay.style.cssText = ` display: none;`
    body.style.overflow = 'auto'

 }