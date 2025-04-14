<div>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Логин</label>
            <input 
                type="text" 
                name="login" 
                value="{{ old('login', $user->login) }}" 
                class="w-full p-2 border rounded"
                required
            >
        </div>
    
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input 
                type="email" 
                name="email" 
                value="{{ old('email', $user->email) }}" 
                class="w-full p-2 border rounded"
                required
            >
        </div>
    
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Роль</label>
            <select name="role" class="w-full p-2 border rounded">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Пользователь</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Администратор</option>
            </select>
        </div>
    
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Сохранить изменения
        </button>
    </form>
    
</div>