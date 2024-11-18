<x-layout>
<x-admin></x-admin>
<form action="{{ route('doctor.store') }}" method="POST">
    @csrf

    <label for="name">ФИО:</label>
    <input type="text" id="name" name="name" required maxlength="100">
    @error('name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="specialization">Специализация:</label>
    <input type="text" id="specialization" name="specialization" required maxlength="100">
    @error('specialization')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="phone">Телефон</label>
    <input type="phone" id="phone" name="phone" required maxlength="100">
    @error('phone')
        <div style="color: red;">{{ $message }}</div>
    @enderror


    <button type="submit">Сохранить</button>
</x-layout>