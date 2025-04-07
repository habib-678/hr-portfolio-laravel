// // Loader Javascript //
// let loader = document.querySelector('#preloader')
// setTimeout(function(){
//   loader.style.bottom = '-100%'
//   loader.style.borderRadius = '100%'
// },2000);

window.addEventListener('scroll', function(){
  let nav = this.document.querySelector('nav')
  nav.classList.toggle('sticky', window.scrollY > 0)
});



let sidebarBtn = document.querySelector('.MenuButton')
let sidebarIcon = document.querySelector('.sidebar_icon')
let sidebar = document.querySelector('.sidebar')
let navMenu = document.querySelector('.nav_menu')

sidebarBtn.addEventListener("click", function(){
  sidebarIcon.classList.toggle('clicked')
})
let flag = 0;
sidebarBtn.addEventListener('click', function(){
  if(flag == 0){
    sidebar.style.height = '700px';
    sidebar.style.width = '450px';
    sidebar.style.opacity = '1';
    flag = 1;
    if (window.innerWidth <= 769) {
      sidebar.style.height = '100vh';
      sidebar.style.width = '100%';
      sidebar.style.right= '0';
      sidebar.style.top= '0';
    }
  }
  else{
    sidebar.style.height = '0'
    sidebar.style.width = '0'
    sidebar.style.opacity = '0'
    flag = 0;
  }
})


const navLinkEls = document.querySelectorAll('.nav_link');
const sectionEls = document.querySelectorAll('section');

let currentSection = 'home';
window.addEventListener('scroll', () => {
  sectionEls.forEach(sectionEl => {
    if (window.scrollY >= (sectionEl.offsetTop - 200)){
      currentSection = sectionEl.id;
    }
  });
  
  navLinkEls.forEach(navLinkEl => {
    if (navLinkEl.href.includes(currentSection)){
      document.querySelector('.active').classList.remove('active');
      navLinkEl.classList.add('active');
    }
  })
});

// Service Section Hover Effect
let item = document.querySelectorAll('#services .item');
let itemImg = document.querySelectorAll('#services .item img');

item.forEach(function(val){
  val.addEventListener('mouseenter', function(){
    val.childNodes[7].style.opacity = 1;
  });
  val.addEventListener('mouseleave', function(){
    val.childNodes[7].style.opacity = 0;
  });
  val.addEventListener('mousemove', function(dets){
    val.childNodes[7].style.left = dets.x + "px";
  })
});

// Tesimonial Section Js
var swiper = new Swiper(".reviewSlide",  {
  loop: true,
  autoplay: true,
  slidesPerView: 1,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    820: {
      slidesPerView: 2,
    },
   1500: {
      slidesPerView: 3,
    },
  },
});
// Blog Section Js
var swiper = new Swiper(".blogSlider",  {
  loop: true,
  autoplay: true,
  slidesPerView: 1,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    820: {
      slidesPerView: 2,
    },
   1500: {
      slidesPerView: 3,
    },
  },
});

// Projects Tab
tab();

function tab(){
const tabs = document.querySelectorAll('#projects .tab_btn');
const allContent = document.querySelectorAll('#projects .content');

tabs.forEach((tab, index)=>{
  tab.addEventListener('click', ()=>{
    tabs.forEach(tab=>{tab.classList.remove('active')});
    tab.classList.add('active');

    allContent.forEach(content=>{content.classList.remove('active')});
    allContent[index].classList.add('active')
  })
})
}

// Number Count
var number = document.querySelectorAll('.number')
var numContainer = document.querySelector('#number-info')


let test = false;

window.onscroll = () =>{
  if(window.screenY = numContainer.offsetTop){
    if(!test){
      number.forEach((e)=>{
        let start = 0;
        let end = e.dataset.number;
      
        let count = setInterval(()=>{
          start++;
          e.textContent = start;
          if(start == end){
            clearInterval(count);
          }
        }, 3000 / end)
      })
    }
    test = true;
  }
}


