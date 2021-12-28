// This script changes planta logo href attribute to redirect user to landing page
let logo = document.querySelector(`.logo`);
logo.setAttribute(`href`, `index.php`);

let logout = document.querySelector(`.logout a`);
logout.setAttribute(`href`, `scripts/logout.php`);