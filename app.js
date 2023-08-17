

function pop_product_center(id_product, img) {
    const card = document.getElementById(id_product);
    card.style.animation = 'pop_product_center 0.7s ease-in-out';
    card.style.animationFillMode = 'forwards';
}

function pop_product_close(id_product) {
    const card = document.getElementById(id_product);
    card.style.animation = 'pop_product_close 0.3s ease-in-out';
    card.style.animationFillMode = 'forwards';
}

function pop_connexion(id_connextion) {
    const connexion = document.getElementById(id_connextion);
    connexion.style.animation= 'connexion-pop 0.8s ';
    connexion.style.animationFillMode = 'forwards';
}

function pop_connexion_close(id_connextion) {
    const connexion = document.getElementById(id_connextion);
    connexion.style.animation = 'connexion-pop-close 0.8s ';
    connexion.style.animationFillMode = 'forwards';
}

function web_site_slide(id_webiste) {
    const website = document.getElementById(id_webiste);
    website.style.animation = 'web-site-slide 1s ';
    website.style.animationFillMode = 'forwards';
}
function web_site_slide_close(id_website) {
    const website = document.getElementById(id_website);
    website.style.animation = 'web-site-slide-close 0.8s ';
    website.style.animationFillMode = 'forwards';
}

function justaucorpswebsiteclose(id_website) {
    const website = document.getElementById(id_website);
    website.style.animation = 'justaucorps-website-close 1s ease-in-out ';
    website.style.animationFillMode = 'forwards';
}

function justaucorps_justo_pop(id_justo) {
    const justo = document.getElementById(id_justo);
    justo.style.animation = 'justaucorps-justo-pop 1s ease-in-out';
    justo.style.animationFillMode = 'forwards';
}