const top_page = document.querySelector('#top-page')

const stats = top_page.querySelectorAll('.stats')

stats.forEach( (stat) => {

    let stat_value = stat.getAttribute("data-pourcentage");
    let barre = stat.querySelector('.barre');
    if (stat_value > 100) {
        stat_value = 100 + "%";
        barre.style.height = stat_value;
    }
    else{
        barre.style.height = stat_value + "%";
    }

    barre.style.backgroundColor = "green";

});