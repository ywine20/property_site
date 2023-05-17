// start side nav
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

for(let i=0; i < sideNavLink.length;i++){
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






