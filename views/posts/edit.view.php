<?php
require base_path('views/partials/head.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/post?id=<?= $_GET['id'] ?>" class="block mb-4 underline text-teal-500">
            Go Back
        </a>
        <p>
            Edit Post
        </p>
    </div>
</main>

<?php
require base_path('views/partials/footer.php');
?>