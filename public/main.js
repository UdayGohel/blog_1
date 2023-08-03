const navItems = document.querySelector('.nav__items');
const openNavBtn = document.querySelector('#open__nav_btn');
const closeNavBtn = document.querySelector('#close__nav_btn');

// opens nav dropdown in medium size 
const opennav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}
// close nav dropdown in medium size 

const closenav = () => {
    navItems.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';

}
openNavBtn.addEventListener('click', opennav);
closeNavBtn.addEventListener('click', closenav);



const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn');

// Show Sidebar on small devices
const showSidebar = () => {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'inline-block';
}

// Hide Sidebar on small devices
const hideSidebar = () => {
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = 'inline-block';
    hideSidebarBtn.style.display = 'none';
}

showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);
