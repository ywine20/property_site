//start side nav
let sideNav = document.getElementById('sideNav');
let sideNavButton = document.getElementById('sideNavButton');
let sideCloseBtn = document.getElementById('slideClose');
let offcanvasBackdrop = document.querySelector('.offcanvas-backdrop');
let sideNavLink = document.querySelectorAll('.side-nav-link');

sideNavButton.addEventListener('click',()=>{
    sideBarCloseOpen();
})
sideCloseBtn.addEventListener('click',()=>{
    sideBarCloseOpen();
})
offcanvasBackdrop.addEventListener('click',(e)=>{
    sideBarCloseOpen();
});

for(let i=0; i<= sideNavLink.length;i++){
    sideNavLink[i].addEventListener('click',()=>{
        sideBarCloseOpen();
    })
}

function sideBarCloseOpen(){
    sideNav.classList.toggle('leftMinus');
    offcanvasBackdrop.classList.toggle('backdropHide');
    document.body.classList.toggle('backdropShow');
}
// end side nav


//small function
    // const subText = () =>{
    //     let text = "Hello world! fndsakj falsjf al jflasfjk lasfjklasfjklds fkjdsalfj;pafj"; 
    //     let result = text.substring(0, 30);
    //     console.log('hello');
    // }




    // const subText = (text) =>{
    //     return text.substring(0, 60) + '...';
    // }
    
    
    //  let entity = document.querySelectorAll('.entity') ;
    //  for(let i=0; i<= entity.length;i++){
    //   let realText = entity[i].innerText;
    //   let changeText = subText(realText);
    //   entity[i].innerText = changeText;
    //   console.log(changeText);
    
    // }
    
//end small function



