<!-- resources/views/auth/login.blade.php -->
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
    </div>

    <!-- Role selection -->
    <div>
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="admin_perusahaan">Admin Perusahaan</option>
            <option value="admin_bank">Admin Bank</option>
        </select>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <button type="submit">Login</button>
</form>
