<x-layout>
    <x-admin>
        <h1>Список Записей</h1>
        <form method="GET" action="{{ route('admin.appointments.index') }}">
            <label for="sort">Сортировка по ФИО:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="asc" {{ isset($sortDirection) && $sortDirection === 'asc' ? 'selected' : '' }}>От А до Я</option>
                <option value="desc" {{ isset($sortDirection) && $sortDirection === 'desc' ? 'selected' : '' }}>От Я до А</option>
            </select>
        </form>
        <table class="appointments-table">
            <thead>
                <tr>
                    <th>Дата</th>
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
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->phone }}</td>
                        <td>{{ optional($appointment->service)->name }}</td>
                        <td>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Вы уверены, что хотите удалить эту запись?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-admin>
</x-layout>
