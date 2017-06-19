// Scroll to a section
const scrollTo = (target) => {
    let distance = document.querySelector(target).offsetTop;
    let scrollInterval = setInterval(() => {
        if ( window.scrollY < distance ) {
            if ((window.scrollY + 25) <= distance) {
                window.scrollBy( 0, 25 );
            } else {
                let exceed = distance - window.scrollY;
                window.scrollBy( 0, exceed );
            }
        }
        else {
            clearInterval(scrollInterval);
        }
    },10);
}

// One by One
const oneByOne = (group, interval) => {
    let obj_ev = group.children;
    let arr_ev = Object.keys(obj_ev).map(key => obj_ev[key]);
    let length = arr_ev.length;

    for (let i = 0; i < length; i++) {
        setTimeout(() => {
            let max = length - i;
            let random = Math.floor((Math.random() * max) + 0);
            arr_ev[random].classList.add('loaded');
            arr_ev.splice(random, 1);
        }, interval*i);
    }
}


document.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector('body');

    // Fadein content
    body.classList.add('loaded');

    // OneByOne effect
    const evangelists = document.querySelector('.evangelists');
    if(document.body.contains(evangelists))
        oneByOne(evangelists, evangelists.getAttribute('data-interval'));

    const projects = document.querySelector('.projects');
    if(document.body.contains(projects))
        oneByOne(projects, projects.getAttribute('data-interval'));

    /*
    * HOMEPAGE
    * */
    // Scroll to section
    document.body.onclick = (e) => {
        let target = e.target.closest('button').getAttribute('data-target');
        scrollTo(target);
    };

    // Section Welcome animations
    const homepage = document.querySelector('#homepage')
    if(document.body.contains(homepage))
        setTimeout(() => {
            document.querySelector('#homepage .bandes-container .bandes').classList.add('loaded');
            document.querySelector('#homepage .slogan-container').classList.add('loaded');
            document.querySelector('#homepage .link-container .btn-down').classList.add('loaded');
        }, 400);



});