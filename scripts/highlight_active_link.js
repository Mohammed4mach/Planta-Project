let nav =
[
    document.querySelector(`a[href="#users-panel"]`),
    document.querySelector(`a[href="#plants-panel"]`),
    document.querySelector(`a[href="#articles-panel"]`),
    document.querySelector(`a[href="#create-panel"]`),
    document.querySelector(`a[href="#update-panel"]`),
    document.querySelector(`a[href="#delete-panel"]`),
];

let highlight = function()
{
    for(let i = 0; i < 6; i++)
    {
        if(nav[i].href == document.baseURI)
            nav[i].classList.add(`active`);
        else
            nav[i].classList.remove(`active`);
    }
}

highlight();

nav.forEach(l => l.onclick = function() {highlight();});