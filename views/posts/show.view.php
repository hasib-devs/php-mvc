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
        <a href="/posts" class="block mb-4 underline text-teal-500">
            Go Back
        </a>

        <div class="overflow-hidden rounded-lg bg-white shadow-sm">
            <div class="px-4 py-5 sm:p-6">
                <p class="whitespace-pre-line"><?= $post['content'] ?></p>
            </div>
        </div>
    </div>
</main>

<?php
view('partials/footer');
?>