function openEditModal(id, name, price, duration, caption, recommendation, description) {
    document.getElementById('edit_service_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_price').value = price;
    document.getElementById('edit_duration').value = duration;
    document.getElementById('edit_caption').value = caption;
    document.getElementById('edit_recommendation').value = recommendation;
    document.getElementById('edit_description').value = description;

    document.getElementById('editServiceModal').style.display = 'block';
}

function closeEditModal() {
    document.getElementById('editServiceModal').style.display = 'none';
}

// Закрыть модальное окно, если пользователь кликает вне модального контента
window.onclick = function(event) {
    var modal = document.getElementById('editServiceModal');
    if (event.target === modal) {
        closeEditModal();
    }
}
