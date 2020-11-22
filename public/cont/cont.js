
var menu_icon1 = document.querySelector('.menu-icon1');
var basic_menu = document.querySelector('.basic-sidemenu-outer');
var basic_menu_underlay = document.querySelector('.basic-sidemenu-underlay');

menu_icon1.addEventListener('click', open_basik_menu);

function open_basik_menu() {
  basic_menu.classList.add('o-basik');
  basic_menu_underlay.classList.add('o-basik-underlay');
}


basic_menu_underlay.addEventListener('click', hide_basik_menu_and_underlay);

function hide_basik_menu_and_underlay() {
  basic_menu.classList.remove('o-basik');
  basic_menu_underlay.classList.remove('o-basik-underlay');
}





