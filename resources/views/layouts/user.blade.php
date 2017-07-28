<select id="user" name="user" class="form-control" required>
    @if(isset($users))
        @forelse($users as $user)
            <option value="{{ $user->id }}">{{ htmlspecialchars($user->name) }}</option>
        @empty
            <option value="0" disabled>Не для посетителей</option>
        @endforelse
    @else
        <option value="-1" disabled>Ошибка! Обратитесь к администратору</option>
    @endif
</select>