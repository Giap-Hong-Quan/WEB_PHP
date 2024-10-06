    const close=document.querySelector('.toast_close')
    const toast=document.querySelector('#toast')

    close.addEventListener('click',()=>{
        toast.remove();
    })