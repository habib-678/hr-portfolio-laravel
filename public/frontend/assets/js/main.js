// Loader Javascript //
  window.addEventListener('load', () => {
    const preloader = document.getElementById('hr-preloader');
    preloader.style.opacity = '0';
    setTimeout(() => preloader.style.display = 'none', 500); // Match transition duration
  });

  // Smooth Scrolling for Anchor Links
  document.addEventListener('DOMContentLoaded', () => {
    const hash = window.location.hash;
    if (hash) {
      // Optional: delay to allow DOM to settle
      setTimeout(() => {
        const target = document.querySelector(hash);
        if (target) {
          target.scrollIntoView({ behavior: 'smooth' });
        }
      }, 300);
    }
  });

// Sticky Navbar on Scroll
window.addEventListener('scroll', function(){
  let nav = this.document.querySelector('nav')
  nav.classList.toggle('sticky', window.scrollY > 0)
});

// Mobile Menu Toggle
$(document).ready(function () {
  let isOpen = false;

  $('.MenuButton').on('click', function (e) {
    e.stopPropagation(); // prevent click from bubbling up
    $('.sidebar_icon').toggleClass('clicked');

    if (!isOpen) {
      if ($(window).width() <= 769) {
        $('.sidebar').css({
          height: '100vh',
          width: '100%',
          right: '0',
          top: '0',
          opacity: '1'
        });
      } else {
        $('.sidebar').css({
          height: '650px',
          width: '450px',
          opacity: '1'
        });
      }
      isOpen = true;
    } else {
      closeSidebar();
    }
  });

  // Close sidebar on click outside
  $(document).on('click', function (e) {
    if (
      isOpen &&
      !$(e.target).closest('.sidebar').length &&
      !$(e.target).closest('.MenuButton').length
    ) {
      closeSidebar();
      $('.sidebar_icon').removeClass('clicked');
    }
  });

  function closeSidebar() {
    $('.sidebar').css({
      height: '0',
      width: '0',
      opacity: '0'
    });
    isOpen = false;
  }
});

// Active Link Highlighting on Scroll
$(document).ready(function () {
  const $navLinks = $('.nav_link');
  const $sections = $('section');
  let currentSection = 'hero'; 

  $(window).on('scroll', function () {
    const scrollPos = $(window).scrollTop();

    $sections.each(function () {
      const $section = $(this);
      if (scrollPos >= $section.offset().top - 200) {
        currentSection = $section.attr('id');
      }
    });

    $navLinks.each(function () {
      const $link = $(this);
      if ($link.attr('href').includes(currentSection)) {
        $navLinks.removeClass('active'); 
        $link.addClass('active');  
      }
    });
  });
});


// Service Section Hover Effect
$('#services .item').on({
  mouseenter: function () {
    $(this).find('img').css('opacity', 1);
  },
  mouseleave: function () {
    $(this).find('img').css('opacity', 0);
  },
  mousemove: function (e) {
    const $this = $(this);
    const $img = $this.find('img');

    const offset = $this.offset();
    const relativeX = e.pageX - offset.left + 30;
    const relativeY = e.pageY - offset.top - ($img.height() / 2);

    $img.css({
      left: relativeX + 'px',
      top: relativeY + 'px'
    });
  }
});


// Tesimonial Section Js
var swiper = new Swiper(".reviewSlide",  {
  loop: true,
  autoplay: {
    delay: 15000,
  },
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
$(document).ready(function(){
  let tabBtn = $('.tab_btn');
  tabBtn.first().addClass('active');

  let serviceID = tabBtn.data('service-id');
  loadProjects(serviceID);


  tabBtn.on('click', function(){
    tabBtn.removeClass('active');
    $(this).addClass('active');
    $('#project-content').html('')
    serviceID = $(this).data('service-id');

    loadProjects(serviceID);
  })

  function loadProjects(serviceID){
    $.ajax({
      url: 'projects/'+serviceID,
      type: 'GET',
      dataType:'html',
      success: function(response){
        $('#project-content').html(response)
      }
    }); //ajax  
  }
});




// Number Count
$(document).ready(function () {
  const $numContainer = $('#number-info');
  const $numbers = $('.number');
  let hasAnimated = false;

  if ($numContainer.length) {
    $(window).on('scroll', function () {
      const scrollTop = $(window).scrollTop();
      const containerTop = $numContainer.offset().top;

      if (scrollTop + $(window).height() >= containerTop + 100 && !hasAnimated) {
        $numbers.each(function () {
          const $this = $(this);
          const end = parseInt($this.data('number'));
          let start = 0;

          const duration = 3000;
          const interval = duration / end;

          const counter = setInterval(() => {
            start++;
            $this.text(start);
            if (start >= end) clearInterval(counter);
          }, interval);
        });

        hasAnimated = true;
      }
    });
  }
});




//cursor effect
const cursor = document.querySelector('.custom-cursor');
let mouseX = 0;
let mouseY = 0;
let currentX = 0;
let currentY = 0;
const speed = 0.10;

window.addEventListener('mousemove', (e) => {
  mouseX = e.clientX;
  mouseY = e.clientY;
});

function animate() {
  currentX += (mouseX - currentX) * speed;
  currentY += (mouseY - currentY) * speed;
  cursor.style.transform = `translate(${currentX}px, ${currentY}px)`;
  requestAnimationFrame(animate);
}
animate();

//Show Alert
function showAlert(title = 'Notice', message = '', type = 'success') {
  const iconMap = {
    success: 'fa-circle-check',
    error: 'fa-circle-xmark',
    warning: 'fa-triangle-exclamation',
    info: 'fa-circle-info'
  };

  const colorMap = {
    success: '#4caf50',
    error: '#f44336',
    warning: '#ffc107',
    info: '#2196f3'
  };

  $('#alert-title').text(title);
  $('#alert-message').text(message);

  $('#alert-icon i')
    .removeClass()
    .addClass(`fas ${iconMap[type] || 'fa-circle-info'}`)
    .css('color', colorMap[type] || '#2196f3');

  $('#custom-alert .alert-content').removeClass('closing');

  $('#custom-alert')
    .css('display', 'flex')
    .hide()
    .fadeIn(100, function () {
      $('#custom-alert .alert-content').focus();
    });
}

//hide alert
function hideAlert() {
  const $content = $('#custom-alert .alert-content');
  $content.addClass('closing');
  setTimeout(() => {
    $('#custom-alert').fadeOut(100);
    $content.removeClass('closing');
  }, 200);
}

// OK Button click
$(document).on('click', '.close-alert-btn', hideAlert);

// Click outside (on overlay, not inside .alert-content)
$(document).on('click', '#custom-alert', function (e) {
  if (!$(e.target).closest('.alert-content').length) {
    hideAlert();
  }
});


const textElement = document.querySelector('.blinking-text');

if (textElement) {
  const roles = ['Graphic Designer', 'Web Designer', 'Web Developer'];
  let currentIndex = 0;

  setInterval(() => {
    currentIndex = (currentIndex + 1) % roles.length;
    textElement.style.opacity = 0;

    setTimeout(() => {
      textElement.textContent = roles[currentIndex];
      textElement.style.opacity = 1;
    }, 300);
  }, 2000);
}


