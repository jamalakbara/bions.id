<?php if (!empty($bions["title"])) : ?>
    <?= view('home/' . $config["template"] .'/banner.php') ?>
<?php endif; ?>

<?= view('home/' . $config["template"] .'/market.php') ?>

<?= view('home/' . $config["template"] .'/kalkulatorsaham.php') ?>

<?= view('home/' . $config["template"] .'/faqfront.php') ?>

<?= view('home/' . $config["template"] .'/newsletter.php') ?>
