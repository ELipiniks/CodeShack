<h1><?= $heading ?></h1>

Welcome
<?= $user->getProfile()->getFirstName() ?>
<?= $user->getProfile()->getLastName() ?>
 a.k.a
<?= $user->getProfile()->getUsername()->getValue() ?>

<ul>
    <li>
        <a href="?url=dashboard/my-profile">My profile</a>
    </li>
    <li>
        <a href="?url=dashboard/drunk-people">Drunk people</a>
    </li>
    <li>
        <a href="?url=dashboard/logout">Logout</a>
    </li>
</ul>