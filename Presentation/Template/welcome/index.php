<h1><?= $heading ?></h1>

<ul>
    <li>
        <a href="?url=sign-up">Sign up</a>
    </li>
</ul>

<form action="?url=auth" method="post">
    <div class="form-field">
        <input type="email" name="email" placeholder="E-mail">
    </div>
    <div class="form-field">
        <input type="password" name="password" placeholder="Password">
    </div>
    <div class="form-field">
        <button type="submit">Sign in</button>
    </div>
</form>