<x-layout>
    <x-admin>
        <h1>Список Записей</h1>

        <div class="sorting-buttons">
            <form method="GET" action="{{ route('admin.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="asc" class="btn-sort">От А до Я</button>
            </form>
            <form method="GET" action="{{ route('admin.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="desc" class="btn-sort">От Я до А</button>
            </form>
            <form method="GET" action="{{ route('admin.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="newest" class="btn-sort">От новых к старым</button>
            </form>
            <form method="GET" action="{{ route('admin.index') }}" style="display: inline;">
                <button type="submit" name="sort" value="oldest" class="btn-sort">От старых к новым</button>
            </form>
        </div>

        <table class="appointments-table">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Услуга</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ optional($appointment->service)->name }}</td>
                        <td>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">Удалить</button>
                            </form>
                            <button type="button" class="btn-edit" onclick="openEditModal({{ $appointment }})">Изменить</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="editModal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Редактировать Запись</h2>
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <label for="name">ФИО:</label>
                    <input type="text" name="name" id="name" required>
                    <label for="phone">Телефон:</label>
                    <input type="text" name="phone" id="phone" required>
                    <label for="date">Дата:</label>
                    <input type="date" name="date" id="date" required>
                    <label for="time">Время:</label>
                    <input type="time" name="time" id="time" required>
                    <button type="submit">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </x-admin>
</x-layout>
<script>
function openEditModal(appointment) {
    document.getElementById('editModal').style.display = 'block';
    document.getElementById('editForm').action = "{{ route('appointments.update', '') }}/" + appointment.id;

    // Укажите правильный путь
    document.getElementById('name').value = appointment.name;
    document.getElementById('phone').value = appointment.phone;
    document.getElementById('date').value = appointment.date;
    document.getElementById('time').value = appointment.time; 

}

function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}
</script>