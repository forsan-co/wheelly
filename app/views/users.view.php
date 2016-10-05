<?php require('partials/head.php') ?>
    <h1>All users</h1>

<?php foreach ($users as $user): ?>
    <li><?= $user->name ?></li>
<?php endforeach ?>     

<h1>Submit Your name</h1>

<form action="/users" method="post">
    <input type="text" name="name">
    <button type="submit">Submit</button>
</form>

<?php require('partials/footer.php') ?>
