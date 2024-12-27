
// Navbar 
const nav = document.getElementById('nav');
const overlay = document.getElementById('overlay')
const container = document.getElementById('container')
const body = document.body


const bars = document.getElementById('bars').addEventListener('click', _ => {
    nav.classList.add('active')
    nav.classList.remove('hide')
    overlay.style.cssText = ` display: block;`
    body.style.overflow = 'hidden'

});

const close = document.getElementById('close').addEventListener('click', _ => {
    nav.classList.add('hide')
    overlay.style.cssText = ` display: none;`
    body.style.overflow = 'auto'
});

overlay.onclick = function () {
    nav.classList.add('hide')
    overlay.style.cssText = ` display: none;`
    body.style.overflow = 'auto'

}
//Regular Expration

let inp_search = document.getElementById('inp_search')
let button_sign = document.getElementById('button_sign')
let message_erorrEmail = document.getElementById('message_erorrEmail')
let btn_ok = document.getElementById('btn_ok')


const regex = /^([a-zA-Z0-9._%-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,6})*$/gm

button_sign.addEventListener('click', function () {
    if (regex.test(inp_search.value) === false || inp_search.value === '') {
        message_erorrEmail.classList.add('activemessage_inpEmail')
        overlay2.style.cssText = ` display: block;`
        body.style.overflow = 'hidden'
    }

    else {
        inp_search.value = ''
    }
}

)
btn_ok.addEventListener('click', _ => {
    message_erorrEmail.classList.remove('activemessage_inpEmail')
    overlay2.style.cssText = ` display: none;`
    body.style.overflow = 'auto'

})


























