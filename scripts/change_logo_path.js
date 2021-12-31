// This script changes planta logo href attribute to redirect user to landing page
let logo = document.querySelector(`.logo`);
logo.setAttribute(`href`, `index.php`);

let search_form = document.querySelector('.search-bar-container');
search_form.setAttribute(`action`, `scripts/search.php`);

let logout = document.querySelector(`.logout a`);
if(logout != null)
    logout.setAttribute(`href`, `scripts/logout.php`);
