@vite(['resources/views/admin/service.css'])

<x-layout>
    <x-admin>
        <div class="conteiner">
        <h1>Список консультаций</h1>
        <table class="consultation-table">
            <thead>
                <tr>
                    <th>Имя</th>
                    <th>Телефон</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->name }}</td>
                        <td>{{ $consultation->phone }}</td>
                        <td>
                            <!-- Мягкое удаление -->
                            <form action="{{ route('consultations.softDelete', $consultation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH') <!-- Обычно используем PATCH для мягкого удаления -->
                                <button type="submit" class="btn-edit" onclick="return confirm('Вы уверены, что хотите подтвердить эту консультацию?')">Подтвердить запись</button>
                            </form>
                            
                            <!-- Жесткое удаление -->
                            <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
      </div>  
    </x-admin>
</x-layout>
