import domReady from '@roots/sage/client/dom-ready';
import gsap from '@gsap/shockingly';
import { SplitText } from "@gsap/shockingly/SplitText";
import { ScrollTrigger } from "@gsap/shockingly/ScrollTrigger";
import { deviceType } from 'detect-it';

gsap.registerPlugin(ScrollTrigger, SplitText);

/**
 * Application entrypoint
 */
domReady(async () => {

  // Only for none touch screen devices
  if(deviceType !== 'touchOnly') {

      // Cursor 
      let cursorActive = false;
      gsap.set(".cursor", {xPercent: -50, yPercent: -50});
    
      let xTo = gsap.quickTo(".cursor", "x", {duration: 0.2, ease: "power3.out"}),
          yTo = gsap.quickTo(".cursor", "y", {duration: 0.2, ease: "power3.out"});
    
      window.addEventListener("mousemove", e => {
        xTo(e.clientX);
        yTo(e.clientY);
        if(!cursorActive) {
          cursorActive = !cursorActive;
          gsap.to(".cursor", {opacity: 1, duration: 0.8, ease: "none"});
        }
      });

      const links = document.querySelectorAll('a, input ~ label');
      if(links) {
        links.forEach(link => {
          link.addEventListener('mouseenter', () => {
            document.body.classList.add('hovering');
          })
          link.addEventListener('mouseleave', () => {
            document.body.classList.remove('hovering');
          })
        })
      }
  } else {
    document.body.classList.add('mobile');
  }

  

  // Hero Text
  const heroTitle = document.querySelector('.hero h1')
  if(heroTitle) {
    let split = new SplitText(heroTitle.querySelector('span'), {type: "words,chars"});
    gsap.set(heroTitle, {opacity: 0});
    gsap.fromTo(heroTitle, {opacity: 0, y: 30}, {opacity: 1, y: 0, duration: 0.8, delay: 0.5});
  }

  // Images 

  const images = document.querySelectorAll('.image.image--parallax .image__inner img');

  if(images) {
    images.forEach(image => {
      gsap.set(image, {scale: 1.3, y: '-20%'});
      let tl = gsap.timeline({
        scrollTrigger: {
          trigger: image,
          start: 'top bottom', // when the top of the trigger hits the top of the viewport
          end: 'bottom top', 
          scrub: 1,
          ease: 'power3.inOut',
        }
      });
      tl.to(image, {y: '20%'});
    })
  }

  // JavaScript function to detect when the user scrolls more than 1px from the top
  window.addEventListener('scroll', function() {
    if (window.scrollY > 1 || document.documentElement.scrollTop > 1) {
      document.body.classList.add('scrolled');
    } else {
      document.body.classList.remove('scrolled');
    }
  });


  // Select all iframe elements that have 'youtube.com' in their src
  const iframes = document.querySelectorAll('iframe[src*="youtube.com"]');

  if(iframes) {
    // Loop through each iframe
    iframes.forEach(function(iframe) {
      // Create a wrapper div element
      var wrapper = document.createElement('div');
      wrapper.classList.add('video');  // Add 'video' class to the wrapper div

      // Insert the wrapper before the iframe
      iframe.parentNode.insertBefore(wrapper, iframe);
      
      // Move the iframe inside the wrapper
      wrapper.appendChild(iframe);
    });
  }


});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
