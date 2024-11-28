
function showServiceChange() {
    var selectElement = document.getElementById('id_service');
    var selectedOption = selectElement.options[selectElement.selectedIndex].text;
    alert('Вы выбрали услугу: ' + selectedOption);
}