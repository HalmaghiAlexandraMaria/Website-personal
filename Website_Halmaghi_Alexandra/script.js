document.addEventListener('DOMContentLoaded', () => {
    const navItems = document.querySelectorAll('.nav-item');
    const backBtn = document.querySelector('.back-btn');
    const logoutBtn = document.querySelector('.logout-btn');
    
    let pageHistory = ['home'];

    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            const page = item.dataset.page;
            
            // Actualizează navigația
            navItems.forEach(nav => nav.classList.remove('active'));
            item.classList.add('active');

            // Ascunde celelalte butoane dacă nu suntem pe home
            if (page !== 'home') {
                navItems.forEach(nav => {
                    if (nav.dataset.page !== page && nav.dataset.page !== 'home') {
                        nav.style.display = 'none';
                    }
                });
                backBtn.style.display = 'block';
            } else {
                navItems.forEach(nav => nav.style.display = 'flex');
                backBtn.style.display = 'none';
            }

            // Adaugă pagina la istoric
            pageHistory.push(page);
            
            // Aici poți adăuga logica pentru încărcarea conținutului paginii
            loadPage(page);
        });
    });

    backBtn.addEventListener('click', () => {
        pageHistory.pop(); // Elimină pagina curentă
        const previousPage = pageHistory[pageHistory.length - 1];
        
        // Încarcă pagina anterioară
        loadPage(previousPage);
        
        if (previousPage === 'home') {
            navItems.forEach(nav => nav.style.display = 'flex');
            backBtn.style.display = 'none';
        }
    });

    logoutBtn.addEventListener('click', () => {
        window.location.href = 'login.html';
    });
});

function loadPage(page) {
    // Implementează logica pentru încărcarea conținutului paginii
    console.log(`Loading ${page} page...`);
}