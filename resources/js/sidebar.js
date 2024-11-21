const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const toggleBtn = document.getElementById('toggle-btn');
//при клике на toggleBtn мы либо убираем либо добовляем классы с помощью toggle и classList
toggleBtn.addEventListener('click', function() {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('expanded');
    toggleBtn.classList.toggle('toggle-btn-white');
});