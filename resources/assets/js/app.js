// Scroll to a section
const scrollTo = target => {
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

// Square size
const gallery = (gallery, items) => {
    let i = 0;
    let totalItems = items.length;

    [].forEach.call(items, item => {

        let num = item.getAttribute('data-item');
        let row = Math.floor(num/13);
        let gridSize = document.getElementById(gallery).offsetWidth;
        let size = gridSize / 5;

        // On définit la taille totale de la grille
        let gallerySize = gridSize;
        let sup = totalItems - 12;
        if (sup < 5 && sup > 0) {
            gallerySize += (size*2);
        } else if (sup < 7) {
            gallerySize += (size*4);
        } else {
            gallerySize += (size*5);
        }
        document.getElementById(gallery).style.height = gallerySize + 'px';

        // On place les éléments et on définit leur heuteur
        switch(num%12) {
            case 1:
                item.style.left = 0 + '%';
                item.style.top = 0 + (gridSize*row) + 'px';
                item.style.height = (size*2) + 'px';
                break;
            case 2:
                item.style.left = 40 + '%';
                item.style.top = 0 + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            case 3:
                item.style.left = 40 + '%';
                item.style.top = size + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            case 4:
                item.style.left = 60 + '%';
                item.style.top = 0 + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            case 5:
                item.style.left = 60 + '%';
                item.style.top = size + (gridSize*row) + 'px';
                item.style.height = (size*2) + 'px';
                break;
            case 6:
                item.style.left = 20 + '%';
                item.style.top = (size*2) + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            case 7:
                item.style.left = 0 + '%';
                item.style.top = (size*2) + (gridSize*row) + 'px';
                item.style.height = (size*2) + 'px';
                break;
            case 8:
                item.style.left = 20 + '%';
                item.style.top = (size*3) + (gridSize*row) + 'px';
                item.style.height = (size*2) + 'px';
                break;
            case 9:
                item.style.left = 40 + '%';
                item.style.top = (size*3) + (gridSize*row) + 'px';
                item.style.height = (size*2) + 'px';
                break;
            case 10:
                item.style.left = 0 + '%';
                item.style.top = (size*4) + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            case 11:
                item.style.left = 80 + '%';
                item.style.top = (size*3) + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            case 0:
                item.style.left = 80 + '%';
                item.style.top = (size*4) + (gridSize*row) + 'px';
                item.style.height = size + 'px';
                break;
            default:
                console.log('error gallery');
        }
    })
}
/* ===============
* ===== ON LOAD
=============== */
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
        if(e.target.closest('button.btn-down')) {
            let target = e.target.closest('button').getAttribute('data-target');
            scrollTo(target);
        }
    };

    // Section Welcome animations
    const homepage = document.querySelector('#homepage')
    if(document.body.contains(homepage))
        setTimeout(() => {
            document.querySelector('#homepage .bandes-container .bandes').classList.add('loaded');
            document.querySelector('#homepage .slogan-container').classList.add('loaded');
            [].forEach.call(document.querySelectorAll('#homepage .link-container .btn-down'), btn => {
                btn.classList.add('loaded');
            });
        }, 400);

    const galleryProject = document.getElementById('gallery-projects');
    if(document.body.contains(galleryProject)) {
        gallery('gallery-projects', document.querySelectorAll('#gallery-projects ul li'));
    }

});

/* ===============
 * ===== ON RESIZE
 =============== */
window.addEventListener("resize", () => {
    const galleryProject = document.getElementById('gallery-projects');
    if(document.body.contains(galleryProject)) {
        [].forEach.call(document.querySelectorAll('#gallery-projects ul li'), item => {
            gallery('gallery-projects', document.querySelectorAll('#gallery-projects ul li'));
        })
    }
});