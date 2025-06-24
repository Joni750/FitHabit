

window.addEventListener('scroll', function() {
    console.log("aaa");
    let nav = document.querySelector('nav');
    let bodyHeight = document.querySelector('body').offsetHeight;
    let navHeight = document.querySelector('nav').offsetHeight;

    nav.style.backgroundColor = window.scrollY > bodyHeight ? '#000' : 'rgba(0, 0, 0, 0.6)';
    nav.style.backgroundColor = window.scrollY < navHeight ? 'transparent' : 'rgba(0, 0, 0, 0.6)';
  });
