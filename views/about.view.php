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
        <h1>About Page</h1>

    </div>
</main>

<?php
view('partials/footer');
?>