<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">

        <?php if (empty($posts)): ?>
            <div>
                <p>No Post created yet.</p>
            </div>
        <?php endif ?>

        <ul role="list" class="space-y-3">
            <?php foreach ($posts as $post): ?>
                <li>
                    <a href="/post?id=<?= $post['id'] ?>" class="text-2xl truncate block overflow-hidden rounded-md bg-white px-6 py-4 shadow-sm">
                        <?= $post['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<?php
require base_path('views/partials/footer.php');
?>