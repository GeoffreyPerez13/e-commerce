console.log('coucou')

// Ouvrir la lightbox avec l'image sélectionnée
function openLightbox(element) {
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    lightbox.style.display = 'flex';
    lightboxImg.src = element.src;
}

// Fermer la lightbox
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
}

// Rendre les fonctions globales
window.openLightbox = openLightbox;
window.closeLightbox = closeLightbox;