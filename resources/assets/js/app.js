
const tealToggle = ({ target }) => {
  console.log(1);
};

document.addEventListener('DOMContentLoaded', () => {
    const body = document.querySelector('body');

    // Fadein content
    body.classList.add('loaded');

    /*
    * HOMEPAGE
    * */
    // Scroll to section
    document.querySelector('.btn-down').onclick = tealToggle;

    // Section Welcome animations
    setTimeout(() => {
        document.querySelector('#homepage .bandes-container .bandes').classList.add('loaded');
        document.querySelector('#homepage .slogan-container').classList.add('loaded');
        document.querySelector('#homepage .link-container .btn-down').classList.add('loaded');
    }, 800);
});