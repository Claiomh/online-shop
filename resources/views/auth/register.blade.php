<form action="{{route('register_process')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">
    <input type="password" name="password_confirmation" placeholder="pass confirm">
    <button type="submit">Register</button>
</form>
