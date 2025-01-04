<?php
require 'views/partials/head.php';
require 'views/partials/nav.php';
require 'views/partials/banner.php';
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
require 'views/partials/footer.php';
?>