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

        <?php if (empty($posts)): ?>
            <div>
                <p>No Post created yet.</p>
            </div>
        <?php endif ?>

        <ul role="list" class="space-y-3">
            <?php foreach ($posts as $post): ?>
                <li class="flex items-center bg-white overflow-hidden rounded-md shadow-sm">
                    <a href="/post?id=<?= $post['id'] ?>" class="text-2xl grow truncate block px-6 py-4 ">
                        <?= $post['title'] ?>
                    </a>

                    <form method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $post['id'] ?>">
                        <button type="submit" class="px-2.5 mx-2 py-2 rounded-md hover:bg-red-500 hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </form>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</main>

<?php
view('partials/footer');
?>