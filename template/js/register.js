// const name = document.querySelector("#name")
// const email = document.querySelector("#email")
// const password = document.querySelector("#password")
// const file = document.querySelector("#file")
// const form = document.querySelector("form")


// function showError(input,message){
//     let parent=input.parentElement
//     let red=parent.querySelector(".red");
//     parent.classList.add('error')
//     parent.classList.remove('success')
//     red.innerHTML=message
    
// }

// function showSuccess(input,message){
//     let parent=input.parentElement
//     let green=parent.querySelector(".green");
//     green.innerHTML=message
//    parent.classList.add('success')
//    parent.classList.remove('error')
// }



// function checkEmptyError(listInput){
//     listInput.forEach(input=>{
//         input.onblur=function(){
//             input.value=input.value.trim()
//             if(input.value==''){
//                 showError(input,'Vui lòng nhập đầy đủ');
//             }else{
//                 showSuccess(input,'<i class="fa-solid fa-circle-check"></i>')
//             }
//         }
//     })
// }
// checkEmptyError([name,email,password])





const close=document.querySelector('.toast_close')
const toast=document.querySelector('#toast')

close.addEventListener('click',()=>{
    toast.remove();
})