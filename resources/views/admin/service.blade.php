<x-layout>
<x-admin></x-admin>
<form action="{{ route('service.store') }}" method="POST">
    @csrf

    <label for="name">Название:</label>
    <input type="text" id="name" name="name" required maxlength="100" value="{{ old('name') }}">
    @error('name')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="doctor">Доктор:</label>
    <select id="doctor" name="doctor_1">
        <option value="">Выберите врача</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" @if(old('doctor_1') == $doctor['id']) selected @endif>{{ $doctor->name }}</option>
        @endforeach
    </select>

    @error('doctor_1')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <select id="doctor" name="doctor_2">
        <option value="">Выберите врача</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" @if(old('doctor_2') == $doctor['id']) selected @endif>{{ $doctor->name }}</option>
        @endforeach
    </select>

    @error('doctor_2')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <select id="doctor" name="doctor_3">
        <option value="">Выберите врача</option>
        @foreach($doctors as $doctor)
            <option value="{{ $doctor->id }}" @if(old('doctor_3') == $doctor['id']) selected @endif>{{ $doctor->name }}</option>
        @endforeach
    </select>

    @error('doctor_3')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="price">Цена:</label>
    <input type="number" id="price" name="price" required value="{{ old('price') }}">
    @error('price')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="duration">Продолжительность:</label>
    <input type="number" id="duration" name="duration" required value="{{ old('duration') }}">
    @error('duration')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="caption">Заголовок:</label>
    <input type="text" id="caption" name="caption" required maxlength="255" value="{{ old('caption') }}">
    @error('caption')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="recommendation">Рекомендация:</label>
    <textarea type="text" id="recommendation" name="recommendation" >{{ old('recommendation') }}</textarea>
    @error('recommendation')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="description">Описание:</label>
    <textarea id="description" name="description">{{ old('description') }}</textarea>
    @error('description')
        <div style="color: red;">{{ $message }}</div>
    @enderror
    
    <button type="submit">Сохранить</button>
</form>
</x-layout>
