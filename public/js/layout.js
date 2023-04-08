// <!--  start  aside and nav responsive design-->
let aside = document.querySelector('aside');
let menuList = document.querySelector('.menu-list');
let backdrop = document.querySelector('#backdrop');
let closeAside = document.querySelector('#close-aside');

closeAside.addEventListener('click',(e)=>{
    aside.classList.toggle('aside-hide');
    aside.classList.toggle('aside-show');
    backdrop.classList.toggle('d-none');

})
menuList.addEventListener('click',(e)=>{
    aside.classList.toggle('aside-hide');
    aside.classList.toggle('aside-show');
    backdrop.classList.toggle('d-none');

})
//end aside and nav responsive design
//start add/remove active
let sideLink = document.querySelectorAll('.side-link');
for(let i=0;i < sideLink.length; i++){
    sideLink[i].addEventListener('click',(e)=>{
        let currentClick = e.currentTarget;
        sideLink.forEach(function(link) {
            link.classList.remove('active');
        });
        currentClick.classList.add('active');
    })
}
//end add/remove active


