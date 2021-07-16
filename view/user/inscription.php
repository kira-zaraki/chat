<link rel="stylesheet" href="../assets/css/user.css">
    <div class="container">
        <div id="card">
        <h2>Sign-up  </h2>
        <form action="" method="post"> 
            <?php foreach ($form as $input): ?>
              <?= $input ?>
            <?php endforeach ?>
            <input type="checkbox" id="tos" name="tos" />
            <label for="tos">Accept the <a href="">Terms of service</a></label>
            <input type="checkbox" id="news" name="news">
            <label for="news">Subscribe to our newsltetter !</label>
            <input type="submit" id="submit"/>
        </form> 
        <p style='clear: both;'><a href="/<?=ROOT?>/user/inscription">Inscription</a></p>
    </div>
</div>