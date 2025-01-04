<?php
require 'partials/head.php';
require 'partials/nav.php';
require 'partials/banner.php';
?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href="/post?id=<?= $_GET['id'] ?>" class="block mb-4 underline text-teal-500">
            Go Back
        </a>
        <p>
            Edit Post
        </p>
    </div>
</main>

<?php
require 'partials/footer.php';
?>