document.addEventListener('DOMContentLoaded', function () {
    let doctorCount = 1;

    // Функция для добавления нового блока с врачом
    function addDoctorBlock() {
        doctorCount++;  // Увеличиваем счётчик для уникальных идентификаторов

        // Создаём новый блок для врача
        const newDiv = document.createElement('div');
        newDiv.className = 'form-group service-doctor';
        newDiv.id = `doctor-block-${doctorCount}`;  // Устанавливаем уникальный id для блока

        // Создаём label для select
        const label = document.createElement('label');
        label.setAttribute('for', `doctor_${doctorCount}`);
        label.textContent = `Доктор:`;

        // Создаём select для выбора врача
        const select = document.createElement('select');
        select.id = `doctor_${doctorCount}`;
        select.name = `doctor_${doctorCount}`;
        select.className = 'service-doctor-select';

        // Создаём стандартную опцию
        const defaultOption = document.createElement('option');
        defaultOption.value = '';
        defaultOption.textContent = 'Выберите врача';
        select.appendChild(defaultOption);

        // Добавляем список врачей из массива doctors
        doctors.forEach(doctor => {
            const option = document.createElement('option');
            option.value = doctor.id;
            option.textContent = doctor.name;
            select.appendChild(option);
        });

        // Создаём кнопку для удаления блока с врачом
        const dellButton = document.createElement('button');
        dellButton.type = 'button';
        dellButton.idName = 'dell-doctor-button';
        dellButton.className = 'btn';
        dellButton.textContent = 'Убрать';

        // Добавляем обработчик клика для кнопки удаления
        dellButton.addEventListener('click', function () {
            newDiv.remove();  // Удаляем блок с врачом
        });

        // Добавляем все элементы в новый блок
        newDiv.appendChild(label);
        newDiv.appendChild(select);
        newDiv.appendChild(dellButton);

        // Добавляем новый блок в контейнер
        document.getElementById('doctor-blocks-container').appendChild(newDiv);
    }

    // Находим кнопку для добавления врача и добавляем обработчик клика
    const addButton = document.querySelector('#add-doctor-button');
    addButton.addEventListener('click', addDoctorBlock);
});





const priceInput = document.getElementById('price');
priceInput.addEventListener('focus', function() {
    let value = this.value.replace(/руб\.\s*$/, '');
    this.value = value.trim();
});
priceInput.addEventListener('blur', function() {
    let value = this.value.trim();
    if (value && !value.endsWith('руб.')) {
        this.value = value + ' руб.';
    }
});
const durationInput = document.getElementById('duration');
durationInput.addEventListener('focus', function() {
    let value = this.value.replace(/мин\.\s*$/, '');
    this.value = value.trim();
});
durationInput.addEventListener('blur', function() {
    let value = this.value.trim();
    if (value && !value.endsWith('мин.')) {
        this.value = value + ' мин.';
    }
});



document.getElementById('service-form').addEventListener('submit', btnServise);

function btnServise(event) {
    event.preventDefault();

    let priceInput = document.getElementById('price');
    let priceValue = priceInput.value.replace(/руб\.\s*$/, '');
    priceInput.value = priceValue.trim();

    let durationInput = document.getElementById('duration');
    let durationValue = durationInput.value.replace(/мин\.\s*$/, '');
    durationInput.value = durationValue.trim();

    document.getElementById('service-form').submit();
    window.location.reload();
}
