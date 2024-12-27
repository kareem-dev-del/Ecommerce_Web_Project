
// Navbar 
// close nav bar
const nav = document.getElementById('nav');
const container = document.getElementById('container')
//bars of nav bar
const overlay = document.getElementById('overlay')
//body
const body = document.body 
const overlay2 = document.getElementById('overlay2')
const parent_details = document.getElementById('parent_details')
let main_image = document.getElementById('main_image')

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



   //changephoto
let fristImgIngroup = document.getElementById('fristImgIngroup')

// See small pictures in the main picture

let changephoto = function (src) {
    main_image.src = src

}



//view the product details
const closeBroDetails = document.getElementById('closeBroDetails')

let product_details = function (src) {

    main_image.src = src
    fristImgIngroup.src = main_image.src
    parent_details.style.cssText = ` display: block;`
    overlay2.style.cssText = ` display: block;`
    body.style.overflow = 'hidden'
}

closeBroDetails.addEventListener('click', function () {
    parent_details.style.cssText = ` display: none;`
    overlay2.style.cssText = ` display: none;`
    body.style.overflow = 'auto'



});




// btn go to shop
btnGoToShop.onclick = function () {

    location.href = '../shop/shop.html'
}




// Regular Expration

let inp_search = document.getElementById('inp_search')
let button_sign = document.getElementById('button_sign')
let message_erorrEmail = document.getElementById('message_erorrEmail')
let btn_ok = document.getElementById('btn_ok')

const regex = /^([a-zA-Z0-9._%-]+@[a-zA-Z.-]+\.[a-zA-Z]{2,6})*$/gm

button_sign.addEventListener('click', function () {
    //ده عشان لو كان غير صحيح او فارغ 
    if (regex.test(inp_search.value) === false || inp_search.value === '') {
       message_erorrEmail.classList.add('activemessage_inpEmail')
        overlay2.style.cssText = ` display: block;`
        body.style.overflow = 'hidden'//بيوقف الشاشه خالص


    }
   //هيمسح الحقل لو كان البريد صحيح 
    else {
        inp_search.value = ''
    }
}

)
//لما اضغط علي الرساله الخطأ 
btn_ok.addEventListener('click', _ => {
    message_erorrEmail.classList.remove('activemessage_inpEmail')
    overlay2.style.cssText = ` display: none;`
    body.style.overflow = 'auto'


   
    
})

overlay2.onclick = function () {
    message_erorrEmail.classList.remove('activemessage_inpEmail')
    overlay2.style.cssText = ` display: none;`
    body.style.overflow = 'auto'//بيخلي الشاشه تتحرك 

}






