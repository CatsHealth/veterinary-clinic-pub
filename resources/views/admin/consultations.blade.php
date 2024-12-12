<x-layout>
    <x-admin>
        <h1>Список консультаций</h1>
        <table class="table">
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
                            <!-- Форма для мягкого удаления -->
                            <form action="{{ route('consultations.destroy', $consultation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить эту консультацию?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </x-admin>
</x-layout>
