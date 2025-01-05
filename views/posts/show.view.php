<?php
view('partials/head', [
    'pageTitle' => $pageTitle,
]);
view('partials/nav');
view('partials/banner', [
    'pageTitle' => $pageTitle,
]);
?>

<main>
    <div class="mx-auto max-w-4xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between mb-4 items-center">
            <a href="/posts" class="block underline text-teal-500">
                Go Back
            </a>
            <a href="/posts/edit?id=<?= $_GET['id'] ?>" class="border rounded-lg px-4 py-1.5">Edit</a>
        </div>


        <div class="overflow-hidden rounded-lg bg-white shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <p class="whitespace-pre-line"><?= $post['content'] ?></p>
                <p class="border-t mt-3 pt-3">By: <?= $post['author']['name'] ?> </p>
            </div>

        </div>
    </div>
</main>

<?php
view('partials/footer');
?>