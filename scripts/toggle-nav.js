let toggNav = document.querySelector(`#toggle-nav`);
let navList = document.querySelector(`nav`);

let toggleNav = function()
{
    let openNav = true;
    openNav = toggNav.toggleAttribute(`checked`);

    if(openNav)
    {
        navList.style.display = `none`;
    }
    else
    {
        navList.style.display = `flex`;
    }
}