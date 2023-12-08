const top_page = document.querySelector('#top-page')

const stats = top_page.querySelectorAll('.stats')

stats.forEach( (stat) => {

    let stat_value = stat.getAttribute("data-pourcentage");
    let barre = stat.querySelector('.barre');

    barre.style.height = stat_value + "%";
    barre.style.backgroundColor = "green";

});