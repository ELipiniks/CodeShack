<h1><?= $heading ?></h1>

<ul>
    <li>
        <a href="?url=welcome">Back to sign in</a>
    </li>
</ul>

<form action="?url=register" method="post">
    <div class="form-field">
        <input type="email" name="email" placeholder="E-mail">
    </div>
    <div class="form-field">
        <input type="password" name="password" placeholder="Password">
    </div>

    <hr>
    <div class="form-field">
        <input type="text" name="username" placeholder="User name">
    </div>
    <div class="form-field">
        <input type="text" name="firstname" placeholder="First Name">
    </div>
    <div class="form-field">
        <input type="text" name="lastname" placeholder="Last Name">
    </div>
    <hr>
    <div class="form-field">
        <button type="submit">Register</button>
    </div>
</form>